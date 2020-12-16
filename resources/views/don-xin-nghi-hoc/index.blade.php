@extends('layouts.main')
@section('title', "Đơn xin nghỉ học")
@section('content')
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">Đơn xin nghỉ học</h3>
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
                                        <th>Trạng thái</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($don_nghi_hoc as $key => $item)
                                    <tr>
                                        <td>{{$key +=1}}</td>
                                        <td>{{$item->HocSinh->ma_hoc_sinh}}</td>
                                        <td>{{$item->HocSinh->ten}}</td>
                                        <td>
                                            @if ($item->trang_thai == 1)
                                            <button type="button" class="btn btn-success">Xác nhận</button>
                                            @else
                                            <button type="button" class="btn btn-danger">Chưa xác nhận</button>
                                            @endif
                                            
                                        </td>

                                        <td><button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#m_modal_{{$item->id}}">Chi tiết</button></td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                            @foreach ($don_nghi_hoc as $key => $item)
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
                                            <div class="form-group">
                                                <img src="{!! asset($item->HocSinh->avatar) !!}" alt="ảnh">
                                                <label for="message-text"
                                                    class="form-control-label">{{$item->HocSinh->ten}} -
                                                    {{$item->HocSinh->ma_hoc_sinh}}
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="form-control-label">Xin nghỉ từ
                                                    ngày:</label>
                                                <input type="text" class="form-control" id="recipient-name"
                                                    value=" {{$item->ngay_bat_dau}}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="form-control-label">Xin nghỉ đến
                                                    ngày:</label>
                                                <input type="text" class="form-control" id="recipient-name"
                                                    value="{{$item->ngay_ket_thuc}}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" cols="100" rows="5"
                                                    readonly>{{$item->noi_dung}}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer trang_thai pull-center">
                                            @if ($item->trang_thai==0)
                                            <div class="m-form__group form-group">
                                                <div class="m-radio-list">
                                                    <label class="m-checkbox m-checkbox--state-success">
                                                        <input value="{{$item->id}}" type="checkbox" /> Chấp nhận
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <button type="button" onclick="xacNhan(this,{{$item->HocSinh->id}})" class="btn btn-primary" >Xác
                                                nhận</button>
                                            @else
                                    
                                           @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="tab-pane" id="m_tabs_12_3" role="tabpanel">
                            <table id="table3"
                                class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã số</th>
                                        <th>Họ và Tên</th>
                                        <th>Trạng thái</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lich_su_don_nghi_hoc as $key => $item)
                                    <tr>
                                        <td>{{$key +=1}}</td>
                                        <td>{{$item->HocSinh->ma_hoc_sinh}}</td>
                                        <td>{{$item->HocSinh->ten}}</td>
                                        <td>
                                            @if ($item->trang_thai == 1)
                                            <button type="button" class="btn btn-success">Xác nhận</button>
                                            @else
                                            <button type="button" class="btn btn-danger">Chưa xác nhận</button>
                                            @endif
                                            
                                        </td>
                                        <td><button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#m_modal_{{$item->id}}">Chi tiết</button></td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                            @foreach ($lich_su_don_nghi_hoc as $key => $item)
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
                                            <div class="form-group">
                                                <img src="{!! asset($item->HocSinh->avatar) !!}" alt="ảnh">
                                                <label for="message-text"
                                                    class="form-control-label">{{$item->HocSinh->ten}} -
                                                    {{$item->HocSinh->ma_hoc_sinh}}
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="form-control-label">Xin nghỉ từ
                                                    ngày:</label>
                                                <input type="text" class="form-control" id="recipient-name"
                                                    value=" {{$item->ngay_bat_dau}}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="form-control-label">Xin nghỉ đến
                                                    ngày:</label>
                                                <input type="text" class="form-control" id="recipient-name"
                                                    value="{{$item->ngay_ket_thuc}}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" cols="100" rows="5"
                                                    readonly>{{$item->noi_dung}}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer pull-center">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
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
                                    <div class="form-group">

                                        <img src="data:image/jpeg;base64,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"
                                            alt="ảnh">
                                        <label for="message-text" class="form-control-label">Phạm trung hiếu
                                            PD035463</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="form-control-label">Xin nghỉ từ ngày:</label>
                                        <input type="text" class="form-control" id="recipient-name" value="01/02/2020"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="form-control-label">Xin nghỉ đến ngày:</label>
                                        <input type="text" class="form-control" id="recipient-name" value="03/02/2020"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" cols="100" rows="5" readonly>
                                            Cháu bị ốm
                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="message-text" class="form-control-label"><b>Phản hồi:</b></label>
                                        <textarea class="form-control" cols="100" rows="5" readonly>
                                           ...
                                        </textarea>
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

            <!--end::Portlet-->
        </div>
    </div>
</div>



@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    var url_xac_nhan_don_nghi_hoc ="{{ route('xac-nhan-don-xin-nghi-hoc') }}"
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
    const xacNhan = (e,id_hs)=>{
        var xac_nhan_don_nghi_hoc =  $(e).parents('.trang_thai').find('input').prop('checked')
        if (xac_nhan_don_nghi_hoc) {
            var id_don_nghi_hoc = $(e).parents('.trang_thai').find('input').val()
            axios.post(url_xac_nhan_don_nghi_hoc,{
            'id' : id_don_nghi_hoc,
            'id_hs' : id_hs
            })
            .then(function (response) {
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Xác nhận thành công!',
                showConfirmButton: false,
                timer: 1500
            }).then(
                window.location.reload()
            )
               
            
                console.log(response);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
        }
    }; 
</script>
@endsection