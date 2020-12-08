@extends('layouts.main')
@section('title', "Thêm sức khỏe sức khỏe")
@section('style')
<style>
    .m-table {
        font-size: 12px
    }
    .m-table th,
    .m-table td {
        padding: 0.62rem !important;
    }
    .search {
        padding: 0.35rem 0.8rem !important;
        height: 25px;
    }
    .style-button {
        padding: 0.45rem 1.15rem;
    }
    .m-table thead th {
        border: 1px solid #f4f5f8 !important;
    }
    th[rowspan='2'] {
        text-align: center;
        line-height: 50px;
    }
    .btn {
        font-family: Arial, Helvetica, sans-serif
    }
    .scoll-table {
        height: 440px;
        overflow: auto;
    }
    .bottom {
        position: fixed;
        bottom: 50px;
    }
    table.dataTable thead td {
        border-bottom: 1px solid #ffffff !important;
    }
    #table-hoc-sinh_wrapper>.row:first-child {
        display: none;
    }
    .no-padding {
        padding: 0px;
    }
    .glyphicon-icon-rpad .glyphicon,
    .glyphicon-icon-rpad .glyphicon.m8,
    .fa-icon-rpad .fa,
    .fa-icon-rpad .fa.m8 {
        padding-right: 8px;
    }
    .glyphicon-icon-lpad .glyphicon,
    .glyphicon-icon-lpad .glyphicon.m8,
    .fa-icon-lpad .fa,
    .fa-icon-lpad .fa.m8 {
        padding-left: 8px;
    }
    .glyphicon-icon-rpad .glyphicon.m5,
    .fa-icon-rpad .fa.m5 {
        padding-right: 5px;
    }
    .glyphicon-icon-lpad .glyphicon.m5,
    .fa-icon-lpad .fa.m5 {
        padding-left: 5px;
    }
    .glyphicon-icon-rpad .glyphicon.m12,
    .fa-icon-rpad .fa.m12 {
        padding-right: 12px;
    }
    .glyphicon-icon-lpad .glyphicon.m12,
    .fa-icon-lpad .fa.m12 {
        padding-left: 12px;
    }
    .glyphicon-icon-rpad .glyphicon.m15,
    .fa-icon-rpad .fa.m15 {
        padding-right: 15px;
    }
    .glyphicon-icon-lpad .glyphicon.m15,
    .fa-icon-lpad .fa.m15 {
        padding-left: 15px;
    }


    ul.nav-menu-list-style .nav-header .menu-collapsible-icon {
        position: absolute;
        right: 3px;
        top: 16px;
        font-size: 9px;
    }


    ul.nav-menu-list-style {
        margin: 0;
    }
    ul.nav-menu-list-style .nav-header {
        border-top: 1px solid #FFFFFF;
        border-bottom: 1px solid #e8e8e8;
        display: block;
        margin: 0;
        line-height: 42px;
        padding: 0 8px;
        font-weight: 600;
    }
    ul.nav-menu-list-style>li {
        position: relative;
    }
    ul.nav-menu-list-style>li a {
        border-top: 1px solid #FFFFFF;
        border-bottom: 1px solid #e8e8e8;
        padding: 0 10px;
        line-height: 32px;
    }
    ul.nav-menu-list-style>li:first-child a {}

    ul.nav-menu-list-style {
        list-style: none;
        padding: 0px;
        margin: 0px;
    }
    ul.nav-menu-list-style li .badge,
    ul.nav-menu-list-style li .pull-right,
    ul.nav-menu-list-style li span.badge,
    ul.nav-menu-list-style li label.badge {
        float: right;
        margin-top: 7px;
    }
    ul.bullets {
        list-style: inside disc
    }
    ul.numerics {
        list-style: inside decimal
    }
    .ul.kas-icon-aero {}
    ul.kas-icon-aero li a:before {
        font-family: 'Glyphicons Halflings';
        font-size: 9px;
        content: "\e258";
        padding-right: 8px;
    }
    table.dataTable thead .sorting:after{
        margin-bottom: 5px;
    }
    table.dataTable thead .sorting:before{

    }
</style>
@endsection
@section('content')
<div class="m-content">
    <div class="row">
        <div class="col-xl-12">
            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tab">
                <div id="preload" class="preload-container text-center" style="display: none">
                    <img id="gif-load" src="{!! asset('images/loading3.gif') !!}" alt="">
                </div>
               
                <div class="m-portlet__body">

                    <!--begin::Section-->
                    <div class="m-section">
                        <div class="m-section__content">
                            
                            <div class="row mt-12">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row">
                                    <label class="col-lg-12 col-form-label"><h5>Đợt mới nhất: {{$dot->ten_dot}} - {{date("d/m/Y", strtotime($dot->thoi_gian))}}</h5></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>

                    <!--end::Section-->
                </div>
            </div>

            <!--end::Portlet-->
        </div>
    </div>
    <div class="m-portlet">
        <div class="m-portlet__body row ">
            <div class="m-portlet__body table-responsive">
            <table id="table-suc-khoe" class="table m-table m-table--head-bg-success">
                <thead>
                    <tr>
                        
                        <th>STT</th>
                        <th >Mã học sinh</th>
                        <th>Ảnh</th>
                        <th >Họ tên</th>
                        <th>Chiều cao (cm)</th>
                        <th>Cân nặng (kg)</th>
                        
                    </tr>
                </thead>
                
                <tbody>
                    <script>
                        function errorLoadAvatar(e){
                            let ten = e.getAttribute('data-ten');
                            e.setAttribute('src', "https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png");
                        }
                    </script>
                    @php 
                    $i = 1;
                    @endphp
                    <form action="" id="myform">
                    @foreach ($getHocSinh as $item)
                   <tr>
                    
                    <th scope="row">{{$i++}}</th>
                    <td>{{$item->ma_hoc_sinh}} <input type="hidden" name="hoc_sinh_id" value="{{$item->id}}"></td>
                    <td><img width="70px" height="70px" src="{{ $item->avatar }}" onerror="errorLoadAvatar(this)" data-ten="{{ $item->ten }}"></td>
                    <td>{{$item->ten}}</td>
                    <td>
                        <div class="form-group m-form__group">
                            <div class="m-input-icon m-input-icon--left m-input-icon--right">
                                <input type="text" name="chieu_cao" class="form-control m-input m-input--pill m-input--air" 
                                onkeypress="return isNumberKey(event)" maxlength="5">
                                <span class="m-input-icon__icon m-input-icon__icon--left"><span><i class="la la-eyedropper"></i></span></span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group m-form__group">
                            <div class="m-input-icon m-input-icon--left m-input-icon--right">
                                <input type="text" name="can_nang" class="form-control m-input m-input--pill m-input--air" 
                                onkeypress="return isNumberKey(event)" maxlength="5">
                                <span class="m-input-icon__icon m-input-icon__icon--left"><span><i class="la la-eyedropper"></i></span></span>
                            </div>
                        </div>
                    </td>
                    <td>
                        
                    </td>
                </tr>
                   @endforeach
                </form>
                </tbody>
            </table>
        </div>
        <div class="col-md-12 d-flex justify-content-end">
            <div class="m-form__actions">
            <a href="{{route('quan-suc-khoe-index')}}" class="btn btn-danger m-btn m-btn--icon">
                <span>
                    <i class="la la-caret-left"></i>
                    <span>Hủy</span>
                </span>
            </a>
            <a href="#" onclick="SubmitSucKhoe({{$lop_id_gv->lop_id}})" class="btn btn-success m-btn m-btn--icon">
                <span>
                    <span>Thêm mới</span>
                    <i class="la la-plus"></i>
                </span>
            </a>
            </div>
        </div>

    </div>
</div>
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  var url = "{{route('quan-suc-khoe-store')}}";
  var dot_id = "{{$dot->id}}";
  var url_index = "{{route('quan-suc-khoe-index')}}";
  var array = []; 
    function SubmitSucKhoe(lop_id_gv){
        $('#preload').css('display','block')
       var data = $('tr')
       for (let index = 0; index < data.length; index++) {
          var chieu_cao_hs = $(data[index]).find("[name='chieu_cao']").val();
          var can_nang_hs = $(data[index]).find("[name='can_nang']").val();
          var hoc_sinh_id_hs = $(data[index]).find("[name='hoc_sinh_id']").val();
          if(chieu_cao_hs == null || chieu_cao_hs == ""){
              chieu_cao_hs = 0;
          }
          if(can_nang_hs == null || can_nang_hs == ""){
            can_nang_hs = 0;
          }
          var obj = {
              chieu_cao: chieu_cao_hs,
              can_nang: can_nang_hs,
              hoc_sinh_id: hoc_sinh_id_hs,
              dot_id: dot_id,
              lop_id:lop_id_gv
          }
          array.push(obj);
       }
       axios.post(url, array)
       .then(function(data){
        localStorage.setItem('them_thanh_cong', '1');
                window.location = url_index;
       })
      
    }

    function isNumberKey(evt){
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;
    } 
</script>
@endsection
