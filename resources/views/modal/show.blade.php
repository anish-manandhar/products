<div class="modal fade text-sm" id="ModalShow{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @if (url()->current() == route('category.index'))
                    <h4 class="modal-title text-success font-weight-bold">{{ __('Category Details') }}</h4>
                @elseif(url()->current() == route('subcategory.index'))
                    <h4 class="modal-title text-success font-weight-bold">{{ __('Sub Category Details') }}</h4>
                @endif
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

                @if ($data->category_id)
                <div class="d-flex justify-content between align-items-center">
                <p class="font-weight-bold">Category :</p>
                <p>&nbsp;{{ $data->category->name }}</p>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
