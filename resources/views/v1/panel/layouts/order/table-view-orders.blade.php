@php
    use Carbon\Carbon;
@endphp
<table class="table table-hover text-center show-table">
    <thead class="tbh">
        <tr>
            <th scope="col" class="color border-0">#</th>
            <th scope="col" class="color border-0">ORDER NUMBER</th>
            <th scope="col" class="color border-0">SEND</th>
            <th scope="col" class="color border-0">RECEIVE</th>
            <th scope="col" class="color border-0">DATE</th>
            <th scope="col" class="color border-0">ACTIONS</th>
        </tr>
    </thead>
    <tbody class="tb">
        @php
            $i = 1;
        @endphp
        @foreach ($orders as $order)
            <tr class="with-bottom-linear-gradient-to-left">
                <td class="text-color border-top-0"> {{$i++}} </td>
                <td class="text-color border-top-0"> {{$order->order_number}} </td>
                <td class="text-color border-top-0">{{isset($order->calculator->name) ? $order->calculator->name : 'NO TEXT'}}  {{$order->input_number ? $order->input_number : 'NO TEXT'}} {{$order->input_currency_unit ? $order->input_currency_unit : 'NO TEXT'}}</td>
                <td class="text-color border-top-0">{{isset($order->element->name) ? $order->element->name : 'NO TEXT'}}  {{$order->output_number ? $order->output_number : 'NO TEXT'}} {{$order->output_currency_unit ? $order->output_currency_unit : 'NO TEXT'}}</td>
                <td class="text-color border-top-0">{{Carbon::parse($order->created_at)->format('d/m/Y')}}</td>
                <td class="text-color border-top-0">
                    <div class="d-flex justify-content-center mb-2">
                        <button type="button" class="btns p-2 custom-font-size text-color mr-1" data-toggle="modal" data-target="#order-{{$order->id}}" data-whatever="@mdo">Delete</button>
                        <a href=" {{route('clearing.create', ['order' => $order->id])}} " class="btns text-color p-2 custom-font-size mr-1">{{$order->clearing ? "Update Doc" : "Add Doc" }}</a>
                        @if ($order->clearing)
                            <button type="button" class="btns text-color p-2 custom-font-size mr-1" data-toggle="modal" data-target="#clearing-{{$order->clearing->id}}" data-whatever="@mdo">Show Doc</button>
                        @endif
                        <button type="button" class="btns text-color p-2 custom-font-size mr-1" data-toggle="modal" data-target="#user-{{$order->user->id}}" data-whatever="@mdo">User Info</button> 
                        @if ($order->form)
                            <button type="button" class="btns text-color p-2 custom-font-size mr-1" data-toggle="modal" data-target="#form-{{$order->form->id}}" data-whatever="@mdo">Show Form</button>
                        @endif
                        <form action="{{route('orders.accept', ['order' => $order->id])}} " method="POST" class="mr-1">
                            @if ($order->accept == true)
                                <button type="submit" class="btns text-color p-2 custom-font-size">Accepted</button>
                            @else 
                                <button type="submit" class="btns text-color p-2 custom-font-size">Pending</button>
                            @endif
                            @csrf
                        </form>
                    </div>
                </td>
            </tr>
            {{-- modal --}}
                <div class="modal fade" id="order-{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content background-color-modals modal-border">
                            <div class="modal-body">
                                <form action="{{ route('orders.destroy', ['order' => $order->id]) }}" method="post">
                                    <div class="modal-body">
                                        @csrf
                                        @method('DELETE')
                                        <h5 class="text-center text-color">ARE YOU SURE YOU WANT TO DELETE THIS ORDER?</h5>
                                        <div class="mt-3 d-flex justify-content-end">
                                            <button type="button" class="btn text-color pr-4 pl-4 pt-2 pb-2 mr-2 custom-font-size" data-dismiss="modal">CANCEL</button>
                                            <button type="submit" class="btns text-color pr-4 pl-4 pt-2 pb-2 custom-font-size">YES, DELETE ORDER</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- end modal --}}
            {{-- modal --}}
            @if ($order->clearing)
                <div class="modal fade" id="clearing-{{$order->clearing->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <div class="modal fade" id="user-{{$order->user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content background-color-modals modal-border">
                            <div class="modal-body ">
                                <div class="custom-card">
                                    <div class="d-flex justify-content-center">
                                        <img class="rounded-circle "  width="140" height="140" src=" {{$order->user->avatar ? $order->user->avatar : '/defaultImages/avatar.png'}} " alt="user" />
                                    </div>
                                    <div class="card-body pb-0">
                                        <h3 class="mb-2 color text-center">{{$order->user->name . ' ' . $order->user->family}}</h3>
                                        <div class="d-flex mb-3">
                                            <span class="mr-3">
                                                <img src="/defaultImages/panel/profile/email.png" alt="email">    
                                            </span> 
                                            <h6 class="color mt-1">{{$order->user->email}}</h6>
                                        </div>
                                        <div class="d-flex">
                                            <span class="mr-3">
                                                <img src="/defaultImages/panel/profile/address.png" alt="address">
                                            </span>
                                            <h6 class="color mt-1">{{$order->user->address ? $order->user->address : 'NO ADDRESS'}}</h6>
                                        </div>
                                        <div class="d-flex">
                                            <span class="mr-3">
                                                <img src="/defaultImages/panel/profile/phone.png" alt="phone">
                                            </span>
                                            <h6 class="color mt-1">{{$order->user->phone ? $order->user->phone : 'NO PHONE'}}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-2">
                                    <button type="button" class="btn text-color pr-4 pl-4 pt-2 pb-2 mr-2 custom-font-size" data-dismiss="modal">CANCEL</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- end modal --}}
            {{-- modal --}}
            @if ($order->form)
                <div class="modal fade" id="form-{{$order->form->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        @endforeach
    </tbody>
</table>