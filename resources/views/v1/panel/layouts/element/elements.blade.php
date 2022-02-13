@php
    use Carbon\Carbon;
@endphp
@extends('adminlte::page')
@section('content')


<div class="custom-background-card h-indexes p-4">
    <!-- Search form -->
    @include('v1.panel.layouts.element.search-element')
    <div class="row">
        {{-- create element --}}
        @include('v1.panel.layouts.element.create-element')
    
        @if (count($elements) != 0)
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
                        @foreach ($elements as $element)
                            <tr class="with-bottom-linear-gradient-to-left">
                                <td class="text-color border-top-0"> {{$i++}} </td>
                                <td class="text-color border-top-0"> {{$element->calculator->name}} </td>
                                <td class="text-color border-top-0"> {{$element->price}} </td>
                                <td class="text-color border-top-0"> {{$element->name}} </td>
                                <td class="text-color border-top-0">{{Carbon::parse($element->created_at)->format('d/m/Y')}}</td>
                                <td class="text-color border-top-0">
                                    <div class="d-flex justify-content-center mb-2">
                                        <button type="button" class="btns btn-sm text-color pr-3 pl-3 mr-1" data-toggle="modal" data-target="#element-{{$element->id}}" data-whatever="@mdo">DELETE</button>
                                        <button type="button" class="btns btn-sm text-color pr-3 pl-3 mr-1" data-toggle="modal" data-target="#element-{{$element->id}}-update" data-whatever="@mdo">UPDATE</button>
                                    </div>
                                </td>
                            </tr>
                            {{-- modal --}}
                                <div class="modal fade" id="element-{{$element->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content background-color-modals modal-border">
                                            <div class="modal-body">
                                                <form action="{{ route('elements.destroy', ['element' => $element->id]) }}" method="post">
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('DELETE')
                                                        <h5 class="text-center text-color">ARE YOU SURE YOU WANT TO DELETE THE {{$element->name}}?</h5>
                                                        <div class="mt-3 d-flex justify-content-end">
                                                            <button type="button" class="btn text-color pr-4 pl-4 pt-2 pb-2 mr-2 custom-font-size" data-dismiss="modal">CANCEL</button>
                                                            <button type="submit" class="btns text-color pr-4 pl-4 pt-2 pb-2 custom-font-size">YES, DELETE {{$element->name}}</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{-- end modal --}}
                            {{-- modal --}}
                                <div class="modal fade" id="element-{{$element->id}}-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content background-color-modals modal-border">
                                            <div class="modal-body">
                                                <form action="{{ route('elements.update', ['element' => $element->id]) }}" method="post">
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="name" class="color">YOUR USER WILL SENT TO YOU (LEFT SIDE)</label>
                                                            <select name="calculator_id" class="form-control form-control-sm background-color-inputs border-0" id="calculator_id" name="calculator_id" selected required>
                                                                <option selected value="{{$element->calculator->id}}" >{{ isset($element->calculator_id) && $element->calculator_id == $element->calculator->id ? $element->calculator->name : ''}} </option>
                                                                @foreach ($calculators as $calculator)
                                                                    @if ($element->calculator_id != $calculator->id)
                                                                            <option value="{{$calculator->id}}"> {{$calculator->name}} </option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name" class="color">YOU  WILL SEND TO YOUR USER (RIGHT SIDE)</label>    
                                                            <input type="text" class="form-control form-control-sm background-color-inputs border-0" id="name" name="name" value="{{isset($element->name) ? $element->name : old('name')}}" required>
                                                            @if ($errors->has('name'))
                                                                <span class="d-block text-danger">{{ $errors->first('name') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="price" class="color">DEFINE PRICE</label>
                                                            <input type="float" class="form-control form-control-sm background-color-inputs border-0" id="price" name="price" value="{{isset($element->price) ? $element->price : old('price')}}" required>
                                                            @if ($errors->has('price'))
                                                                <span class="d-block text-danger">{{ $errors->first('price') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="d-flex justify-content-end mt-3">
                                                            <button type="button" class="btn text-color pr-4 pl-4 pt-2 pb-2 mr-2 custom-font-size" data-dismiss="modal">CANCEL</button>
                                                            <button type="submit" class="btns text-color pr-3 pl-3 btn-sm">UPDATE</button>
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
                    {!! $elements->render('/vendor.pagination.bootstrap-4') !!}
                </div>
            </div>
        @endif
    </div>
</div>

@endsection

