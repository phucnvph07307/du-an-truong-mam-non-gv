<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="https://kidsonline.edu.vn/wp-content/themes/kids-online/assets/images/favicon.png">
    <title>Album</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">      
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.10.1/sweetalert2.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
          background-color: #eee;
          padding-top: 1rem;
        }
        .hello {
          opacity: 1 !important;
        }
        .full {
          position: fixed;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          z-index: 1000;
        }
        .full .content {
          background-color: rgba(0,0,0,0.75) !important;
          height: 100%;
          width: 100%;
          display: grid;
        }
        .full .content img {
          left: 50%;
          transform: translate3d(0, 0, 0);
          animation: zoomin 1s ease;
          max-width: 100%;
          max-height: 100%;
          margin: auto;
        }
        .byebye {
          opacity: 0;
        }
        .byebye:hover {
          transform: scale(0.2) !important;
        }
        .gallery {
          display: grid;
          grid-column-gap: 8px;
          grid-row-gap: 8px;
          grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
          grid-auto-rows: 8px;
        }
        .gallery img {
          max-width: 100%;
          border-radius: 8px;
          box-shadow: 0 0 16px #333;
          transition: all 1.5s ease;
        }
        .gallery img:hover {
          box-shadow: 0 0 32px #333;
        }
        .gallery .content {
          padding: 4px;
        }
        .gallery .gallery-item {
          transition: grid-row-start 300ms linear;
          transition: transform 300ms ease;
          transition: all 0.5s ease;
          cursor: pointer;
        }
        .gallery .gallery-item:hover {
          transform: scale(1.025);
        }
        @media (max-width: 600px) {
          .gallery {
            grid-template-columns: repeat(auto-fill, minmax(30%, 1fr));
          }
        }
        @media (max-width: 400px) {
          .gallery {
            grid-template-columns: repeat(auto-fill, minmax(50%, 1fr));
          }
        }
        @-moz-keyframes zoomin {
          0% {
            max-width: 50%;
            transform: rotate(-30deg);
            filter: blur(4px);
          }
          30% {
            filter: blur(4px);
            transform: rotate(-80deg);
          }
          70% {
            max-width: 50%;
            transform: rotate(45deg);
          }
          100% {
            max-width: 100%;
            transform: rotate(0deg);
          }
        }
        @-webkit-keyframes zoomin {
          0% {
            max-width: 50%;
            transform: rotate(-30deg);
            filter: blur(4px);
          }
          30% {
            filter: blur(4px);
            transform: rotate(-80deg);
          }
          70% {
            max-width: 50%;
            transform: rotate(45deg);
          }
          100% {
            max-width: 100%;
            transform: rotate(0deg);
          }
        }
        @-o-keyframes zoomin {
          0% {
            max-width: 50%;
            transform: rotate(-30deg);
            filter: blur(4px);
          }
          30% {
            filter: blur(4px);
            transform: rotate(-80deg);
          }
          70% {
            max-width: 50%;
            transform: rotate(45deg);
          }
          100% {
            max-width: 100%;
            transform: rotate(0deg);
          }
        }
        @keyframes zoomin {
          0% {
            max-width: 50%;
            transform: rotate(-30deg);
            filter: blur(4px);
          }
          30% {
            filter: blur(4px);
            transform: rotate(-80deg);
          }
          70% {
            max-width: 50%;
            transform: rotate(45deg);
          }
          100% {
            max-width: 100%;
            transform: rotate(0deg);
          }
        }
    </style>
</head>
<body>
  <center><h2>"<span contenteditable="true" id="album-title">{{ $data->title }}</span>"</h2></center>
  <a href="{{ route('album.index') }}"><i class="fas fa-arrow-circle-left" style="font-size: 2rem; color: blue"></i></a>
  <i class="far fa-plus-circle"  data-toggle="modal" data-target="#myModal" style="font-size: 2rem; color: greenyellow; cursor: pointer;"></i>

    <div class="gallery" id="gallery">
      @forelse ($data->item_images as $item)
        <div class="gallery-item">
          <div style="position: relative;">
            <i class="fad fa-trash" data-image="{{ $item }}" data-id="{{ $data->id }}" style="position: absolute; color:black; z-index: 100; right: 5%; top: 1rem; display: block;" onclick="removeFuc(this)"></i>
          </div>
          <div class="content">
            <img src="{{ asset($item) }}"></div>
        </div>
      @empty

      @endforelse
    </div>

    

  <!-- The Modal -->
  <div class="modal fade" id="myModal" >
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thêm ảnh</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group">
              <form action="" class="dropzone" method="post" enctype="multipart/form-data">
                  {!! csrf_field() !!}
                  <div class="dz-message needsclick">
                      <i class="far fa-image text-warning" style="font-size: 5rem"></i>
                  </div>
              </form>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" onclick="formSubmit()">Thêm</button>
        </div>
        
      </div>
    </div>
  </div>

    <script>
      function myFunction(id) {
        var x = document.getElementById(id);
        if (x.className.indexOf("w3-show") == -1) {
          x.className += " w3-show";
        } else { 
          x.className = x.className.replace(" w3-show", "");
        }
      }

      var gallery = document.querySelector('#gallery');
      var getVal = function (elem, style) { return parseInt(window.getComputedStyle(elem).getPropertyValue(style)); };
      var getHeight = function (item) { return item.querySelector('.content').getBoundingClientRect().height; };
      var resizeAll = function () {
        var altura = getVal(gallery, 'grid-auto-rows');
        var gap = getVal(gallery, 'grid-row-gap');
        gallery.querySelectorAll('.gallery-item').forEach(function (item) {
            var el = item;
            el.style.gridRowEnd = "span " + Math.ceil((getHeight(item) + gap) / (altura + gap));
        });
      };
      gallery.querySelectorAll('img').forEach(function (item) {
        item.classList.add('byebye');
        // if (item.complete) {
        //     console.log(item.src);
        // }
        // else {
            item.addEventListener('load', function () {
                var altura = getVal(gallery, 'grid-auto-rows');
                var gap = getVal(gallery, 'grid-row-gap');
                var gitem = item.parentElement.parentElement;
                gitem.style.gridRowEnd = "span " + Math.ceil((getHeight(gitem) + gap) / (altura + gap));
                item.classList.remove('byebye');
            });
        // }
      });
      window.addEventListener('resize', resizeAll);
      gallery.querySelectorAll('.gallery-item .content').forEach(function (item) {
          item.addEventListener('click', function () {        
              item.parentElement.classList.toggle('full');        
          });
      });

      function removeFuc(e) {
            Swal.fire({
                title: 'Bạn muốn xóa ảnh?',
                icon: 'warning',
                showCancelButton: false,
                showCloseButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post("{{ route('album.removeImage') }}", {
                        id: e.getAttribute('data-id'),
                        image: e.getAttribute('data-image'),
                    }).then(res => {
                        if (res.data.code == 1) {
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
                              icon: 'success',
                              title: 'Đã xóa khỏi Album'
                          })
                          e.parentElement.parentElement.remove();
                        } else {
                            location.reload()
                        }
                    })
                }
            })
      }

      $('#album-title').on('blur',function(){
            updateTitle();
      })

      $('#album-title').keypress(function(event) {
        if (event.keyCode == 13 || event.which == 13) {
              event.preventDefault();
              updateTitle();  
              $('#album-title').blur();
        }
      });
      function updateTitle(){
            axios.post("{{ route('album.updateTitle') }}", {
                  id: "{{ $data->id }}",
                  title: $('#album-title').text()
            })
      }

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.10.1/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
      function formSubmit() {
          let item_images = "{{ $data->item_images[0] }}";
          let str_url_image = item_images.substr(0, item_images.lastIndexOf('\/') + 1)

          images = [];
          imageDataArray.map(function (vale) {
              images.push(str_url_image + vale);
          })

          let data = {
              id: "{{ $data->id }}",
              images_add: JSON.stringify(images),
              images_loop: JSON.stringify(imageDataArray),
              url_image: str_url_image
          }
          axios.post("{{ route('album.addImage') }}", data)
              .then(res => {
                  if (res.data.code == 1) {
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
                          icon: 'success',
                          title: 'Thêm thành công'
                      })
                      location.reload()
                  }
              })
      }
      Dropzone.autoDiscover = false;
      var acceptedFileTypes = "image/*";
      var imageDataArray = [];
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

  </script>
</body>
</html>

