     

@php
    use App\Models\Calculator;
    use App\Models\Element;
    use App\Models\Order;
    use Carbon\Carbon;
@endphp
@extends('v1.view.app')
@section('content')
    <div class="container p-0"  style="height: 100%">
        @include('v1.view.layouts.top')
        <div class="col-md-12" style="width: 100%; background-color: #0501003b; height: 70%;">
            <h6 class="site-color text-center mb-3"> FEEDBACKS </h6>
            <div class="row d-flex justify-content-center" style="width: 100%; height: 80%;">
                <div class="p-4 with-linear-gradient" style="border-radius: 4px; width: 80%; height: 100%;">
                    <div class="col-md-12">
                        <table class="table table-hover text-center show-table">
                            <thead class="tbh">
                                <tr>
                                    <th scope="col" class="site-color border-0">#</th>
                                    <th scope="col" class="site-color border-0">USER</th>
                                    <th scope="col" class="site-color border-0">SEND</th>
                                    <th scope="col" class="site-color border-0">RECEIVE</th>
                                    <th scope="col" class="site-color border-0">DATE</th>
                                    <th scope="col" class="site-color border-0">ACTIONS</th>
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
                                        <td class="border-top-0 text-color">{{Carbon::parse($feedback->created_at)->format('d/m/Y')}}</td>
                                        <td class="border-top-0">
                                            <div class="d-flex justify-content-center mb-2">
                                                <button type="button" class="btns btn-sm text-color mr-1" data-toggle="modal" data-target="#watch-{{$feedback->id}}" data-whatever="@mdo">WATCH</button>
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
                                                                <button type="button" class="btn site-color pr-3 pl-3 mr-1 btn-sm custom-font-size" data-dismiss="modal">Close</button>
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
                    </div>
                    <div class="d-flex justify-content-start align-items-end show-table">
                        {!! $feedbacks->render('/vendor.pagination.bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="footer" style="width: 100%; height: 12%;">
            @include('v1.view.layouts.footer')
        </div>
    </div>
@endsection