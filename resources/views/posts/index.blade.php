@extends('layouts.app')

@section('content')

        <div class="d-flex justify-content-end">
            <a href="{{ route('posts.create')}}" class="btn btn-success float-right ">
                Add Posts
            </a>
        </div>

        <div class="card card-default">
            <div class="card card-header">
                POSTS
            </div>
            <div class="card card-body">
                 <table class="table">
                     <thead>
                        <th>
                             Title
                         </th>
                         <th>
                             Image
                         </th>
                         
                     </thead>

                     <tbody>
                        
                        @foreach($posts as $post)
                            <tr>
                               

                                <td>
                                    {{ $post->title}}
                                </td>
                                <td>
                                  {{ $post->image}}
                                  <img src=" {{ asset($post->image)}} " alt=""> 
                                </td>
                            </tr>
                        @endforeach
                          
                     </tbody>
                 </table>
            </div>
        </div>

@endsection