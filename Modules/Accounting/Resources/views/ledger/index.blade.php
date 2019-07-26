@extends('adminlte::page')
@section('content')
    <div class="margin-bottom">
        <a href="{{ route('ledger.create')}}" class="btn btn-success ">
            Create ledger
        </a>
    </div>

    <div class="card card-body panel">
        @if($ledger->count()>0)
            <table class="table table-bordered table-hover panel-body" id="ledgerTable">
                <thead>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th></th>
                    <th></th>
                </thead>
            <tbody>
            @foreach($ledger as $led)
                <tr>
                    <td>{{ $led->ledger_code}}</td>
                    <td>{{$led->ledger_name}}</td>
                    <td>{{$led->type}}</td>
                    <td>
                        <a href=" {{ route('ledger.show', $led->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                        <a href=" {{ route('ledger.edit', $led->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                    </td>
                    <td>
                            <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('ledger.destroy' ,$led->id) }}" method="post" style="display:inline">
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
        $("#ledgerTable").DataTable();
    });
</script>
@endsection