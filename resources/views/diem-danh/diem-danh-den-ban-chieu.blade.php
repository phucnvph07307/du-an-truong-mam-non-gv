@extends('layouts.main')
@section('title', "Điểm danh đến ban chiều")
@section('content')
<div class="m-content">
    <!--begin::Portlet-->
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        ĐIỂM DANH CHIỀU
                    </h3>
                </div>
            </div>
        </div>
        @php
            $hours_now = \Carbon\Carbon::now()->toTimeString();
            $hours_start = \Carbon\Carbon::createFromFormat('H:i:s', '13:00:00')->toTimeString();
            $hours_end = \Carbon\Carbon::createFromFormat('H:i:s', '14:00:00')->toTimeString();
        @endphp

        @if ($hours_start <= $hours_now && $hours_now <= $hours_end)

        <div class="m-portlet__body">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('diem_danh_ban_sang.create')}}">
                        <i class="la la-exclamation-triangle"></i> Sáng
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('diem_danh_ban_chieu.create')}}">
                        <i class="la la-cloud-download"></i> Chiều
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">

                    <table
                        class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap dataTable dtr-inline"
                        id="table1">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã Số</th>
                                <th>Họ Tên</th>
                                <th>Avatar</th>
                                <th>Ngày Sinh</th>
                                <th>Đi Học</th>
                                <th>Nghỉ Có Phép</th>
                                <th>Nghỉ Không Phép</th>
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
                                        <td><img src="{{ $item->avatar }}" alt="avatar"  width="60" class="img-thumbnail"></td>
                                        <td>{{ date_format($date,"d/m/Y") }}</td>
                                        <td><input type="radio" value="1" name="{{ $item->id }}" checked="true"></td>
                                        <td><input type="radio" value="2" name="{{ $item->id }}"></td>
                                        <td><input type="radio" value="3" name="{{ $item->id }}"></td>
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
                                        <td><img src="{{ $item->student->avatar }}" alt="avatar"  width="60" class="img-thumbnail"></td>
                                        <td>{{ date_format($date,"d/m/Y") }}</td>
                                        <td><input type="radio" value="1" name="{{ $item->id }}" {{ ($item->trang_thai == 1)?'checked':'' }}></td>
                                        <td><input type="radio" value="2" name="{{ $item->id }}" {{ ($item->trang_thai == 2)?'checked':'' }}></td>
                                        <td><input type="radio" value="3" name="{{ $item->id }}" {{ ($item->trang_thai == 3)?'checked':'' }}></td>
                                        <td><textarea name="chu_thich_{{ $item->id }}">{{ $item->chu_thich ? $item->chu_thich : ''}}</textarea></td>
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
    </div>

    @else

        <div class="m-portlet__body">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('diem_danh_ban_sang.create')}}">
                        <i class="la la-exclamation-triangle"></i> Sáng
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('diem_danh_ban_chieu.create')}}">
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

    <!--end::Portlet-->

</div>

</div>

@endsection
@section('script')

<script src="{{ asset('assets/jquery/jquery.dataTables.min.js') }}"></script>
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
                    'phieu_an': true
				}
				data.push(std)
			}
			console.log(data)
            $.post('{{ route("diem_danh_ban_chieu.store") }}', {
				'_token': "{{ csrf_token() }}",
				'data': JSON.stringify(data)
			}, function(dt) {
                location.reload()
			})
    }

</script>
@endsection
