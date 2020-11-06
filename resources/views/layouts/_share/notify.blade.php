<style>
    .item-notifi:hover{
        background: #d0e7ff;
    }
</style>
<script src="{{ asset('firebase/firebaseConfig.js') }}"></script>
<script>
    firebase.initializeApp(firebaseConfig);
    var db = firebase.database().ref().child("notification").orderByChild("user_id");

    db.on("value", (snap) => {
        var res = Object.values(snap.val());
        console.log(res);
        var content = '';
        var count = 0;
        for (let i = res.length - 1; i >= 0; i--) {
            if (res[i].user_id == '{{ Illuminate\Support\Facades\Auth::id() }}') {
                // axios.get('https://httpbin.org/get')
                // .then(function (response) {
                //    console.log('apitsst',response.data)
                // })
                // .catch(function (error) {
                //     // handle error
                //     console.log(error);
                // })
                // .then(function () {
                //     // always executed
                // });
                count = (res[i].type == 1 && res[i].bell == 1) ? ++count : count;
                let relativeTime = getMinimalisticRelativeTime(res[i].created_at);
                content += `
                            <div data-id="${res[i].id}" 
                                 data-href='${res[i].route}'
                                 data-type="${res[i].type}"
                                 onclick="linkTo(this)" 
                                 class="fc-event fc-event-external ${res[i].type == 1 ? 'fc-start m-fc-event--primary':''} m--margin-bottom-15 ui-draggable ui-draggable-handle item-notifi">
								 <div class="fc-title">
									<div class="fc-content"><span class="${res[i].type == 1 ? 'm--font-boldest':'m-section__sub'}">${res[i].title}</span><hr><span class="m--font-info">${relativeTime}</span></div>
								 </div>
							</div>
							`;
            }
        }
        $('#box-notification').html(content);
        var notifi_html = count ? `<span class="m-nav__link-badge m-badge m-badge--danger">${count}+</span>` : '';
        $('#count_number_notifi').html(notifi_html);
    });

    function linkTo(element) {
        let data_id = element.getAttribute('data-id');
        let data_href = element.getAttribute('data-href');
        let link = JSON.parse(data_href);
        let data_type = element.getAttribute('data-type');
        let str_after_replace = data_href.replace('http://', '');
        var href = str_after_replace.substr(str_after_replace.indexOf("/"), str_after_replace.length - 1)
        window.location.href = route(link.route_name, link.params);

        if(data_type == 1 || data_type == '1'){
            isRead(data_id, 2);
        }
    }

    function isRead(id, type){
        firebase.database().ref('notification/' + id + '/type').set(type)

        axios.post("{{ route('notification.changeType') }}", {
            "_token": "{{ csrf_token() }}",
            "id": id,
            "type":type
        })
        .then(function (response) {
        })
        .catch(function (error) {
        });
    }

    function  getMinimalisticRelativeTime(time) {
        return moment(time).fromNow();       
    }

    $('#m_topbar_notification_icon').on('click',function(){
        $('#count_number_notifi').html('');
        db.once('value', function(snap) {
            var res = Object.values(snap.val());
            res.forEach(element => {
                if(element.user_id == '{{ Illuminate\Support\Facades\Auth::id() }}'){
                    firebase.database().ref('notification/' + element.id + '/bell').set(2)
                }
            });
        });
    });

</script>
