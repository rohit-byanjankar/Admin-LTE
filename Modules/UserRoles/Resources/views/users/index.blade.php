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
                        <th></th>
                     </thead>
                     <tbody>
                        @foreach($users as $user)
                            <tr>
                               <td>
                                     {{ $user->name}}
                               </td> 
                              
                                <td>
                                    {{ $user->role}}
                                </td>
                                <td>
                                    <img class="img-circle img-bordered-sm" height="90px" width="85px" src="{{url($user->image)}}" alt="">
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                   @if(!$user->isVerified())
                                    <form action="{{ route('users.verify-user', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" name="activate" value="verifiedUser" class="btn btn-success btn-sm">
                                            Verify User
                                        </button>
                                    </form>
                                    @endif
                                    @if(!$user->isDeactivated())
                                    <form action="{{ route('users.verify-user', $user->id) }}" method="POST" class="margin">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" name="activate" value="activatedUser" class="btn btn-success btn-sm">
                                            Activate User
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
    $(function () {
    $("#userTable").DataTable();
    });
</script>
@endsection


