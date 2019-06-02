@extends('adminlte::page')

@section('content')

        

        <div class="card card-default">
            <div class="card card-header">
                USERS
            </div>
            <div class="card card-body">
                @if($users->count()>0)
                <table class="table">
                     <thead>
                        <th>
                             Name
                         </th>
                         <th>
                             Role
                         </th>
                         <th>
                             Image
                         </th>
                         <th>
                             Email
                         </th>
                         <th></th>
                         <th></th>
                     </thead>

                     <tbody>
                        
                        @foreach($users as $user)
                            <tr>
                               

                                <td>
                                    {{ $user->name}}
                                </td>
                                <td>
                                    {{ $user->role}}
                                </td>
                                <td>
                                    <img style="border-radius : 50%" src="{{ Gravatar::src($user->email)}}" alt="">
                                  
                                
                                </td>

                                <td>
                                    {{ $user->email }}

                                    </a>
                                </td>

                               
                               
                               
                                <td>
                                   @if(!$user->isAdmin())
                                    <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">
                                            Make Admin
                                        </button>
                                    </form>
                                   @endif
                                </td>
                                
                            </tr>
                        @endforeach
                          
                     </tbody>
                 </table>
                @else
                <h3 class="text-center">
                    No Users yet.
                </h3>
                @endif
            </div>
        </div>

@endsection