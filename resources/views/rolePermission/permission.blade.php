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
  
        <form class="col-md-12" style="overflow: hidden;" action="{{url('role-permission-save')}}" method="post">
            {{csrf_field()}}
                <h2 class="text-bold text-light-blue">Permission for {{$roleName}}</h2>

                @php
                        $index=0;
                @endphp
            @foreach($permissions as $model=>$permission)

            <div class="col-md-4">
                <div class="box-header">
                <h2 class="box-title text-bold">{{$model}}</h2>
                </div>
                <div class="box-body">
                    
                @foreach($permission as $permission_granted)
                    <div class="checkbox">
                        <label><input type="checkbox" value="{{$index++}}" name="checked[]"
                {{Helper::check($permission_granted,$roleName,$model,$permission_array)== true ? 'checked':''}}
                            >{{$permission_granted}}</label>
                        <input type="hidden" value="{{$roleName}}" name="role[]" >
                        <input type="hidden" value="{{$permission_granted}}" name="permission_granted[]" >
                        <input type="hidden" value="{{$model}}" name="model[]" >
                    </div>
                        @endforeach
                    </div>
            </div>
            @endforeach
            <div class="col-md-12">
                <input type="submit" class="col-md-2 pull-right" value="Save">
            </div>
        </form>
@endsection



