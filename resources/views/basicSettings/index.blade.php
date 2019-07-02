@extends('adminlte::page')

@section('content')
    @can('create',\Modules\Article\Entities\Post::class)
    <div class="d-flex justify-content-end margin">
        <a href="{{ route('settings.create')}}" class="btn btn-success ">
            Add settings
        </a>
    </div>
    @endcan

    <div class="card card-body panel">
        @if($settings->count()>0)
            <table class="table table-bordered table-hover panel-body" id="post">
                <thead>
                    <th>Key</th>
                    <th>Value</th>
                    <th></th>
                </thead>
            @foreach($settings as $setting)
            <tbody>
                <tr>
                    <td>{{ $setting->key}}</td>
                    <td>{{ $setting->value}}</td>
                    <td>
                        <a href=" {{ route('settings.edit', $setting->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('settings.destroy' ,$setting->id) }}" method="post" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash-o"></i></button>
                            </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h3 class="text-center">
            Nothing to Show!
        </h3>
        @endif
    </div>
@endsection
@section('scripts')
<script>
    $(function() {
        $("#post").DataTable();
    });
</script>
@endsection