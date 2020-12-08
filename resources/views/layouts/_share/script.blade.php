<script src="{!! asset('js/all.js') !!}" type="text/javascript"></script>
<script>
			$('body').show();
			NProgress.start();
			setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 2000);

			if("{{ Illuminate\Support\Facades\Auth::user()->profile->lop_id != 0 || Illuminate\Support\Facades\Auth::user()->profile->lop_id != null}}" ){
				$('.isClass').removeClass("d-none");
			}

			$( function() {
					$('#ul-home').draggable({ opacity: 0.7, helper: "clone" });
					$( "#sortable" ).sortable({
					revert: true
					});
			});
</script>
