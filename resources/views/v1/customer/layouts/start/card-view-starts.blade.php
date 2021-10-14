@php
    use App\Models\Clearing;
    use App\Models\Form;
    use App\Models\Calculator;
    use App\Models\Ticket;
    use Carbon\Carbon;
@endphp
<div class="container show-card">
    @foreach ($starts as $start)
        <div class="card custom-back-color-card">
            <div class="card-body pb-0">
                <span class="custom-font-weight badge badge-pill mb-1 badge-success"> {{Carbon::parse($start->created_at)->format('d/m/Y')}} </span>
                @php
                    $newTicket = $start->tickets()->with('user')->latest()->first();
                @endphp
                <div class="text-center w-100">
                    <h6>Ticket NO: {{$start->start_no}}</h6>
                    <div>
                        <div class="d-flex justify-content-center">
                            <h6 class=" text-truncate custom-size-title-ticket" title="{{$start->title}}""> {{$start->title}} </h6>
                        </div>
                        <h6 class="d-flex justify-content-center">
                            @if (! empty($newTicket))
                                @if ($newTicket->user->email == 'owner@gmail.com' || $newTicket->user->email == 'helper@gmail.com')
                                    <p class="custom-text-color text-center mb-0"> New ticket</p>
                                @else
                                    <p class="text-center mb-0 text-white">Nothing</p> 
                                @endif
                            @else
                                <p class="text-center mb-0 text-white">Nothing</p>
                            @endif
                        </h6>
                        <h5 class="d-flex justify-content-center">
                            @if ($start->closed)
                                <p class="text-danger text-center mb-1">Closed</p>
                            @else
                                <p class="text-success text-center mb-1">Open</p>
                            @endif
                        </h5>
                    </div>
                </div>
                <div class="user">
                    <img src=" {{$start->user->avatar ? $start->user->avatar : '/defaultImages/avatar.png'}} " alt="user" />
                    <div class="user-info">
                        <h5 class="custom-user-info"> {{$start->user->name . ' ' . $start->user->family}} </h5>
                        <small class="custom-user-info"> {{$start->user->email}} </small>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mb-2">
                <div class="d-flex justify-content-center mb-2">
                    <a href=" {{route('customer.tickets.create', ['starter' => $start->id])}} " class="btn btn-warning btn-sm mr-1">Send Ticket</a>
                </div>
            </div>
        </div>
    @endforeach
</div>