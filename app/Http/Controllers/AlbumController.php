<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;
use Carbon\Carbon;

class AlbumController extends Controller
{
    public function index()
    {
        $lop_id = Auth::user()->profile->lop_id;
        $data = [];
        $album = Album::where('lop_id', $lop_id)->get();
        foreach($album as $item){
             $array_images = [];
             foreach(json_decode($item->item_images) as $image){
                     array_push($array_images, $image);
             }
             $param = (object) [
                 'id' => $item->id,
                 'item_images' => $array_images,
                 'auth_id' => $item->auth_id,
                 'lop_id' => $item->lop_id,
                 'title' => $item->title,
                 'created_at' => Carbon::parse($item->created_at)->format('d/m/Y')
             ];
             array_push($data, $param);
        }
        return view('album.index', compact('data'));
    }

    public function fillter(Request $request)
    {
        $lop_id = Auth::user()->profile->lop_id;
        $data = [];
        $album = Album::where('lop_id', $lop_id);
        if(isset($request->start_date) 
           && $request->start_date != null
           && isset($request->end_date) 
           && $request->end_date != null
           ){
           $album->whereDate('created_at', ">=", $request->start_date)
                 ->whereDate('created_at', "<=", $request->end_date);
        }
        $album = $album->get();
        foreach($album as $item){
             $array_images = [];
             foreach(json_decode($item->item_images) as $image){
                     array_push($array_images, $image);
             }
             $param = (object) [
                 'id' => $item->id,
                 'item_images' => $array_images,
                 'auth_id' => $item->auth_id,
                 'lop_id' => $item->lop_id,
                 'title' => $item->title,
                 'created_at' => Carbon::parse($item->created_at)->format('d/m/Y')
             ];
             array_push($data, $param);
        }
       return response()->json($data, Response::HTTP_OK);
    }

    public function show($id)
    {
        $data = [];
        $album = Album::where('lop_id', Auth::user()->profile->lop_id)
                     ->where('id', $id)
                     ->first();
        if(!$album){
            return redirect()->route('album.index');
        }
        
        $array_images = [];
        foreach(json_decode($album->item_images) as $image){
                array_push($array_images,  $image);
        }
        $data = (object) [
            'id' => $album->id,
            'item_images' => $array_images,
            'auth_id' => $album->auth_id,
            'lop_id' => $album->lop_id,
            'title' => $album->title
        ];
        return view('album.show',compact('data'));  
    }

    public function store(Request $request)
    {
        $album = Album::create([
            'title' => $request->title,
            'item_images' => $request->item_images,
            'auth_id' => $request->auth_id,
            'lop_id' => $request->lop_id
        ]);

        $dir = 'albums/lop_' . $album->lop_id .'/';
        if ( !is_dir( $dir ) ) {
            mkdir( $dir );  
        }
        $dir_album = $dir .'album_' . $album->id  .'/';
        if ( !is_dir( $dir_album ) ) {
            mkdir( $dir_album );  
        }
        $array_item_images = json_decode($album->item_images);
        $array_images_new = [];
        foreach($array_item_images as $image){
            array_push($array_images_new, $dir_album . $image);
            File::move(public_path() . '/albums/item_images/' . $image,
                        $dir_album . $image);
        }

        $album->item_images = $array_images_new;
        $album->save();
        return response()->json($album, Response::HTTP_OK);
    }

    public function fileUpload(Request $request)
    {
        $_IMAGE = $request->file('file');
        $filename = time().$_IMAGE->getClientOriginalName();
        $uploadPath = 'albums/item_images/';
        $_IMAGE->move($uploadPath,$filename);
        return response()->json($filename, Response::HTTP_OK);
    }

    public function removeUpload(Request $request)
    {   
        $image = str_replace('"', '', $request->file);
        $path = public_path() . '/albums/item_images/' . $image;
        if(File::exists($path)){
            unlink($path);
        }
        return response()->json($image, Response::HTTP_OK);
    }

    public function removeImage(Request $request)
    {
        $album = Album::find($request->id);
        $item_images = json_decode($album->item_images);
        $pos = array_search($request->image, $item_images);
        unset($item_images[$pos]);
        $array_images_new = [];
        foreach($item_images as $image){
            array_push($array_images_new, $image);
        }
        $album->item_images = $array_images_new;
        $album->save();

        $path = public_path() . '/' . $request->image;
        if(File::exists($path)){
            unlink($path);
        }
        if(!$album->item_images){
            $album->delete();
            return response()->json(['images' => $album->item_images, 'code' => 0], Response::HTTP_OK);
        }
        return response()->json(['images' => $album->item_images, 'code' => 1], Response::HTTP_OK);
    }

    public function updateTitle(Request $request)
    {
        $album = Album::find($request->id);
        $album->title = $request->title != "" ? $request->title : $album->title;
        $album->save();
        return response()->json($album->title, Response::HTTP_OK);
    }

    public function addImage(Request $request)
    {
        $images_add = json_decode($request->images_add);
        $album = Album::find($request->id);
        $images_old = json_decode($album->item_images);

        $images_new = array_merge($images_add, $images_old);
        $album->item_images = $images_new;
        $album->save();

        // đoạn này di chuyển ảnh từ file tạm sang đúng album
        foreach(json_decode($request->images_loop) as $image){
            File::move(public_path() . '/albums/item_images/' . $image,
                        $request->url_image . $image);
        }
        return response()->json(['images' => $album->item_images, 'code' => 1], Response::HTTP_OK);
    }

    public function removeAlbum(Request $request)
    {
        $album = Album::find($request->id);
        $hinh_anh_thu_0 = json_decode($album->item_images)[0];
        $vitri = strrpos( $hinh_anh_thu_0, '/', 3 );
        $kq = substr($hinh_anh_thu_0, 0, $vitri);

        $path = public_path() . '/' . $kq . '/';
        $path = rtrim($path, '/') . '/';
        $handle = opendir($path);
        while (false !== ($file = readdir($handle))) {
            if($file != '.' and $file != '..' ) {
                $fullpath = $path.$file;
                if (is_dir($fullpath)) rmdir_recurse($fullpath);
                else unlink($fullpath);
            }
        }
        closedir($handle);
        rmdir($path);
        $album->delete();
        return response()->json(['code' => 1], Response::HTTP_OK);
    }
}
