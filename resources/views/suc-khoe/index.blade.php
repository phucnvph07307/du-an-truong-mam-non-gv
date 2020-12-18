@extends('layouts.main')
@section('title', "Quản lý sức khoẻ")
@section('style')
<link href="{!!  asset('css_loading/css_loading.css') !!}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<script>
    function errorLoadAvatar(e){
        let name_avatar = e.getAttribute('data-name_avatar');
        e.setAttribute('src', "https://ui-avatars.com/api/?name=" + name_avatar + "&background=random");
    }
</script>
<div class="m-content">
    
    @if(isset($dot))
    <section class="action-nav d-flex align-items-center justify-content-between mt-4 mb-4">
        <div class="col-lg-10">
            <div class="form-group m-form__group row">
                <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10">
                    <select class="form-control" id="DotKhamSucKhoe" name="dot_id">
                        
                        @foreach ($getDotAll as $item)
                        <option
                        @if (isset($params['dot_id']))
                            {{ ($params['dot_id'] == $item->id) ? "selected" : "" }}
                        @else
                            {{ ($dot->id == $item->id) ? "selected" : "" }}
                        @endif
                        value="{{$item->id}}">
                        {{$item->ten_dot}} - {{date("d/m/Y", strtotime($item->thoi_gian))}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-2" style="text-align: right">
            <button type="button" class="btn btn-info .bg-info" onclick="CheckDot()">Thêm mới</button>
        </div>
    </section>
    @endif
    <div id="thongbao"></div>
    
    @if(isset($dot))
    <div class="m-portlet">
        <div class="m-portlet__body table-responsive">
            <table class="table table-bordered table-hover">
            
                <thead>
                    <tr>
                        <th>STT</th>
                        <th><b>Mã học sinh</b></th>
                        <th><b>Họ tên</b></th>
                        <th><b>Ảnh</b></th>
                       
                        <th><b>Chiều cao</b></th>
                        <th><b>Cân nặng</b></th>
                        <th><b>Chức năng</b></th>
                    </tr>
                </thead>
                <tbody id="show-table-suc-khoe">
                    @php
                    $i = !isset($_GET['page']) ? 1 : ($limit * ($_GET['page']-1) + 1);
                    @endphp
                    @foreach ($hoc_sinh as $item)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$item->ma_hoc_sinh}}</td>
                        <td>{{$item->ten}}</td>
                        <td><img src="{{ $item->avatar }}" alt="avatar" data-name_avatar="{{ $item->ten }}" onerror="errorLoadAvatar(this)" width="60" class="img-thumbnail"></td>          
                        <td>{{$item->chieu_cao}} cm</td>
                        <td>{{$item->can_nang}} kg</td>
                        <td>
                            <a href="{{route('quan-suc-khoe-edit', ['id' => $item->id])}}">
                            <button type="button" class="btn btn-primary">Chi tiết</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                   

                </tbody>
            </table>
            <div class="m-portlet__foot d-flex justify-content-end">
               
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
@section('script')
@if(isset($dot) && count($hoc_sinh)==0)
    <script>
        swal("Đã có đợt khám sức khỏe mới!","Vui lòng nhập đợt sức khỏe cho các bé","info")
    </script>
@endif
@if(!isset($dot))
<script>
  var url_home = "{{route('home')}}"
  swal("Chưa có đợt nào cả!","Vui lòng quay lại sau khi có đợt khám sức khỏe","error").then((result) =>{
    window.location = url_home
  })
</script>
@endif
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
    var url = "{{route('quan-suc-khoe-check-dot')}}";
    var url_create = "{{route('quan-suc-khoe-create')}}";
    var local_storage = localStorage.getItem('them_thanh_cong');
    var thongbaodiv = $("#thongbao");
    if(local_storage){
        
        thongbaodiv.append(`
        <div class="alert alert-success alert-dismissible fade show" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
			<strong>Thành công!</strong> Danh sách sức khỏe học sinh được đã thêm vào đợt mới nhất
		</div>
        `);
        localStorage.clear('them_thanh_cong');
    }
    function CheckDot()
    {   
        $('#preload').css('display','block')
        axios.post(url)
        .then(function(response){
            if(response.data.length > 0)
            {
                swal({title:"Dữ liệu đã có cho đợt mới",html:$("<div>")
                .addClass("some-class")
                .text("Chỉ thêm được khi chưa có dữ liệu cho đợt mới"),animation:!1,customClass:"animated tada"})
                $('#preload').css('display','none')
            }
            else
            {
                window.location = url_create;
            }
            
            
        })
    }
    var url_ShowDotSucKhoe = "{{route('show-dot-suc-khoe')}}"
    var url_ChiTietSucKhoe = "{{route('quan-suc-khoe-edit', ['id'])}}"
    $("#DotKhamSucKhoe").change(function(){
        var id_dot = $('#DotKhamSucKhoe').val()
        // console.log($("#DotKhamSucKhoe").val())
        axios.post(url_ShowDotSucKhoe, {id: id_dot})
        .then(function(response){
            var content = ""
            var i = 1
            response.data.forEach(element => {
                url_new = url_ChiTietSucKhoe.replace('id', element.id)
                if(element.avatar == null){
                    element.avatar = "https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png"
                }
                content+=
                `
                <tr>
                    <th scope="row">${i++}</th>
                    <td>${element.ma_hoc_sinh}</td>
                    <td>${element.ten}</td>
                    <td><img src=${element.avatar} height="90px" width="85px" alt=""></td>
                    <td>${element.chieu_cao} cm</td>
                    <td>${element.can_nang} kg</td>
                    <td>
                        <a href="${url_new}">
                        <button type="button" class="btn btn-primary">Chi tiết</button>
                        </a>
                    </td>
                </tr>
                `
            })
            $("#show-table-suc-khoe").html(content)
        })
    })
</script>

@endsection