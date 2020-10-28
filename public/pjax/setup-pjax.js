$(function () {
    // pjax
    $(document).pjax('a', '#pjax-container')
})
$(document).ready(function () {

    // does current browser support PJAX
    if ($.support.pjax) {
        $.pjax.defaults.timeout = 1000; // time in milliseconds
    }

});