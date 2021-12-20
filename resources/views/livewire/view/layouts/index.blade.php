<div style="height: 100%">
    <div class="row" style="height: 100%; background-color: rgba(5, 1, 0, 0.231);">
        <div class="col-md-12">
                <div class="row" style="height: 100%">
                    <div class="col-md-12 pl-0" style="height: 30%; display: grid; align-items: end; grid-template-rows: repeat(1, 1fr); justify-content: center;" >
                        @if (isset($inventory->paypalInv))
                            <div class="" style="margin-left: 2.3rem;">
                                <span class="" style="font-size: .8rem; color: #6a6a6a;">PayPal Balance Reserve: </span> <span class="site-color" style="font-size: .8rem">{{$inventory->paypalInv}}</span>
                            </div>
                        @endif
                        @if (isset($inventory->cashInv))
                            <div class="" style="margin-left: 2.3rem;">
                                <span class="" style="font-size: .8rem; color: #6a6a6a;">Cash Balance Reserve: </span> <span class="site-color" style="font-size: .8rem">{{$inventory->cashInv}}</span>
                            </div>
                        @endif
                        @if (isset($inventory->perfectMoneyInv))
                            <div class="" style="margin-left: 2.3rem;">
                                <span class="" style="font-size: .8rem; color: #6a6a6a;">Perfect Money Balance Reserve: </span> <span class="site-color" style="font-size: .8rem">{{$inventory->perfectMoneyInv}}</span>
                            </div>
                        @endif
                        @if (isset($inventory->webMoneyInv))
                            <div class="" style="margin-left: 2.3rem;">
                                <span class=""  style="font-size: .8rem; color: #6a6a6a;">Web Money Balance Reserve: </span> <span class="site-color" style="font-size: .8rem"> {{$inventory->webMoneyInv}}</span>
                            </div>
                        @endif
                        @if (isset($inventory->tetherInv))
                            <div class="" style="margin-left: 2.3rem;">
                                <span class=""  style="font-size: .8rem; color: #6a6a6a;">Tether (TRC20) Balance Reserve: </span> <span class="site-color" style="font-size: .8rem">{{$inventory->tetherInv}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12 d-flex justify-content-center mt-4" style="height: 70%;" >
                        <form action=" {{route('customer.orders.send')}} " method="POST">
                            @csrf
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12"></div>
                                    <div class="col-md-6 pr-0">
                                        <div class="row">
                                            <div class="col-md-12 offset-md-1">
                                                <h6 class="site-color" style="margin: 0 0 .3rem 1.9rem">Send</h6>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="d-flex justify-content-center" style="max-width:100%">
                                                    <div class="form-group">
            
                                                        {{-- <div class="dropdown">
                                                            <button class="btn 
                                                                    dropdown-toggle" type="button" 
                                                                    id="dropdownMenuButton" 
                                                                    data-toggle="dropdown"
                                                                    aria-haspopup="true" 
                                                                    aria-expanded="false" style="
                                                                    border-radius: 4px 0 0 4px;
                                                                    background-image: -webkit-linear-gradient( 90deg, rgb(183,131,24) 0%, rgb(196,149,46) 47%, rgb(255,241,164) 73%, rgb(205,148,49) 96%);
                                                                    color: black;
                                                                    max-width: 120px;
                                                                    max-height: 40px;
                                                                    font-size: .7rem
                                                                    padding: .5rem">
                                                                Select 
                                                                <img src="/defaultImages/bitcoin-gold-1.png" alt="bitcoin-gold" width="30">
                                                            </button>
                                                    
                                                            <ul class="dropdown-menu" 
                                                                aria-labelledby="dropdownMenuButton" style="background-image: -webkit-linear-gradient( 90deg, rgb(183,131,24) 0%, rgb(196,149,46) 47%, rgb(255,241,164) 73%, rgb(205,148,49) 96%);
                                                                color: black;
                                                                max-width: 120px;
                                                                max-height: 40px;
                                                                font-size: .7rem">
                                                                <li class="dropdown-item" >
                                                                    India</li>
                                                                <li class="dropdown-item">
                                                                    <img src=
                                                                    "https://media.geeksforgeeks.org/wp-content/uploads/20200630132504/uflag.jpg" 
                                                                    width="20" height="15"> USA</li>
                                                                <li class="dropdown-item">
                                                                    <img src=
                                                                    "https://media.geeksforgeeks.org/wp-content/uploads/20200630132502/eflag.jpg" 
                                                                    width="20" height="15"> England</li>
                                                                <li class="dropdown-item">
                                                                    <img src=
                                                                    "https://media.geeksforgeeks.org/wp-content/uploads/20200630132500/bflag.jpg"
                                                                    width="20" height="15"> Brazil</li>
                                                            </ul>
                                                        </div> --}}
            
                                                        <select name="input_currency_type" class="form-control form-control-sm " wire:model.lazy="input_currency_type" required style="
                                                            border-radius: 4px 0 0 4px;
                                                            background-image: -webkit-linear-gradient( 90deg, rgb(183,131,24) 0%, rgb(196,149,46) 47%, rgb(255,241,164) 73%, rgb(205,148,49) 96%);
                                                            color: black;
                                                            max-width: 120px;
                                                            max-height: 40px;
                                                            ">
                                                            <img src="/defaultImages/bitcoin-gold-1.png" alt="bitcoin-gold" width="30">
                                                            <option selected> Select Currency</option>
                                                            @foreach ($inputs as $input)
                                                                <option class="option-styles" value="{{$input->id}}">{{$input->name}}</option>
                                                            @endforeach
                                                                <option value="Cash" disabled>Cash</option>
                                                                <option value="PayPal" disabled>PayPal</option>
                                                                <option value="Web Money" disabled>Web Money</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="number" step="0.01" class="form-control form-control-sm mb-2" id="input_number" min="100.00" max="10000.00" placeholder="ENTER THE AMOUNT" name="input_number"  wire:model.lazy="input_number" required style="
                                                            border-top: 1px solid #b78318;
                                                            border-bottom: 1px solid #b78318;
                                                            background-color: #070200;
                                                            max-width: 160px;
                                                            width: 160px;
                                                            font-size: .6rem;
                                                            max-height: 40px;
                                                            
                                                        height: 40px;
                                                        margin-top: -2px;
                                                            ">
                                                        @if ($errors->has('input_number'))
                                                            <span class="d-block text-danger">{{ $errors->first('input_number') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <select name="input_currency_unit" class="form-control form-control-sm" wire:model.lazy="input_currency_unit" required style="
                                                        border-radius: 0 4px 4px 0;
                                                        color: black;
                                                        max-width: 120px;
                                                        width: 120px;
                                                        max-height: 40px;
                                                        background-image: -webkit-linear-gradient( 90deg, rgb(183,131,24) 0%, rgb(196,149,46) 47%, rgb(255,241,164) 73%, rgb(205,148,49) 96%);
                                                        ">
                                                            <option selected>Select Money</option>
                                                            <option value="USD">USD</option>
                                                            <option value="EUR" disabled>EUR</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12  offset-md-1">
                                                <h6 class="site-color"  style="margin: 0 0 .3rem 1.9rem">Receive</h6>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="d-flex justify-content-center">
                                                    <div class="form-group">
                                                        <select name="output_currency_type" class="form-control form-control-sm" wire:model.lazy="output_currency_type" required style="
                                                        border-radius: 4px 0 0 4px;
                                                        background-image: -webkit-linear-gradient( 90deg, rgb(183,131,24) 0%, rgb(196,149,46) 47%, rgb(255,241,164) 73%, rgb(205,148,49) 96%);
                                                        color: black;
                                                        max-width: 120px;
                                                        max-height: 40px;
                                                        ">
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
                                                    <div class="form-group">
                                                        <input type="text" name="output_number" class="form-control form-control-sm mb-2" value="{{ $output_number ? $output_number : 0.00 }}" disabled style="
                                                        border-top: 1px solid #b78318;
                                                        border-bottom: 1px solid #b78318;
                                                        background-color: #070200;
                                                        max-width: 160px;
                                                        width: 160px;
                                                        font-size: .6rem;
                                                        max-height: 40px;
                                                        height: 40px;
                                                        margin-top: -2px;
                                                        ">
                                                        <input type="hidden" name="output_number"value="{{ $output_number ? $output_number : 0.00 }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="output_currency_unit" class="form-control form-control-sm mb-2" value="{{ $output_currency_unit ?  $output_currency_unit : 'Still Not Chosen'}}" disabled style="
                                                        border-radius: 0 4px 4px 0;
                                                        background-image: -webkit-linear-gradient( 90deg, rgb(183,131,24) 0%, rgb(196,149,46) 47%, rgb(255,241,164) 73%, rgb(205,148,49) 96%);
                                                        max-width: 120px;
                                                        color: black;
                                                        width: 120px;
                                                        max-height: 40px;
                                                        height: 40px;
                                                        margin-top: -2px;
                                                        ">
                                                        <input type="hidden" name="output_currency_unit" value="{{ $output_currency_unit ?  $output_currency_unit : 'Still Not Chosen'}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 offset-md-2" style="padding-left: 0;">
                                                @guest
                                                    <h6 class="site-color mt-4 text-center" style="font-size: .7rem;">If You Are Interesting To Trade Please, Log In/Sing Up At First</h6>
                                                @else
                                                    <div class="d-flex justify-content-center mt-4">
                                                        @if($isDisabled)
                                                            <button type="submit" class="btn btn-sm rounded custom-btn-content" disabled="{{ $isDisabled }}">Confirm</button>
                                                        @else
                                                            <button type="submit" class="btn btn-sm rounded custom-btn-content" onclick="document.getElementById('sound').play();">Confirm</button>
                                                        @endif
                                                    </div>
                                                @endguest
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12 accent-green p-0 d-flex align-items-center">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6 class="mb-0 @if ($image) mt--5 @endif d-block text-come text-center site-color" style="margin-top: -3rem;"> {{isset($cost) ? $cost ."%" : ''}} </h6>
                                                <img src="/defaultImages/form-image.png" class="d-block {{$image ? 'sold' : ''}}" alt="logo" width="70">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                        
                    </div>
                </div>

        </div>
    </div>
</div>