@extends('adminlte::page')
@section('content')
<div class="card card-body panel">
    @if($users->count()>0)
    <table class="table  text-center  table-bordered table-hover panel-body" id="userTable">
        <thead class="text-bold">
            <th>Name</th>
            <th>Role</th>
            <th>Image</th>
            <th>Email</th>
            <th>Status</th>
            <th> Promoting Actions</th>
            <th> Account Actions</th>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name}}</td>
                <td>{{ $user->role}}</td>
                <td>
                    <img class="img-circle img-bordered-sm" height="90px" width="85px" src="{{url($user->image)}}" alt="">
                </td>
                <td>{{ $user->email }}</td>
                <td>
                    <form action="{{ route('users.verify-user', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                         @if(!$user->isVerified())
                            <button type="submit" name="activate" value="verifyUser" class="btn btn-success btn-sm">
                                Verify User
                            </button>
                        @endif
                        @if(!$user->isDeactivated())
                            <button type="submit" name="activate" value="activateUser" class="btn btn-success btn-sm">
                             Re-Activate User
                            </button>
                     </form>
                        @endif
                    @if($user->isVerified() && $user->isDeactivated())
                    <p class="text-aqua">Activated</p>
                    @endif
                </td>
                <td>
                    @if(!$user->isAdmin())
                    <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success btn-sm">
                            Make SuperAdmin
                        </button>
                    </form>
                    @else
                    <p class="text-aqua">This person is SuperAdmin.</p>
                    @endif
                </td>

                <td>
                    <form action="{{ route('users.deactivate-user', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        @if($user->deactivated == 0)
                        
                        <button type="submit" class="btn btn-danger btn-sm">
                            Deactivate User
                        </button>
                        

                        @elseif($user->deactivated == 1)
                        
                        <p class="text-danger">This user is deactivated</p>
                        
                        @endif
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else
    <h3 class="text-center">
        No Users yet.
    </h3>
    @endif
</div>
@endsection
@section('scripts')
<script>
    $(function() {
        $("#userTable").DataTable();
    });
</script>
@endsection