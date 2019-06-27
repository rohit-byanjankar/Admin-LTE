@extends('adminlte::page')


@section('content')
        <div class="d-flex justify-content-end margin">
            @can('create',\Modules\TelephoneDirectory\Entities\PhoneCategory::class)
                <a href="{{ route('category.create')}}" class="btn btn-success float-right ">
                    Add Category
                </a>
             @endcan
        </div>

    <div class="card card-body panel">
    @if($categories->count()>0)
        <table class="table table-bordered table-hover panel-body" id="category">
            <thead>
                <th>Name</th>
                <th>NUMBERS COUNT</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->phoneDirectory->count()}}</td>
                    <td>
                        @can('update',\Modules\TelephoneDirectory\Entities\PhoneCategory::class)
                        <a href=" {{ route('category.edit', $category->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        @endcan
                        @can('delete',\Modules\TelephoneDirectory\Entities\PhoneCategory::class)
                        <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('category.destroy', $category->id) }}" method="post" class="inline">
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
