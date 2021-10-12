@php
    use App\Models\Ticket;
@endphp
@extends('adminlte::page')
@section('content')
    <div class="rounded custom-card-color">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="d-flex justify-content-center m-4">
                    <a href=" {{route('customer.starters.index')}} " class="btn btn-primary mr-3 justify-center">Return To Page Tickets</a>
                </div>
                
                <form method="POST" action="{{route('customer.tickets.store', ['starter' => $starter->id])}}" class="mb-4" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control form-control-sm custom-form-control" id="body" rows="5" name="body">{{isset($ticket) ? $ticket->body : old('body')}}</textarea>
                        @if ($errors->has('body'))
                            <span class="d-block text-danger">{{ $errors->first('body') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="importance">Importance</label>
                        <select class="form-control form-control-sm custom-form-control" name="importance" id="importance">
                            <option value="0" selected>Not Important</option>
                            <option value="1">A little Important</option>
                            <option value="2">Important</option>
                            <option value="3">Emergency</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="image"> Image </label>
                        <div class="input-group">
                            <input type="file" name="image" id="iamge"/>
                        </div>
                        @if ($errors->has('image'))
                            <span class="d-block text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <a href=" {{route('customer.starters.index')}} " class="btn btn-secondary btn-sm mr-2">Cancel</a>
                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <div class="rounded custom-card-color">
        <div class="col-10 offset-1">
            <div class="d-flex justify-content-center m-4">
                @php
                    $tickets = Ticket::where('starter_id', $starter->id)->get();
                @endphp
                @if ($tickets)
                <div class="container">
                    @foreach ($tickets as $ticket)
                        <div class="col-12 mb-3">
                            <div class="">
                                <div class="rounded p-3 d-flex justify-content-center">

                                    <div class="float-left d-flex align-items-center">
                                        <img src=" {{$ticket->image ? $ticket->image : '/defaultImages/1.jpg'}} " class="rounded " alt="ticket" / width="300" height="300">
                                    </div>
                                    <div class="float-right">
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
                                                <h4 class="mt-4 custom-font-size">{{$ticket->body ? $ticket->body : 'NO TEXT'}}</h4>
                                            {{-- <div class="d-flex justify-content-center mb-2">
                                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#article-{{$ticket->id}}" data-whatever="@mdo">Show</button>
                                            </div> --}}
                            
                                        {{-- modal --}}
                                        {{-- <div class="modal fade" id="article-{{$ticket->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        </div> --}}
                                        {{-- end modal --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection