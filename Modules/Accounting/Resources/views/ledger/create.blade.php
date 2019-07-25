@extends('adminlte::page')
@section('content')
<div class="card card-default">
    <div class=" card-header text-bold ">
        {{ isset($ledger) ? 'Edit Ledger' : 'Create Ledger' }}
    </div>

    <div class="card-body">
        @include('partials.errors')
        <form action="{{ isset($ledger) ? route('ledger.update', $ledger->id) : route('ledger.store') }}" method="POST">
            @csrf
            @if(isset($ledger))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="ledger_code"> Ledger Code </label>
                <input type="text" class="form-control" name='ledger_code' value="{{ isset($ledger) ? $ledger->ledger_code : ''}}">
            </div>

            <div class="form-group">
                <label for="ledger_name"> Ledger Name</label>
                <input type="text" class="form-control" name='ledger_name' value="{{ isset($ledger) ? $ledger->ledger_name: ''}}">
            </div>

            <div class="form-group">
                <label for="type"> Type</label>
                <select name="type"  class="form-control">
                        <option value="1">Personal Ledger</option>
                        <option value="2">Office Ledger</option>
                </select>
               {{-- @foreach($categories as $category)
                <option value=" {{ $category->id}} "
                                @if(isset($phoneDirectory))
                                @if($category->id == $phoneDirectory->phone_category_id)
                                selected
                                @endif
                                @endif
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>--}}
            </div>

            @if(isset($request['backUrl']))
                <input type="hidden" name="backUrl" value="{{$request['backUrl']}}">
            @endif
            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    {{ isset($ledger) ? 'EDIT Ledger' : 'CREATE NOW!' }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr('#published_at', {
        enableTime: true
    })

    $(document).ready(function() {
        $('.tags-selector').select2();
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>




@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />


@endsection