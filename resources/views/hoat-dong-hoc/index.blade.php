@extends('layouts.main')
@section('title', "Hoạt động học tập")
@section('style')
    <style>
        .btn{
            font-family: Arial, Helvetica, sans-serif
        }
    </style>
@endsection
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
                                <a class="nav-link m-tabs__link" href="" data-toggle="modal"
                                    data-target="#modalNhapFile">
                                    <i class="flaticon-clipboard"></i>NHẬP FILE HOẠT ĐỘNG
                                </a>
                            </li>

                        </ul>


                    </div>
                </div>
            </div>
            <div class="m-portlet">
                @if (session('status'))
                <div class="alert alert-success">
                    <h5>Đã thêm file thành công !</h5>
                </div>
                @endif

                @if (session('thong_bao'))
                <div class="alert alert-danger">
                    <h5>{{session('thong_bao')}}</h5>
                </div>
                @endif
                <div class="m-portlet__head">

                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>

                            <h3 class="m-portlet__head-text">
                                Hoạt động của lớp : {{$ten_lop}}
                            </h3>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between bd-highlight">
                        <div class="p-3 bd-highlight">
                            <button type="button" class="btn btn-primary">Chờ xác nhận</button>
                            <button type="button" class="btn btn-success">Đã xác nhận</button>
                            
                            <button type="button" class="btn btn-danger">Bị từ chối</button>
                        </div>
                    </div>

                </div>
                
                <div class="m-portlet__body">
                   

                    <!--begin::Section-->
                    <div class="tab-content">
                        <div class="container-sm">
                            <div class="row">
                                @foreach ($arr_hd as $key => $nam)
                                <div class="col-xl-6">
                                    <div
                                        class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
                                        <div class="m-portlet__head">
                                            <div class="m-portlet__head-caption">
                                                <div class="m-portlet__head-title">
                                                    <span class="m-portlet__head-icon m--hide">
                                                        <i class="flaticon-statistics"></i>
                                                    </span>
                                                    <h3 class="m-portlet__head-text">
                                                        Các tuần trong năm học
                                                    </h3>
                                                    <h2 style="width: 200px"
                                                        class="m-portlet__head-label m-portlet__head-label--info">
                                                        <span>Năm {{$key}}</span>
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="m-portlet__head-tools">

                                            </div>
                                        </div>
                                        <div class="m-portlet__body">
                                            @for ($i = 0; $i < count($arr_hd[$key]); $i++) <a target="_blank"
                                                href="{{$arr_hd[$key][$i]->link_file_hd}}" 
                                               
                                                @switch($arr_hd[$key][$i]->type)
                                                @case(1)
                                                class="btn btn-primary text-light"
                                                @break
                                                @case(2)
                                                class="btn btn-success text-light"
                                                @case(3)
                                                class="btn btn-danger text-light"
                                                @break
                                                @default

                                                @endswitch
                                                > Tuần {{$arr_hd[$key][$i]->tuan}}</a>
                                                @endfor
                                        </div>
                                    </div>

                                    <!--end::Portlet-->
                                </div>
                                @endforeach
                            </div>

                        </div>

                    </div>

                    <!--end::Section-->
                </div>
            </div>




            {{-- thanhnv 11/3/2020 --}}
            <form action="{{route('nhap-file-hoat-dong')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal fade" id="modalNhapFile" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
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

                                        <input type="text" value="{{$numberNextWeek}}" disabled class="form-control"
                                            aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default">

                                        <input type="text" value="{{$numberNextWeek}}" name="tuan" hidden
                                            class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default">
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