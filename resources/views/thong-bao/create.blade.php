@extends('layouts.main') @section('title', 'Thông báo') @section('content')
@section('style')
<style>
    #danh_sach_hoc_sinh{
            height: 300px;
            overflow: auto;
    }
</style>
@endsection

<div class="m-content">
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="flaticon-statistics"></i>
                            </span>
                            <h3 class="m-portlet__head-text text-sussces">
                                <span>Click để thêm người nhận thông báo</span>
                                <button
                                    class="btn btn-outline-accent m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air"
                                    data-toggle="modal" data-target="#m_modal_4">
                                    <i class="la la-user-plus"></i>
                                </button>
                            </h3>
                            <h2 class="m-portlet__head-label m-portlet__head-label--accent">
                                <span class="m-portlet__head-icon text-warning">
                                    <i class="flaticon-bell"></i>
                                </span>
                                <span>Thông báo</span>
                            </h2>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm"
                            role="tablist">
                            <li class="nav-item m-tabs__item">
                                <button class="btn btn-sm m-btn--pill btn-info" id="gui-thong-bao" onclick="postData()">
                                    Gửi thông báo
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="m-portlet__body">
                    <form method="POST" onsubmit="return false" id="formContent">
                        <div class="form-group">
                            <textarea name="title" class="form-control" placeholder="Tiêu đề ..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <textarea name="content" class="form-control" id="content" class="ckeditor"></textarea>
                        </div>
                    </form>
                </div>
            </div>

            <!--end::Portlet-->
        </div>
    </div>
    <!--begin::Modal-->
    <div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">DANH SÁCH HỌC SINH</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="danh_sach_hoc_sinh">
                    <table id="table_id" class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap dataTable dtr-inline display">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <input type="checkbox" onclick="checkAll(this)" />
                                </th>
                                <th>STT</th>
                                <th>Mã học sinh</th>
                                <th>Tên học sinh</th>
                                <th>Giới tính</th>
                            </tr>
                        </thead>
                        <thead class="filter">
                            <tr>
                                <td></td>
                                <td></td>

                                <td><input class="form-control" type="text" id="field_ma" style="width: 120px;">
                                </td>
                                <td><input class="form-control" type="text" id="field_ten" style="width: 120px;">
                                </td>
                                <td>
                                    <select class="form-control" id="field_gioi_tinh" style="width: 120px;">
                                        <option value="">Chọn Giới tính</option>
                                        @foreach (config('common.gioi_tinh') as $value => $key)
                                        <option>{{ $key }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        </thead>
                        <tbody >
                            @php $i = 1; @endphp 
                            @forelse ($data as $item)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" class="checkbox" data-id="{{ $item->id }}" />
                                </td>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>{{ $item->ma_hoc_sinh }}</td>
                                <td>{{ $item->ten }}</td>
                                <td>
                                    @foreach (config('common.gioi_tinh') as $key => $value) 
                                    @if(isset($item->gioi_tinh) && $item->gioi_tinh == $key)
                                    {{ $value }}
                                    @endif
                                    @endforeach
                                </td>
                            </tr>
                            @empty @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="sendToPeoples()">
                        OK
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!--end::Modal-->
</div>
@endsection @section('script')
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
     var dtable;
    $(document).ready(function () {
        dtable = $('#table_id').DataTable({
            'paging': false,
            "aoColumnDefs": [{
                "bSortable": false,
                "aTargets": [ 0, 1 ]
            }, ]
        });
        $('#field_ma').on('keyup change', function () {
            dtable
                .column(2).search(this.value)
                .draw();
        });
        $('#field_ten').on('keyup change', function () {
            dtable
                .column(3).search(this.value)
                .draw();
        });
        $('#field_gioi_tinh').on('change', function () {
            dtable
                .column(4).search(this.value)
                .draw();
        });
    });
    var editor = CKEDITOR.replace("content");
    CKEDITOR.config.height = 300;

    const checkAll = (e) => {
        $(e).parents("table").find(".checkbox").not(e).prop("checked", e.checked);
    };

    var toPeoples = [];
    function sendToPeoples() {
        var statusList = $("input[type=checkbox]:checked");
        for (i = 0; i < statusList.length; i++) {
            if (statusList[i].checked && statusList[i].hasAttribute("data-id")) {
            toPeoples.push(parseInt(statusList[i].getAttribute("data-id")));
            }
        }
    }

    function postData() {
        let list_id_gui = $('.checkbox');
        let list_id_hoc_sinh = []
        for (const key in list_id_gui) {
            if (list_id_gui.hasOwnProperty(key)) {
                const element = list_id_gui[key];
                if(element.checked){
                   let id = $(element).attr('data-id')
                    list_id_hoc_sinh.push(id);
                }
                
                
            }
        }
        console.log(list_id_hoc_sinh)
        let err_title = $("[name='title']").val() == "" ? false : true;
        let err_content = editor.getData() == "" ? false : true;
        if (!err_title) {
            Swal.fire({
            title: 'Tiêu đề!',
            input: 'text',
            showCloseButton: true,
            showCancelButton: true,
            inputValidator: (value) => {
                    if (!value) {
                        return 'Hãy nhập Tiêu đề!'  
                    }else{
                        $("[name='title']").val(value)
                    }
                }
            })
        } else if (!err_content) {
            Swal.fire({
            position: "top",
            icon: "warning",
            title: "Hãy nhập Nội Dung Thông Báo",
            showConfirmButton: false,
            timer: 3000,
            showCloseButton: true,
            });
        }else if (list_id_hoc_sinh.length <= 0) {
            Swal.fire({
                position: "top",
                icon: "warning",
                title: "Hãy thêm người nhận thông báo",
                showConfirmButton: false,
                timer: 3000,
                showCloseButton: true,
            });
        }else {
            Swal.showLoading()
            console.log(list_id_hoc_sinh)
            axios.post("{{route('thong-bao.store')}}",{
            'title' : $("[name=title]").val(),
            'content': editor.getData(),
            'list_id_hoc_sinh' :list_id_hoc_sinh
        })
        .then(function (response) {
            Swal.fire({
                // position: 'top-end',
                icon: 'success',
                title: 'Gửi thông báo thành công',
                showConfirmButton: false,
                timer: 1500
                })
            console.log(response);
            setTimeout(function(){
                    location.reload() 
                },2000);
        })
        .catch(function (error) {
            // handle error
            console.log(error);
            setTimeout(function(){
                    location.reload() 
                },2000);
        })
        .then(function () {
            // always executed
        });
        }
    }
</script>
@endsection
