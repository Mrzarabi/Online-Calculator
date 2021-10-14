
@php
use App\Models\Clearing;
use App\Models\Form;
use App\Models\Calculator;
use App\Models\Ticket;
use Carbon\Carbon;
@endphp
<table class="table table-hover table-dark text-center show-table">
    <thead>
        <tr>
            <th scope="col" class="custom-text-color">#</th>
            <th scope="col" class="custom-text-color">Ticket No</th>
            <th scope="col" class="custom-text-color">Title</th>
            <th scope="col" class="custom-text-color">Receive New Ticket</th>
            <th scope="col" class="custom-text-color">Session status</th>
            <th scope="col" class="custom-text-color">Date</th>
            <th scope="col" class="custom-text-color">Actions</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($starts as $start)
        @php
            $newTicket = $start->tickets()->with('user')->latest()->first();
        @endphp
            <tr>
                <td scope="row"> {{$i++}} </td>
                <td scope="row"> {{$start->start_no}} </td>
                <td scope="row" class="text-truncate custom-size-title-ticket" title="{{$start->title}}"> {{$start->title}} </td>
                @if (! empty($newTicket))
                    @if ($newTicket->user->email == 'owner@gmail.com' || $newTicket->user->email == 'helper@gmail.com')
                        <td class="custom-text-color">New ticket</td>
                    @else
                        <td>Nothing</td>
                    @endif
                @else
                    <td>Nothing</td>
                @endif
                @if ($start->closed)
                    <td class="text-danger">Closed</td>
                @else
                    <td class="text-success">Open</td>
                @endif
                <td>{{Carbon::parse($start->created_at)->format('d/m/Y')}}</td>
                <td>
                    <div class="d-flex justify-content-center mb-2">
                        <a href=" {{route('customer.tickets.create', ['starter' => $start->id])}} " class="btn btn-warning btn-sm mr-1">Send Ticket</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
