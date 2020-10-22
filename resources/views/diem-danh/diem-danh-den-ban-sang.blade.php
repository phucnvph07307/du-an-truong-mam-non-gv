@extends('layouts.main')
@section('title', "Điểm danh đến ban sáng")
@section('content')
<div class="m-content">
    <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30"
        role="alert">
        <div class="m-alert__icon">
            <i class="flaticon-exclamation m--font-brand"></i>
        </div>
        <div class="m-alert__text">
            DataTables
        </div>
    </div>
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
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <button onclick="submitData()" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air">
                            <span>
                                <span>Cập nhật</span>
                            </span>
                        </button>
                    </li>

                </ul>
            </div>
        </div>
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
                                <th>Nghỉ Có Phép</th>
                                <th>Nghỉ Không Phép</th>
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
                                        <td><img src="{{ $item->avatar }}" alt="avatar"></td>
                                        <td>{{ date_format($date,"d/m/Y") }}</td>
                                        <td><input type="radio" value="1" name="{{ $item->id }}" checked="true"></td>
                                        <td><input type="radio" value="2" name="{{ $item->id }}"></td>
                                        <td><input type="radio" value="3" name="{{ $item->id }}"></td>
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
                                        <td><img src="{{ $item->student->avatar }}" alt="avatar"></td>
                                        <td>{{ date_format($date,"d/m/Y") }}</td>
                                        <td><input type="radio" value="1" name="{{ $item->id }}" {{ ($item->trang_thai == 1)?'checked':'' }}></td>
                                        <td><input type="radio" value="2" name="{{ $item->id }}" {{ ($item->trang_thai == 2)?'checked':'' }}></td>
                                        <td><input type="radio" value="3" name="{{ $item->id }}" {{ ($item->trang_thai == 3)?'checked':'' }}></td>
                                        <td><input type="checkbox" name="phieu_an_{{ $item->id }}" {{ ($item->phieu_an == 1)?'checked':'' }}></td>
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
    </div>

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
                    'phieu_an': $('[name=phieu_an_'+$(statusList[i]).attr('name')+']').is(':checked'),
				}
				data.push(std)
			}
			console.log(data)
            $.post('{{ route("diem_danh_ban_sang.store") }}', {
				'_token': "{{ csrf_token() }}",
				'data': JSON.stringify(data)
			}, function(dt) {
                location.reload()
			})
    }

</script>
@endsection
