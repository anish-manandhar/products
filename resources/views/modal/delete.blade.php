<div class="modal fade" id="ModalDelete{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-danger font-weight-bold">{{ __('Alert') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> You sure you want to delete ?</div>

            <div class="modal-footer">
                <button type="button" class="btn gray btn-outline-secondary"
                    data-dismiss="modal">{{ __('Cancel') }}</button>

                <form action="
                    @if (url()->current() == route('category.index'))
                    {{ route('category.destroy', $data->id) }}
                       @endif
                    " method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger" type="submit">{{ __('Delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
