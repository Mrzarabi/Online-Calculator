@php
    use App\Models\Clearing;
    use App\Models\Form;
    use App\Models\Calculator;
    use App\Models\Ticket;
    use Carbon\Carbon;
@endphp
<div class="container show-card">

    {{-- create starts --}}
    @include('v1.customer.layouts.start.create-starts-sm')

    @if (count($starts) != 0)
        @foreach ($starts as $start)
            <div class="custom-background-card mb-2">
                <div class="card-body pb-0">
                    <h4 class="custom-font-size color"> New Ticket: 
                        @if (! empty($newTicket))
                            @if ($newTicket->user->email == 'owner@gmail.com' || $newTicket->user->email == 'helper@gmail.com')
                                <span class="custom-font-size">You Have</span>
                            @else
                                <span class="custom-font-size">Nothing</span>
                            @endif
                        @else
                            <span class="custom-font-size">Nothing</span>
                        @endif    
                    </h4>
                    @php
                        $newTicket = $start->tickets()->with('user')->latest()->first();
                    @endphp
                    <h6 class="mr-2 color custom-font-size">Ticket Number: {{$start->start_number}}</h6>
                    <h6 class="mr-2 color mb-4 custom-font-size">Session Status: 
                        @if ($start->closed)
                            <span class="custom-font-size">CLOSED</span>
                        @else
                            <span class="custom-font-size">OPEN</sp>
                        @endif
                    </h6>
                    <div class="text-center w-100">
                        <div>
                            <div class="d-flex justify-content-center">
                                <h6 class="text-truncate custom-size-title-ticket text-color" title="{{$start->title}}"> {{$start->title}} </h6>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-start">
                        <h6 class="mr-2 mb-2 custom-font-size text-color">{{Carbon::parse($start->created_at)->format('d/m/Y')}}</h6>
                    </div>
                </div>
                <div class="d-flex justify-content-center mb-2">
                    <div class="d-flex justify-content-center mb-2">
                        @if (! $start->closed)
                            <a href=" {{route('customer.tickets.create', ['starter' => $start->id])}} " class="btns custom-mobile-font-size text-color pr-3 pl-3 btn-sm">SEND TICKET</a>
                        @else 
                            <a href=" {{route('customer.tickets.create', ['starter' => $start->id])}} " class="btns custom-mobile-font-size text-color pr-3 pl-3 btn-sm">WATCH TICKETS</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p class="text-color text-center show-card">CURRENTLY THERE IS NO TICKET CREATED</p>
    @endif
</div>