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
                <div class="m-portlet__body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link m-tabs__link active" role="tab" data-toggle="tab" href="#m_tabs_12_1" >Hôm nay</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" role="tab" data-toggle="tab" href="#m_tabs_12_3">Lịch sử</a>
                        </li>
                    </ul>
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
                                                <img style="width: 100px;" src="{!! asset($item->HocSinh->avatar) !!}" alt="ảnh">
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
                                                <img style="width: 100px;" src="{!! asset($item->HocSinh->avatar) !!}" alt="ảnh">
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