@extends('layouts.master')

@section('content')

<div class="container">

    <div id="tabs">


        <!-- has to be ul tag to work jquery tab -->


        <!-- category tab -->
        <div class="container">


            <div class="col-12">
                <div class="col-lg-3 pull-right margin mt-3">
                    <div class="card card-header bg-secondary">
                        <h3 class="text-center text-white"> Categories <i class="fa fa-book"></i> </h3>

                    </div>
                    <ul>
                        @foreach($categories as $category)
                        <li>
                            <div class="card card-body">
                                <a href="#tabs-{{$category->id}}">
                                    {{ $category->name }} <br />
                                </a>
                            </div>

                            @endforeach

                        </li>
                    </ul>
                </div>

                <div class="col-lg-9 pt-3 center pl-5">


                    @foreach($groupedContacts as $category)
                    <div id="tabs-{{$category['id']}}" class="table-wrapper">
                        <table class="fl-table ">

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
    </div>
</div>




<!-- the middle part -->



@endsection










@section('scripts')
<script>
    $(function() {
        $("#tabs").tabs();
    });
</script>
@endsection