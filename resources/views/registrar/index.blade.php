@extends('adminlte::page')
@section('content')
    <div class="margin-bottom">
        <a href="{{ route('registrar.create')}}" class="btn btn-success ">
            Add Registrar
        </a>
    </div>

@if($settings->count()>0)
    <div class="card card-body panel">
        <table class="table table-bordered table-hover panel-body" id="registrar">
            <thead>
                <th>Community-Name</th>
                <th>Database-Name</th>
                <th>Community-Url</th>
                <th></th>
            </thead>
            <tbody>
            @foreach($settings as $setting)
                <tr>
                    <td>{{ $setting->community_name}}</td>
                    <td>{{ $setting->database_name}}</td>
                    <td>{{ $setting->community_url}}</td>
                    <td>
                        <a href=" {{ route('registrar.edit', $setting->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('registrar.destroy' ,$setting->id) }}" method="post" style="display:inline">
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
    </div>
@endif
@endsection
@section('scripts')
<script>
    $(function() {
        $("#registrar").DataTable();
    });
</script>
@endsection