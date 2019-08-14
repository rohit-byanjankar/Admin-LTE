@extends('adminlte::page')
@section('content')
<div class="card card-default">
    <div class="card-body">
        @include('partials.errors')
        <form action="{{ isset($sales) ? route('sales.update', $sales->id) : route('sales.store') }}" method="post">
            @csrf
            @if(isset($sales))
            @method('PUT')
            @endif
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Invoice No</label>
                        <input type="number" name="invoice_no" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-8 form-group">
                    <label for="seller"> Seller </label>
                    <select class="form-control" name="ledger_id">
                        @foreach($ledgers as $ledger)
                            <option value={{$ledger->id}}
                            @if(isset($sales))
                            @if($ledger->id == $sales->ledger_id)
                                    selected
                                    @endif
                                    @endif
                            > {{$ledger->ledger_name}}</option>
                        @endforeach
                    </select>
                    <a class="mt-3" href="{{route('ledger.create',['backUrl'=>'sales.create'])}}" >ADD SELLER</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="pno"> Phone Number </label>
                    <input type="text" class="form-control" placeholder="Enter Phone Number " name='phone_number' value="{{ isset($sales) ? $sales->phone_number : ''}}" required>
                </div>

                <div class="col-md-4">
                    <label for="address"> Address </label>
                    <input type="text" class="form-control" name='address' placeholder="Enter Address" value="{{ isset($sales) ? $sales->address : ''}}" required>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="date" value = "{{old('date')}}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="pan"> Pan Number </label>
                <input type="text" class="form-control" name='pan_number' placeholder="Enter Pan Number" value="{{ isset($sales) ? $sales->pan_number : ''}}" required>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class = "col-md-12">
                            <table class="table table-bordered" id="item_table">
                                <tr>
                                    <th class="col-md-8">Particulars</th>
                                    <th>Quantity</th>
                                    <th>Rate</th>
                                    <th>Amount</th>
                                    <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th class="col-md-9 text-center">Total Taxable Amount</th>
                            <td><input type="number" value="0" name="taxable_amount" class="form-control" placeholder="Enter taxable amount" required></td>
                        </tr>

                        <tr>
                            <th class="col-md-9 text-center">VAT</th>
                            <td><input type="number" name="vat" class="form-control" placeholder="Enter VAT Amount" min=0 required></td>
                        </tr>

                        <tr>
                            <th class="col-md-9 text-center">Total Amount</th>
                            <td><input type="number" name="total" class="form-control" placeholder="Enter total amount" min=0 required></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    {{ isset($sales) ? 'EDIT BILL' : 'CREATE BILL!' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        count = 1;
        $(document).on('click', '.add', function(){
            var html = '';
            html += '<tr>';
            html += "<td class='col-md-7'><input type='text' class='form-control' name='particular[]' required></td>";
            html += "<td><input type='number'  class='form-control' name = 'quantity[]' min=1 required value=1 /></td>";
            html += "<td><input type='number' class='form-control' name = 'rate[]' min=1 required></td>";
            html += "<td><input type='number' class='form-control' name = 'amount[]' min=1 required></td>";
            html += "<td><button type='button' name='remove' class='btn btn-danger btn-sm remove' min=0 ><span class='glyphicon glyphicon-minus'></span></button></td></tr>";
            $('#item_table').append(html);
            count++;
        });

        $(document).on('click', '.remove', function(){
            count = count -1;
            $(this).closest('tr').remove();
        });
    </script>
@endsection