@php
    use Carbon\Carbon;
@endphp
@extends('adminlte::page')
@section('content')
    <div class="h-indexes custom-background-card p-4">
        <div class="row">
            @include('v1.panel.pages.financial.currency.create-currency')

            @if (count($currencies) != 0)
                <div class="col-sm-12 col-md-12 mt-3">
                    <table class="table table-hover text-center">
                        <thead class="tbh">
                            <tr>
                                <th scope="col" class="color border-0">#</th>
                                <th scope="col" class="color border-0">USER SEND</th>
                                <th scope="col" class="color border-0">MIN AMOUNT</th>
                                <th scope="col" class="color border-0">MAX AMOUNT</th>
                                <th scope="col" class="color border-0">DATE</th>
                                <th scope="col" class="color border-0">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody class="tb">
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($currencies as $currency)
                                <tr class="with-bottom-linear-gradient-to-left">
                                    <td class="text-color border-top-0"> {{ ++$loop->index }} </td>
                                    <td class="text-color border-top-0"> {{ $currency->name }} </td>
                                    <td class="text-color border-top-0"> {{ $currency->min }} </td>
                                    <td class="text-color border-top-0"> {{ $currency->max }} </td>
                                    <td class="text-color border-top-0">
                                        {{ Carbon::parse($currency->created_at)->format('d/m/Y') }}</td>
                                    <td class="text-color border-top-0">
                                        <div class="d-flex justify-content-center mb-2">
                                            <button type="button" class="btns btn-sm text-color pr-3 pl-3 mr-1"
                                                data-toggle="modal" data-target="#currency-{{ $currency->id }}"
                                                data-whatever="@mdo">DELETE</button>
                                            <button type="button" class="btns btn-sm text-color pr-3 pl-3 mr-1"
                                                data-toggle="modal" data-target="#currency-{{ $currency->id }}-update"
                                                data-whatever="@mdo">UPDATE</button>
                                        </div>
                                    </td>
                                </tr>
                                {{-- modal --}}
                                <div class="modal fade" id="currency-{{ $currency->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content background-color-modals modal-border">
                                            <div class="modal-body">
                                                <form
                                                    action="{{ route('currencies.destroy', ['currency' => $currency->id]) }}"
                                                    method="post">
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('DELETE')
                                                        <h5 class="text-center text-color">ARE YOU SURE YOU WANT TO DELETE
                                                            THE {{ $currency->name }}?</h5>
                                                        <div class="mt-3 d-flex justify-content-end">
                                                            <button type="button"
                                                                class="btn text-color pr-4 pl-4 pt-2 pb-2 mr-2 custom-font-size"
                                                                data-dismiss="modal">CANCEL</button>
                                                            <button type="submit"
                                                                class="btns text-color pr-4 pl-4 pt-2 pb-2 custom-font-size">YES,
                                                                DELETE {{ $currency->name }}</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end modal --}}
                                {{-- modal --}}
                                <div class="modal fade" id="currency-{{ $currency->id }}-update" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content background-color-modals modal-border">
                                            <div class="modal-body">
                                                <form
                                                    action="{{ route('currencies.update', ['currency' => $currency->id]) }}"
                                                    method="post">
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="name" class="color">MAKE CONVERSION COST
                                                                NAME</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm background-color-inputs border-0"
                                                                id="name" name="name"
                                                                value="{{ isset($currency->name) ? $currency->name : old('name') }}"
                                                                required>
                                                            @if ($errors->has('name'))
                                                                <span
                                                                    class="d-block text-danger">{{ $errors->first('name') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="min" class="color">GIVE THE MINIMUM
                                                                AMOUNT</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm background-color-inputs border-0"
                                                                id="min" name="min"
                                                                value="{{ isset($currency->min) ? $currency->min : old('min') }}"
                                                                required>
                                                            @if ($errors->has('min'))
                                                                <span
                                                                    class="d-block text-danger">{{ $errors->first('min') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="max" class="color">GIVE THE MAXIMUM
                                                                AMOUNT</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm background-color-inputs border-0"
                                                                id="max" name="max"
                                                                value="{{ isset($currency->max) ? $currency->max : old('max') }}"
                                                                required>
                                                            @if ($errors->has('max'))
                                                                <span
                                                                    class="d-block text-danger">{{ $errors->first('max') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="d-flex justify-content-end mt-3">
                                                            <button type="submit"
                                                                class="btns text-color px-3 btn-sm">SUBMIT</button>
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
                    <div class="d-flex justify-content-start align-items-end show-table">
                        {!! $currencies->render('/vendor.pagination.bootstrap-4') !!}
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
