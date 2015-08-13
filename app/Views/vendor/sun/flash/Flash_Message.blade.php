@if(Session::has('flash_notification.message'))
    @if(Session::pull('flash_notification.overlay'))
    <div class="modal modal-success fade flash-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ Session::get('flash_notification.title') }}</h4>
                </div>
                <div class="modal-body">
                    <p>{{ Session::pull('flash_notification.message') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-{{ Session::get('flash_notification.dismissType') }}" data-dismiss="modal">{{ Session::get('flash_notification.dismissText') }}</button>
                    @if(Session::get('flash_notification.submitButton') == true)
                        <button type="button" class="btn btn-{{ Session::get('flash_notification.allowType') }}">{{ Session::get('flash_notification.allowText') }}</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="alert alert-{{ Session::get('flash_notification.level') }} fade in alert-slideup">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p>{{ Session::pull('flash_notification.message') }}</p>
    </div>
    @endif
@endif