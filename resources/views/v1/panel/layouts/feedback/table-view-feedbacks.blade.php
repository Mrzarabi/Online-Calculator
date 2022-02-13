@php
    use App\Models\Element;
    use App\Models\Calculator;
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
            <tr class="with-bottom-linear-gradient-to-left">
                <td class="border-top-0 text-color"> {{$i++}} </td>
                <td class="border-top-0 text-color"> {{$feedback->order->user->name . ' ' . $feedback->order->user->family}} </td>
                <td class="text-color border-top-0">{{isset($feedback->order->calculator->name) ? $feedback->order->calculator->name : 'NO TEXT'}}  {{$feedback->order->input_number ? $feedback->order->input_number : 'NO TEXT'}} {{$feedback->order->input_currency_unit ? $feedback->order->input_currency_unit : 'NO TEXT'}}</td>
                <td class="text-color border-top-0">{{isset($feedback->order->element->name) ? $feedback->order->element->name : 'NO TEXT'}}  {{$feedback->order->output_number ? $feedback->order->output_number : 'NO TEXT'}} {{$feedback->order->output_currency_unit ? $feedback->order->output_currency_unit : 'NO TEXT'}}</td>
                @if ($feedback->show)
                    <td class="border-top-0 text-danger">VISIBLE</td>
                @else
                    <td class="border-top-0 text-success">UNVISIBLE</td>
                @endif
                <td class="border-top-0 text-color">{{Carbon::parse($feedback->created_at)->format('d/m/Y')}}</td>
                <td class="border-top-0">
                    <div class="d-flex justify-content-center mb-2">
                        <button type="button" class="btns text-color pr-3 pl-3 mr-1 btn-sm custom-font-size" data-toggle="modal" data-target="#delete-{{$feedback->id}}" data-whatever="@mdo">DELETE</button>
                        <button type="button" class="btns text-color pr-3 pl-3 mr-1 btn-sm custom-font-size" data-toggle="modal" data-target="#read-{{$feedback->id}}" data-whatever="@mdo">READ</button>
                        <form action="{{route('feedbacks.watch', ['feedback' => $feedback->id])}}" method="post">
                            @csrf
                            @method('PUT')
                            
                            <button type="submit" class="btns text-color pr-3 pl-3 mr-1 btn-sm custom-font-size" >UPDATE</button>
                        </form>
                    </div>
                </td>
            </tr>
            {{-- modal --}}
                <div class="modal fade" id="read-{{$feedback->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content background-color-modals modal-border">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="text-color custom-font-size">TEXT </label>
                                    <p class="ml-3 mr-3 text-justify text-color"> {{$feedback->body ? $feedback->body : 'NO TEXT'}} </p>

                                    <div class="d-flex justify-content-end mt-3">
                                        <button type="button" class="btn text-color pr-3 pl-3 mr-1 btn-sm custom-font-size" data-dismiss="modal">CLOSE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- end modal --}}
            {{-- modal --}}
            <div class="modal fade" id="delete-{{$feedback->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content background-color-modals modal-border">
                        <div class="modal-body">
                            <form action="{{ route('feedbacks.destroy', ['feedback' => $feedback->id]) }}" method="post">
                                <div class="modal-body">
                                    @csrf
                                    @method('DELETE')
                                    <h5 class="text-center text-color">ARE YOU SURE YOU WANT TO DELETE THE FEEDBACK?</h5>
                                    <div class="mt-3 d-flex justify-content-end">
                                        <button type="button" class="btn text-color pr-4 pl-4 pt-2 pb-2 mr-2 custom-font-size" data-dismiss="modal">CANCEL</button>
                                        <button type="submit" class="btns text-color pr-4 pl-4 pt-2 pb-2 custom-font-size">YES, DELETE THE FEEDBACK</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        {{-- end modal --}}
        @endforeach
    </tbody>
</table>