@php
    use Carbon\Carbon;
@endphp
<div class="container show-card">
    
    {{-- create new order and return to the page index --}}
    @include('v1.customer.layouts.order.create-order')
    
    @if (count($orders) != 0)
        @foreach ($orders as $order)
            <div class="custom-background-card custom-card p-4 mb-2">
                <div class="card-body pb-0">
                    <h4 class="custom-font-size mb-1 color"> {{ $order->accept == false ? 'Pending' : "Accepted" }} </h4>
                    <h6 class="mr-2 color mb-4">Order Number: {{$order->order_number}}</h6>
                    <div class="text-center w-100">
                        <div class="d-flex justify-content-center align-items-center">
                            <h6 class="mr-2 text-color">{{isset($order->calculator->name) ? $order->calculator->name : 'NO TEXT'}}</h6>
                            <h4 class="mr-2 text-color">{{$order->input_number ? $order->input_number : 'NO TEXT'}}</h4>
                            <h6 class="mr-2 text-color">{{$order->input_currency_unit ? $order->input_currency_unit : 'NO TEXT'}}</h6>
                        </div>
                            <h3 class="color">TO</h3>
                        <div class="d-flex justify-content-center align-items-center">
                            <h6  class="mr-2 text-color">{{isset($order->element->name) ? $order->element->name : 'NO TEXT'}}</h6>
                            <h4  class="mr-2 text-color">{{$order->output_number ? $order->output_number : 'NO TEXT'}}</h4>
                            <h6  class="mr-2 text-color">{{$order->output_currency_unit ? $order->output_currency_unit : 'NO TEXT'}}</h6>
                        </div>
                        <div class="d-flex justify-content-start">
                            <h6 class="mr-2 mb-2 custom-font-size text-color">{{Carbon::parse($order->created_at)->format('d/m/Y')}}</h6>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mb-2">
                    @if ($order->clearing)
                        <button type="button" class="btns btn-sm mr-1 text-color custom-mobile-font-size p-2" data-toggle="modal" data-target="#mobile-clearing-{{$order->clearing->id}}" data-whatever="@mdo">Show Doc</button>
                    @endif
                    @if ($order->form)
                        <button type="button" class="btns btn-sm mr-1 text-color custom-mobile-font-size p-2" data-toggle="modal" data-target="#mobile-form-{{$order->form->id}}" data-whatever="@mdo">Show Form</button>
                    @endif
                    @if ($order->accept == true)
                        <button type="button" class="btns btn-sm text-color custom-mobile-font-size p-2">Accepted</button>

                        @if ($order->feedback)
                            
                            <button type="button" class="btns btn-sm ml-1 text-color custom-mobile-font-size p-2" data-toggle="modal" data-target="#mobile-readFeedback-{{$order->feedback->id}}" data-whatever="@mdo">Read Feedback</button>
                        @else

                            <button type="button" class="btns btn-sm ml-1 text-color custom-mobile-font-size p-2" data-toggle="modal" data-target="#mobile-showFeedback-{{$order->id}}" data-whatever="@mdo">Write Feedback</button>
                        @endif
                    @else 
                        <button type="button" class="btns btn-sm text-color custom-mobile-font-size p-2">Pending</button>
                    @endif
                </div>
            </div>
            {{-- modal --}}
                @if ($order->clearing)
                    <div class="modal fade" id="mobile-clearing-{{$order->clearing->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content background-color-modals modal-border">
                                <div class="modal-body">
                                    @if (isset($order->clearing->images))
                                        <div id="myCarousel" class="carousel slide mt-3" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                            </ol>
                                            <div class="carousel-inner">
                                                @foreach($order->clearing->images as $key => $item)
                                                    <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                                        <div class="d-flex justify-content-center">
                                                            <img src="{{$item->image}}" class="d-block w-100 custom-size-clearing-image" alt="image"> 
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    @endif
                                    <p class="text-center text-color mt-2"> This order is 
                                        @if ($order->clearing->clear == true)
                                            Clear
                                        @else
                                            Not Clear
                                        @endif 
                                    </p>
                                    <div class="form-group">
                                        <label class="custom-font-size color">Title: </label>
                                        <h5 class="ml-3 mr-3 text-color text-justify"> {{$order->clearing->title ? $order->clearing->title : 'NO TEXT'}} </h5>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-font-size color">Text: </label>
                                        <p class="ml-3 mr-3 text-color text-justify"> {{$order->clearing->body ? $order->clearing->body : "NO TEXT"}} </p>
                                    </div>
                                    <div class="mt-3 d-flex justify-content-end">
                                        <button type="button" class="btn text-color pr-4 pl-4 pt-2 pb-2 mr-2 custom-font-size" data-dismiss="modal">CANCEL</button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            {{-- end modal --}}
            {{-- modal --}}
                @if ($order->form)
                    <div class="modal fade" id="mobile-form-{{$order->form->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content background-color-modals modal-border">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="custom-font-size color">User PayPal E-mail address: </label>
                                        <h6 class="ml-3 mr-3 text-justify mb-3 text-color"> {{$order->form->email ? $order->form->email : 'NO TEXT'}} </h6>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-font-size color">User content E-mail address: </label>
                                        <h6 class="ml-3 mr-3 text-justify mb-3 text-color"> {{$order->form->contact_email ? $order->form->contact_email : 'NO TEXT'}} </h6>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-font-size color">User {{$order->calculator->name}} wallet: </label>
                                        <h6 class="ml-3 mr-3 text-justify mb-3 text-color"> {{$order->form->wallet ? $order->form->wallet : 'NO TEXT'}} </h6>
                                    </div>
                                    @isset($order->form->telegram)
                                        <div class="form-group">
                                            <label class="custom-font-size color">User Telegram account: </label>
                                            <h6 class="ml-3 mr-3 text-justify text-color"> {{$order->form->telegram}} </h6>
                                        </div>
                                    @endisset
                                    @isset($order->form->whatsApp)
                                        <div class="form-group">
                                            <label class="custom-font-size color">User WhatsApp account: </label>
                                            <h6 class="ml-3 mr-3 text-justify text-color"> {{$order->form->whatsApp ? $order->form->whatsApp : 'NO TEXT'}} </h6>
                                        </div>
                                    @endisset
                                    @isset($order->form->skype)
                                        <div class="form-group">
                                            <label class="custom-font-size color">User Skype account: </label>
                                            <h6 class="ml-3 mr-3 text-justify text-color"> {{$order->form->skype ? $order->form->skype : 'NO TEXT'}} </h6>
                                        </div>
                                    @endisset
                                    @isset($order->form->extra)
                                        <div class="form-group">
                                            <label class="custom-font-size color">Extra note on your user transaction: </label>
                                            <p class="ml-3 mr-3 text-justify text-color"> {{$order->form->extra ? $order->form->extra : 'NO TEXT'}} </p>
                                        </div>
                                    @endisset
                                    <div class="mt-3 d-flex justify-content-end">
                                        <button type="button" class="btn text-color pr-4 pl-4 pt-2 pb-2 mr-2 custom-font-size" data-dismiss="modal">CANCEL</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            {{-- end modal --}}
            {{-- modal --}}
                @if (isset($order->feedback))
                    <div class="modal fade" id="mobile-readFeedback-{{$order->feedback->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content background-color-modals modal-border">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="text-color custom-font-size">Your Feedback to this Transition: </label>
                                        <p class="ml-3 mr-3 text-justify text-color"> {{$order->feedback->body ? $order->feedback->body : 'NO TEXT'}} </p>
                                        
                                        <div class="d-flex justify-content-end mt-3">
                                            <button type="button" class="btn text-color pr-3 pl-3 mr-1 btn-sm custom-font-size" data-dismiss="modal">CLOSE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            {{-- end modal --}}
            {{-- modal --}}
                <div class="modal fade" id="mobile-showFeedback-{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content background-color-modals modal-border">
                            <div class="modal-body">
                                <div class="form-group">
                                    <form action=" {{route('customer.feedbacks.store')}} " method="post">
                                        @csrf

                                        <input type="hidden" name="order_id" value=" {{$order->id}} ">

                                        <label for="body" class="color custom-font-size">TEXT</label>
                                        <textarea class="form-control form-control-sm background-color-inputs border-0" id="body" rows="5" name="body">{{old('body')}}</textarea>
                                        @if ($errors->has('body'))
                                            <span class="d-block text-danger">{{ $errors->first('body') }}</span>
                                        @endif

                                        <div class="d-flex justify-content-end mt-3">
                                            <button type="button" class="btn color pr-4 pl-4 mr-1 btn-sm custom-font-size" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btns color pr-4 pl-4 btn-sm custom-font-size">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- end modal --}}
        @endforeach
    @else
        <p class="text-color text-center show-table">CURRENTLY THERE IS NO ORDER CREATED</p>
    @endif
</div>