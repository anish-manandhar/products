<div class="modal fade text-sm" id="ModalShow{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-success font-weight-bold">{{ __('Category Details') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content between align-items-center">
                    <p class="font-weight-bold">Name :</p>
                    <p>&nbsp;{{ $data->name }}</p>
                </div>
                <div class="d-flex justify-content between align-items-center">
                    <p class="font-weight-bold">Description :</p>
                    <p>&nbsp;{{ $data->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
