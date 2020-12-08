@extends('layouts.main')
@section('title', "Đơn dặn thuốc")
@section('style')
<link href="{!!  asset('css_loading/css_loading.css') !!}" rel="stylesheet" type="text/css" />

<style>
    .m-messenger__form {
        position: relative;
    }

    .flaticon-paper-plane {
        position: absolute;
        right: 4%;
        top: 25%;
        font-size: 20px;
        display: none;
        cursor: pointer;
    }
</style>
@endsection
@section('content')
<div class="m-subheader ">
    <div id="preload" class="preload-container text-center" style="display: none">
        <img id="gif-load" src="{!! asset('images/loading3.gif') !!}" alt="">
    </div>
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">Đơn dặn thuốc</h3>
        </div>

    </div>
</div>
<div class="m-content">
    <div class="row">

        <div class="col-xl-12">
            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tabs m-portlet--success m-portlet--head-solid-bg m-portlet--bordered">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-tabs m-tabs-line m-tabs-line--primary" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_12_1"
                                    role="tab">
                                    <i class="la la-cog"></i> HÔM NAY
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_12_3" role="tab">
                                    <i class="la la-bell-o"></i>LỊCH SỬ
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_tabs_12_1" role="tabpanel">
                            <table id="table1"
                                class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap dataTable dtr-inline collapsed">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã số</th>
                                        <th>Họ và Tên</th>
                                        <th>Bệnh án</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($don_dan_thuoc as $key => $item)
                                    <tr>
                                        <td>{{$key +=1}}</td>
                                        <td>{{$item->HocSinh->ma_hoc_sinh}}</td>
                                        <td>{{$item->HocSinh->ten}}</td>
                                        <td><textarea readonly>{{$item->noi_dung}}</textarea></td>
                                        <td><button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#m_modal_{{$item->id}}">Chi tiết</button></td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        @foreach ($don_dan_thuoc as $item)
                        <div class="modal fade" id="m_modal_{{$item->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Chi tiết đơn xin nghỉ học bé
                                            {{$item->HocSinh->ten}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="m-portlet m-portlet--full-height">
                                            <div class="m-portlet__body">
                                                <!--begin::Content-->
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="m_widget5_tab1_content"
                                                        aria-expanded="true">
                                                        <!--begin::m-widget5-->
                                                        <div class="m-widget5">
                                                            <div class="m-widget5__item">
                                                                <div class="m-widget5__content">
                                                                    <div class="m-widget5__pic">
                                                                        <img class="m-widget7__img"
                                                                            src="{!! asset($item->HocSinh->avatar) !!}"
                                                                            alt="" />
                                                                    </div>
                                                                    <div class="m-widget5__section">
                                                                        <h4 class="m-widget5__title">
                                                                            {{$item->HocSinh->ten}}
                                                                        </h4>
                                                                        <span class="m-widget5__desc">
                                                                            Từ:
                                                                            <span
                                                                                class="m-widget5__info-date m--font-info">
                                                                                {{$item->ngay_bat_dau}}
                                                                            </span>
                                                                            Đến:
                                                                            <span
                                                                                class="m-widget5__info-date m--font-info">
                                                                                {{$item->ngay_ket_thuc}}
                                                                            </span>
                                                                        </span>
                                                                        <div class="m-widget5__info">
                                                                            <span class="m-widget5__author">
                                                                                Nội dung:
                                                                            </span>
                                                                            <span class="m-widget5__info-date">
                                                                                {{$item->noi_dung}}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="m-widget5__content"></div>
                                                            </div>
                                                        </div>

                                                        <!--end::m-widget5-->
                                                    </div>
                                                </div>

                                                <!--end::Content-->
                                            </div>
                                        </div>
                                        <div class="m-portlet m-portlet--full-height">
                                            <div class="m-portlet">
                                                <div class="m-portlet__head">
                                                    <div class="m-portlet__head-caption">
                                                        <div class="m-portlet__head-title">
                                                            <h3 class="m-portlet__head-text">
                                                                Đơn thuốc
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-portlet__body">
                                                    <!--begin::Section-->
                                                    <div class="m-section">
                                                        <div class="m-section__content">
                                                            <table class="table m-table table-bordered table-hover">
                                                                <thead>
                                                                    <tr class="m-table__row--danger">
                                                                        <th>Stt</th>
                                                                        <th>Tên thuốc</th>
                                                                        <th>Ảnh thuốc</th>
                                                                        <th>Đơn vị</th>
                                                                        <th>Liều dùng</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($item->ChiTietDonDanThuoc as $key =>
                                                                    $chi_tiet_don_thuoc)
                                                                    <tr class="m-table__row--warning">

                                                                        <th scope="row">{{$key +=1}}</th>
                                                                        <td>{{$chi_tiet_don_thuoc->ten_thuoc}}</td>
                                                                        <td> <img
                                                                                src="{!! asset($chi_tiet_don_thuoc->anh) !!}"
                                                                                alt="" srcset=""> </td>
                                                                        <td>{{$chi_tiet_don_thuoc->don_vi}}</td>
                                                                        <td>{{$chi_tiet_don_thuoc->lieu_luong}}</td>

                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <!--end::Section-->
                                                </div>

                                                <!--end::Form-->
                                            </div>
                                        </div>

                                        <div class="m-portlet  m-portlet--full-height ">
                                            <div class="m-portlet__head">
                                                <div class="m-portlet__head-caption">
                                                    <div class="m-portlet__head-title">
                                                        <h3 class="m-portlet__head-text">
                                                            Recent Activities
                                                        </h3>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="m-portlet__body">

                                                <div class="fix-scroll-bottom m-messenger m-messenger--message-arrow m-messenger--skin-light m-scrollable m-scroller ps ps--active-y"
                                                    data-scrollable="true" data-height="380" data-mobile-height="300"
                                                    style="height: 380px; overflow: hidden;">
                                                    <div class="m-messenger__messages m-scrollable"
                                                        id="phan_hoi_don_{{$item->id}}">
                                                        @foreach ($item->PhanHoiDonThuoc as $phan_hoi_don_thuoc)
                                                        @if ($phan_hoi_don_thuoc->type ==1)
                                                        {{-- trái --}}
                                                        <div class="m-messenger__wrapper">
                                                            <div class="m-messenger__message m-messenger__message--in">
                                                                <div class="m-messenger__message-pic">
                                                                    <img src="{{$phan_hoi_don_thuoc->HocSinh->avatar}}"
                                                                        alt="" />
                                                                </div>
                                                                <div class="m-messenger__message-body">

                                                                    <div class="m-messenger__message-content">
                                                                        <div class="m-messenger__message-username">
                                                                            Học Sinh:
                                                                            {{$phan_hoi_don_thuoc->HocSinh->ten}}
                                                                        </div>
                                                                        <div class="m-messenger__message-text">
                                                                            {{$phan_hoi_don_thuoc->noi_dung}}
                                                                        </div>

                                                                    </div>
                                                                    <span class="m-widget3__time">
                                                                        {{$phan_hoi_don_thuoc->created_at->diffForHumans()}}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @else
                                                        {{-- phải --}}
                                                        <div class="m-messenger__wrapper">
                                                            <div class="m-messenger__message m-messenger__message--out">
                                                                <div class="m-messenger__message-body">

                                                                    <div class="m-messenger__message-content">
                                                                        <div class="m-messenger__message-username">
                                                                            Cô giáo:
                                                                            {{$phan_hoi_don_thuoc->User->profile->ten}}
                                                                        </div>
                                                                        <div class="m-messenger__message-text">
                                                                            {{$phan_hoi_don_thuoc->noi_dung}}
                                                                        </div>
                                                                    </div>
                                                                    <span class="m-widget3__time">
                                                                        {{$phan_hoi_don_thuoc->created_at->diffForHumans()}}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @endforeach



                                                    </div>

                                                </div>
                                                <div class="m-messenger__seperator">
                                                    <hr>
                                                </div>
                                                <div class="m-messenger__form">
                                                    <textarea
                                                        class="form-control nhap_phan_hoi m-input m-input--air m-input--pill noi_dung_phan_hoi_{{$item->id}}"
                                                        onkeyup="anHienNutGui(this)" id="exampleTextarea"
                                                        rows="3"></textarea>
                                                    <i onclick="guiPhanHoi({{$item->id}})"
                                                        class="flaticon-paper-plane"></i>
                                                </div>
                                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                    <div class="ps__thumb-x" tabindex="0"
                                                        style="left: 0px; width: 0px;"></div>
                                                </div>
                                                <div class="ps__rail-y" style="top: 0px; height: 380px; right: 4px;">
                                                    <div class="ps__thumb-y" tabindex="0"
                                                        style="top: 0px; height: 276px;"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="modal-footer pull-center">
                                        <div class="m-form__group form-group">
                                            <div class="m-radio-list">
                                                <label class="m-checkbox m-checkbox--state-success">
                                                    <input type="checkbox" /> Đã sử dụng
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Xác
                                            nhận</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach

                        <div class="tab-pane" id="m_tabs_12_3" role="tabpanel">
                            <table id="table3"
                                class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap dataTable dtr-inline collapsed">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã số</th>
                                        <th>Họ và Tên</th>
                                        <th>Bệnh án</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($lich_su_don_dan_thuoc as $key => $item)
                                    <tr>
                                        <td>{{$key +=1}}</td>
                                        <td>{{$item->HocSinh->ma_hoc_sinh}}</td>
                                        <td>{{$item->HocSinh->ten}}</td>
                                        <td><textarea readonly>{{$item->noi_dung}}</textarea></td>
                                        <td><button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#m_modal_{{$item->id}}">Chi tiết</button></td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                            @foreach ($lich_su_don_dan_thuoc as $item)
                            <div class="modal fade" id="m_modal_{{$item->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Chi tiết đơn xin nghỉ học bé
                                                {{$item->HocSinh->ten}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="m-portlet m-portlet--full-height">
                                                <div class="m-portlet__body">
                                                    <!--begin::Content-->
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="m_widget5_tab1_content"
                                                            aria-expanded="true">
                                                            <!--begin::m-widget5-->
                                                            <div class="m-widget5">
                                                                <div class="m-widget5__item">
                                                                    <div class="m-widget5__content">
                                                                        <div class="m-widget5__pic">
                                                                            <img class="m-widget7__img"
                                                                                src="{!! asset($item->HocSinh->avatar) !!}"
                                                                                alt="" />
                                                                        </div>
                                                                        <div class="m-widget5__section">
                                                                            <h4 class="m-widget5__title">
                                                                                {{$item->HocSinh->ten}}
                                                                            </h4>
                                                                            <span class="m-widget5__desc">
                                                                                Từ:
                                                                                <span
                                                                                    class="m-widget5__info-date m--font-info">
                                                                                    {{$item->ngay_bat_dau}}
                                                                                </span>
                                                                                Đến:
                                                                                <span
                                                                                    class="m-widget5__info-date m--font-info">
                                                                                    {{$item->ngay_ket_thuc}}
                                                                                </span>
                                                                            </span>
                                                                            <div class="m-widget5__info">
                                                                                <span class="m-widget5__author">
                                                                                    Nội dung:
                                                                                </span>
                                                                                <span class="m-widget5__info-date">
                                                                                    {{$item->noi_dung}}
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="m-widget5__content"></div>
                                                                </div>
                                                            </div>
    
                                                            <!--end::m-widget5-->
                                                        </div>
                                                    </div>
    
                                                    <!--end::Content-->
                                                </div>
                                            </div>
                                            <div class="m-portlet m-portlet--full-height">
                                                <div class="m-portlet">
                                                    <div class="m-portlet__head">
                                                        <div class="m-portlet__head-caption">
                                                            <div class="m-portlet__head-title">
                                                                <h3 class="m-portlet__head-text">
                                                                    Đơn thuốc
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="m-portlet__body">
                                                        <!--begin::Section-->
                                                        <div class="m-section">
                                                            <div class="m-section__content">
                                                                <table class="table m-table table-bordered table-hover">
                                                                    <thead>
                                                                        <tr class="m-table__row--danger">
                                                                            <th>Stt</th>
                                                                            <th>Tên thuốc</th>
                                                                            <th>Ảnh thuốc</th>
                                                                            <th>Đơn vị</th>
                                                                            <th>Liều dùng</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($item->ChiTietDonDanThuoc as $key =>
                                                                        $chi_tiet_don_thuoc)
                                                                        <tr class="m-table__row--warning">
    
                                                                            <th scope="row">{{$key +=1}}</th>
                                                                            <td>{{$chi_tiet_don_thuoc->ten_thuoc}}</td>
                                                                            <td> <img
                                                                                    src="{!! asset($chi_tiet_don_thuoc->anh) !!}"
                                                                                    alt="" srcset=""> </td>
                                                                            <td>{{$chi_tiet_don_thuoc->don_vi}}</td>
                                                                            <td>{{$chi_tiet_don_thuoc->lieu_luong}}</td>
    
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
    
                                                        <!--end::Section-->
                                                    </div>
    
                                                    <!--end::Form-->
                                                </div>
                                            </div>
    
                                            <div class="m-portlet  m-portlet--full-height ">
                                                <div class="m-portlet__head">
                                                    <div class="m-portlet__head-caption">
                                                        <div class="m-portlet__head-title">
                                                            <h3 class="m-portlet__head-text">
                                                                Recent Activities
                                                            </h3>
                                                        </div>
                                                    </div>
    
                                                </div>
                                                <div class="m-portlet__body">
    
                                                    <div class="fix-scroll-bottom m-messenger m-messenger--message-arrow m-messenger--skin-light m-scrollable m-scroller ps ps--active-y"
                                                        data-scrollable="true" data-height="380" data-mobile-height="300"
                                                        style="height: 380px; overflow: hidden;">
                                                        <div class="m-messenger__messages m-scrollable"
                                                            id="phan_hoi_don_{{$item->id}}">
                                                            @foreach ($item->PhanHoiDonThuoc as $phan_hoi_don_thuoc)
                                                            @if ($phan_hoi_don_thuoc->type ==1)
                                                            {{-- trái --}}
                                                            <div class="m-messenger__wrapper">
                                                                <div class="m-messenger__message m-messenger__message--in">
                                                                    <div class="m-messenger__message-pic">
                                                                        <img src="{{$phan_hoi_don_thuoc->HocSinh->avatar}}"
                                                                            alt="" />
                                                                    </div>
                                                                    <div class="m-messenger__message-body">
    
                                                                        <div class="m-messenger__message-content">
                                                                            <div class="m-messenger__message-username">
                                                                                Học Sinh:
                                                                                {{$phan_hoi_don_thuoc->HocSinh->ten}}
                                                                            </div>
                                                                            <div class="m-messenger__message-text">
                                                                                {{$phan_hoi_don_thuoc->noi_dung}}
                                                                            </div>
    
                                                                        </div>
                                                                        <span class="m-widget3__time">
                                                                            {{$phan_hoi_don_thuoc->created_at->diffForHumans()}}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @else
                                                            {{-- phải --}}
                                                            <div class="m-messenger__wrapper">
                                                                <div class="m-messenger__message m-messenger__message--out">
                                                                    <div class="m-messenger__message-body">
    
                                                                        <div class="m-messenger__message-content">
                                                                            <div class="m-messenger__message-username">
                                                                                Cô giáo:
                                                                                {{$phan_hoi_don_thuoc->User->profile->ten}}
                                                                            </div>
                                                                            <div class="m-messenger__message-text">
                                                                                {{$phan_hoi_don_thuoc->noi_dung}}
                                                                            </div>
                                                                        </div>
                                                                        <span class="m-widget3__time">
                                                                            {{$phan_hoi_don_thuoc->created_at->diffForHumans()}}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            @endforeach
    
    
    
                                                        </div>
    
                                                    </div>
                                                    <div class="m-messenger__seperator">
                                                        <hr>
                                                    </div>
                                                    <div class="m-messenger__form">
                                                        <textarea
                                                            class="form-control nhap_phan_hoi m-input m-input--air m-input--pill noi_dung_phan_hoi_{{$item->id}}"
                                                            onkeyup="anHienNutGui(this)" id="exampleTextarea"
                                                            rows="3"></textarea>
                                                        <i onclick="guiPhanHoi({{$item->id}})"
                                                            class="flaticon-paper-plane"></i>
                                                    </div>
                                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                        <div class="ps__thumb-x" tabindex="0"
                                                            style="left: 0px; width: 0px;"></div>
                                                    </div>
                                                    <div class="ps__rail-y" style="top: 0px; height: 380px; right: 4px;">
                                                        <div class="ps__thumb-y" tabindex="0"
                                                            style="top: 0px; height: 276px;"></div>
                                                    </div>
                                                </div>
                                            </div>
    
                                        </div>
    
                                        <div class="modal-footer pull-center">
                                            <div class="m-form__group form-group">
                                                <div class="m-radio-list">
                                                    <label class="m-checkbox m-checkbox--state-success">
                                                        <input type="checkbox" /> Đã sử dụng
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Xác
                                                nhận</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            @endforeach
                        </div>
                    </div>



                    <div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Chi tiết đơn xin nghỉ học bé Phạm
                                        trung hiếu</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="m-portlet m-portlet--full-height ">

                                        <div class="m-portlet__body">
                                            <!--begin::Content-->
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="m_widget5_tab1_content"
                                                    aria-expanded="true">

                                                    <!--begin::m-widget5-->
                                                    <div class="m-widget5">
                                                        <div class="m-widget5__item">
                                                            <div class="m-widget5__content">
                                                                <div class="m-widget5__pic">
                                                                    <img class="m-widget7__img"
                                                                        src="../../assets/app/media/img//products/product6.jpg"
                                                                        alt="">
                                                                </div>
                                                                <div class="m-widget5__section">
                                                                    <h4 class="m-widget5__title">
                                                                        Phạm Hiếu
                                                                    </h4>
                                                                    <span class="m-widget5__desc">
                                                                        Từ:
                                                                        <span class="m-widget5__info-date m--font-info">
                                                                            01/02/20202
                                                                        </span>
                                                                        Đến:
                                                                        <span class="m-widget5__info-date m--font-info">
                                                                            05/02/2020
                                                                        </span>
                                                                    </span>
                                                                    <div class="m-widget5__info">
                                                                        <span class="m-widget5__author">
                                                                            Bệnh án:
                                                                        </span>
                                                                        <span class="m-widget5__info-date">
                                                                            Sốt
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="m-widget5__content">

                                                            </div>
                                                        </div>


                                                    </div>

                                                    <!--end::m-widget5-->
                                                </div>

                                            </div>

                                            <!--end::Content-->
                                        </div>
                                    </div>
                                    <div class="m-portlet m-portlet--full-height ">

                                        <div class="m-portlet">
                                            <div class="m-portlet__head">
                                                <div class="m-portlet__head-caption">
                                                    <div class="m-portlet__head-title">
                                                        <h3 class="m-portlet__head-text">
                                                            Đơn thuốc
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-portlet__body">

                                                <!--begin::Section-->
                                                <div class="m-section">
                                                    <div class="m-section__content">
                                                        <table class=" table m-table table-bordered table-hover">
                                                            <thead>
                                                                <tr class="m-table__row--danger">
                                                                    <th>#</th>
                                                                    <th>Stt</th>
                                                                    <th>Tên thuốc</th>
                                                                    <th>Đơn vị</th>
                                                                    <th>Liều dùng</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="m-table__row--warning">
                                                                    <th scope="row">1</th>
                                                                    <td>Jhon</td>
                                                                    <td>Stone</td>
                                                                    <td>@jhon</td>
                                                                    <td>@jhon</td>
                                                                </tr>
                                                                <tr class="m-table__row--warning">
                                                                    <th scope="row">2</th>
                                                                    <td>Lisa</td>
                                                                    <td>Nilson</td>
                                                                    <td>@lisa</td>
                                                                    <td>@jhon</td>
                                                                </tr>
                                                                <tr class="m-table__row--warning">
                                                                    <th scope="row">3</th>
                                                                    <td>Larry</td>
                                                                    <td>the Bird</td>
                                                                    <td>@twitter</td>
                                                                    <td>@jhon</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <!--end::Section-->
                                            </div>

                                            <!--end::Form-->
                                        </div>
                                    </div>


                                    <div class="m-portlet m-portlet--full-height ">

                                        <div class="m-portlet__body">
                                            <div class="m-widget3">
                                                <div class="m-widget3__item">
                                                    <div class="m-widget3__header">
                                                        <div class="m-widget3__user-img">
                                                            <img class="m-widget3__img"
                                                                src="../../assets/app/media/img/users/user1.jpg" alt="">
                                                        </div>
                                                        <div class="m-widget3__info">
                                                            <span class="m-widget3__username">
                                                                Cô giáo: Nguyễn Phương Lan
                                                            </span><br>
                                                            <span class="m-widget3__time">
                                                                2 day ago
                                                            </span>
                                                        </div>

                                                    </div>
                                                    <div class="m-widget3__body">
                                                        <p class="m-widget3__text">

                                                            doloremagna aliquam erat volutpat.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="m-widget3__item">
                                                    <div class="m-widget3__header">
                                                        <div class="m-widget3__user-img">
                                                            <img class="m-widget3__img"
                                                                src="../../assets/app/media/img/users/user4.jpg" alt="">
                                                        </div>
                                                        <div class="m-widget3__info">
                                                            <span class="m-widget3__username">
                                                                Phụ Huynh: Nguyễn Văn Nam
                                                            </span><br>
                                                            <span class="m-widget3__time">
                                                                1 day ago
                                                            </span>
                                                        </div>

                                                    </div>
                                                    <div class="m-widget3__body">
                                                        <p class="m-widget3__text">
                                                            Lorem ipsum dolor sit amet,consectetuer edipiscing

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" cols="100" rows="5"
                                                        placeholder="... Gửi phản hồi"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer pull-center">
                                    <div class="m-form__group form-group">
                                        <div class="m-radio-list">
                                            <label class="m-checkbox m-checkbox--state-success">
                                                <input type="checkbox"> Đã sử dụng
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Xác nhận</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--end::Portlet-->
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

@endsection

@section('script')
<script>
    var url_get_info_phan_hoi = "{{route('info-phan-hoi')}}";
</script>
<script src="{{ asset('firebase_don_dan_thuoc/dan_thuoc.js') }}"></script>
<script>
    var url_gui_phan_hoi_dan_thuoc = "{{route('gui-phan-hoi-don-dan-thuoc')}}"
    $(document).ready(function () {
        // $('.fix-scroll-bottom').animate({ scrollTop:$('.fix-scroll-bottom').prop('scrollHeight')});

        $('#table1').DataTable({
            "pageLength": 100
        });
        $('#table2').DataTable({
            "pageLength": 100
        });
        $('#table3').DataTable({
            "pageLength": 100
        });
        var url_string = window.location.href
        var url = new URL(url_string);
        var id_don = url.searchParams.get("id_don");
        var modal_show = '#m_modal_'+id_don
        $(modal_show).modal('show')
    });
    const guiPhanHoi = (id_don) =>{
        // $('#preload').css('display','block')
        var class_phan_hoi = 'noi_dung_phan_hoi_'+id_don
        axios.post(url_gui_phan_hoi_dan_thuoc,{
            'don_dan_thuoc_id' : id_don,
            'nguoi_phan_hoi_id' : '{{ Illuminate\Support\Facades\Auth::id() }}',
            'noi_dung' : $(`.${class_phan_hoi}`).val(),
            'type' : 2
        })
        .then(function (response) {
            // handle success
        // $('#preload').css('display','none')
           
            console.log(response);
        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
        .then(function () {
            // always executed
        });
      
    };
    const anHienNutGui = (element) =>{
        if($(element).val()==''){
            $(element).next().css('display','none')
        }else{
            $(element).next().css('display','block')

        }
           
        };
</script>

@endsection