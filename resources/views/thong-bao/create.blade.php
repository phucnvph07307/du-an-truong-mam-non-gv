@extends('layouts.main') 
@section('title', 'Thông báo toàn trường') 
@section('content')
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
                                <span>Thông báo sẽ được gửi toàn bộ phụ huynh của trẻ</span>
                            </h3>

                            <h2 class="m-portlet__head-label m-portlet__head-label--danger" style="cursor: pointer" onclick="toBack()">
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
                    <form action="" method="post" onsubmit="">
                        <div class="form-group">
                            <textarea name="title" class="form-control" placeholder="Tiêu đề ..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <textarea name="content" class="form-control"></textarea>
                        </div>
                    </form>
                </div>
            </div>

            <!--end::Portlet-->
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    var editor = CKEDITOR.replace('content');
    CKEDITOR.config.height = 300;

    function postData() {
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
                    } else {
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
        } else {
            Swal.showLoading()
            $.post("{{ route('thong-bao.store') }}", {
                '_token': "{{ csrf_token() }}",
                'title': $("[name='title']").val(),
                'content': editor.getData()
            }, function (response) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Gửi thông báo thành công!',
                    showConfirmButton: false,
                    timer: 1500
                })
                location.reload()
            })
        }
    }

    function toBack(){
        window.location.href = "{{ route('thong-bao.index') }}"
    }
</script>
@endsection
