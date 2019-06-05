@extends('adminlte::page')


@section('content')


<div class="card card-default">
    <div class="card card-header text-left text-bold mt-1">
        <h1>Tags</h1>
        <div class="d-flex justify-content-end">
            <a href="{{ route('tags.create')}}" class="btn btn-success float-right ">
                Add tag
            </a>
        </div>
    </div>

    <div class="card card-body">
        @if($tags->count()>0)
        <table class="table" id="tag">
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
                @foreach($tags as $tag)
                <tr>
                    <td>
                        {{ $tag->name }}
                    </td>

                    <td> 
                        {{ $tag->posts->count() }}
                    </td>

                    <td>
                        <a href="{{ route('tags.edit', $tag->id)}}" class="btn btn-info btn-sm float-right"> Edit </a>
                        <button  class="btn btn-danger btn-sm float-right" onclick="handleDelete({{ $tag->id }})"> Delete </button>
                    </td>

                    
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="" method="POST" id="deletetagForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">DELETE?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-bold">
                             You will lose this forever.
                            </p>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Yes,Delete </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">NO,GO BACK</button>
                           
                        </div>
                    </div>
                </form>
            </div>
            </div>
            @else
            <h3 class="text-center"> No Tags Yet. </h3>
            @endif
    </div>
</div>
@endsection

@section('scripts')
<script>
    function handleDelete(id) 
    {
        

        var form = document.getElementById('deletetagForm')
        form.action = '/tags/'+ id

        console.log('deleting.', id)

        $('#deleteModal').modal('show')
    }

        $(function () {
        $("#tag").DataTable();
        });


 
</script>

@endsection


