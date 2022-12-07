@extends('adminlte::page')
@section('content')
<div class="row">
    <div class="col-sm-12 col-md-6 offset-md-3">
        <div class="custom-background-card rounded mt-2">
            <div class="row">
                <div class="col-8 offset-2">
                    <form method="POST" action="{{route('inventories.store') }}" class="mb-4 mt-4">
                        <div class="form-group custom-text-color">
                            <label for="paypal_inventory" class="color">PAYPAL INVENTORY</label>
                            <input type="text" class="form-control form-control-sm background-color-inputs border-0" id="paypal_inventory" name="paypal_inventory" value="{{isset($inventory) ? $inventory->paypal_inventory : old('paypal_inventory')}}">
                            @if ($errors->has('paypal_inventory'))
                                <span class="d-block text-danger">{{ $errors->first('paypal_inventory') }}</span>
                            @endif
                        </div>
                        <div class="form-group custom-text-color">
                            <label for="cash_inventory" class="color">CASH INVENTORY</label>
                            <input type="text" class="form-control form-control-sm background-color-inputs border-0" id="cash_inventory" name="cash_inventory" value="{{isset($inventory) ? $inventory->cash_inventory : old('cash_inventory')}}">
                            @if ($errors->has('cash_inventory'))
                                <span class="d-block text-danger">{{ $errors->first('cash_inventory') }}</span>
                            @endif
                        </div>
                        <div class="form-group custom-text-color">
                            <label for="perfect_money_inventory" class="color">PERFECT MONEY INVENTORY</label>
                            <input type="text" class="form-control form-control-sm background-color-inputs border-0" id="perfect_money_inventory" name="perfect_money_inventory" value="{{isset($inventory) ? $inventory->perfect_money_inventory : old('perfect_money_inventory')}}">
                            @if ($errors->has('perfect_money_inventory'))
                                <span class="d-block text-danger">{{ $errors->first('perfect_money_inventory') }}</span>
                            @endif
                        </div>
                        <div class="form-group custom-text-color">
                            <label for="web_money_inventory" class="color">WEB MONEY INVENTORY</label>
                            <input type="text" class="form-control form-control-sm background-color-inputs border-0" id="web_money_inventory" name="web_money_inventory" value="{{isset($inventory) ? $inventory->web_money_inventory : old('web_money_inventory')}}">
                            @if ($errors->has('web_money_inventory'))
                                <span class="d-block text-danger">{{ $errors->first('web_money_inventory') }}</span>
                            @endif
                        </div>
                        <div class="form-group custom-text-color">
                            <label for="tether_inventory" class="color">TETHER INVENTORY</label>
                            <input type="text" class="form-control form-control-sm background-color-inputs border-0" id="tether_inventory" name="tether_inventory" value="{{isset($inventory) ? $inventory->tether_inventory : old('tether_inventory')}}">
                            @if ($errors->has('tether_inventory'))
                                <span class="d-block text-danger">{{ $errors->first('tether_inventory') }}</span>
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

