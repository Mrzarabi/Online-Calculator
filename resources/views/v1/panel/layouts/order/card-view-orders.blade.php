@php
use App\Models\Clearing;
use App\Models\Form;
use App\Models\Calculator;
use App\Models\Element;
use Carbon\Carbon;
@endphp
<div class="container show-card">
    @foreach ($orders as $order)
        <div class="card custom-back-color-card">
            <div class="card-body pb-0">
                <span
                    class="custom-font-weight badge badge-pill mb-1 {{ $order->accept == false ? 'badge-danger' : 'badge-success' }} ">
                    {{ $order->accept == false ? 'Pending' : 'Accepted' }} </span>
                @php
                    $clearing = Clearing::where('order_id', $order->id)->first();
                    $form = Form::where('order_id', $order->id)->first();
                    $input = Calculator::where('id', $order->input_currency_type)->first();
                    $output = Element::where('id', $order->output_currency_type)->first();
                @endphp
                @if ($clearing)
                    <span
                        class="custom-font-weight badge badge-pill mb-1 {{ $clearing->clear == false ? 'badge-danger' : 'badge-success' }} ">
                        {{ $clearing->clear == false ? 'Not Clear' : 'Clear' }} </span>
                @endif
                <div class="text-center w-100">

                    <h6 class="mr-2">Order NO: {{ $order->order_number }}</h6>
                    <div class="d-flex justify-content-center align-items-center">

                        <h6 class="mr-2">{{ isset($input->name) ? $input->name : 'NO TEXT' }}</h6>
                        <h4 class="mr-2">{{ $order->input_number ? $order->input_number : 'NO TEXT' }}</h4>
                        <h6 class="mr-2">
                            {{ $order->input_currency_unit ? $order->input_currency_unit : 'NO TEXT' }}</h6>
                    </div>
                    <h3 class="text-danger">TO</h3>
                    <div class="d-flex justify-content-center align-items-center">
                        <h6 class="mr-2">{{ isset($output->name) ? $output->name : 'NO TEXT' }}</h6>
                        <h4 class="mr-2">{{ $order->output_number ? $order->output_number : 'NO TEXT' }}</h4>
                        <h6 class="mr-2">
                            {{ $order->output_currency_unit ? $order->output_currency_unit : 'NO TEXT' }}</h6>
                    </div>
                </div>
                <div class="user">
                    <img src=" {{ $order->user->avatar ? $order->user->avatar : '/defaultImages/avatar.png' }} "
                        alt="user" />
                    <div class="user-info">
                        <h5 class="custom-user-info"> {{ $order->user->name . ' ' . $order->user->family }} </h5>
                        <small class="custom-user-info"> {{ $order->user->email }} </small>
                        <br>
                        <small class="custom-user-info"> {{ $order->user->phone ? $order->user->phone : 'NO PHONE' }}
                        </small>
                        <br>
                        <small
                            class="custom-user-info">{{ $order->user->address ? $order->user->address : 'NO ADDRESS' }}</small>
                        <br>
                        <small class="custom-user-info"> {{ Carbon::parse($order->created_at)->format('d/m/Y') }}
                        </small>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal"
                    data-target="#order-{{ $order->id }}-sm" data-whatever="@mdo">Delete</button>
                <a href=" {{ route('clearing.create', ['order' => $order->id]) }} "
                    class="btn btn-warning btn-sm mr-1">{{ $clearing ? 'Update Doc' : 'Add Doc' }}</a>
                <form action="{{ route('orders.accept', ['order' => $order->id]) }} " method="POST"
                    class="mr-1">
                    @if ($order->accept == false)
                        <button type="submit" class="btn btn-sm btn-success">Accept</button>
                    @else
                        <button type="submit" class="btn btn-sm btn-secondary">Pending</button>
                    @endif
                    @csrf
                </form>
            </div>
            <div class="d-flex justify-content-center mb-2">
                @if ($clearing)
                    <button type="button" class="btn btn-sm btn-info mr-1" data-toggle="modal"
                        data-target="#clearing-{{ $clearing->id }}-sm" data-whatever="@mdo">Show Doc</button>
                @endif
                @if ($form)
                    <button type="button" class="btn btn-sm btn-primary mr-1" data-toggle="modal"
                        data-target="#form-{{ $form->id }}-sm" data-whatever="@mdo">Show Form</button>
                @endif
            </div>
        </div>
        {{-- modal --}}
        <div class="modal fade" id="order-{{ $order->id }}-sm" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content custom-card-color">
                    <div class="modal-body">
                        <form action="{{ route('orders.destroy', ['order' => $order->id]) }}" method="post">
                            <div class="modal-body">
                                @csrf
                                @method('DELETE')
                                <h5 class="text-center">Are you sure you want to delete this order?</h5>
                                <div class="mt-3 ml-4 d-flex justify-content-center">
                                    <button type="button" class="btn btn-secondary mr-2"
                                        data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Yes, Delete order</button>
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
            <div class="modal fade" id="clearing-{{ $clearing->id }}-sm" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content custom-card-color">
                        <div class="modal-body">
                            @if (isset($clearing->images))
                                <div id="myCarousel" class="carousel slide mt-3" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        @foreach ($clearing->images as $key => $item)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                <div class="d-flex justify-content-center">
                                                    <img src="{{ $item->image }}"
                                                        class="d-block w-100 custom-style-user" alt="image">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
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
                            <h5> {{ $clearing->title ? $clearing->title : 'NO TEXT' }} </h5>
                            <p> {{ $clearing->body ? $clearing->body : 'NO TEXT' }} </p>
                        </div>
                        <hr />
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        {{-- end modal --}}
        {{-- modal --}}
        @if ($form)
            <div class="modal fade" id="form-{{ $form->id }}-sm" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content custom-card-color">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="custom-user-info custom-font-size">User PayPal E-mail address: </label>
                                <h6 class="ml-3 mr-3 text-justify mb-3"> {{ $form->email ? $form->email : 'NO TEXT' }}
                                </h6>
                            </div>
                            <div class="form-group">
                                <label class="custom-user-info custom-font-size">User contact E-mail address: </label>
                                <h6 class="ml-3 mr-3 text-justify mb-3">
                                    {{ $form->contact_email ? $form->contact_email : 'NO TEXT' }} </h6>
                            </div>
                            <div class="form-group">
                                <label class="custom-user-info custom-font-size">User {{ $input->name }} wallet:
                                </label>
                                <h6 class="ml-3 mr-3 text-justify mb-3">
                                    {{ $form->wallet ? $form->wallet : 'NO TEXT' }} </h6>
                            </div>
                            @isset($form->telegram)
                                <div class="form-group">
                                    <label class="custom-user-info custom-font-size">User Telegram account: </label>
                                    <h6 class="ml-3 mr-3 text-justify"> {{ $form->telegram }} </h6>
                                </div>
                            @endisset
                            @isset($form->whatsApp)
                                <div class="form-group">
                                    <label class="custom-user-info custom-font-size">User WhatsApp account: </label>
                                    <h6 class="ml-3 mr-3 text-justify"> {{ $form->whatsApp ? $form->whatsApp : 'NO TEXT' }}
                                    </h6>
                                </div>
                            @endisset
                            @isset($form->skype)
                                <div class="form-group">
                                    <label class="custom-user-info custom-font-size">User Skype account: </label>
                                    <h6 class="ml-3 mr-3 text-justify"> {{ $form->skype ? $form->skype : 'NO TEXT' }} </h6>
                                </div>
                            @endisset
                            @isset($form->extra)
                                <div class="form-group">
                                    <label class="custom-user-info custom-font-size">Extra note on your user transaction:
                                    </label>
                                    <p class="ml-3 mr-3 text-justify"> {{ $form->extra ? $form->extra : 'NO TEXT' }} </p>
                                </div>
                            @endisset
                        </div>
                        <hr />
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        {{-- end modal --}}
    @endforeach
</div>
