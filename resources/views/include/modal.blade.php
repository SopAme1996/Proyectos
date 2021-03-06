<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ $title }}</h5>
                <button type="button" class="btn_close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class='icon'>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                {{ $message}}
            </div>
            <div class="modal-footer">
                <a href="{{ route('image.delete', ['id'=> $image->id]) }}" class="btn btn-primary">{{ $done }}</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ $close }}</button>
            </div>
        </div>
    </div>
</div>