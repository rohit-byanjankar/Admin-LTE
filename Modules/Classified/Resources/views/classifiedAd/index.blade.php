@extends('adminlte::page')
@section('content')
@can('create',\Modules\Classified\Entities\Classified::class)
<div class="margin-bottom">
    <a href="{{ route('adminclassified.create')}}" class="btn btn-success ">
        Add Classified Ads
    </a>
</div>
@endcan

<div class="card card-body panel">
    @if($classifieds->count()>0)
    <table class="table table-bordered table-hover panel-body" id="post">
        <thead>
            <th>Title</th>
            <th>Image</th>
            <th>Category</th>
            <th>Posted By</th>
            <th>Status</th>
            <th></th>
        </thead>
        <tbody>
        @foreach($classifieds as $classified)
            <tr>
                <td>{{ $classified->title}}</td>
                <td>
                    <a href="{{ route('adminclassified.show',$classified->id)}}">
                        <img src="{{ asset($classified->image) }}" alt="" width="90px" height="100px">
                    </a>
                </td>
                <td>
                   {{-- {{$categories[0]->classifiedCategory->name}}--}}
                </td>
                <td>{{$classified->user->name}}</td>
                <td>
                    @if($classified->approved==0)
                    <form action="{{ route('adminclassified.verify-ad', $classified->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" name="approve" value="verified Ad" class="btn btn-success btn-sm">
                            Verify Ad Post
                        </button>
                    </form>
                    @else
                    <p class="text-success"> This Classified Ad is approved. </p>
                    @endif
                </td>
                <td>
                    @can('view',$classified)
                    <a href=" {{ route('adminclassified.show', $classified->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                    @endcan
                    @can('delete',$classified)
                    <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('adminclassified.destroy' ,$classified->id) }}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="fa fa-trash-o"></i></button>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h3 class="text-center">
        Nothing to Show!
    </h3>
    @endif
</div>
@endsection
@section('scripts')
<script>
    $(function() {
        $("#post").DataTable();
    });
</script>
@endsection