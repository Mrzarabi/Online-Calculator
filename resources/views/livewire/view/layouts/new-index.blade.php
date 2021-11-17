
    <div class="row">
        <div class="col-md-12">
            <div class=" @if (empty($inventory->webMoneyInv) && empty($inventory->tetherInv))
                            d-flex justify-content-around
                        @endif
                        custom-mobile-inventory">
                        {{-- : https://t.me/joinchat/BIjL4xov6Sagc2S4szXxJw --}}

                @if (isset($inventory->paypalInv))
                    <h6 class="site-color custom-font-size">PayPal Balance Reserve: {{$inventory->paypalInv}}</h6>
                @endif
                @if (isset($inventory->cashInv))
                    <h6 class="site-color custom-font-size">Cash Balance Reserve: {{$inventory->cashInv}}</h6>
                @endif
                @if (isset($inventory->perfectMoneyInv))
                    <h6 class="site-color custom-font-size">Perfect Money Balance Reserve: {{$inventory->perfectMoneyInv}}</h6>
                @endif
                @if (isset($inventory->webMoneyInv))
                    <h6 class="site-color custom-font-size">Web Money Balance Reserve: {{$inventory->webMoneyInv}}</h6>
                @endif
                @if (isset($inventory->tetherInv))
                    <h6 class="site-color custom-font-size">Tether (TRC20) Balance Reserve: {{$inventory->tetherInv}}</h6>
                @endif
            </div>
            <div class="div rounded p-5 site-background-color">
                <form action=" {{route('customer.orders.send')}} " method="POST">
                    @csrf
                    <div class="d-flex justify-content-center">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 pr-0">
                                <h6 class="site-color custom-ml-1">Send</h6>
                                <div class="d-flex justify-content-center">
                                    <div class="float-left">
                                        <div class="form-group">
                                            <select name="input_currency_type" class="form-control form-control-sm select-background-color-left" wire:model.lazy="input_currency_type" required>
                                                <option selected >Select Currency</option>
                                                @foreach ($inputs as $input)
                                                    <option value="{{$input->id}}">{{$input->name}}</option>
                                                @endforeach
                                                    <option value="Cash" disabled>Cash</option>
                                                    <option value="PayPal" disabled>PayPal</option>
                                                    <option value="Web Money" disabled>Web Money</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="float-left">
                                        <div class="form-group">
                                            <input type="number" step="0.01" class="form-control form-control-lg input-background-size mb-2" id="input_number" name="input_number"  wire:model.lazy="input_number" required>
                                            @if ($errors->has('input_number'))
                                                <span class="d-block text-danger">{{ $errors->first('input_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="float-left custom-mr-5">
                                        <div class="form-group">
                                            <select name="input_currency_unit" class="form-control form-control-sm select-background-color-right" wire:model.lazy="input_currency_unit" required>
                                                <option selected>Select Money</option>
                                                <option value="USD">USD</option>
                                                <option value="EUR" disabled>EUR</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>        
                            </div>
                            <div class="col-md-1 col-sm-12 accent-green p-0 c-display-logo-content custom-margin-logo">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6 class="mb-0 @if ($image) mt--5 @endif d-block text-come text-center site-color"> {{isset($cost) ? $cost ."%" : ''}} </h6>
                                        <img src="/defaultImages/form-image.png" class="d-block {{$image ? 'sold' : ''}} logo-content-size" alt="logo">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <h6 class="site-color custom--ml">Receive</h6>
                                <div class="d-flex justify-content-center">
                                    <div class="float-left">
                                        <div class="form-group">
                                            <select name="output_currency_type" class="form-control form-control-sm select-background-color-left" wire:model.lazy="output_currency_type">
                                                <option selected >Select Currency</option>
                                                @if (isset($outputs))
                                                    @foreach ($outputs as $output)
                                                        <option value="{{$output->id}}">{{$output->name}}</option>
                                                    @endforeach
                                                @endif
                                                    <option value="Cash" disabled>Cash</option>
                                                    <option value="Tether (TRC20)" disabled>Tether (TRC20)</option>
                                                    <option value="Web Money" disabled>Web Money</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="float-left">
                                        <div class="form-group">
                                            <input type="text" name="output_number" class="form-control form-control-sm custom-output-background-color-center mb-2" value="{{ $output_number ? $output_number : 0.00 }}" disabled>
                                            <input type="hidden" name="output_number"value="{{ $output_number ? $output_number : 0.00 }}">
                                        </div>
                                    </div>
                                    <div class="float-left ml-l">
                                        <div class="form-group">
                                            <input type="text" name="output_currency_unit" class="form-control form-control-sm custom-output-background-color-right mb-2" value="{{ $output_currency_unit ?  $output_currency_unit : 'Still Not Chosen'}}" disabled>
                                            <input type="hidden" name="output_currency_unit" value="{{ $output_currency_unit ?  $output_currency_unit : 'Still Not Chosen'}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @guest
                        <h6 class="site-color mt-4 text-center">If You Are Interesting To Trade Please, Loing/Register At First...</h6>
                    @else
                        <div class="d-flex justify-content-center mt-4 ml-4">
                            @if($isDisabled)
                                <button type="submit" class="btn btn-sm rounded custom-btn-content" disabled="{{ $isDisabled }}">Confirm</button>
                            @else
                                <button type="submit" class="btn btn-sm rounded custom-btn-content" onclick="document.getElementById('sound').play();">Confirm</button>
                            @endif
                        </div>
                    @endguest
                </form>
            </div>
        </div>
    </div>
