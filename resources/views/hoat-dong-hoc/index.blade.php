@extends('layouts.main')
@section('title', "Hoạt động học tập")
@section('content')
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">Hoạt động học tập</h3>
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
                                    <i class="flaticon-folder-1"></i> KẾ HOẠCH HỌC
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" href="" data-toggle="modal" data-target="#modalNhapFile"">
                                    <i class="flaticon-clipboard"></i>NHẬP FILE HOẠT ĐỘNG
                                </a>
                            </li>

                        </ul>
                        

                    </div>
                    <div class="m-portlet__head-tools">
                        
                    </div>
                </div>
  
                <div class="m-portlet__body">
                     @if (session('status'))
                        <div class="alert alert-success">
                            <h5>Đã gửi file thành công !</h5>
                        </div>
                    @endif

                    <div class="tab-content">
                            <h3>Hoạt động của lớp : {{$ten_lop}}</h3>
                            <div class="container-sm">
                                <div class="row">
                                @foreach ($arr_hd as $key => $nam)
                                    <div class="col-md-3">
                                            <div  class="card-header mb-3">
                                                <h5>Năm {{$key}}</h5>
                                            </div>
                                            @for ($i = 0; $i < count($arr_hd[$key]); $i++)
                                              <a target="_blank"  href ="{{$arr_hd[$key][$i]->link_file_hd}}" class="btn btn-primary text-light"> Tuần {{$arr_hd[$key][$i]->tuan}}</a>
                                            @endfor
                                    </div>
                                @endforeach
                            </div>
                                {{-- <div  class="card-header mb-3">
                                    <h5>Năm 2020</h5>
                                </div>
                                <button type="button" class="btn btn-primary mb-3">Tuần </button>
                                <button type="button" class="btn btn-primary mb-3">Tuần </button>
                                <button type="button" class="btn btn-primary mb-3">Tuần </button>
                                <button type="button" class="btn btn-primary mb-3">Tuần </button>
                                <button type="button" class="btn btn-primary mb-3">Tuần </button>
                                <button type="button" class="btn btn-primary mb-3">Tuần </button>
                                <button type="button" class="btn btn-primary mb-3">Tuần </button>
                                <button type="button" class="btn btn-primary mb-3">Tuần </button>
                                <button type="button" class="btn btn-primary mb-3">Tuần </button> --}}
                        
                        </div>
                       
                    </div>



                    <div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Chi tiết nhận xét</h5>
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
                                                    <div class="row">
                                                        <div class="col-xl-4 col-md-6 mb-4">
                                                            <div class="card border-left-primary shadow h-100 py-2">
                                                              <div class="card-body">
                                                                <div class="row no-gutters align-items-center">
                                                                  <div class="col mr-2">
                                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><i class="flaticon-edit-1"></i>Giờ học</div>
                                                                    <select class="form-control m-input col-12" id="exampleSelect1">
                                                                        <option>Tốt</option>
                                                                        <option>Khá</option>
                                                                        <option>Trung bình</option>
                                                                      
                                                                    </select>
                                                                  </div>
                                                                  
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <div class="col-xl-4 col-md-6 mb-4">
                                                            <div class="card border-left-success shadow h-100 py-2">
                                                              <div class="card-body">
                                                                <div class="row no-gutters align-items-center">
                                                                  <div class="col mr-2">
                                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><i class="flaticon-edit-1"></i>Giờ ăn</div>
                                                                    <select class="form-control m-input col-12" id="exampleSelect1">
                                                                        <option>Tốt</option>
                                                                        <option>Khá</option>
                                                                        <option>Trung bình</option>
                                                                      
                                                                    </select>
                                                                  </div>
                                                                  
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <div class="col-xl-4 col-md-6 mb-4">
                                                            <div class="card border-left-warning shadow h-100 py-2">
                                                              <div class="card-body">
                                                                <div class="row no-gutters align-items-center">
                                                                  <div class="col mr-2">
                                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><i class="flaticon-edit-1"></i>Hoạt động</div>
                                                                    <select class="form-control m-input col-12" id="exampleSelect1">
                                                                        <option>Tốt</option>
                                                                        <option>Khá</option>
                                                                        <option>Trung bình</option>
                                                                      
                                                                    </select>
                                                                  </div>
                                                                  
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-6 mb-4">
                                                            <div class="card border-left-warning shadow h-100 py-2">
                                                              <div class="card-body">
                                                                <div class="row no-gutters align-items-center">
                                                                  <div class="col mr-2">
                                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Nhận xét chi tiết</div>
                                                                    <textarea class="form-control m-input m-input--air" id="exampleTextarea" placeholder="Nhap nhan xet chi tiet ve tre" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 78px;"></textarea>
                                                                  </div>
                                                                  
                                                                </div>
                                                              </div>
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
                                        <div class="m-portlet__head">
                                            <div class="m-portlet__head-caption">
                                                <div class="m-portlet__head-title">
                                                    <span class="m-portlet__head-icon m--hide">
                                                        <i class="la la-gear"></i>
                                                    </span>
                                                    <h3 class="m-portlet__head-text">
                                                        Phản hồi
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
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
                                   
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Xác nhận</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            {{-- thanhnv 11/3/2020 --}}
            <form action="{{route('nhap-file-hoat-dong')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="modalNhapFile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Nhập file hoạt động </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Tuần :</span>
                                </div>
                                
                                <input type="text" value="{{$numberNextWeek}}"  disabled class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">

                                <input type="text" value="{{$numberNextWeek}}" name="tuan" hidden class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                            <div class="input-group mb-3 ml-3">
                                <input type="file" id="file_import_id" name="file">
                            </div>

                        <input type="text" hidden value="{{ Auth::user()->id }}" name="user_id">
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Nhập file</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <!--end::Portlet-->
        </div>
    </div>
</div>



@endsection

@section('script')

<script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/jquery/jquery.dataTables.min.js') }}"></script>

<!-- https://viblo.asia/p/tim-hieu-jquery-datatables-co-ban-trong-10-phut-07LKXp4eKV4 -->
<script>

    function oppenTabPdf($arr){
        window.open('http://127.0.0.1:8000/'+ $arr,'_blank');
    };
    $(document).ready(function () {
        $('#table1').DataTable({
            "pageLength": 100
        });
        $('#table2').DataTable({
            "pageLength": 100
        });
        $('#table3').DataTable({
            "pageLength": 100
        });
    });

</script>
@endsection
