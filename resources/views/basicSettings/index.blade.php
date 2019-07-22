@extends('adminlte::page')
@section('content')
    @can('create',\App\Settings::class)
    <div class="margin-bottom">
        <a href="{{ route('settings.create')}}" class="btn btn-success ">
            Add settings
        </a>
    </div>
    @endcan

@if($settings->count()>0)
    <div class="card card-body panel">
        <table class="table table-bordered table-hover panel-body" id="settings">
            <thead>
                <th>Key</th>
                <th>Value</th>
                <th></th>
            </thead>
            <tbody>
            @foreach($settings as $setting)
                <tr>
                    <td>{{ $setting->key}}</td>
                    <td>{{ $setting->value}}</td>
                    <td>
                        @can('update',$setting)
                        <a href=" {{ route('settings.edit', $setting->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        @endcan
                        @can('delete',$setting)
                        <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('settings.destroy' ,$setting->id) }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="fa fa-trash-o"></i></button>
                        </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
        <h3 class="text-center">
            Nothing to Show!
        </h3>
    </div>
@endif
@endsection
@section('scripts')
<script>
    $(function() {
        $("#settings").DataTable();
    });
</script>
@endsection