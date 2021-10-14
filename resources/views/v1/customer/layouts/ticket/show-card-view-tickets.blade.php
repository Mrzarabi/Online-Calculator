@php
    use App\Models\Ticket;
    use Carbon\Carbon;
@endphp

<div class="container show-card-ticket">
    @if ($starter->closed == true)
        <div class="d-flex justify-content-center">
            <a href=" {{route('customer.starters.index')}} " class="btn btn-primary justify-center mt-4">Return To Page Tickets</a>
        </div>
    @endif
    <p class="mt-2 custom-size-text text-justify"> {{$starter->title}} </p>
    @php
        $tickets = Ticket::with('user')->where('starter_id', $starter->id)->get();
    @endphp
    @foreach ($tickets as $ticket)
        <div class="card custom-back-color-card">
            @if (isset($ticket->image))
                <div class="card-header">
                    <img src=" {{$ticket->image}} " alt="image" />
                </div>
            @endif
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
            <div class="card-body pb-0">
                @if ($ticket->user->email != 'owner@gmail.com' && $ticket->user->email != 'helper@gmail.com')
                    <span class="custom-font-weight badge badge-pill mb-1 badge-primary"> {{ $value }} </span>
                @endif
                <div class="text-center w-100">
                    <div>
                        <div class="d-flex justify-content-center">
                            <h6 class="text-justify" style="line-height: inherit;"> {{$ticket->body}} </h6>
                        </div>
                    </div>
                </div>
                <div class="user mb-2">
                    <img src=" {{$ticket->user->avatar ? $ticket->user->avatar : '/defaultImages/avatar.png'}} " alt="user" />
                    <div class="user-info">
                        @if ($ticket->user->email == 'owner@gmail.com' || $ticket->user->email == 'helper@gmail.com')
                            <small class="pb-2 custom-text-color">Admin</small>
                            <br>
                            <small class="custom-user-info"> {{ Carbon::parse($ticket->created_at)->format('d/m/Y H:m') }} </small>
                        @else
                            <small class="custom-user-info"> {{$ticket->user->name . ' ' . $ticket->user->family}} </small>
                            <br>
                            <small class="custom-user-info"> {{ Carbon::parse($ticket->created_at)->format('d/m/Y H:m') }} </small>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>