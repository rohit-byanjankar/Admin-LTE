@extends('adminlte::page')
@section('content')
    <div class="margin-bottom">
        <a href="{{ route('sales.create')}}" class="btn btn-success ">
            Create Sales Bill
        </a>
    </div>

    <div class="card card-body panel">
        @if($sales->count()>0)
            <table class="table table-bordered table-hover panel-body" id="saleTable">
                <thead>
                    <th>Customer</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Pan Number</th>
                    <th></th>
                </thead>
            <tbody>
            @foreach($sales as $sale)
                <tr>
                    <td>{{$sale->customer}}</td>
                    <td>{{$sale->address}}</td>
                    <td>{{$sale->phone_number}}</td>
                    <td>{{$sale->pan_number}}</td>
                    <td>
                        <a href=" {{ route('sales.show', $sale->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                        <a href=" {{ route('sales.edit', $sale->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('sales.destroy' ,$sale->id) }}" method="post" style="display:inline">
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
@endsection
@section('scripts')
<script>
    $(function() {
        $("#saleTable").DataTable();
    });
</script>
@endsection