@extends('adminlte::page')


@section('content')
        <div class="d-flex justify-content-end margin">
            <a href="{{ route('adcategory.create')}}" class="btn btn-success float-right ">
                Add Category
            </a>
        </div>

    <div class="card card-body panel">
    @if($adcategories->count()>0)
        <table class="table table-bordered table-hover panel-body" id="category">
            <thead>
                <th>
                    Name
                </th>
                <th>
                    Ads Count
                </th>
                <th></th>
            </thead>
            <tbody>
                @foreach($adcategories as $adcategory)
                <tr>
                    <td>{{ $adcategory->name }}</td>
                    <td>s</td>
                    <td>
                        <a href=" {{ route('adcategory.edit', $adcategory->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('adcategory.destroy', $adcategory->id) }}" method="post" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                            </button>
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
@endsection
@section('scripts')
<script>
     $(function () {
        $("#category").DataTable();
     });
</script>
@endsection
