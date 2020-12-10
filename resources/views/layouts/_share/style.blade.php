<link href="{!! asset('css/all.css') !!}" rel="stylesheet" type="text/css" />

<!--begin:: Global Optional Vendors -->
<link
    href="{!! asset('vendors/vendors/line-awesome/css/line-awesome.css') !!}"
    rel="stylesheet"
    type="text/css"
/>
<link
    href="{!! asset('vendors/vendors/flaticon/css/flaticon.css') !!}"
    rel="stylesheet"
    type="text/css"
/>
<!--end:: Global Optional Vendors -->
<style>
    .make-bellring{ 
            -webkit-animation: ring 5s 1s ease-in-out infinite !important;
            -webkit-transform-origin: 50% 4px !important;
            -moz-animation: ring 5s 1s ease-in-out infinite !important;
            -moz-transform-origin: 50% 4px !important;
            animation: ring 5s 1s ease-in-out infinite !important;
            transform-origin: 50% 4px !important;
        }
        @keyframes ring {
            0% { -webkit-transform: rotateZ(0); }
            1% { -webkit-transform: rotateZ(30deg); }
            3% { -webkit-transform: rotateZ(-28deg); }
            5% { -webkit-transform: rotateZ(34deg); }
            7% { -webkit-transform: rotateZ(-32deg); }
            9% { -webkit-transform: rotateZ(30deg); }
            11% { -webkit-transform: rotateZ(-28deg); }
            13% { -webkit-transform: rotateZ(26deg); }
            15% { -webkit-transform: rotateZ(-24deg); }
            17% { -webkit-transform: rotateZ(22deg); }
            19% { -webkit-transform: rotateZ(-20deg); }
            21% { -webkit-transform: rotateZ(18deg); }
            23% { -webkit-transform: rotateZ(-16deg); }
            25% { -webkit-transform: rotateZ(14deg); }
            27% { -webkit-transform: rotateZ(-12deg); }
            29% { -webkit-transform: rotateZ(10deg); }
            31% { -webkit-transform: rotateZ(-8deg); }
            33% { -webkit-transform: rotateZ(6deg); }
            35% { -webkit-transform: rotateZ(-4deg); }
            37% { -webkit-transform: rotateZ(2deg); }
            39% { -webkit-transform: rotateZ(-1deg); }
            41% { -webkit-transform: rotateZ(1deg); }

            43% { -webkit-transform: rotateZ(0); }
            100% { -webkit-transform: rotateZ(0); }
        }
        @media (max-width: 575px) {
                .respon_logo {
                width: 50%;
                }
        }
        @media (min-width: 576px) and (max-width: 767.98px) {
                .respon_logo {
                width: 50%;
                }
        }
        @media (min-width: 768px) and (max-width: 991.98px) {
                .respon_logo {
                width: 50%;
                }
        }
        @media (min-width: 992px) {
                .respon_logo {
                width: 100%;
                }
        }
        .dataTables_info{
                display: none;
        }     
        body{
                font-family: Arial, Helvetica, sans-serif !important;
        }
</style>
