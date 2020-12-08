@extends('layouts.main')
@section('title', "Album ảnh")
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
<style>
    #box-galary {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        font-family: sans-serif;
    }

    .grid-container {
        columns: 5 200px;
        column-gap: 1.5rem;
        width: 90%;
        margin: 0 auto;
    }

    .grid-container div {
        width: 150px;
        margin: 0 1.5rem 1.5rem 0;
        display: inline-block;
        width: 100%;
        padding: 5px;
        box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.5);
        border-radius: 15px;
        transition: all .25s ease-in-out;
        margin-top: 0.5rem;
    }

    .grid-container div:hover img {
        cursor: pointer;
        filter: grayscale(0);
    }

    .grid-container div:hover {
        border-color: coral;
    }

    .grid-container div img {
        width: 100%;
        border-radius: 15px;
        transition: all .25s ease-in-out;
    }

    .grid-container div p {
        margin: 5px 0;
        padding: 0;
        text-align: center;
        font-style: italic;
    }
    .border-err{
        border: 1px solid red;
    }

</style>

@endsection
@section('content')
<div class="m-subheader">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">Album Ảnh</h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="{{ route('app') }}" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__item m-nav__item--home">
                    <input class="form-control m-input m-input--air m-input--pill" type="date"
                        value='{{ date("Y-m-d") }}' name="start_date">
                </li>
                <li class="m-nav__item m-nav__item--home">
                    <input class="form-control m-input m-input--air m-input--pill" type="date"
                        value='{{ date("Y-m-d") }}' name="end_date">
                </li>
            </ul>
        </div>
        <div>
            <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push"
                m-dropdown-toggle="hover" aria-expanded="true">
                <button data-toggle="modal" data-target="#m_modal_4"
                    class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                    <i class="flaticon-add-circular-button"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="m-content" style="min-height: 528px">
    <div id="box-galary">
        <div class="grid-container" id="grid-container">

            @forelse ($data as $item)
            <div>
                <span style="cursor: pointer" class="pull-right pr-2" data-id="{{$item->id}}" onclick="removeAlbum(this)">&#10006;</span>
                <a target="_blank" href="{{ route('album.show',['id'=>$item->id])}}"><img class='grid-item'
                        src='{{isset($item->item_images[0]) ? asset($item->item_images[0]) : "" }}' alt=''></a>
                <p>"{{ $item->title ? $item->title : '' }}"</p>
                <i class="pull-right pr-1">{{ $item->created_at }}</i>
            </div>
            @empty

            @endforelse

        </div>
    </div>
</div>
<div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Đăng album ảnh</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="m-portlet m-portlet--full-height ">

                    <div class="m-portlet__body">
                        <!--begin::Content-->
                        <div class="tab-content">
                            <div class="form-group">
                                <textarea class="form-control m-input m-input--air m-input--pill " name="title" rows="3"
                                    placeholder="Hoạt động lớp hôm nay ?"></textarea>
                            </div>
                            <div class="form-group">
                                <form action="" class="dropzone" method="post" enctype="multipart/form-data" id="form-upload-image">
                                    {!! csrf_field() !!}
                                    <div class="dz-message needsclick">
                                        <i class="la la-photo" style="font-size: 100px"></i>
                                    </div>
                                </form>
                            </div>
                            <br>
                            <div class="form-group">
                                <button class="btn btn-success pull-right" onclick="formSubmit()">ĐĂNG</button>
                            </div>
                            <br>

                        </div>

                        <!--end::Content-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    var err_title = ''
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function formSubmit() {
        var err = true;
        if ($("[name='title']").val() != '') {
            $("[name='title']").removeClass('is-invalid');
        }else {
            $("[name='title']").addClass('is-invalid');
            err = false;
        }
        
        if (imageDataArray.length > 0) {
            $("#form-upload-image").removeClass('border-err');
        } else {
            $("#form-upload-image").addClass('border-err');
            err = false;
        }

        if(err){
            let data = {
                        title: $("[name='title']").val(),
                        item_images: JSON.stringify(imageDataArray),
                        auth_id: "{{ Illuminate\Support\Facades\Auth::id() }}",
                        lop_id: "{{ Illuminate\Support\Facades\Auth::user()->profile->lop_id }}"
                    }
            $.post("{{ route('album.store') }}", data)
                .done(function (res) {
                    location.reload();
                })
        }
    }

    Dropzone.autoDiscover = false;
    var acceptedFileTypes = "image/*"; //dropzone requires this param be a comma separated list
    // imageDataArray variable to set value in crud form
    var imageDataArray = [];
    // fileList variable to store current files index and name
    var fileList = new Array;
    var i = 0;

    $(function () {
        uploader = new Dropzone(".dropzone", {
            url: "{{ route('album.upload') }}",
            paramName: "file",
            uploadMultiple: false,
            acceptedFiles: "image/*,video/*,audio/*",
            addRemoveLinks: true,
            forceFallback: false,
            maxFilesize: 500, // Set the maximum file size to 500 MB
            parallelUploads: 2,
        }); //end drop zone

        uploader.on("success", function (file, response) {
            $("#form-upload-image").removeClass('border-err');
            let str = response.replace(/\"/g, '');
            imageDataArray.push(str)
            fileList[i] = {
                "serverFileName": str,
                "fileName": file.name,
                "fileId": i
            };
            i += 1;
        });

        uploader.on("removedfile", function (file) {
            var rmvFile = "";
            for (var f = 0; f < fileList.length; f++) {

                if (fileList[f].fileName == file.name) {

                    // remove file from original array by database image name
                    imageDataArray.splice(imageDataArray.indexOf(fileList[f].serverFileName), 1);
                    // $('#item_images').val(imageDataArray);

                    // get removed database file name
                    rmvFile = fileList[f].serverFileName;

                    // get request to remove the uploaded file from server
                    $.get("{{ route('album.remove') }}", {
                            file: rmvFile
                        })
                        .done(function (data) {});
                }
            }
        });

    });

    var object_Date = {
        'start_date': $('[name="start_date"]').val(),
        'end_date': $('[name="end_date"]').val()
    }

    $('[name="start_date"]').change(function () {
        object_Date.start_date = $(this).val();
        fillterCaladar();
    });

    $('[name="end_date"]').change(function () {
        object_Date.end_date = $(this).val();
        fillterCaladar();
    });

    function fillterCaladar() {
        let url = route('album.fillter') + `?start_date=${object_Date.start_date}&end_date=${object_Date.end_date}`;
        axios.get(url)
            .then(res => {
                var content = ``;
                res.data.forEach(element => {
                    content += `
                  <div>
                      <a href="${route('album.show',{'id':element.id})}">
                        <img class='grid-item' src='${location.protocol + '//' + location.host + '/' + element.item_images[0]}'>
                      </a>
                      <p>"${element.title ? element.title : ''}"</p>
                      <i class="pull-right pr-1">${element.created_at}</i>
                  </div>
                    `;
                });
                $('#grid-container').html(content);
            })
    }

    function removeAlbum(e){
        Swal.fire({
                title: 'Bạn muốn xóa Album này',
                icon: 'warning',
                showCancelButton: false,
                showCloseButton: true,
                confirmButtonText: 'Yes, Xóa Album!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post("{{ route('album.removeAlbum') }}", {
                        id: e.getAttribute('data-id'),
                    }).then(res => {
                        if (res.data.code == 1) {
                          const Toast = Swal.mixin({
                              toast: true,
                              position: 'top-end',
                              showConfirmButton: false,
                              timer: 1000,
                              timerProgressBar: true,
                              didOpen: (toast) => {
                                  toast.addEventListener('mouseenter', Swal.stopTimer)
                                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                              }
                          })
                          Toast.fire({
                              icon: 'success',
                              title: 'Đã xóa Album'
                          })
                          e.parentElement.remove();
                        }
                    })
                }
            })
    }

</script>
@endsection
