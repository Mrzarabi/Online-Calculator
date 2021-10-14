@php
    use App\Models\Calculator;
    use Carbon\Carbon;
@endphp
@extends('adminlte::page')
@section('content')

<!-- Search form -->
@include('v1.panel.layouts.element.search-element')

<div class="row">

    {{-- create element --}}
    @include('v1.panel.layouts.element.create-element')

    @if (isset($elements))
    <div class="container mt-4">
        @foreach ($elements as $element)
        <div class="card custom-card-color">
            <div class="card-body pb-0">
                <span class="badge badge-pill mb-1 custom-font-weight badge-success"> {{ Carbon::parse($element->created_at)->format('d/m/Y') }} </span>
                <div class="text-center w-100">
                    <div class="text-center">
                        @php
                            $calculator = Calculator::where('id', $element->calculator_id)->first();
                        @endphp
                        <h6 class="mr-2">Left Side: {{$calculator->name}}</h6>
                        <h4 class="mr-2">{{$element->price}}%</h4>
                        <h6 class="mr-2">Right side: {{$element->name}}</h6>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#element-{{$element->id}}" data-whatever="@mdo">Delete</button>
                <button type="button" class="btn btn-sm btn-warning mr-1" data-toggle="modal" data-target="#element-{{$element->id}}-update" data-whatever="@mdo">Update</button>
            </div>
        </div>
        {{-- modal --}}
            <div class="modal fade" id="element-{{$element->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content custom-card-color">
                        <div class="modal-body">
                            <form action="{{ route('elements.destroy', ['element' => $element->id]) }}" method="post">
                                <div class="modal-body">
                                    @csrf
                                    @method('DELETE')
                                    <h5 class="text-center">Are you sure you want to delete the {{$element->name}}?</h5>
                                    <div class="mt-3 d-flex justify-content-end">
                                        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Yes, Delete {{$element->name}}</button>
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
                    <div class="modal-content custom-card-color">
                        <div class="modal-body">
                            <form action="{{ route('elements.update', ['element' => $element->id]) }}" method="post">
                                <div class="modal-body">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">You Will Send To Your User (Left Side)</label>
                                        <select name="calculator_id" class="form-control form-control-sm custom-form-control" id="calculator_id" name="calculator_id" selected required>
                                            <option selected value="{{$calculator->id}}" >{{ isset($element->calculator_id) && $element->calculator_id == $calculator->id ? $calculator->name : ''}} </option>
                                            @foreach ($calculators as $calculator)
                                                @if ($element->calculator_id != $calculator->id)
                                                        <option value="{{$calculator->id}}"> {{$calculator->name}} </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your User will Send To You (Right Side)</label>
                                        <input type="text" class="form-control form-control-sm custom-form-control" id="name" name="name" value="{{isset($element->name) ? $element->name : old('name')}}" required>
                                        @if ($errors->has('name'))
                                            <span class="d-block text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Define Price</label>
                                        <input type="float" class="form-control form-control-sm custom-form-control" id="price" name="price" value="{{isset($element->price) ? $element->price : old('price')}}" required>
                                        @if ($errors->has('price'))
                                            <span class="d-block text-danger">{{ $errors->first('price') }}</span>
                                        @endif
                                    </div>
                                    <div class="d-flex justify-content-end mt-3">
                                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        {{-- end modal --}}
        @endforeach
    </div>
    @endif
</div>
<div class="d-flex justify-content-center show-table">
    {!! $elements->render('/vendor.pagination.bootstrap-4') !!}
</div>
@endsection

