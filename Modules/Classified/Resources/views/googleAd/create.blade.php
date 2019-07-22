@extends('adminlte::page')
@section('content')
<div class="card card-default">
    <div class=" card-header text-bold ">
        {{ isset($classifieds) ? 'Edit Google Ad' : 'Create Google Ad' }}
    </div>
    <div class="card-body">
        <form action="{{ isset($classifieds) ? route('googleadsense.update', $classifieds->id) : route('googleadsense.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($classifieds))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="code">Code </label>
                <textarea name="code" id="code" cols="5" rows="5" class="form-control" required>
                {{ isset($classifieds) ? $classifieds->code : ''}}
                </textarea>
            </div>

            <div class="form-group">
                <label for="description">Description </label>
                <textarea name="description" id="description" cols="5" rows="5" class="form-control" required>
                {{ isset($classifieds) ? $classifieds->description : ''}}
                </textarea>
            </div>
            
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-success">
                    {{ isset($classifieds) ? 'EDIT google Ad' : 'CREATE NOW!' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
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