@php
    use App\Models\Clearing;
    use App\Models\Form;
    use App\Models\Calculator;
    use App\Models\Element;
    use App\Models\Feedback;
    use Carbon\Carbon;
@endphp
@if (count($orders) != 0)
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
                    <td class="border-top-0 text-color"> {{$i++}} </td>
                    <td class="border-top-0 text-color"> {{$order->order_no}} </td>
                    @php
                        $input = Calculator::where('id', $order->input_currency_type)->first();
                        $output = Element::where('id', $order->output_currency_type)->first();
                    @endphp
                    <td class="border-top-0 text-color">{{isset($input->name) ? $input->name : 'NO TEXT'}}  {{$order->input_number ? $order->input_number : 'NO TEXT'}} {{$order->input_currency_unit ? $order->input_currency_unit : 'NO TEXT'}}</td>
                    <td class="border-top-0 text-color">{{$output->name ? $output->name : 'NO TEXT'}}  {{$order->output_number ? $order->output_number : 'NO TEXT'}} {{$order->output_currency_unit ? $order->output_currency_unit : 'NO TEXT'}}</td>
                    <td class="border-top-0 text-color">{{Carbon::parse($order->created_at)->format('d/m/Y')}}</td>
                    <td class="border-top-0 text-color">
                        <div class="d-flex justify-content-center mb-2">
                            @php
                                $clearing = Clearing::where('order_id', $order->id)->first();
                                $form = Form::where('order_id', $order->id)->first();
                            @endphp
                            @if ($clearing)
                                <button type="button" class="btns btn-sm mr-1 color" data-toggle="modal" data-target="#clearing-{{$clearing->id}}" data-whatever="@mdo">Show Doc</button>
                            @endif
                            @if ($form)
                                <button type="button" class="btns btn-sm mr-1 color" data-toggle="modal" data-target="#form-{{$form->id}}" data-whatever="@mdo">Show Form</button>
                            @endif
                            @if ($order->accept == true)
                                <button type="submit" class="btns btn-sm color">Accepted</button>
                                @php
                                    $feedback = Feedback::where('order_id', $order->id)->first();
                                @endphp

                                @if ($feedback)
                                    
                                    <button type="button" class="btns btn-sm ml-1 color" data-toggle="modal" data-target="#readFeedback-{{$feedback->id}}" data-whatever="@mdo">Reed Feedback</button>
                                @else

                                    <button type="button" class="btns btn-sm ml-1 color" data-toggle="modal" data-target="#showFeedback-{{$order->id}}" data-whatever="@mdo">Write Feedback</button>
                                @endif
                            @else 
                                <button type="submit" class="btns btn-sm color">Pending</button>
                            @endif
                        </div>
                    </td>
                </tr>
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
                    @if ($form)
                    <div class="modal fade" id="form-{{$form->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content custom-card-color">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="custom-user-info custom-font-size">Your PayPal E-mail address: </label>
                                        <h6 class="ml-3 mr-3 text-justify mb-3"> {{$form->email ? $form->email : 'NO TEXT'}} </h6>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-user-info custom-font-size">Your content E-mail address: </label>
                                        <h6 class="ml-3 mr-3 text-justify mb-3"> {{$form->contact_email ? $form->contact_email : 'NO TEXT'}} </h6>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-user-info custom-font-size">Your {{$input->name}} wallet: </label>
                                        <h6 class="ml-3 mr-3 text-justify mb-3"> {{$form->wallet ? $form->wallet : 'NO TEXT'}} </h6>
                                    </div>
                                    @isset($form->telegram)
                                        <div class="form-group">
                                            <label class="custom-user-info custom-font-size">Your Telegram account: </label>
                                            <h6 class="ml-3 mr-3 text-justify"> {{$form->telegram}} </h6>
                                        </div>
                                    @endisset
                                    @isset($form->whatsApp)
                                        <div class="form-group">
                                            <label class="custom-user-info custom-font-size">Your WhatsApp account: </label>
                                            <h6 class="ml-3 mr-3 text-justify"> {{$form->whatsApp ? $form->whatsApp : 'NO TEXT'}} </h6>
                                        </div>
                                    @endisset
                                    @isset($form->skype)
                                        <div class="form-group">
                                            <label class="custom-user-info custom-font-size">Your Skype account: </label>
                                            <h6 class="ml-3 mr-3 text-justify"> {{$form->skype ? $form->skype : 'NO TEXT'}} </h6>
                                        </div>
                                    @endisset
                                    @isset($form->extra)
                                        <div class="form-group">
                                            <label class="custom-user-info custom-font-size">Extra note on your transaction: </label>
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
                {{-- modal --}}
                    @if (isset($feedback))
                        <div class="modal fade" id="readFeedback-{{$feedback->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content background-color-modals modal-border">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="text-color custom-font-size">Your Feedback to this Transition: </label>
                                            <p class="ml-3 mr-3 text-justify text-color"> {{$feedback->body ? $feedback->body : 'NO TEXT'}} </p>
                                            
                                            <div class="d-flex justify-content-end mt-3">
                                                <button type="button" class="btn color pr-3 pl-3 mr-1 btn-sm custom-font-size" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                {{-- end modal --}}
                {{-- modal --}}
                    <div class="modal fade" id="showFeedback-{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        </tbody>
    </table>
@else
    <p class="text-color text-center show-table">CURRENTLY THERE IS NO ORDER CREATED</p>
@endif