@if ($errors->any())
    <div class="alert alert-danger alert-dismissable col-md-12 text-center">
            @foreach ($errors->all() as $error)
                <div class="mb-2">{{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach
    </div>
@endif

