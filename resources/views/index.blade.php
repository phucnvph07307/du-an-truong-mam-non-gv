@php
    $lopHoc = Auth::user()->profile->Lop;
    $soLuongHocSinh = $lopHoc->Student->count();
    $danhSachDiemDanh = $lopHoc->DiemDanh->where('ngay_diem_danh_den', '=', date('Y-m-d'));

    $countDonNghiHoc = 0;
    $countDonDanThuoc = 0;
    foreach ($lopHoc->Student as $key => $value) {
      if($value->DonNghiHoc){
          $countDonNghiHoc += $value->DonNghiHoc
                              ->where('ngay_bat_dau', '<=', date('Y-m-d'))
                              ->where('ngay_ket_thuc', '>=', date('Y-m-d'))
                              ->count();        
      }

      if($value->DonDanThuoc){
          $countDonDanThuoc += $value->DonDanThuoc
                              ->where('ngay_bat_dau', '<=', date('Y-m-d'))
                              ->where('ngay_ket_thuc', '>=', date('Y-m-d'))
                              ->count();        
      }
    }
@endphp
@extends('layouts.main')
@section('title', "Trang chủ")
@section('style')
<style>
  body{
    font-family: 'PT Sans Caption', sans-serif !important; 
    
  }
  .card:hover {
    box-shadow: 1px 3px 15px #000 !important; 
  }
  a:hover, a:visited, a:link, a:active
  {
      text-decoration: none;
  }
  .a_link_dashboard:hover {
    text-shadow: 2px 2px 3px pink;
  }
  .loading {
    padding-left: 1rem;
    display: flex;
    flex-direction: row;
  }
  .loading__letter {
    letter-spacing: 4px;
    color: #fec468;
    animation-name: bounce;
    animation-duration: 1s;
    animation-iteration-count: infinite;
  }

  .loading__letter:nth-child(2) {
    animation-delay: .1s; 
  }
  .loading__letter:nth-child(3) {
    animation-delay: .2s;
  }
  .loading__letter:nth-child(4) {
    animation-delay: .3s; 
  }
  .loading__letter:nth-child(5) {
    animation-delay: .4s;
  }
  .loading__letter:nth-child(6) {
    animation-delay: .5s; 
  }
  .loading__letter:nth-child(7) {
    animation-delay: .6s;
  }
  .loading__letter:nth-child(8) {
    animation-delay: .8s;
  }
  .loading__letter:nth-child(9) {
    animation-delay: 1s;
  }
  .loading__letter:nth-child(10) {
    animation-delay: 1.2s;
  }
  @keyframes bounce {
    0% {
      transform: translateY(0px)
    }
    40% {
      transform: translateY(-8px);
    }
    80%,
    100% {
      transform: translateY(0px);
    }
  }
</style>
    
@endsection
@section('content')
<div class="m-content">

  <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible " role="alert">
    <div class="m-alert__icon">
    </div>
    <div class="m-alert__text d-flex justify-content-center">
        <marquee width="50%">
          <h3 style="font-family: 'Indie Flower', cursive !important; text-shadow:2px 2px 5px rgb(235, 144, 223)">{{ Auth::user()->profile->Lop->ten_lop }}</h3>
          </marquee>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2" style="cursor: pointer" onclick="window.location.href = route('diem_danh_ban_sang.create')">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Điểm danh</div>
                <div>
                      @if ($danhSachDiemDanh->where('type', 1)->where('trang_thai', 1)->count())
                          <span class="h5 mb-0 font-weight-bold text-gray-800">{{ $danhSachDiemDanh->where('type', 1)->where('trang_thai', 1)->count() . '/' . $soLuongHocSinh }}</span>
                      @else
                          <div class="loading">
                            <div class="loading__letter"><i>l</i></div>
                            <div class="loading__letter"><i>o</i></div>
                            <div class="loading__letter"><i>a</i></div>
                            <div class="loading__letter"><i>d</i></div>
                            <div class="loading__letter"><i>i</i></div>
                            <div class="loading__letter"><i>n</i></div>
                            <div class="loading__letter"><i>g</i></div>
                            <div class="loading__letter"><i>.</i></div>
                            <div class="loading__letter"><i>.</i></div>
                            <div class="loading__letter"><i>.</i></div>
                          </div>
                      @endif
                </div>
                <div>
                      @if ($danhSachDiemDanh->where('type', 2)->where('trang_thai', 1)->count())
                          <span class="h5 mb-0 font-weight-bold text-gray-800">{{ $danhSachDiemDanh->where('type', 2)->where('trang_thai', 1)->count() . '/' . $soLuongHocSinh }}</span>
                      @else
                          <div class="loading">
                            <div class="loading__letter"><i>l</i></div>
                            <div class="loading__letter"><i>o</i></div>
                            <div class="loading__letter"><i>a</i></div>
                            <div class="loading__letter"><i>d</i></div>
                            <div class="loading__letter"><i>i</i></div>
                            <div class="loading__letter"><i>n</i></div>
                            <div class="loading__letter"><i>g</i></div>
                            <div class="loading__letter"><i>.</i></div>
                            <div class="loading__letter"><i>.</i></div>
                            <div class="loading__letter"><i>.</i></div>
                          </div>
                      @endif
                </div>
            </div>
            <div class="col-auto">
              <i class="
                  flaticon-list  fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2" style="cursor: pointer" onclick="window.location.href = route('don-xin-nghi-hoc')">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Đơn nghỉ học</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countDonNghiHoc }}</div>
            </div>
            <div class="col-auto">
              <i class="flaticon-interface-10 fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2" style="cursor: pointer" onclick="window.location.href = route('don-dan-thuoc')">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Dặn thuốc</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countDonDanThuoc }}</div>
            </div>
            <div class="col-auto">
              <i class="flaticon-statistics  fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2" style="cursor: pointer" onclick="window.location.href = route('hoat-dong-hoc-index')">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Hoạt động học</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
            </div>
            <div class="col-auto">
              <i class="flaticon-folder-1  fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="row">
    <div class="col-xl-8">
      <div class="m-portlet m-portlet--mobile ">
        <div class="m-portlet__head">
          <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
              <h3 class="m-portlet__head-text">
                Danh sách học sinh
              </h3>
            </div>
          </div>
          <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
              <li class="m-portlet__nav-item">
                <div>
                  <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                    <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                      <i class="la la-plus m--hide"></i>
                      <i class="la la-ellipsis-h"></i>
                    </a>
                    <div class="m-dropdown__wrapper" style="z-index: 101;">
                      <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 21.5px;"></span>
                      <div class="m-dropdown__inner">
                        <div class="m-dropdown__body">
                          <div class="m-dropdown__content">
                            <ul class="m-nav">
                              <li class="m-nav__item">
                                <a href="{{ route('danh-sach-lop-index') }}" class="m-nav__link">
                                  <i class="m-nav__link-icon flaticon-presentation-1" style="color: blue"></i>
                                  <span class="m-nav__link-text">Chi tiết lớp</span>
                                </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="m-portlet__body">

          <!--begin: Datatable -->
          <div id="m_table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
              <div class="col-sm-12">
                    <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer"
                      id="m_table_2_2">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Mã học sinh</th>
                            <th>Họ tên</th>
                            <th>Ảnh</th>
                            <th>Ngày sinh</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <script>
                          function errorLoadAvatar(e){
                              let ten = e.getAttribute('data-ten');
                              e.setAttribute('src', "https://ui-avatars.com/api/?name=" + ten + "&background=random");
                          }
                        </script>
                            @foreach ($lopHoc->Student as $key => $item)
                              @php
                                $date=date_create($item->ngay_sinh);
                              @endphp
                              <tr role="row" class="odd">
                              <td class="sorting_1">{{ ++$key }}</td>
                                <td>{{ $item->ma_hoc_sinh }}</td>
                                <td>{{ $item->ten }}</td>
                                <td><img width="70px" height="70px" src="{{ $item->avatar }}" onerror="errorLoadAvatar(this)" data-ten="{{ $item->ten }}"></td>
                                <td>{{ date_format($date,"d/m/Y") }}</td>

                                <td nowrap="">
                                  <span class="dropdown">
                                    <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                      data-toggle="dropdown" aria-expanded="true">
                                      <i class="la la-ellipsis-h"></i>
                                    </a>
                                  </span>
                                </td>
                              </tr>
                            @endforeach
                        
                      </tbody>
                    </table>
              </div>
            </div>
          </div>
          <!--end: Datatable -->
        </div>
      </div>
    </div>
    <div class="col-xl-4">

      <!--begin:: Widgets/Audit Log-->
      <div class="m-portlet m-portlet--full-height ">
        <div class="m-portlet__head">
          <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
              <h3 class="m-portlet__head-text">
                Thông báo
              </h3>
            </div>
          </div>
        </div>
        <div class="m-portlet__body">
          <div class="tab-content">
            <div class="tab-pane active" id="m_widget4_tab1_content">
              <div class="m-scrollable m-scroller ps ps--active-y" data-scrollable="true" data-height="400"
                style="height: 400px; overflow: hidden;">
                <div class="m-list-timeline m-list-timeline--skin-light">
                  <div class="m-list-timeline__items" id="notify_dashboard">

                    {{-- Nội dung thông báo --}}

                  </div>
                </div>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                  <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 0px; height: 400px; right: 4px;">
                  <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 248px;"></div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="m_widget4_tab2_content">
            </div>
            <div class="tab-pane" id="m_widget4_tab3_content">
            </div>
          </div>
        </div>
      </div>

      <!--end:: Widgets/Audit Log-->
    </div>
  </div>

  <div class="m-portlet">
    <div class="m-portlet__body">
      <div class="row">
        <div class="col-10">
          <h3 class="m-section__heading">Album ảnh</h3>
        </div>
        <div class="col-2 pl-5">
          <a href="{{ route('album.index') }}" class="btn btn-outline-accent btn-sm 	m-btn m-btn--icon m-btn--pill ml-5">
            <span>
              <i class="fa flaticon-book"></i>
              <span>Xem tất cả</span>
            </span>
          </a>
        </div>
      </div>
      <br>
      <br>
      <div class="row">
        @forelse ($data as $key => $item)
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-3">
            <a href="{{ route('album.show',['id'=>$item->id])}}">
              <img src="{{isset($item->item_images[0]) ? asset($item->item_images[0]) : "" }}" class="img-thumbnail">
            </a>
          </div>
          @if ($key == 3)
              @break
          @endif   
        @empty
          <div class="col-12">
            <center><a href="{{ route('album.index') }}" class="btn"><i style="font-size: 3rem; color: rgb(41, 225, 212)" class="flaticon-photo-camera"></i></a></center>
          </div>
        @endforelse
      </div>

    </div>

  </div>
</div>

@endsection 
@section('script')
<script>
    $(document).ready(function () {
        $('#m_table_2_2').DataTable({
            "pageLength": 100,
            "paging": false,
            "scrollY": "400px",
            "scrollCollapse": true,
        });
    });
</script>
{{-- <script src="{!! asset('phao_hoa/phao_hoa.js') !!}"></script> --}}
@endsection

