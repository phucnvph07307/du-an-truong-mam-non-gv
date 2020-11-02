@extends('layouts.main')
@section('title', "Danh sách lớp")
@section('content')
<style>
.card {
    position: absolute;
    top: 70%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 300px;
    height: 300px;
    background: #000;
    margin-top: 50%;
    margin-left: 20px;
}
.card .image {
    width: 100%;
    height: 100%;
    overflow: hidden;
}
.card .image img {
    width: 100%;
    transition: .5s;
}
.card:hover .image img {
    opacity: .5;
    transform: translateX(30%);/*100%*/
}
.card .details {
    position: absolute;
    top: 0;
    left: 0;
    width: 70%;/*100%*/
    height: 100%;
    background: #ffc107;
    transition: .5s;
    transform-origin: left;
    transform: perspective(2000px) rotateY(-90deg);
}
.card:hover .details {
    transform: perspective(2000px) rotateY(0deg);
}
.card .details .center {
    padding: 20px;
    text-align: center;
    background: #fff;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
}
.card .details .center h1 {
    margin: 0;
    padding: 0;
    color: #ff3636;
    line-height: 20px;
    font-size: 20px;
    text-transform: uppercase;
}
.card .details .center h1 span {
    font-size: 14px;
    color: #262626;
}
.card .details .center p {
    margin: 10px 0;
    padding: 0;
    color: #262626;
}
.card .details .center ul {
    margin: 10px auto 0;
    padding: 0;
    display: table;
}
.card .details .center ul li {
    list-style: none;
    margin: 0 5px;
    float: left;
}
.card .details .center ul li a {
    display: block;
    background: #262626;
    color: #fff;
    width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    transform: .5s;
}
.card .details .center ul li a:hover {
    background: #ff3636;
}


</style>

<div class="m-content">

    <div class="m-portlet p-5">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        {{ $lopHoc->ten_lop }}
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="row">
                @forelse ($lopHoc->Student as $item)
                    <div class="col-xs-12 col-sm-4 col-md-3 pt-3 item-info" data="{{ $item}}">
                        <!--begin::Portlet-->
                      
                            {{-- <div class="card">
                            <div class="card-image" style="background-image: url('{{ $item->avatar}}');">
                                </div>
                                <div class="card-text">
                                    {{ $item->ten}}
                                </div>
                            </div> --}}
                            <div class="card">
                                <div class="image">
                                <img src="{{$item->avatar}}"/>
                                </div>
                                <div class="details">
                                  <div class="center">
                                    <h1>Someone famous<br><span>team leader</span></h1>
                                    <p>Lorem ipsum is simple dummy text on the printing and typesetting industry.</p>
                                    <ul>
                                      <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                      <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                      <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                      <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                      <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>

                        
                    </div>

                   
                    
        
    
                @empty
                    <div class="d-flex justify-content-center">
                        <div class="m-demo " data-code-preview="true" data-code-html="true" data-code-js="false">
                            <div class="m-demo__preview">
                                <h3>
                                  Lớp học hiện tại chưa có học sinh
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforelse
                
            </div>
        </div>
    </div>

    <div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">THÔNG TIN BÉ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="m-card-profile">
                        <div class="m-card-profile__pic">
                            <div class="m-card-profile__pic-wrapper">
                                <img src="" alt="" id="info-avatar">
                            </div>
                        </div>
                        <div class="m-card-profile__details">
                            <span class="m-card-profile__name" id="info-name"></span>
                            <a href="javascript:;" class="m-card-profile__email m-link" id="info-email"></a>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active show" id="m_user_profile_tab_1">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td style="vertical-align:middle; width: 30%">Họ & tên</td>
                                        <td style="vertical-align:middle;" id="table_info_name"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; width: 30%">MSHS</td>
                                        <td style="vertical-align:middle;" id="table_info_mshs"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; width: 30%">Giới tính</td>
                                        <td style="vertical-align:middle;" id="table_info_gioi_tinh"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; width: 30%">Ngày sinh</td>
                                        <td style="vertical-align:middle;" id="table_info_ngay_sinh"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; width: 30%">Nơi sinh</td>
                                        <td style="vertical-align:middle;" id="table_info_noi_sinh"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; width: 30%">
                                            <div class="m-spinner m-spinner--brand"></div>
                                            <div class="m-spinner m-spinner--primary"></div>
                                            <div class="m-spinner m-spinner--success"></div>
                                            <div class="m-spinner m-spinner--info"></div>
                                            <div class="m-spinner m-spinner--warning"></div>
                                            <div class="m-spinner m-spinner--danger"></div></td>
                                        <td style="vertical-align:middle;">
                                            <div class="m-spinner m-spinner--brand"></div>
                                            <div class="m-spinner m-spinner--primary"></div>
                                            <div class="m-spinner m-spinner--success"></div>
                                            <div class="m-spinner m-spinner--info"></div>
                                            <div class="m-spinner m-spinner--warning"></div>
                                            <div class="m-spinner m-spinner--danger"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; width: 30%">Bố</td>
                                        <td style="vertical-align:middle;" id="table_info_bo">
                                        <span></span><br></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; width: 30%">Mẹ</td>
                                        <td style="vertical-align:middle;" id="table_info_me"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            
            </div>
        </div>
    </div>

</div>

@endsection
@section('script')
<script>

 $( ".item-info" ).on( "click", function( ) {
    let data = JSON.parse($(this).attr('data'));
    
    $('#info-avatar').attr('src',data.avatar);
    $("#info-name").text(data.ten);
    $("#info-email").text(data.email_dang_ky);
    console.log(data);
    $("#table_info_name").text(data.ten);
    $("#table_info_mshs").text(data.ma_hoc_sinh);
    $("#table_info_gioi_tinh").text(data.gioi_tinh == 0 ? 'Nam' : 'Nữ');
    let formatted_date =  moment(data.ngay_sinh).format('L');
    $("#table_info_ngay_sinh").text(formatted_date);
    $("#table_info_noi_sinh").text(data.noi_sinh);

    $("#table_info_bo").html(`
        Tên: <span class="m--font-info">${ data.ten_cha }</span><br>
        Ngày sinh: <span class="m--font-info">${ moment(data.ngay_sinh_cha).format('L') }</span><br>
        Số điện thoại: <span class="m--font-info">${data.dien_thoai_cha}</span><br>
    `);
    $("#table_info_me").html(`
        Tên: <span class="m--font-info">${ data.ten_me }</span><br>
        Ngày sinh: <span class="m--font-info">${ moment(data.ngay_sinh_me).format('L') }</span><br>
        Số điện thoại: <span class="m--font-info">${data.dien_thoai_me}</span><br>
    `);

    $('#m_modal_4').modal('show')
});
</script>
@endsection

