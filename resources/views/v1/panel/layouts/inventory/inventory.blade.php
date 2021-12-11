@extends('adminlte::page')
@section('content')
<div class="row">
    <div class="col-sm-12 col-md-6 offset-md-3">
        <div class="custom-background-card rounded mt-2">
            <div class="row">
                <div class="col-8 offset-2">
                    <form method="POST" action="{{route('inventories.store') }}" class="mb-4 mt-4">
                        <div class="form-group custom-text-color">
                            <label for="paypalInv" class="color">PAYPAL INVENTORY</label>
                            <input type="text" class="form-control form-control-sm background-color-inputs border-0" id="paypalInv" name="paypalInv" value="{{isset($inventory) ? $inventory->paypalInv : old('paypalInv')}}">
                            @if ($errors->has('paypalInv'))
                                <span class="d-block text-danger">{{ $errors->first('paypalInv') }}</span>
                            @endif
                        </div>
                        <div class="form-group custom-text-color">
                            <label for="cashInv" class="color">CASH INVENTORY</label>
                            <input type="text" class="form-control form-control-sm background-color-inputs border-0" id="cashInv" name="cashInv" value="{{isset($inventory) ? $inventory->cashInv : old('cashInv')}}">
                            @if ($errors->has('cashInv'))
                                <span class="d-block text-danger">{{ $errors->first('cashInv') }}</span>
                            @endif
                        </div>
                        <div class="form-group custom-text-color">
                            <label for="perfectMoneyInv" class="color">PERFECT MONEY INVENTORY</label>
                            <input type="text" class="form-control form-control-sm background-color-inputs border-0" id="perfectMoneyInv" name="perfectMoneyInv" value="{{isset($inventory) ? $inventory->perfectMoneyInv : old('perfectMoneyInv')}}">
                            @if ($errors->has('perfectMoneyInv'))
                                <span class="d-block text-danger">{{ $errors->first('perfectMoneyInv') }}</span>
                            @endif
                        </div>
                        <div class="form-group custom-text-color">
                            <label for="webMoneyInv" class="color">WEB MONEY INVENTORY</label>
                            <input type="text" class="form-control form-control-sm background-color-inputs border-0" id="webMoneyInv" name="webMoneyInv" value="{{isset($inventory) ? $inventory->webMoneyInv : old('webMoneyInv')}}">
                            @if ($errors->has('webMoneyInv'))
                                <span class="d-block text-danger">{{ $errors->first('webMoneyInv') }}</span>
                            @endif
                        </div>
                        <div class="form-group custom-text-color">
                            <label for="tetherInv" class="color">TETHER INVENTORY</label>
                            <input type="text" class="form-control form-control-sm background-color-inputs border-0" id="tetherInv" name="tetherInv" value="{{isset($inventory) ? $inventory->tetherInv : old('tetherInv')}}">
                            @if ($errors->has('tetherInv'))
                                <span class="d-block text-danger">{{ $errors->first('tetherInv') }}</span>
                            @endif
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <button type="submit" class="btns text-color pr-3 pl-3 btn-sm">SUBMIT</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

