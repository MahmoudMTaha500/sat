@if (session()->has('alert_message'))

<div class="modal fade" id="website_notifications" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body py-5 px-4 text-center">
                @if (session()->get('alert_message')['type'] == 'success')
                <div class="cheched-img">
                    <img src="{{asset('website/imgs/checked.png')}}" alt="" class="img-fluid" />
                </div>
                @endif

                <h3 class="text-main-color font-weight-bold">{{session()->get('alert_message')['title']}}</h3>
                <div class="cheched-heading">
                    {!! session()->get('alert_message')['body'] !!}
                </div>
                <button data-dismiss="modal" class="btn w-100 bg-white text-secondary-color border-secondary-color px-5 rounded-10 mb-4">الغاء</button>
            </div>
        </div>
    </div>
</div>
<script>
    $("#website_notifications").modal("show");
</script>

{{ session()->forget('alert_message') }} @endif
