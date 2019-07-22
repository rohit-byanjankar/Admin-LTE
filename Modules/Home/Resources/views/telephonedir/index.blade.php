@extends('layouts.master')
@section('content')
    <div id="tabs">
        <!-- has to be ul tag to work jquery tab -->
        <!-- category tab -->
            <div class="row">
                <div class="col-md-2 mt-3">
                    <div class="card card-header bg-dark">
                        <h3 class="text-center text-white"> Categories <i class="fa fa-book"></i></h3>
                    </div>
                    <ul >
                        @foreach($categories as $category)
                        <li>
                            <div>
                                <a href="#tabs-{{$category->id}}" class="text-dark">
                                    {{ $category->name }}
                                </a>
                            </div>
                            @endforeach
                        </li>
                    </ul>
                </div>
                <div class="col-md-10 mt-2">
                    @foreach($groupedContacts as $category)
                    <div id="tabs-{{$category['id']}}" class="table-wrapper">
                        <table class="fl-table" >
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
            <!-- end of category tab -->
        </div>
<!-- the middle part -->
@endsection
@section('scripts')
<script>
    $(function() {
        $("#tabs").tabs();
    });

    $(function() {
        $("#telephone").DataTable();
    });
</script>
@endsection