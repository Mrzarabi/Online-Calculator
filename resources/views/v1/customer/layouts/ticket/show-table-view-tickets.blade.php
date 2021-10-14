@php
    use App\Models\Ticket;
    use Carbon\Carbon;
@endphp
<div class="rounded custom-card-color show-table-ticket">
    <div class="col-sm-12 col-md-10 offset-md-1">
        @if ($starter->closed == true)
            <div class="d-flex justify-content-center">
                <a href=" {{route('customer.starters.index')}} " class="btn btn-primary justify-center mt-4">Return To Page Tickets</a>
            </div>
        @endif
        <p class="text-center custom-size-text mt-2 text-justify"> {{$starter->title}} </p>
        <div class="d-flex justify-content-center m-4">
            @php
                $tickets = Ticket::with('user')->where('starter_id', $starter->id)->get();
            @endphp
            @if ($tickets)
            <div class="container">
                @foreach ($tickets as $ticket)
                    <div class="col-sm-12 mb-3 mt-3 rounded border" style="{{$ticket->user->email != 'helper@gmail.com' ? '' : 'border: 1px solid #f6fd09 !important;'}}">
                        <div class="col-sm-12" >
                            <div class="rounded p-3 " >
                                <div class="d-block">
                                    @if (isset($ticket->image))
                                        <img src=" {{$ticket->image}} " class="rounded " loading="lazy" alt="ticket" width="300" height="auto"/>
                                    @endif
                                </div>
                                <div class="mt-2"> 
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
                                    @if ($ticket->user->email != 'owner@gmail.com' && $ticket->user->email != 'helper@gmail.com')
                                        <span class="tag tag-teal">
                                            {{$value}}    
                                        </span>
                                    @endif
                                    <h4 class="mt-4 custom-font-size text-justify" style="line-height: inherit;">{{$ticket->body ? $ticket->body : 'NO TEXT'}}</h4>
                                    <div class="user d-flex justify-content-end">
                                        <img src=" {{$ticket->user->avatar ? $ticket->user->avatar : '/defaultImages/avatar.png'}} " alt="user" />
                                        <div class="user-info">
                                            @if ($ticket->user->email == 'owner@gmail.com' || $ticket->user->email == 'helper@gmail.com')
                                                <h5>Admin</h5>
                                            @else
                                                <h5> {{$ticket->user->name . ' ' . $ticket->user->family}} </h5>
                                            @endif
                                            <small class="custom-user-info"> {{ Carbon::parse($ticket->created_at)->format('d/m/Y H:m') }} </small>
                                        </div>
                                    </div>
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