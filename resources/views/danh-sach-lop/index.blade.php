@extends('layouts.main')
@section('title', "Danh sách lớp")
@section('content')
<style>
 
.drop-me {
  cursor: pointer;
  box-shadow: 0px 1rem 1.5rem rgba(0,0,0,0.5);
  border-radius: 2rem;
  transition: 0.5s;
}
.drop-me:hover {
  box-shadow: 0px 1rem 1.5rem rgba(0,0,0,0.5);
  transform: scale(1.1);

}
.card{
    display: grid;
    grid-template-columns: 100%;
    grid-template-rows: 300px 20px 10px;
    grid-template-areas: "image" "text" "status";

    font-family: roboto;
    border-radius: 2rem;
    text-align: center;
}
.card-image{
    border-top-left-radius: 2rem;
    border-top-right-radius: 2rem;
    background-size: cover;
}
.card-text{
    grid-area: text;
    font-size: 1.5rem;
    font-weight: 500;
}


.m-portlet {
    font-size: 1rem;
    color: #404040;
    font-family: Montserrat, sans-serif;
    background-image: linear-gradient(to bottom right, #ff9eaa 0% 10%, #e860ff 95% 100%);
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
                        <div class="m-portlet m-portlet--tab drop-me" data-toggle="popover" title="Thông tin cá nhân">
                            <div class="card">
                            <div class="card-image" style="background-image: url('{{ $item->avatar}}');">
                                </div>
                                <div class="card-text">
                                    {{ $item->ten}}
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

