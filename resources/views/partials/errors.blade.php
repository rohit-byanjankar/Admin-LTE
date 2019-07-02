@if($errors-> any())
            <div class="alert alert-danger  text-center alert-dismissible">
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="list-group-item text-danger">
                            {{$error}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" class="text-white">&times;</span>
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

