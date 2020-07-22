@extends('adminlte::page')
@section('content')
    @can('create',\Modules\Article\Entities\Tag::class)
    <div class="d-flex justify-content-end margin">
        <a href="{{ route('tags.create')}}" class="btn btn-success float-right ">
            Add tag
        </a>
    </div>
    @endcan

    <div class="card card-body panel">
        @if($tags->count()>0)
        <table class="table table-hover table-bordered" id="tag">
            <thead>
                <th>Name</th>
                <th>POSTS COUNT</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->posts->count() }}</td>
                    <td>
                        @can('update',$tag)
                        <a href=" {{ route('tags.edit', $tag->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        @endcan
                        @can('delete',$tag)
                        <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('tags.destroy', $tag->id) }}" method="post" class="inline">
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
            <h3 class="text-center"> No Tags Yet. </h3>
            @endif
    </div>
@endsection

@section('scripts')
<script>
        $(function () {
        $("#tag").DataTable();
        });
</script>

@endsection


