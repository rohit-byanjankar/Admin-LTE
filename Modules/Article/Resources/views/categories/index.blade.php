@extends('adminlte::page')
@section('content')
    @can('create',\Modules\Article\Entities\Category::class)
        <div class="margin-bottom">
            <a href="{{ route('categories.create')}}" class="btn btn-success float-right ">
                Add Category
            </a>
        </div>
    @endcan

    <div class="card card-body panel">
    @if($categories->count()>0)
        <table class="table table-bordered table-hover panel-body" id="category">
            <thead>
                <th>Name</th>
                <th>POSTS COUNT</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->posts->count()}}</td>
                    <td>
                        @can('update',\Modules\Article\Entities\Category::class)
                        <a href=" {{ route('categories.edit', $category->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        @endcan
                        @can('delete',\Modules\Article\Entities\Category::class)
                        <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('categories.destroy', $category->id) }}" method="post" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                            </button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
            @else
            <h3 class="text-center"> No Categories Yet. </h3>
            @endif
    </div>
@endsection
@section('scripts')
<script>
     $(function () {
        $("#category").DataTable();
     });
</script>
@endsection
