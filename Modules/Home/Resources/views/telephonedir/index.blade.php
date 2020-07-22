<head>
<style>
	

    .fl-table {
        border-radius: 5px;
        font-size: 15px;
        font-weight: normal;
        border: none;
        border-collapse: collapse;
        width: 100%;
        max-width: 100%;
        white-space: nowrap;
        background-color: white;
        margin-top: 15px;
    }

    .fl-table td,
    .fl-table th {
        text-align: center;
        padding: 8px;
    }

    .fl-table td {
        border-right: 1px solid #f8f8f8;
        font-size: 12px;
    }

    .fl-table thead th {
        color: #ffffff;
        background: #4FC3A1;
    }

    .fl-table thead th:nth-child(odd) {
        color: #ffffff;
        background: #324960;
    }

    .fl-table tr:nth-child(even) {
        background: #F8F8F8;
    }

    /* Responsive */

    @media (max-width: 767px) {
        .fl-table {
            display: block;
            width: 100%;
        }

        .table-wrapper:before {
            content: "Scroll horizontally >";
            display: block;
            text-align: right;
            font-size: 11px;
            color: white;
            padding: 0 0 10px;
        }

        .fl-table thead,
        .fl-table tbody,
        .fl-table thead th {
            display: block;
        }

        .fl-table thead th:last-child {
            border-bottom: none;
        }

        .fl-table thead {
            float: left;
        }

        .fl-table tbody {
            width: auto;
            position: relative;
            overflow-x: auto;
        }

        .fl-table td,
        .fl-table th {
            padding: 20px .625em .625em .625em;
            height: 60px;
            vertical-align: middle;
            box-sizing: border-box;
            overflow-x: hidden;
            overflow-y: auto;
            width: 120px;
            font-size: 13px;
            text-overflow: ellipsis;
        }

        .fl-table thead th {
            text-align: left;
            border-bottom: 1px solid #f7f7f9;
        }

        .fl-table tbody tr {
            display: table-cell;
            
        }

        .fl-table tbody tr:nth-child(odd) {
            background: none;
        }

        .fl-table tr:nth-child(even) {
            background: transparent;
        }

        .fl-table tr td:nth-child(odd) {
            background: #F8F8F8;
            border-right: 1px solid #E6E4E4;
        }

        .fl-table tr td:nth-child(even) {
            border-right: 1px solid #E6E4E4;
        }

        .fl-table tbody td {
            display: block;
            text-align: center;
        }
    }
</style>
</head>
@extends('layouts.master')
@section('content')
<div>
    <!-- has to be ul tag to work jquery tab -->
    <!-- category tab -->
    <div class="row">
       
        <div class="col-lg-2" style='margin-top:5%'>
            <div class="card card-header bg-dark">
                <h3 class="text-center text-white"> Categories <i class="fa fa-book"></i></h3>
            </div>
            <ul>
                @foreach($categories as $category)
                <li class="card card-body">
                    <div>
                        <a href="{{route('telephonecat',$category->id)}}">
                            {{ $category->name}} ({{$category->phoneDirectory->count()}})
                        </a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        
        <div class="col-lg-10 card-body" style="margin-top:5%">
        <table class="table table-hover table-bordered fl-table" id="directory">
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
                                 @foreach($directories as $list)
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
        <!-- div close of tab -->
    </div>
    <!-- end of category tab -->
</div>
<!-- the middle part -->
@endsection
@section('scripts')
<script>
$(document).ready( function () {
    $('#directory').DataTable();
} );
</script>
@endsection