@extends('layouts.main')
@section('title', "Điểm danh đến ban sáng")
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
                        ĐIỂM DANH SÁNG
                    </h3>
                </div>
            </div>
        </div>
        @php
            $hours_now = \Carbon\Carbon::now()->toTimeString();
            $hours_start = \Carbon\Carbon::createFromFormat('H:i:s', '07:00:00')->toTimeString();
            $hours_end = \Carbon\Carbon::createFromFormat('H:i:s', '09:00:00')->toTimeString();
        @endphp

        {{-- @if ($hours_start < $hours_now && $hours_now < $hours_end) --}}
        @if (true)

        <div class="m-portlet__body">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('diem_danh_ban_sang.create')}}">
                        <i class="la la-exclamation-triangle"></i> Sáng
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('diem_danh_ban_chieu.create')}}">
                        <i class="la la-cloud-download"></i> Chiều
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">

                    <table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap dataTable dtr-inline display" id="table1" style="width:100%">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã Số</th>
                                <th>Họ Tên</th>
                                <th>Avatar</th>
                                <th>Ngày Sinh</th>
                                <th>Đi Học</th>
                                <th>Nghỉ Học</th>
                                {{-- <th>Nghỉ Có Phép</th> --}}
                                {{-- <th>Nghỉ Không Phép</th> --}}
                                <th>Phiếu ăn</th>
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
                                        <td>{{ $index++ }}<input type="hidden" name="id_{{ $item->id }}" value="{{ $item->id }}">
                                            <input type="hidden" name="lop_{{ $item->id }}" value="{{ $item->lop_id }}"></td>
                                        <td>{{ $item->ma_hoc_sinh }}</td>
                                        <td>{{ $item->ten }}</td>
                                        <td><img src="{{ $item->avatar }}" alt="avatar" data-name_avatar="{{ $item->ten }}" onerror="errorLoadAvatar(this)"  width="60" class="img-thumbnail"></td>
                                        <td>{{ date_format($date,"d/m/Y") }}</td>
                                        <td><input type="radio" value="1" name="{{ $item->id }}" onclick="onTick(this)" checked="true"></td>
                                        <td><input type="radio" value="2" name="{{ $item->id }}" onclick="unTick(this)"></td>
                                        {{-- <td><input type="radio" value="3" name="{{ $item->id }}"></td> --}}
                                        <td><input type="checkbox" name="phieu_an_{{ $item->id }}" checked="true"></td>
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
                                        <td>{{ $index++ }}<input type="hidden" name="id_{{ $item->id }}" value="{{ $item->hoc_sinh_id }}">
                                            <input type="hidden" name="lop_{{ $item->id }}" value="{{ $item->lop_id }}"></td>
                                        <td>{{ $item->student->ma_hoc_sinh }}</td>
                                        <td>{{ $item->student->ten }}</td>
                                        <td><img src="{{ $item->student->avatar }}" alt="avatar" data-name_avatar="{{ $item->student->ten }}" onerror="errorLoadAvatar(this)"  width="60" class="img-thumbnail"></td>
                                        <td>{{ date_format($date,"d/m/Y") }}</td>
                                        <td><input type="radio" value="1" name="{{ $item->id }}" {{ ($item->trang_thai == 1)?'checked':'' }} onclick="onTick(this)"></td>
                                        <td><input type="radio" value="2" name="{{ $item->id }}" {{ ($item->trang_thai == 2)?'checked':'' }} onclick="unTick(this)"></td>
                                        {{-- <td><input type="radio" value="3" name="{{ $item->id }}" {{ ($item->trang_thai == 3)?'checked':'' }}></td> --}}
                                        <td><input type="checkbox" name="phieu_an_{{ $item->id }}" 
                                            @php
                                                if($item->phieu_an == 1 && $item->trang_thai == 1){
                                                    echo 'checked';
                                                }elseif ($item->phieu_an != 1 && $item->trang_thai == 1) {
                                                    echo '';
                                                }else{
                                                    echo 'hidden';
                                                }
                                            @endphp
                                            ></td>
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
        </div>

        @else

        <div class="m-portlet__body">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('diem_danh_ban_sang.create')}}">
                        <i class="la la-exclamation-triangle"></i> Sáng
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('diem_danh_ban_chieu.create')}}">
                        <i class="la la-cloud-download"></i> Chiều
                    </a>
                </li>
            </ul>
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

    function onTick(e){
        e.parentElement.parentElement.querySelector("[type='checkbox']").removeAttribute('hidden','')
    }

    function unTick(e){
        e.parentElement.parentElement.querySelector("[type='checkbox']").setAttribute('hidden','')
        e.parentElement.parentElement.querySelector("[type='checkbox']").checked = false;
    }

    function submitData(){
        var statusList = $('input[type=radio]:checked');
        var data = [];
        for(i=0;i<statusList.length;i++) {
			
                std = {
                    'hoc_sinh_id': $('[name=id_'+$(statusList[i]).attr('name')+']').val(),
                    'giao_vien_id': "{{ \Illuminate\Support\Facades\Auth::id() }}",
					'trang_thai': $(statusList[i]).val(),
					'chu_thich': $('[name=chu_thich_'+$(statusList[i]).attr('name')+']').val(),
                    'lop_id': $('[name=lop_' + $(statusList[i]).attr('name') + ']').val(),
                    'phieu_an': $('[name=phieu_an_'+$(statusList[i]).attr('name')+']').is(':checked'),
				}
				data.push(std)
			}
			console.log(data)
            $.post('{{ route("diem_danh_ban_sang.store") }}', {
				'_token': "{{ csrf_token() }}",
				'data': JSON.stringify(data)
			}, function(dt) {
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
