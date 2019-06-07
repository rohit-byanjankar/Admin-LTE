@extends('adminlte::page')

@section('content')
    <h1 class="text-dark text-center text-bold">MANAGE PERMISSIONS</h1>
    @php
        $permission_array=[];
        foreach ($roles as $permission){
    {
        $role=$permission->role;
        if(!isset($permission_array[$role])){
            $permission_array[$role]=[];
        }
        $model=$permission->model;
        if(!isset($permission_array[$role][$model])){
            $permission_array[$role][$model]=[];
        }
        $permission_granted=$permission->permission_granted;
        array_push($permission_array[$role][$model],$permission_granted);
    }
        }
    @endphp
    <div class="container">
        <form action="{{url('role-permission-save')}}" method="post">
            {{csrf_field()}}
                <h2 class="text-bold text-light-blue">Permission for {{$roleName}}</h2>
            @foreach($permissions as $model=>$permission)
                <h2 class="text-bold">{{$model}}</h2>
                @foreach($permission as $per)
                    <div class="checkbox">
                        <label><input type="checkbox" value="{{$per}}" name="checked[]"
                {{$model==$modelName && Helper::check($per,$roleName,$modelName,$permission_array)== true ? 'checked':''}}
                            >{{$per}}</label>
                        <input type="hidden" value="{{$roleName}}" name="role[]" >
                        <input type="hidden" value="{{$per}}" name="permission_granted[]" >
                        <input type="hidden" value="{{$model}}" name="model[]" >
                    </div>
                        @endforeach
                @endforeach

    <input type="submit" value="Save">
        </form>
    </div>
@endsection



