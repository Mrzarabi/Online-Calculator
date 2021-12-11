@php
    use App\Models\Clearing;
    use App\Models\Form;
    use App\Models\Calculator;
    use App\Models\Element;
    use Carbon\Carbon;
@endphp
<table class="table table-hover text-center show-table">
    <thead class="tbh">
        <tr>
            <th scope="col" class="color border-0">#</th>
            <th scope="col" class="color border-0">ORDER NO</th>
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
                <td class="text-color border-top-0"> {{$order->order_no}} </td>
                @php
                
                    $input = Calculator::where('id', $order->input_currency_type)->first();
                    $output = Element::where('id', $order->output_currency_type)->first();
                @endphp
                <td class="text-color border-top-0">{{isset($input->name) ? $input->name : 'NO TEXT'}}  {{$order->input_number ? $order->input_number : 'NO TEXT'}} {{$order->input_currency_unit ? $order->input_currency_unit : 'NO TEXT'}}</td>
                <td class="text-color border-top-0">{{isset($output->name) ? $output->name : 'NO TEXT'}}  {{$order->output_number ? $order->output_number : 'NO TEXT'}} {{$order->output_currency_unit ? $order->output_currency_unit : 'NO TEXT'}}</td>
                <td class="text-color border-top-0">{{Carbon::parse($order->created_at)->format('d/m/Y')}}</td>
                <td class="text-color border-top-0">
                    <div class="d-flex justify-content-center mb-2">
                        <button type="button" class="btns p-2 custom-font-size text-color mr-1" data-toggle="modal" data-target="#order-{{$order->id}}" data-whatever="@mdo">Delete</button>
                        @php
                            $clearing = Clearing::where('order_id', $order->id)->first();
                            $form = Form::where('order_id', $order->id)->first();
                        @endphp
                        <a href=" {{route('clearing.create', ['order' => $order->id])}} " class="btns text-color p-2 custom-font-size mr-1">{{$clearing ? "Update Doc" : "Add Doc" }}</a>
                        @if ($clearing)
                            <button type="button" class="btns text-color p-2 custom-font-size mr-1" data-toggle="modal" data-target="#clearing-{{$clearing->id}}" data-whatever="@mdo">Show Doc</button>
                        @endif
                        <button type="button" class="btns text-color p-2 custom-font-size mr-1" data-toggle="modal" data-target="#user-{{$order->user->id}}" data-whatever="@mdo">User Info</button> 
                        @if ($form)
                            <button type="button" class="btns text-color p-2 custom-font-size mr-1" data-toggle="modal" data-target="#form-{{$form->id}}" data-whatever="@mdo">Show Form</button>
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
            @if ($clearing)
                <div class="modal fade" id="clearing-{{$clearing->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content custom-card-color">
                            <div class="modal-body">
                                @if (isset($clearing->images))
                                    <div id="myCarousel" class="carousel slide mt-3" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            @foreach($clearing->images as $key => $item)
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
                                <p class="text-justify"> This order is 
                                    @if ($clearing->clear == true)
                                        Clear
                                    @else
                                        Not Clear
                                    @endif 
                                </p>
                                <h5> {{$clearing->title ? $clearing->title : 'NO TEXT'}} </h5>
                                <p class="text-justify"> {{$clearing->body ? $clearing->body : "NO TEXT"}} </p>
                            </div>
                            <hr/>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                    <button type="button" class="btn color pr-4 pl-4 pt-2 pb-2 mr-2 custom-font-size" data-dismiss="modal">CANCEL</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- end modal --}}
            {{-- modal --}}
            @if ($form)
                <div class="modal fade" id="form-{{$form->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content custom-card-color">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="custom-user-info custom-font-size">User PayPal E-mail address: </label>
                                    <h6 class="ml-3 mr-3 text-justify mb-3"> {{$form->email ? $form->email : 'NO TEXT'}} </h6>
                                </div>
                                <div class="form-group">
                                    <label class="custom-user-info custom-font-size">User content E-mail address: </label>
                                    <h6 class="ml-3 mr-3 text-justify mb-3"> {{$form->contact_email ? $form->contact_email : 'NO TEXT'}} </h6>
                                </div>
                                <div class="form-group">
                                    <label class="custom-user-info custom-font-size">User {{$input->name}} wallet: </label>
                                    <h6 class="ml-3 mr-3 text-justify mb-3"> {{$form->wallet ? $form->wallet : 'NO TEXT'}} </h6>
                                </div>
                                @isset($form->telegram)
                                    <div class="form-group">
                                        <label class="custom-user-info custom-font-size">User Telegram account: </label>
                                        <h6 class="ml-3 mr-3 text-justify"> {{$form->telegram}} </h6>
                                    </div>
                                @endisset
                                @isset($form->whatsApp)
                                    <div class="form-group">
                                        <label class="custom-user-info custom-font-size">User WhatsApp account: </label>
                                        <h6 class="ml-3 mr-3 text-justify"> {{$form->whatsApp ? $form->whatsApp : 'NO TEXT'}} </h6>
                                    </div>
                                @endisset
                                @isset($form->skype)
                                    <div class="form-group">
                                        <label class="custom-user-info custom-font-size">User Skype account: </label>
                                        <h6 class="ml-3 mr-3 text-justify"> {{$form->skype ? $form->skype : 'NO TEXT'}} </h6>
                                    </div>
                                @endisset
                                @isset($form->extra)
                                    <div class="form-group">
                                        <label class="custom-user-info custom-font-size">Extra note on your user transaction: </label>
                                        <p class="ml-3 mr-3 text-justify"> {{$form->extra ? $form->extra : 'NO TEXT'}} </p>
                                    </div>
                                @endisset
                            </div>
                            <hr/>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            {{-- end modal --}}
        @endforeach
    </tbody>
</table>