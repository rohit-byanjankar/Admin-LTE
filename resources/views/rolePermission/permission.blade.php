@extends('adminlte::page')

@section('content')
    <h1 class="text-dark text-center text-bold">MANAGE PERMISSIONS</h1>
    {{--@dd($permissions)--}}

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

        $per_array=[];
        foreach ($permission_array as $array)
            foreach ($array as $a)
                foreach ($a as $b)
                {
                    $per_array[]=$b;
                }
                    //print_r($per_array);
     //  print_r($permission_array);
    @endphp
    <div class="container">
        <form action="{{url('role-permission-save')}}" method="post">
            {{csrf_field()}}
          {{--  @foreach($roles as $role)
                <h2 class="text-bold text-light-blue">Permission for {{$role->role}}</h2>
            @foreach($permissions as $model=>$permission)
                <h2 class="text-bold">{{$model}}</h2>
                @foreach($permission as $key=>$p)
                    <div class="checkbox">
                        <label><input type="checkbox" value="{{$key}}" name="checked[]" {{in_array($p,$per_array)== true ? 'checked' : ''}}>{{$p}}</label>
                            <input type="hidden" value="{{$role}}" name="role[]" >
                        <input type="hidden" value="{{$p}}" name="permission_granted[]" >
                        <input type="hidden" value="{{$model}}" name="model[]" >
                    </div>
                        @endforeach
                @endforeach
            @endforeach--}}

            @foreach($permission_array as $role=>$models)
                    <h2 class="text-bold">Permission for {{$role}}</h2>
                    @foreach($models as $model=>$permission)
                        <h2 class="text-bold">{{$model}}</h2>
                                @foreach($permission as $per)
                            <div class="checkbox">
                                <label><input type="checkbox" value="{{$per}}" name="checked[]" >{{$per}}</label>
                                <input type="hidden" value="{{$role}}" name="role[]">
                                <input type="hidden" value="{{$model}}" name="model[]">
                            </div>
                    @endforeach
                    @endforeach
                    @endforeach

            <h2>IF LOOPED FROM PERMISSIONS ARRAY</h2>
                    @foreach($permissions as $model=>$per)
                                    <h1>{{$model}}</h1>
                                    @foreach($per as $p)
                                <div class="checkbox">
                                    <label><input type="checkbox" value="{{$p}}" name="checked[]" {{in_array($p,$per_array)==true ? 'checked' : ''}}>{{$p}}</label>
                                    <input type="hidden" value="writer" name="role[]">
                                    <input type="hidden" value="{{$model}}" name="model[]">
                                </div>

            @endforeach
            @endforeach
          {{--  @endforeach
            @endforeach
            @endforeach--}}
    <input type="submit" value="Save">
        </form>
    </div>
@endsection

