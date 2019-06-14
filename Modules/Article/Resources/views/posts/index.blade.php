@extends('adminlte::page')

@section('content')

<div class="d-flex justify-content-end margin">
        <a href="{{ route('posts.create')}}" class="btn btn-success ">
            Add Posts
        </a>
</div>

<div class="card card-default">
    
    <div class="card card-body panel">
        @if($posts->count()>0)
        <table class="table table-bordered table-hover panel-body" id="post">
            <thead>
                <th>Title</th>
                <th>Image</th>
                <th>Category</th>
                <th></th>
                <th></th>


            </thead>
            @foreach($posts as $post)
            <tbody>
                <tr>
                    <td>{{ $post->title}}</td>
                    <td>
                        <a href="{{ route('posts.show',$post->id)}}">
                            <img src="{{ asset($post->image) }}" alt="" width="90px" height="100px">
                        </a>
                    </td>
                    <td>{{ $post->category->name}}</td>
                    @if($post->trashed())
                    <td>
                        <form action="{{ route('restore-posts', $post->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-info btn-sm"> <i class="fa fa-reply"></i> </button>
                        </form>
                    </td>

                    @else

                    <td>
                        <a href=" {{ route('posts.show', $post->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                      
                        <a href=" {{ route('posts.edit', $post->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                    </td>
                    @endif
                    
                    <td>
                        <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('posts.destroy' ,$post->id) }}" method="post" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash-o"></i></button>
                            </form>
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
</div>

@endsection

@section('scripts')
<script>
    $(function() {
        $("#post").DataTable();
    });
</script>
@endsection