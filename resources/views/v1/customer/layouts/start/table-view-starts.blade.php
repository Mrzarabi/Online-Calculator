@php
use Carbon\Carbon;
@endphp
<div class="custom-background-card custom-card h-indexes p-4 show-table">
    
    {{-- create starts --}}
    @include('v1.customer.layouts.start.create-starts')

    @if (count($starts) != 0)
        <table class="table table-hover text-center">
            <thead class="tbh">
                <tr>
                    <th scope="col" class="color border-0">#</th>
                    <th scope="col" class="color border-0">TICKET NUMBER</th>
                    <th scope="col" class="color border-0">TITLE</th>
                    <th scope="col" class="color border-0">ANSWERD</th>
                    <th scope="col" class="color border-0">SESSION STATUS</th>
                    <th scope="col" class="color border-0">DATE</th>
                    <th scope="col" class="color border-0">ACTIONS</th>
                </tr>
            </thead>
            <tbody class="tb">
                @php
                    $i = 1;
                @endphp
                @foreach ($starts as $start)
                    @php
                        $newTicket = $start->tickets()->with('user')->latest()->first();
                    @endphp
                    <tr class="with-bottom-linear-gradient-to-left custom-tr"
                        @if (! $start->closed)
                            onclick="location.href='{{route('customer.tickets.create', ['starter' => $start->id])}}';"         
                        @endif
                    > 
                        <td class="border-top-0 text-color"> {{$i++}} </td>
                        <td class="border-top-0 text-color"> {{$start->start_number}} </td>
                        <td class="border-top-0 text-color " title="{{$start->title}}"> <h6 class="text-ellipsis float-right">{{$start->title}}</h6> </td>
                        @if (! empty($newTicket))
                            @if ($newTicket->user->email == 'owner@gmail.com' || $newTicket->user->email == 'helper@gmail.com')
                                <td class="border-top-0 color">YOU HAVE</td>
                            @else
                                <td class="border-top-0 text-color">NOTHING</td>
                            @endif
                        @else
                            <td class="border-top-0 text-color">NOTHING</td>
                        @endif
                        @if ($start->closed)
                            <td class="text-danger border-top-0">CLOSED</td>
                        @else
                            <td class="text-success border-top-0">OPEN</td>
                        @endif
                        <td class="border-top-0 text-color">{{Carbon::parse($start->created_at)->format('d/m/Y')}}</td>
                        <td class="border-top-0">
                            <div class="d-flex justify-content-center mb-2">
                                @if (! $start->closed)
                                    <a href=" {{route('customer.tickets.create', ['starter' => $start->id])}} " class="btns text-color pr-3 pl-3 btn-sm mr-1">SEND TICKET</a>
                                @else 
                                    <a href=" {{route('customer.tickets.create', ['starter' => $start->id])}} " class="btns text-color pr-3 pl-3 btn-sm mr-1">WATCH TICKETS</a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-color text-center show-table">CURRENTLY THERE IS NO TICKET CREATED</p>
    @endif
</div>

@section('script')
    <script>
        function sendTicket($id) {
        
        }
    </script>
@endsection