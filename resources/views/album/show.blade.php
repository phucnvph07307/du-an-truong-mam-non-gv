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
          z-index: 1;
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
    <a href="{{ route('album.index') }}"><i class="fas fa-arrow-circle-left" style="font-size: 3rem; color: blue"></i></a>
    <center><h2>"{{ $data->title }}"</h2></center>
    <div class="gallery" id="gallery">
      @forelse ($data->item_images as $item)
        <div class="gallery-item">
          <div class="content"><img src="{{ $item }}" alt=""></div>
        </div>
      @empty

      @endforelse
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
        if (item.complete) {
            console.log(item.src);
        }
        else {
            item.addEventListener('load', function () {
                var altura = getVal(gallery, 'grid-auto-rows');
                var gap = getVal(gallery, 'grid-row-gap');
                var gitem = item.parentElement.parentElement;
                gitem.style.gridRowEnd = "span " + Math.ceil((getHeight(gitem) + gap) / (altura + gap));
                item.classList.remove('byebye');
            });
        }
      });
      window.addEventListener('resize', resizeAll);
      gallery.querySelectorAll('.gallery-item').forEach(function (item) {
          item.addEventListener('click', function () {        
              item.classList.toggle('full');        
          });
      });

    </script>
</body>
</html>

