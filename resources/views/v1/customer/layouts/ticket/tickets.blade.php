@php
    use App\Models\Ticket;
@endphp
@extends('adminlte::page')
@section('content')
    <div class="d-flex justify-content-center mb-5">
        <a href=" {{route('customer.tickets.create')}} " class="btn btn-primary justify-center">Create New Ticket</a>
    </div>
    <div class="container">
        @foreach ($tickets as $ticket)
            <div class="card custom-card-color">
                <div class="card-header">
                    <img src=" {{$ticket->image ? $ticket->image : '/defaultImages/1.jpg'}} " alt="ticket" />
                </div>
                <div class="card-body pb-0">
                    @php
                        switch ($ticket->importance) {
                        case 0:
                            $value = "Not Important";
                            break;
                        case 1:
                            $value = "A little Important";
                            break;
                        case 2:
                            $value = "Important";
                            break;
                        case 3:
                            $value = "Emergency";
                            break;
                        }
                    $hasChild = Ticket::where('ticket_id', $ticket->id)->first();
                    @endphp
                    <span class="badge badge-pill mb-1 custom-font-weight {{$hasChild ? 'badge-success' : 'badge-danger'}} "> {{ $hasChild ? 'This Ticket Has Been Answered' : "They Have Not Responded" }} </span>
                    <span class="tag tag-teal"> {{$value}} </span>
                    <h4 class="mt-4">{{$ticket->title ? $ticket->title : 'NO TEXT'}}</h4>
                </div>
                <div class="d-flex justify-content-center mb-2">
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#article-{{$ticket->id}}" data-whatever="@mdo">Show</button>
                </div>
            </div>

            {{-- modal --}}
            <div class="modal fade" id="article-{{$ticket->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content custom-card-color">
                        <div class="modal-body">
                            <div class="d-flex justify-content-center mb-2">
                                <img src="{{$ticket->image ? $ticket->image : '/defaultImages/1.jpg'}}" alt="image" class="custom-width-images">
                            </div>
                            <h5> {{$ticket->title ? $ticket->title : 'NO TEXT'}} </h5>
                            <p class="text-justify"> {{$ticket->body ? $ticket->body : "NO TEXT"}} </p>
                        </div>
                        <hr/>
                        @php
                            $answer = Ticket::where('ticket_id', $ticket->id)->first();
                        @endphp
                        @if ($answer)
                            <div class="modal-body">
                                <div class="d-flex justify-content-center mb-2">
                                    <img src="{{$answer->image ? $answer->image : '/defaultImages/1.jpg'}}" alt="image" class="custom-width-images">
                                </div>
                                <h5> {{$answer->title ? $answer->title : 'NO TEXT'}} </h5>
                                <p class="text-justify"> {{$answer->body ? $answer->body : "NO TEXT"}} </p>
                            </div>
                        @endif
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal --}}
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {!! $tickets->render('/vendor.pagination.bootstrap-4') !!}
    </div>
@endsection

