@extends('layouts.main') @section('title', 'Thông báo') @section('content')
<div class="m-content">
    <div class="row">

        <div class="col-lg-12">

            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--mobile m-portlet--sortable">
                <div class="m-portlet__head ui-sortable-handle">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon">
                                <i class="la la-thumb-tack m--font-success"></i>
                            </span>
                            <h3 class="m-portlet__head-text m--font-success">
                                {{ $data->title }}
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                            <button class="m-portlet__nav-link btn btn-secondary m-btn m-btn--icon m-btn--icon-only m-btn--pill" onclick="remove('{{ $data->id }}')">
                                    <i class="flaticon-delete-1" style="color: red"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-section__content">
                        <div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
                            <div class="m-demo__preview">
                                @php
                                $doc = new DOMDocument();
                                $doc->loadHTML('<?xml encoding="UTF-8">'.$data->content);
                                echo $doc->saveHTML();
                            @endphp
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
<script>
    function remove(id){
        Swal.fire({
        title: 'Bạn chắc chắn muốn xóa?',
        text: "Bạn sẽ không thể lấy lại!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete'
        }).then((result) => {
            if (result.value) {
                axios.post("{{ route('thong-bao.remove2') }}",{'id': Number(id)})
                .then(res => {
                    if(res.status == 201){
                        Swal.fire(
                        'Xóa thành công!',
                        'Thông báo đã dc xóa bỏ',
                        'success'
                        )
                        window.location.href = route('thong-bao.da-gui');
                    }
                })
            }
        })
    }
</script>
@endsection
