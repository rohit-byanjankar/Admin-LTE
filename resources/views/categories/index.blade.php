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
        <table class="table">
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
                        <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-info btn-sm float-right"> Edit </a>
                        <button  class="btn btn-danger btn-sm float-right" onclick="handleDelete({{ $category->id }})"> Delete </button>
                    </td>

                    
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="" method="POST" id="deleteCategoryForm">
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
            <h3 class="text-center"> No Categories Yet. </h3>
            @endif
    </div>
</div>
@endsection

@section('scripts')
<script>
    function handleDelete(id)
    {
        

        var form = document.getElementById('deleteCategoryForm')
        form.action = '/categories/'+ id

        console.log('deleting.', id)

        $('#deleteModal').modal('show')
    }

</script>
@endsection
