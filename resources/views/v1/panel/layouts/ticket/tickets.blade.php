@php
    use App\Models\Ticket;
    use Carbon\Carbon;
@endphp
@extends('adminlte::page')
@section('content')
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
                    @endphp
                    <span class="badge badge-pill mb-1 custom-font-weight {{$ticket->watched == true ? 'badge-success' : 'badge-danger'}} "> {{ $ticket->watched == true ? 'Watched' : 'NOT Watched' }} </span>
                    <span class="tag tag-teal"> {{$value}} </span>
                    <h4>{{$ticket->title ? $ticket->title : 'NO TEXT'}}</h4>
                    <div class="user">
                        <img src=" {{$ticket->user->avatar ? $ticket->user->avatar : '/defaultImages/avatar.png'}} " alt="user" />
                        <div class="user-info">
                            <h5> {{$ticket->user->name . ' ' . $ticket->user->family}} </h5>
                            <small class="custom-user-info"> {{ Carbon::parse($ticket->created_at)->format('d/m/Y') }} </small>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mb-2">
                    @php
                        $answer = Ticket::where('ticket_id', $ticket->id)->first();
                    @endphp
                    <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#deleteTicket-{{$ticket->id}}" data-whatever="@mdo">Delete</button>
                    @if (! $answer)
                        <a href=" {{route('tickets.edit', ['ticket' => $ticket->id])}} " class="btn btn-warning btn-sm mr-1">Answer</a>
                    @endif
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#ticket-{{$ticket->id}}" data-whatever="@mdo">Show</button>
                    <form class="ml-1" action="{{route('ticket.watched', ['ticket' => $ticket->id])}}" method="post">
                        @if ($ticket->watched == false)
                            
                            <button type="submit" class="btn btn-sm btn-success">Watched</button>
                        @endif
                        @method('PUT')
                        @csrf
                    </form>
                </div>
            </div>

            {{-- modal --}}
            <div class="modal fade" id="ticket-{{$ticket->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            {{-- modal --}}
            <div class="modal fade" id="deleteTicket-{{$ticket->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content custom-card-color">
                        <div class="modal-body">
                            <form action="{{ route('tickets.destroy', ['ticket' => $ticket->id]) }}" method="post">
                                <div class="modal-body">
                                    @csrf
                                    @method('DELETE')
                                    <h5 class="text-center">Are you sure you want to delete ticket {{$ticket->title}}?</h5>
                                    <div class="mt-3 ml-4 d-flex justify-content-end">
                                        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Yes, Delete Ticket</button>
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
    <div class="d-flex justify-content-center">
        {!! $tickets->render('/vendor.pagination.bootstrap-4') !!}
    </div>
@endsection

