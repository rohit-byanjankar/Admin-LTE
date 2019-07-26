@extends('adminlte::page')
@section('content')
    <div class="margin-bottom">
        <a href="{{ route('purchase.create')}}" class="btn btn-success ">
            Create Purchase Bill
        </a>
    </div>

    <div class="card card-body panel">
        @if($purchase->count()>0)
            <table class="table table-bordered table-hover panel-body" id="purTable">
                <thead>
                    <th>Biller</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Pan Number</th>
                    <th></th>
                </thead>
            <tbody>
            @foreach($purchase as $pur)
                <tr>
                    <td>{{$pur->biller}}</td>
                    <td>{{$pur->address}}</td>
                    <td>{{$pur->phone_number}}</td>
                    <td>{{$pur->pan_number}}</td>
                    <td>
                        <a href=" {{ route('purchase.show', $pur->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                        <a href=" {{ route('purchase.edit', $pur->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('purchase.destroy' ,$pur->id) }}" method="post" style="display:inline">
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
        $("#purTable").DataTable();
    });
</script>
@endsection