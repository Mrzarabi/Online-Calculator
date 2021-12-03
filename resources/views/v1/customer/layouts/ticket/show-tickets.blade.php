@php
    use App\Models\Ticket;
    use Carbon\Carbon;
@endphp

{{-- table view tickets --}}
@include('v1.customer.layouts.ticket.show-table-view-tickets')


{{-- card view tickets  --}}
@include('v1.customer.layouts.ticket.show-card-view-tickets')