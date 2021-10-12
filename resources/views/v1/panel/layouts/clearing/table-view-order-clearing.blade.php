@php
    use App\Models\Clearing;
    use App\Models\Form;
    use App\Models\Calculator;
    use App\Models\Element;
    use Carbon\Carbon;
@endphp
<table class="table table-hover table-dark text-center show-table">
    <thead>
        <tr>
            <th scope="col" class="custom-text-color">#</th>
            <th scope="col" class="custom-text-color">Order NO</th>
            <th scope="col" class="custom-text-color">Send</th>
            <th scope="col" class="custom-text-color">Receive</th>
            <th scope="col" class="custom-text-color">Date</th>
            <th scope="col" class="custom-text-color">Actions</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        <tr>
            <td scope="row"> {{$i++}} </td>
            <td scope="row"> {{$order->order_no}} </td>
            @php
                $form = Form::where('order_id', $order->id)->first();
                $input = Calculator::where('id', $order->input_currency_type)->first();
                $output = Element::where('id', $order->output_currency_type)->first();
            @endphp
            <td>{{isset($input->name) ? $input->name : 'NO TEXT'}}  {{$order->input_number ? $order->input_number : 'NO TEXT'}} {{$order->input_currency_unit ? $order->input_currency_unit : 'NO TEXT'}}</td>
            <td>{{isset($output->name) ? $output->name : 'NO TEXT'}}  {{$order->output_number ? $order->output_number : 'NO TEXT'}} {{$order->output_currency_unit ? $order->output_currency_unit : 'NO TEXT'}}</td>
            <td>{{Carbon::parse($order->created_at)->format('d/m/Y')}}</td>
            <td>
                <div class="d-flex justify-content-center mb-2">
                    <button type="button" class="btn btn-sm btn-dark mr-1" data-toggle="modal" data-target="#user-{{$order->user->id}}" data-whatever="@mdo">User Info</button> 
                    @if ($form)
                        <button type="button" class="btn btn-sm btn-primary mr-1" data-toggle="modal" data-target="#form-{{$form->id}}" data-whatever="@mdo">Show Form</button>
                    @endif
                    <form action="{{route('orders.accept', ['order' => $order->id])}} " method="POST" class="mr-1">
                        @if ($order->accept == true)
                            <button type="submit" class="btn btn-sm btn-success">Accepted</button>
                        @else 
                            <button type="submit" class="btn btn-sm btn-secondary">Pending</button>
                        @endif
                        @csrf
                    </form>
                </div>
            </td>
        </tr>
        {{-- end modal --}}
        {{-- modal --}}
            <div class="modal fade" id="user-{{$order->user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content custom-card-color">
                        <div class="modal-body">
                            <div class="container">
                                <div class="card custom-card-color">
                                    <div class="card-header">
                                        <img src=" {{$order->user->avatar ? $order->user->avatar : '/defaultImages/avatar.png'}} " alt="user" />
                                    </div>
                                    <div class="card-body pb-0">
                                        <span class="tag tag-teal">{{$order->user->email}}</span>
                                        <h4>{{$order->user->name . ' ' . $order->user->family}}</h4>
                                        <h6>{{$order->user->address ? $order->user->address : 'NO ADDRESS'}}</h6>
                                        <h6>{{$order->user->phone ? $order->user->phone : 'NO PHONE'}}</h6>
                                        <div class="user">
                                            <div class="user-info">
                                                <small class="custom-user-info"> {{ Carbon::parse($order->user->created_at)->format('d/m/Y')}} </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                <label class="custom-user-info custom-font-size">User PayPal wallet: </label>
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
    </tbody>
</table>