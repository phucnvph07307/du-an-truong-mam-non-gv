const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles(
    [
        "public/assets/vendors/base/vendors.bundle.css",
        "public/assets/demo/base/style.bundle.css",
        "public/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css",
        "public/vendors/tether/dist/css/tether.css",
        "public/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css",
        "public/vendors/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css",
        "public/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css",
        "public/vendors/bootstrap-daterangepicker/daterangepicker.css",
        "public/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css",
        "public/vendors/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css",
        "public/vendors/bootstrap-select/dist/css/bootstrap-select.css",
        "public/vendors/select2/dist/css/select2.css",
        "public/vendors/nouislider/distribute/nouislider.css",
        "public/vendors/owl.carousel/dist/assets/owl.carousel.css",
        "public/vendors/owl.carousel/dist/assets/owl.theme.default.css",
        "public/vendors/ion-rangeslider/css/ion.rangeSlider.css",
        "public/vendors/ion-rangeslider/css/ion.rangeSlider.skinFlat.css",
        "public/vendors/dropzone/dist/dropzone.css",
        "public/vendors/summernote/dist/summernote.css",
        "public/vendors/bootstrap-markdown/css/bootstrap-markdown.min.css",
        "public/vendors/animate.css/animate.css",
        "public/vendors/toastr/build/toastr.css",
        "public/vendors/jstree/dist/themes/default/style.css",
        "public/vendors/morris.js/morris.css",
        "public/vendors/chartist/dist/chartist.min.css",
        "public/vendors/sweetalert2/dist/sweetalert2.min.css",
        "public/vendors/socicon/css/socicon.css",
        "public/vendors/vendors/metronic/css/styles.css",
        "public/vendors/vendors/fontawesome5/css/all.min.css",

        "public/assets/vendors/custom/datatables/datatables.bundle.css",
        "public/share/progressbar.css",
        "public/share/nprogress.css"
    ],
    "public/css/all.css"
)
    .scripts(
        [
            "public/assets/jquery/jquery.min.js",
            "public/assets/demo/default/custom/crud/datatables/basic/scrollable.js",
            "public/assets/vendors/base/vendors.bundle.js",
            "public/assets/demo/base/scripts.bundle.js",
            "public/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js",
            "public/assets/app/js/dashboard.js",
            "public/vendors/jquery.repeater/src/lib.js",
            "public/vendors/jquery.repeater/src/jquery.input.js",
            "public/vendors/jquery.repeater/src/repeater.js",
            "public/vendors/jquery-form/dist/jquery.form.min.js",
            "public/vendors/block-ui/jquery.blockUI.js",
            "public/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js",
            "public/vendors/js/framework/components/plugins/forms/bootstrap-datepicker.init.js",
            "public/vendors/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js",
            "public/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js",
            "public/vendors/js/framework/components/plugins/forms/bootstrap-timepicker.init.js",
            "public/vendors/bootstrap-daterangepicker/daterangepicker.js",
            "public/vendors/js/framework/components/plugins/forms/bootstrap-daterangepicker.init.js",
            "public/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js",
            "public/vendors/bootstrap-maxlength/src/bootstrap-maxlength.js",
            "public/vendors/bootstrap-switch/dist/js/bootstrap-switch.js",
            "public/vendors/js/framework/components/plugins/forms/bootstrap-switch.init.js",
            "public/vendors/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js",
            "public/vendors/bootstrap-select/dist/js/bootstrap-select.js",
            "public/vendors/typeahead.js/dist/typeahead.bundle.js",
            "public/vendors/handlebars/dist/handlebars.js",
            "public/vendors/inputmask/dist/jquery.inputmask.bundle.js",
            "public/vendors/inputmask/dist/inputmask/inputmask.date.extensions.js",
            "public/vendors/inputmask/dist/inputmask/inputmask.numeric.extensions.js",
            "public/vendors/inputmask/dist/inputmask/inputmask.phone.extensions.js",
            "public/vendors/nouislider/distribute/nouislider.js",
            "public/vendors/owl.carousel/dist/owl.carousel.js",
            "public/vendors/autosize/dist/autosize.js",
            "public/vendors/clipboard/dist/clipboard.min.js",
            "public/vendors/ion-rangeslider/js/ion.rangeSlider.js",
            "public/vendors/dropzone/dist/dropzone.js",
            "public/vendors/summernote/dist/summernote.js",
            "public/vendors/markdown/lib/markdown.js",
            "public/vendors/bootstrap-markdown/js/bootstrap-markdown.js",
            "public/vendors/js/framework/components/plugins/forms/bootstrap-markdown.init.js",
            "public/vendors/jquery-validation/dist/jquery.validate.js",
            "public/vendors/jquery-validation/dist/additional-methods.js",
            "public/vendors/js/framework/components/plugins/forms/jquery-validation.init.js",
            "public/vendors/bootstrap-notify/bootstrap-notify.min.js",
            "public/vendors/js/framework/components/plugins/base/bootstrap-notify.init.js",
            // "public/vendors/toastr/build/toastr.min.js",
            "public/vendors/jstree/dist/jstree.js",
            "public/vendors/raphael/raphael.js",
            "public/vendors/morris.js/morris.js",
            "public/vendors/chartist/dist/chartist.js",
            "public/vendors/chart.js/dist/Chart.bundle.js",
            "public/vendors/js/framework/components/plugins/charts/chart.init.js",
            "public/vendors/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js",
            "public/vendors/vendors/jquery-idletimer/idle-timer.min.js",
            "public/vendors/waypoints/lib/jquery.waypoints.js",
            "public/vendors/counterup/jquery.counterup.js",
            "public/vendors/es6-promise-polyfill/promise.min.js",
            "public/vendors/sweetalert2/dist/sweetalert2.min.js",
            "public/vendors/js/framework/components/plugins/base/sweetalert2.init.js",
            // "public/vendors/wizard/wizard.js",
            // "public/assets/demo/custom/crud/wizard/wizard.js",
            "public/assets/snippets/custom/pages/user/login.js",
            "public/vendors/jquery-validation/dist/jquery.validate.min.js",

            "public/assets/vendors/custom/datatables/datatables.bundle.js",
            "public/assets/demo/default/custom/crud/datatables/basic/headers.js",
            "public/share/progressbar.js",
            "public/share/nprogress.js",
            "public/moment/vi.min.js",
            "public/config_firebase/firebase.js",
            "public/config_firebase/firebase-analytics.js",
            "public/axios/axios.min.js",
            "public/assets/vendors/custom/jquery-ui/jquery-ui.bundle.js"

        ],
        "public/js/all.js"
    )
    .version();
