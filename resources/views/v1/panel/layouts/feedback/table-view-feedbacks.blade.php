@php
    use App\Models\Clearing;
    use App\Models\Element;
    use App\Models\Calculator;
    use App\Models\Ticket;
    use App\Models\Order;
    use Carbon\Carbon;
@endphp
<table class="table table-hover text-center show-table">
    <thead class="tbh">
        <tr>
            <th scope="col" class="color border-0">#</th>
            <th scope="col" class="color border-0">USER</th>
            <th scope="col" class="color border-0">SEND</th>
            <th scope="col" class="color border-0">RECEIVE</th>
            <th scope="col" class="color border-0">STATUS</th>
            <th scope="col" class="color border-0">DATE</th>
            <th scope="col" class="color border-0">ACTIONS</th>
        </tr>
    </thead>
    <tbody class="tb">
        @php
            $i = 1;
        @endphp
        @foreach ($feedbacks as $feedback)
        @php
            $order = Order::where('id', $feedback->order_id)->first();
            $input = Calculator::where('id', $order->input_currency_type)->first();
            $output = Element::where('id', $order->output_currency_type)->first();
        @endphp
            <tr class="with-bottom-linear-gradient-to-left">
                <td class="border-top-0 text-color"> {{$i++}} </td>
                <td class="border-top-0 text-color"> {{$order->user->name . ' ' . $order->user->family}} </td>
                <td class="text-color border-top-0">{{isset($input->name) ? $input->name : 'NO TEXT'}}  {{$order->input_number ? $order->input_number : 'NO TEXT'}} {{$order->input_currency_unit ? $order->input_currency_unit : 'NO TEXT'}}</td>
                <td class="text-color border-top-0">{{isset($output->name) ? $output->name : 'NO TEXT'}}  {{$order->output_number ? $order->output_number : 'NO TEXT'}} {{$order->output_currency_unit ? $order->output_currency_unit : 'NO TEXT'}}</td>
                @if ($feedback->show)
                    <td class="border-top-0 text-danger">VISIBLE</td>
                @else
                    <td class="border-top-0 text-success">UNVISIBLE</td>
                @endif
                <td class="border-top-0 text-color">{{Carbon::parse($feedback->created_at)->format('d/m/Y')}}</td>
                <td class="border-top-0">
                    <div class="d-flex justify-content-center mb-2">
                        <button type="button" class="btns btn-sm color mr-1" data-toggle="modal" data-target="#watch-{{$feedback->id}}" data-whatever="@mdo">WATCH</button>
                        <form action="{{route('feedbacks.watch', ['feedback' => $feedback->id])}}" method="post">
                            @csrf
                            @method('PUT')
                            
                            <button type="submit" class="btns btn-sm color" >UPDATE</button>
                        </form>
                    </div>
                </td>
            </tr>
            {{-- modal --}}
                <div class="modal fade" id="watch-{{$feedback->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content background-color-modals modal-border">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="text-color custom-font-size">TEXT </label>
                                    <p class="ml-3 mr-3 text-justify text-color"> {{$feedback->body ? $feedback->body : 'NO TEXT'}} </p>

                                    <div class="d-flex justify-content-end mt-3">
                                        <button type="button" class="btn color pr-3 pl-3 mr-1 btn-sm custom-font-size" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- end modal --}}
        @endforeach
    </tbody>
</table>