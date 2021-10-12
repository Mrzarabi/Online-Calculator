@php
    use App\Models\Clearing;
    use App\Models\Form;
    use App\Models\Calculator;
    use App\Models\Ticket;
    use Carbon\Carbon;
@endphp
@extends('adminlte::page')
@section('content')
    <!-- Search form -->
    {{-- <div class="row">
        <div class="col-md-8 offset-md-2 col-sm-12">
            <form class="d-flex justify-content-center mb-3" action="{{route('order.search')}}" method="get">
                <div class="input-group">
                    <input type="search" class="form-control custom-form-control" placeholder="Search" aria-label="Search"
                        aria-describedby="search-addon" name="search" value="{{old('order')}}"/>
                    <button type="submit" class="btn btn-sm btn-warning">Search</button>
                    <a href=" {{route('orders.index')}} " class="btn btn-sm btn-warning ml-5">See All Orders</a>
                </div>
            </form>
        </div>
    </div> --}}
    <div class="d-flex justify-content-center mb-5">
        <button type="button" class="btn btn-primary justify-center" data-toggle="modal" data-target="#create-starter-sm" data-whatever="@mdo">Create New Session</button>
    </div>
    {{-- modal --}}
        <div class="modal fade" id="create-starter-sm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content custom-card-color">
                    <div class="modal-body">
                        <div class="form-group">
                            <form action=" {{route('customer.starters.store')}} " method="post">
                                @csrf

                                <label for="title">Title</label>
                                <input type="text" class="form-control form-control-sm custom-form-control" id="title" name="title" value="{{isset($starter) ? $starter->title : old('title')}}">
                                @if ($errors->has('title'))
                                    <span class="d-block text-danger">{{ $errors->first('title') }}</span>
                                @endif

                                <div class="d-flex justify-content-end mt-3">
                                    <a href=" {{route('customer.starters.index')}} " class="btn btn-secondary btn-sm mr-2">Cancel</a>
                                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- end modal --}}
    <table class="table table-hover table-dark text-center">
        <thead>
            <tr>
                <th scope="col" class="custom-text-color">#</th>
                <th scope="col" class="custom-text-color">Title</th>
                <th scope="col" class="custom-text-color">Answerd</th>
                <th scope="col" class="custom-text-color">Clsoed</th>
                <th scope="col" class="custom-text-color">Date</th>
                <th scope="col" class="custom-text-color">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($starts as $start)
                <tr>
                    <td scope="row"> {{$i++}} </td>
                    <td scope="row"> {{$start->title}} </td>
                    <td>{{$start->answerd ? 'New ticket' : 'No ticket'}}</td>
                    <td>{{$start->closed ? 'Session is closed' : 'Session is open'}}</td>
                    <td>{{Carbon::parse($start->created_at)->format('d/m/Y')}}</td>
                    <td>
                        <div class="d-flex justify-content-center mb-2">
                            <a href=" {{route('tickets.create', ['starter' => $start->id])}} " class="btn btn-warning btn-sm mr-1">Send Ticket</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center show-table">
        {!! $starts->render('/vendor.pagination.bootstrap-4') !!}
    </div>
@endsection

