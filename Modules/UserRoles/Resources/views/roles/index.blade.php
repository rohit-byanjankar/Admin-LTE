@extends('adminlte::page')

@section('content')
        <div class="d-flex justify-content-end margin">
            <a href="{{ route('roles.create')}}" class="btn btn-success ">
                Add Roles
            </a>
        </div>

    <div class="card card-body panel">
        @if($roles->count()>0)
        <table class="table table-bordered table-hover" id="role">
            <thead>
                <th>Name</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a href=" {{ route('roles.edit', $role->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('roles.destroy' ,$role->id) }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
            @else
            <h3 class="text-center"> No roles Yet. </h3>
            @endif
    </div>
@endsection

@section('scripts')
<script>
        $(function () {
        $("#role").DataTable();
        });
</script>

@endsection

 
