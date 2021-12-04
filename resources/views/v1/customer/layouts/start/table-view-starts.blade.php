
@php
use App\Models\Clearing;
use App\Models\Form;
use App\Models\Calculator;
use App\Models\Ticket;
use Carbon\Carbon;
@endphp
@if (count($starts) != 0)
    <table class="table table-hover text-center show-table">
        <thead class="tbh">
            <tr>
                <th scope="col" class="color border-0">#</th>
                <th scope="col" class="color border-0">TICKET No</th>
                <th scope="col" class="color border-0">TITLE</th>
                <th scope="col" class="color border-0">RECEIVE NEW TICKET</th>
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
                <tr class="with-bottom-linear-gradient-to-left">
                    <td class="border-top-0 text-color"> {{$i++}} </td>
                    <td class="border-top-0 text-color"> {{$start->start_no}} </td>
                    <td class="border-top-0 text-color" class="text-truncate custom-size-title-ticket" title="{{$start->title}}"> {{$start->title}} </td>
                    @if (! empty($newTicket))
                        @if ($newTicket->user->email == 'owner@gmail.com' || $newTicket->user->email == 'helper@gmail.com')
                            <td class="border-top-0 text-color">New ticket</td>
                        @else
                            <td class="border-top-0 text-color">Nothing</td>
                        @endif
                    @else
                        <td class="border-top-0 text-color">Nothing</td>
                    @endif
                    @if ($start->closed)
                        <td class="text-danger border-top-0">CLOSED</td>
                    @else
                        <td class="text-success border-top-0">OPEN</td>
                    @endif
                    <td class="border-top-0 text-color">{{Carbon::parse($start->created_at)->format('d/m/Y')}}</td>
                    <td class="border-top-0">
                        <div class="d-flex justify-content-center mb-2">
                            <a href=" {{route('customer.tickets.create', ['starter' => $start->id])}} " class="btns color btn-sm mr-1">Send Ticket</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p class="text-color text-center show-table">CURRENTLY THERE IS NO TICKET CREATED</p>
@endif
