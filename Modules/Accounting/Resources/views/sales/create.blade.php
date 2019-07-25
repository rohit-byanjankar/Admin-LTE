@extends('adminlte::page')
@section('content')
<div class="card card-default">
    <div class=" card-header text-bold ">
        {{ isset($sales) ? 'Edit sales Bill' : 'Create sales Bill' }}
    </div>

    <div class="card-body">
        @include('partials.errors')
        <form action="{{ isset($sales) ? route('sales.update', $sales->id) : route('sales.store') }}" method="post">
            @csrf
            @if(isset($sales))
            @method('PUT')
            @endif
            <div class="form-group">
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
                <a class="mt-3" href="{{route('ledger.create',['backUrl'=>'sales.create'])}}" >ADD Seller</a>
            </div>

            <div class="form-group">
                <label for="address"> Address </label>
                <input type="text" class="form-control" name='address'  value="{{ isset($sales) ? $sales->address : ''}}">
            </div>

            <div class="form-group">
                <label for="pno"> Phone Number </label>
                <input type="text" class="form-control" name='phone_number' value="{{ isset($sales) ? $sales->phone_number : ''}}">
            </div>

            <div class="form-group">
                <label for="pan"> Pan Number </label>
                <input type="text" class="form-control" name='pan_number' value="{{ isset($sales) ? $sales->pan_number : ''}}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    {{ isset($sales) ? 'EDIT sales Bill' : 'CREATE NOW!' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
