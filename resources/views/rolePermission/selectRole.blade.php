@extends('adminlte::page')
@section('content')
    <div class="container">
            @csrf
            <div class="container">
                <h2 class="text-danger align-content-center ">Permissions</h2>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Role</th>
                        <th></th>
                    </tr>
                    </thead>
                    @foreach($roles as $role)
        <form action="{{url('rolePermission/'.$role->role)}}" method="post">
            @csrf
                    <tbody>
                    <tr>
                        <td>{{$role->name}}</td>
                       <td><button class="btn btn-facebook">View Permission</button></td>
                    </tr>
                    </tbody>
                     <input type="hidden" value="{{$role->name}}" name="roleID">
        </form>
                    @endforeach
                </table>
            </div>
    </div>
@endsection
