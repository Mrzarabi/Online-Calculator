@php
use Carbon\Carbon;
@endphp
@extends('adminlte::page')
@section('content')


    <div class="custom-background-card h-indexes p-4">
        <!-- Search form -->
        @include('v1.panel.pages.financial.exchange.search-exchange')
        <div class="row">
            {{-- create exchange --}}
            @include('v1.panel.pages.financial.exchange.create-exchange')

            @if (count($exchanges) != 0)
                <div class="col-md-12 mt-4">
                    <table class="table table-hover text-center show-table">
                        <thead class="tbh">
                            <tr>
                                <th scope="col" class="color border-0">#</th>
                                <th scope="col" class="color border-0">USER SEND</th>
                                <th scope="col" class="color border-0">COST</th>
                                <th scope="col" class="color border-0">USER RECEIVE</th>
                                <th scope="col" class="color border-0">DATE</th>
                                <th scope="col" class="color border-0">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody class="tb">
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($exchanges as $exchange)
                                <tr class="with-bottom-linear-gradient-to-left">
                                    <td class="text-color border-top-0"> {{ $i++ }} </td>
                                    <td class="text-color border-top-0"> {{ $exchange->currency->name }} </td>
                                    <td class="text-color border-top-0"> {{ $exchange->price }} </td>
                                    <td class="text-color border-top-0"> {{ $exchange->name }} </td>
                                    <td class="text-color border-top-0">
                                        {{ Carbon::parse($exchange->created_at)->format('d/m/Y') }}</td>
                                    <td class="text-color border-top-0">
                                        <div class="d-flex justify-content-center mb-2">
                                            <button type="button" class="btns btn-sm text-color pr-3 pl-3 mr-1"
                                                data-toggle="modal" data-target="#exchange-{{ $exchange->id }}"
                                                data-whatever="@mdo">DELETE</button>
                                            <button type="button" class="btns btn-sm text-color pr-3 pl-3 mr-1"
                                                data-toggle="modal" data-target="#exchange-{{ $exchange->id }}-update"
                                                data-whatever="@mdo">UPDATE</button>
                                        </div>
                                    </td>
                                </tr>
                                {{-- modal --}}
                                <div class="modal fade" id="exchange-{{ $exchange->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content background-color-modals modal-border">
                                            <div class="modal-body">
                                                <form
                                                    action="{{ route('exchanges.destroy', ['exchange' => $exchange->id]) }}"
                                                    method="post">
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('DELETE')
                                                        <h5 class="text-center text-color">ARE YOU SURE YOU WANT TO DELETE
                                                            THE {{ $exchange->name }}?</h5>
                                                        <div class="mt-3 d-flex justify-content-end">
                                                            <button type="button"
                                                                class="btn text-color pr-4 pl-4 pt-2 pb-2 mr-2 custom-font-size"
                                                                data-dismiss="modal">CANCEL</button>
                                                            <button type="submit"
                                                                class="btns text-color pr-4 pl-4 pt-2 pb-2 custom-font-size">YES,
                                                                DELETE {{ $exchange->name }}</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end modal --}}
                                {{-- modal --}}
                                <div class="modal fade" id="exchange-{{ $exchange->id }}-update" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content background-color-modals modal-border">
                                            <div class="modal-body">
                                                <form
                                                    action="{{ route('exchanges.update', ['exchange' => $exchange->id]) }}"
                                                    method="post">
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="name" class="color">YOUR USER WILL SENT TO YOU
                                                                (LEFT SIDE)
                                                            </label>
                                                            <select name="currency_id"
                                                                class="form-control form-control-sm background-color-inputs border-0"
                                                                id="currency_id" name="currency_id" selected required>
                                                                <option selected value="{{ $exchange->currency->id }}">
                                                                    {{ isset($exchange->currency_id) && $exchange->currency_id == $exchange->currency->id ? $exchange->currency->name : '' }}
                                                                </option>
                                                                @foreach ($currencies as $currency)
                                                                    @if ($exchange->currency_id != $currency->id)
                                                                        <option value="{{ $currency->id }}">
                                                                            {{ $currency->name }} </option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="color">YOU WILL SEND TO YOUR USER
                                                                (RIGHT SIDE)</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm background-color-inputs border-0"
                                                                id="name" name="name"
                                                                value="{{ isset($exchange->name) ? $exchange->name : old('name') }}"
                                                                required>
                                                            @if ($errors->has('name'))
                                                                <span
                                                                    class="d-block text-danger">{{ $errors->first('name') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="price" class="color">DEFINE PRICE</label>
                                                            <input type="float"
                                                                class="form-control form-control-sm background-color-inputs border-0"
                                                                id="price" name="price"
                                                                value="{{ isset($exchange->price) ? $exchange->price : old('price') }}"
                                                                required>
                                                            @if ($errors->has('price'))
                                                                <span
                                                                    class="d-block text-danger">{{ $errors->first('price') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="d-flex justify-content-end mt-3">
                                                            <button type="button"
                                                                class="btn text-color pr-4 pl-4 pt-2 pb-2 mr-2 custom-font-size"
                                                                data-dismiss="modal">CANCEL</button>
                                                            <button type="submit"
                                                                class="btns text-color pr-3 pl-3 btn-sm">UPDATE</button>
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
                    <div class="d-flex justify-content-start show-table">
                        {!! $exchanges->render('/vendor.pagination.bootstrap-4') !!}
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
