@php
    use Carbon\Carbon;
@endphp
@extends('adminlte::page')
@section('content')
<div class="row">
   @include('v1.panel.layouts.calculator.create-calculator')
    
    <div class="col-sm-12 col-md-8 offset-md-2 mt-3">
        <div class="bg-dark rounded">
            @if (isset($calculators))
                <table class="table table-hover table-dark text-center">
                    <thead>
                        <tr>
                            <th scope="col" class="custom-text-color">#</th>
                            <th scope="col" class="custom-text-color">Name</th>
                            <th scope="col" class="custom-text-color">Date</th>
                            <th scope="col" class="custom-text-color">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($calculators as $calculator)
                            <tr>
                                <td scope="row"> {{$i++}} </td>
                                <td scope="row"> {{$calculator->name}} </td>
                                <td>{{ Carbon::parse($calculator->created_at)->format('d/m/Y') }}</td>
                                <td>
                                    <div class="d-flex justify-content-center mb-2">
                                        <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#calculator-{{$calculator->id}}" data-whatever="@mdo">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            {{-- modal --}}
                                <div class="modal fade" id="calculator-{{$calculator->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content custom-card-color">
                                            <div class="modal-body">
                                                <form action="{{ route('calculators.destroy', ['calculator' => $calculator->id]) }}" method="post">
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('DELETE')
                                                        <h5 class="text-center">Are you sure you want to delete the {{$calculator->name}}?</h5>
                                                        <div class="mt-3 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Yes, Delete {{$calculator->name}}</button>
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
            @endif            
        </div>
    </div>
</div>
@endsection

