@extends('adminlte::page')


@section('content')


<div class="card card-default">
    <div class="card card-header">
        Categories
        <div class="d-flex justify-content-end">
            <a href="{{ route('categories.create')}}" class="btn btn-success float-right ">
                Add Category
            </a>
        </div>
    </div>

    <div class="card card-body">
    @if($categories->count()>0)
        <table class="table" id="category">
            <thead>
                <th>
                    Name
                </th>
                <th>
                    POSTS COUNT
                </th>
                <th></th>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>
                        {{ $category->name }}
                    </td>

                    <td> 
                        {{ $category->posts->count()}} 
                    </td>

                    <td>
                        <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-info btn-sm float-right"> <i class="fa fa-edit"></i> </a>

                        <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('categories.destroy' ,$category->id) }}" method="post" style="display:inline">
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
            <h3 class="text-center"> No Categories Yet. </h3>
            @endif
    </div>
</div>
@endsection

@section('scripts')
<script>
    

    
            
     $(function () {
        $("#category").DataTable();
     });


</script>
@endsection
