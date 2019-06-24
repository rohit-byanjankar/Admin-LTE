@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card card-header">
            <h3> Categories </h3>
        </div>
        <div id="tabs" class="row">
        
            <div class="col-md-3">
                    @foreach($categories as $category)
                        <div class="card card-body">
                            <a href="#tabs-{{$category->id}}">
                                {{ $category->name }} <br />
                            </a>
                        </div>
                    @endforeach
            </div>

    
                <!-- the middle part -->
                    @foreach($groupedContacts as $category)
                    <div id="tabs-{{$category['id']}}">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>City</th>
                                    <th>Street</th>
                                    <th>Home Number</th>
                                    <th>Mobile Number</th>
                                    <th>Office Number</th>
                                    <th>Profession</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category['list'] as $list)
                                <tr>
                                    <td>{{$list->first_name.' '.$list->middle_name.' '.$list->surname}}</td>
                                    <td>{{$list->city}}</td>
                                    <td>{{$list->street}}</td>
                                    <td>{{$list->home_number}}</td>
                                    <td>{{$list->mobile_number}}</td>
                                    <td>{{$list->office_number}}</td>
                                    <td>{{$list->profession}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endforeach
        </div>
            <!-- div close of tab -->
    </div>
@endsection










@section('scripts')
<script>
    $(function() {
        $("#tabs").tabs();
    });
</script>
@endsection