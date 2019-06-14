@extends('adminlte::page')

@section('content')
        <div class="row margin">
            <a href="{{ route('directory.create')}}" class="btn btn-success float-right ">
                 Add directory
            </a>
         </div>
                @if($phoneDirectory->count()>0)
                    <div class="col-md-12 card card-body panel">
                        <table class="table table-hover table-bordered"  id="directory">
                            <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>City</th>
                                <th>Street</th>
                                <th>Home Number</th>
                                <th>Mobile Number</th>
                                <th>Office Number</th>
                                <th>Profession</th>
                                <th></th>
                            </tr>
                            </thead>
                            @foreach($phoneDirectory as $list)
                                <tbody>
                                <tr>
                                    <td>{{$list->first_name.' '.$list->middle_name.' '.$list->surname}}</td>
                                    <td>{{$list->city}}</td>
                                    <td>{{$list->street}}</td>
                                    <td>{{$list->home_number}}</td>
                                    <td>{{$list->mobile_number}}</td>
                                    <td>{{$list->office_number}}</td>
                                    <td>{{$list->profession}}</td>
                                    <td>
                                        <a href=" {{ route('directory.edit', $list->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                        <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('directory.destroy' ,$list->id) }}" method="post" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                  @else
                <h3 class="text-center">
                    No Directory Yet
                </h3>
                @endif
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#directory').DataTable();
        } );
    </script>
@endsection