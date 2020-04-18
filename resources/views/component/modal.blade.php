<div class="bootstrap-modal">
    <div id="{{ $modal_id ?? '' }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog {{ $modal_size ?? '' }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $modal_title ?? '' }}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ $modal_body ?? '' }}
                </div>
                <div class="modal-footer">
                    {{ $modal_footer ?? '' }}
                </div>
            </div>
        </div>
    </div>
</div>
