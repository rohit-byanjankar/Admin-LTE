@extends('adminlte::page')

@section('content')

        <div class="d-flex justify-content-end">
           
            <a href="{{ route('posts.create')}}" class="btn btn-success float-right ">
                 Add Posts
            </a>
        </div>

        <div class="card card-default">
            <div class="card card-header">
                 
            </div>
            <div class="card card-body">
                @if($posts->count()>0)
                <table class="table" id="post">
                     <thead>
                        <th>
                             Title
                         </th>
                         <th>
                             Image
                         </th>
                         <th>
                             Category
                         </th>
                         <th></th>
                         <th></th>
                     </thead>

                     <tbody>
                        
                        @foreach($posts as $post)
                            <tr>
                               

                                <td>
                                    {{ $post->title}}
                                </td>
                                <td>
                                  
                                  <!-- <img src="{{ asset($post->image) }}" alt="img">  -->
                                  <img src="{{ asset($post->image) }}" alt="" width="90px">
                                </td>

                                <td>
                                    <a href="{{ route('categories.edit', $post->category->id ) }}">
                                    {{ $post->category->name}}

                                    </a>
                                </td>

                               
                               @if($post->trashed())
                                <td>
                                    <form action="{{ route('restore-posts', $post->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-info btn-sm"> RESTORE </button>

                                    </form>
                                    
                                </td>
                                @else
                               @can('update', $post)
                                <td>
                                    <a href=" {{ route('posts.edit', $post->id)}}" class="btn btn-info btn-sm"> Edit </a>
                                </td>
                                @endcan
                               @endif
                               
                                <td>
                                @can('delete', $post)
                                
                                   <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="btn btn-danger btn-sm"> 
                                           {{ $post->trashed() ? 'DELETE' : 'TRASH' }}
                                            
                                        </button>
                                   </form>
                                @endcan                                    
                                </td>
                                
                            </tr>
                        @endforeach
                          
                     </tbody>
                 </table>
                @else
                <h3 class="text-center">
                    No Trash Yet
                </h3>
                @endif
            </div>
        </div>

@endsection

@section('scripts')
<script>
 $(function () {
$("#post").DataTable();
});
</script>
@endsection