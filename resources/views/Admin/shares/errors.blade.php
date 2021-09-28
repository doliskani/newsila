
@if(count($errors) > 0)
    <div class="errors w-100  text-danger">
        <ul>
            @foreach($errors->all() as $error)
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    <span>
                        {{ $error }}
                    </span>
                </div>

            @endforeach
        </ul>
    </div>

@endif