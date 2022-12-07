     

@php
    use App\Models\Calculator;
    use App\Models\Element;
    use App\Models\Order;
    use Carbon\Carbon;
@endphp
@extends('v1.view.app')
@section('content')
    <div class="container p-0 position-relative custom-h100">
        <div class="col-md-12">
            @include('v1.view.layouts.top')
        </div>
        <div class="col-md-12 form-background h70 show-table">
            <h6 class="site-color text-center mb-3"> FEEDBACKS </h6>
            <div class="row d-flex justify-content-center h80">
                <div class="p-4 with-linear-gradient w80">
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
                                    <tr class="with-bottom-linear-gradient-to-left">
                                        <td class="border-top-0 text-color custom-vertical-align"> {{$i++}} </td>
                                        <td class="border-top-0 text-color custom-vertical-align"> {{$feedback->order->user->name . ' ' . $feedback->order->user->family}} </td>
                                        <td class="text-color border-top-0 custom-vertical-align">{{isset($feedback->order->calculator->name) ? $feedback->order->calculator->name : 'NO TEXT'}}  {{$feedback->order->input_number ? $feedback->order->input_number : 'NO TEXT'}} {{$feedback->order->input_currency_unit ? $feedback->order->input_currency_unit : 'NO TEXT'}}</td>
                                        <td class="text-color border-top-0 custom-vertical-align">{{isset($feedback->order->element->name) ? $feedback->order->element->name : 'NO TEXT'}}  {{$feedback->order->output_number ? $feedback->order->output_number : 'NO TEXT'}} {{$feedback->order->output_currency_unit ? $feedback->order->output_currency_unit : 'NO TEXT'}}</td>
                                        <td class="border-top-0 text-color custom-vertical-align">{{Carbon::parse($feedback->created_at)->format('d/m/Y')}}</td>
                                        <td class="border-top-0">
                                            <div class="d-flex justify-content-center mb-2">
                                                <button type="button" class="btns btn-sm custom-font-size text-color mr-1" data-toggle="modal" data-target="#read-{{$feedback->id}}" data-whatever="@mdo">READ</button>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- modal --}}
                                        <div class="modal fade" id="read-{{$feedback->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content background-color-modals modal-border">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="text-color custom-font-size mb-2">TEXT </label>
                                                            <p class="ml-3 mr-3 text-justify text-color"> {{$feedback->body ? $feedback->body : 'NO TEXT'}} </p>
                        
                                                            <div class="d-flex justify-content-end mt-3">
                                                                <button type="button" class="btn site-color pr-3 pl-3 mr-1 btn-sm custom-font-size" data-dismiss="modal">CLOSE</button>
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
        <div class="col-12 form-background show-card">
            <div class="container">
                @foreach ($feedbacks as $feedback)
                    <div class="custom-background-card custom-card p-4 mb-2">
                        <div class="card-body pb-0">
                            <h4 class="custom-font-size mb-1 site-color"> {{ $feedback->order->user->name . ' ' . $feedback->order->user->family }} </h4>
                            <div class="text-center w-100">
                                <div class="d-flex justify-content-center align-items-center">
                                    <h6 class="mr-2 text-color">{{isset($feedback->order->calculator->name) ? $feedback->order->calculator->name : 'NO TEXT'}}</h6>
                                    <h4 class="mr-2 text-color">{{$feedback->order->input_number ? $feedback->order->input_number : 'NO TEXT'}}</h4>
                                    <h6 class="mr-2 text-color">{{$feedback->order->input_currency_unit ? $feedback->order->input_currency_unit : 'NO TEXT'}}</h6>
                                </div>
                                    <h3 class="color">TO</h3>
                                <div class="d-flex justify-content-center align-items-center">
                                    <h6  class="mr-2 text-color">{{isset($feedback->order->element->name) ? $feedback->order->element->name : 'NO TEXT'}}</h6>
                                    <h4  class="mr-2 text-color">{{$feedback->order->output_number ? $feedback->order->output_number : 'NO TEXT'}}</h4>
                                    <h6  class="mr-2 text-color">{{$feedback->order->output_currency_unit ? $feedback->order->output_currency_unit : 'NO TEXT'}}</h6>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <h6 class="mr-2 mb-2 custom-font-size text-color">{{Carbon::parse($feedback->order->created_at)->format('d/m/Y')}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mb-2">
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btns btn-sm custom-font-size text-color mr-1" data-toggle="modal" data-target="#read-sm-{{$feedback->id}}" data-whatever="@mdo">READ</button>
                            </div>
                        </div>
                    </div>
                    {{-- modal --}}
                        <div class="modal fade" id="read-sm-{{$feedback->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content background-color-modals modal-border">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="text-color custom-font-size mb-2">TEXT </label>
                                            <p class="ml-3 mr-3 text-justify text-color"> {{$feedback->body ? $feedback->body : 'NO TEXT'}} </p>
        
                                            <div class="d-flex justify-content-end mt-3">
                                                <button type="button" class="btn site-color pr-3 pl-3 mr-1 btn-sm custom-font-size" data-dismiss="modal">CLOSE</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- end modal --}}
                @endforeach
            </div>
        </div>
        <div class="footer col-md-12 my-3">
            @include('v1.view.layouts.footer')
        </div>
    </div>
@endsection