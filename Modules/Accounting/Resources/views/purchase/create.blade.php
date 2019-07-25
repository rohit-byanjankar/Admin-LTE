@extends('adminlte::page')

@section('content')
<div class="card card-default">
    <div class=" card-header text-bold ">
        {{ isset($purchase) ? 'Edit Purchase Bill' : 'Create Purchase Bill' }}
    </div>

    <div class="card-body">
        @include('partials.errors')
        <form action="{{ isset($purchase) ? route('purchase.update', $purchase->id) : route('purchase.store') }}" method="post">
            @csrf
            @if(isset($purchase))
            @method('PUT')
            @endif
                <div class="form-group">
                    <label for="biller"> Biller </label>
                    <select class="form-control" name="ledger_id">
                        @foreach($ledgers as $ledger)
                            <option value={{$ledger->id}}
                            @if(isset($purchase))
                            @if($ledger->id == $purchase->ledger_id)
                                    selected
                                    @endif
                                    @endif
                            > {{$ledger->ledger_name}}</option>
                        @endforeach
                    </select>
                <a class="mt-3" href="{{route('ledger.create',['backUrl'=>'purchase.create'])}}" >ADD BILLER</a>
                </div>

            <div class="form-group">
                <label for="address"> Address </label>
                <input type="text" class="form-control" name='address'  value="{{ isset($purchase) ? $purchase->address : ''}}">
            </div>

            <div class="form-group">
                <label for="pno"> Phone Number </label>
                <input type="text" class="form-control" name='phone_number' value="{{ isset($purchase) ? $purchase->phone_number : ''}}">
            </div>

            <div class="form-group">
                <label for="pan"> Pan Number </label>
                <input type="text" class="form-control" name='pan_number' value="{{ isset($purchase) ? $purchase->pan_number : ''}}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    {{ isset($purchase) ? 'EDIT Purchase Bill' : 'CREATE NOW!' }}
                </button>
            </div>

        </form>
        <div class="header">
            <h4 class="title">Register Bill</h4>
        </div>
        <div class="content">
            <form method="post" action="">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Invoice No</label>
                            <input type="number" name="invoice_no" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Biller Name</label>
                            <input type="text" name="biller" value="{{old('biller')}}" class="form-control" placeholder="Enter biller name" required>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" name="phone_number" value = "{{old('phone_number')}}" class="form-control" placeholder="Enter phone number" required>
                    </div>
                </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="trial_date" value = "{{old('date')}}" class="form-control">
                        </div>
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
                                <th>Total Amount</th>
                                <td><input type="number" id = "totalAmount" name="total_amount" class="form-control" onkeyup="updateAmounts()" placeholder="Enter total amount" min=0 ></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

                <button type="submit" class="btn btn-info btn-fill pull-right">Register Bill</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
            count = 1;
            $(document).on('click', '.add', function(){
                var html = '';
                html += '<tr>';
                html += "<td class='col-md-7'><input type='text' class='form-control' name='particular"+count+"' id ='name"+count+"'></td>";
                html += "<td><input type='number' id ='quantity"+count+"' class='form-control' name = 'quantity[]' min=1 required value=1 /></td>";
                html += "<td><input type='number' id ='rate"+count+"' class='form-control' name = 'rate[]' min=0></td>";
                html += "<td><input type='number' id ='total"+count+"' class='form-control' name = 'total[]' min=0></td>";
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