<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AlbumController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::get(config('common.DB_HOST_STORAGE') . '/api/album?lop_id=' . Auth::user()->profile->lop_id);
        $data = $response->json();
        return view('album.index', compact('data'));
    }

    public function show($id)
    {
        $data = [];
        $dir = config('common.DB_HOST_STORAGE') . '/albums/lop_' . Auth::user()->profile->lop_id .'/';
        $album = Album::where('lop_id', Auth::user()->profile->lop_id)
                     ->where('id', $id)
                     ->first();

        if(!$album){
            return redirect()->route('album.index');
        }
        
        $array_images = [];
        foreach(json_decode($album->item_images) as $image){
                array_push($array_images, $dir .'album_' . $album->id  .'/' . $image);
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
}
