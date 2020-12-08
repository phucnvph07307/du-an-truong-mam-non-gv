@extends('layouts.main')
@section('title', "Điểm danh về")
@section('content')
<script>
    function errorLoadAvatar(e){
        let name_avatar = e.getAttribute('data-name_avatar');
        e.setAttribute('src', "https://ui-avatars.com/api/?name=" + name_avatar + "&background=random");
    }
</script>
<div class="m-content">
    <!--begin::Portlet-->
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        ĐIỂM DANH VỀ
                    </h3>
                </div>
            </div>
        </div>
        @php
        $hours_now = \Carbon\Carbon::now()->toTimeString();
        $hours_start = \Carbon\Carbon::createFromFormat('H:i:s', '12:00:00')->toTimeString();
        $hours_end = \Carbon\Carbon::createFromFormat('H:i:s', '18:00:00')->toTimeString();
        @endphp

        {{-- @if ($hours_start < $hours_now && $hours_now < $hours_end) --}}
        @if (true)

        <div class="m-portlet__body">

            <div class="tab-content">
                <div class="tab-pane active " id="m_tabs_12_1" role="tabpanel">
                    <table id="table1"
                        class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap dataTable dtr-inline">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã Số</th>
                                <th>Họ Tên</th>
                                <th>Avatar</th>
                                <th>Ngày Sinh</th>
                                <th>Bố Mẹ Đón</th>
                                <th>Người Đón Hộ</th>
                                <th>Nghỉ</th>
                                <th>Thông tin</th>
                                <th>Ghi chú</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if ($students != null || count($students) > 0)
                            @foreach ($students as $item)
                            @php
                            $date=date_create($item->ngay_sinh);
                            @endphp
                            <tr>
                                <td>{{ $index++ }}
                                    <input type="hidden" name="id_{{ $item->id }}"  value="{{ $item->id }}">
                                    <input type="hidden" name="lop_{{ $item->id }}" value="{{ $item->lop_id }}">
                                    <input type="hidden" name="user_{{ $item->id }}"  value="{{ $item->user_id }}"></td>
                                <td>{{ $item->ma_hoc_sinh }}</td>
                                <td>{{ $item->ten }}</td>
                                <td><img src="{{ $item->avatar }}" alt="avatar" data-name_avatar="{{ $item->ten }}" onerror="errorLoadAvatar(this)"  width="60" class="img-thumbnail"></td>
                                <td>{{ date_format($date,"d/m/Y") }}</td>
                                <td><input type="radio" value="1" name="{{ $item->id }}" checked="true"></td>
                                <td><input type="radio" value="2" name="{{ $item->id }}"></td>
                                <td><input type="radio" value="3" name="{{ $item->id }}"></td>
                                <td>
                                    @foreach ($nguoi_don_ho as $curros)
                                    @if ($curros->hoc_sinh_id == $item->id)
                                    <input type="hidden" name="nguoi_don_ho{{ $item->id }}" value="{{ $curros->id }}">
                                    <i style="cursor: pointer" class="text-warning flaticon-exclamation-1" data-toggle="modal" data-target="{{ '#m_modal_'.$item->id}}"></i>
                                        
                                    @endif
                                    @endforeach
                                </td>
                                <td><textarea name="chu_thich_{{ $item->id }}"></textarea></td>
                            </tr>
                            @endforeach
                            @endif

                            @if ($edit != null && count($edit) > 0)
                            @foreach ($edit as $item)
                            @php
                            $date=date_create($item->student->ngay_sinh);
                            @endphp
                            <tr>
                                <td>{{ $index++ }}
                                    <input type="hidden" name="id_{{ $item->id }}" value="{{ $item->hoc_sinh_id }}">
                                    <input type="hidden" name="lop_{{ $item->id }}" value="{{ $item->lop_id }}">
                                    <input type="hidden" name="user_{{ $item->id }}"  value="{{ $item->user_id }}"></td>
                                <td>{{ $item->student->ma_hoc_sinh }}</td>
                                <td>{{ $item->student->ten }}</td>
                                <td><img src="{{ $item->student->avatar }}" alt="avatar" data-name_avatar="{{ $item->student->ten }}" onerror="errorLoadAvatar(this)" width="60" class="img-thumbnail"></td>
                                <td>{{ date_format($date,"d/m/Y") }}</td>
                                <td><input type="radio" value="1" name="{{ $item->id }}"
                                        {{ ($item->trang_thai == 1)?'checked':'' }}></td>
                                <td><input type="radio" value="2" name="{{ $item->id }}"
                                        {{ ($item->trang_thai == 2)?'checked':'' }}></td>
                                <td><input type="radio" value="3" name="{{ $item->id }}"
                                        {{ ($item->trang_thai == 3)?'checked':'' }}></td>
                                <td>
                                    @foreach ($nguoi_don_ho as $curros)
                                    @if ($curros->hoc_sinh_id == $item->hoc_sinh_id)
                                    <input type="hidden" name="nguoi_don_ho{{ $item->hoc_sinh_id }}" value="{{ $curros->hoc_sinh_id }}">
                                    <i style="cursor: pointer" class="text-warning flaticon-exclamation-1" data-toggle="modal" data-target="{{ '#m_modal_'.$item->hoc_sinh_id}}"></i>
                                       
                                        
                                    @endif
                                    @endforeach
                                </td>
                                <td><textarea name="chu_thich_{{ $item->id }}">{{ $item->chu_thich ? $item->chu_thich : '' }}</textarea></td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="m-separator m-separator--dashed"></div>
            <div class="col m--align-center">
                <button onclick="submitData()" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air">
                    <span>
                        <span>Cập nhật</span>
                    </span>
                </button>
            </div>
           @php
               $modals = ($students != null && count($students) > 0) ? $students : $edit;
           @endphp
            @if ($modals != null && count($modals) > 0)
            @foreach ($modals as $item)
            @php
                $id_hoc_sinh = $item->hoc_sinh_id ? $item->hoc_sinh_id : $item->id;
            @endphp
            @foreach ($nguoi_don_ho as $curros)
            @if ($curros->hoc_sinh_id == $id_hoc_sinh)
            <div class="modal fade" id="{{ 'm_modal_'.$id_hoc_sinh }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thông tin người đón hộ - <h5
                                    class="m-subheader__title ">Bé {{ $item->ten }}</h5>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Họ và Tên:</label>
                                <input type="text" class="form-control"
                                    value="{{ $curros->ten_nguoi_don_ho }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="form-control-label">Số điện thoại:</label>
                                <input type="text" class="form-control" 
                                    value="{{ $curros->phone_number }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="form-control-label">Số CMND/TCC:</label>
                                <input type="text" class="form-control"  value="{{ $curros->cmtnd }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                @if ($curros->anh_nguoi_don_ho)
                                    <img src="{{ $curros->anh_nguoi_don_ho }}" width="100%" alt="ảnh">
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer pull-center">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Xác nhận</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

            @endforeach
            @endif


        </div>
        @else

        <div class="m-portlet__body">
            <div class="tab-content">
                <div class="m-alert m-alert--outline alert alert-warning alert-dismissible fade show" role="alert">
                   
                    <strong>Thông báo!</strong> Thời gian điểm danh đã đóng.
                </div>
            </div>
        </div>

        @endif

    </div>
    <!--end::Portlet-->
</div>
</div>

@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- https://viblo.asia/p/tim-hieu-jquery-datatables-co-ban-trong-10-phut-07LKXp4eKV4 -->
<script>
    $(document).ready(function () {
        $('#table1').DataTable({
            "pageLength": 100,
            "paging": false,
            "scrollY": "400px",
            "scrollCollapse": true,
        });
    });

    function submitData() {
        var statusList = $('input[type=radio]:checked');
        var data = [];
        for (i = 0; i < statusList.length; i++) {

            std = {
                'hoc_sinh_id': $('[name=id_' + $(statusList[i]).attr('name') + ']').val(),
                'user_id': $('[name=user_' + $(statusList[i]).attr('name') + ']').val(),
                'giao_vien_id': "{{ \Illuminate\Support\Facades\Auth::id() }}",
                'trang_thai': $(statusList[i]).val(),
                'chu_thich': $('[name=chu_thich_' + $(statusList[i]).attr('name') + ']').val(),
                'nguoi_don_ho_id': $('[name=nguoi_don_ho' + $(statusList[i]).attr('name') + ']').val() ? $(
                    '[name=nguoi_don_ho' + $(statusList[i]).attr('name') + ']').val() : null,
                'lop_id': $('[name=lop_' + $(statusList[i]).attr('name') + ']').val()
            }
            data.push(std)
        }
        console.log(data)
        $.post('{{ route("diem_danh_ve.store") }}', {
            '_token': "{{ csrf_token() }}",
            'data': JSON.stringify(data)
        }, function (dt) {
            if(dt.code == 288){
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })

                Toast.fire({
                icon: 'error',
                title: 'Điểm danh thất bại'
                })
                setTimeout(function(){
                    location.reload() 
                },2000);
            }else{
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })

                Toast.fire({
                icon: 'success',
                title: 'Điểm danh thành công'
                })
            }
        })
    }

</script>
@endsection
