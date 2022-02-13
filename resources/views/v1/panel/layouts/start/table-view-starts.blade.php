@php
    use Carbon\Carbon;
@endphp
<table class="table table-hover text-center show-table">
    <thead class="tbh">
        <tr>
            <th scope="col" class="color border-0">#</th>
            <th scope="col" class="color border-0">TICKET NUMBER</th>
            <th scope="col" class="color border-0">USER</th>
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
            <tr class="with-bottom-linear-gradient-to-left">
                <td class="border-top-0 text-color"> {{$i++}} </td>
                <td class="border-top-0 text-color"> {{$start->start_number}} </td>
                <td class="border-top-0 text-color"> {{ $start->user->name . ' ' . $start->user->family }} </td>
                <td class="border-top-0 text-color"  title="{{$start->title}}"> <h6 class="text-ellipsis float-right">{{$start->title}}</h6> </td>
                @if (isset($newTicket))
                    @if ($newTicket->user->email != 'owner@gmail.com' && $newTicket->user->email != 'helper@gmail.com' )
                        <td class="border-top-0 color">NEW TICKET</td>
                    @else
                        <td class="border-top-0 text-color">NOTHING</td>
                    @endif
                @else
                    <td class="border-top-0 text-color">NOTHING</td>
                @endif
                @if ($start->closed)
                    <td class="border-top-0 text-danger">CLOSED</td>
                @else
                    <td class="border-top-0 text-success">OPEN</td>
                @endif
                <td class="border-top-0 text-color">{{Carbon::parse($start->created_at)->format('d/m/Y')}}</td>
                <td class="border-top-0">
                    <div class="d-flex justify-content-center mb-2">
                        @if (! $start->closed)
                            <button type="button" class="btns btn-sm text-color pr-3 pl-3 mr-1" data-toggle="modal" data-target="#start-{{$start->id}}" data-whatever="@mdo">CLOSE</button>
                            <a href=" {{route('tickets.create', ['starter' => $start->id])}} " class="btns text-color pr-3 pl-3 btn-sm mr-1">SEND TICKET</a>
                        @else 
                            <a href=" {{route('tickets.create', ['starter' => $start->id])}} " class="btns text-color pr-3 pl-3 btn-sm mr-1">WATCH TICKETS</a>
                        @endif
                    </div>
                </td>
            </tr>
            {{-- modal --}}
            <div class="modal fade" id="start-{{$start->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content background-color-modals modal-border">
                        <div class="modal-body">
                            <form action="{{ route('starters.close', ['starter' => $start->id]) }}" method="post">
                                <div class="modal-body">
                                    @csrf
                                    @method('PUT')
                                    <h5 class="text-center text-color">ARE YOU SURE YOU WANT TO CLOSE THIS SESSION?</h5>
                                    <div class="mt-3 d-flex justify-content-end mt-3">
                                    <button type="button" class="btn text-color pr-3 pl-3 mr-1 btn-sm custom-font-size" data-dismiss="modal">CANCLE</button>
                                    <button type="submit" class="btns text-color pr-3 pl-3 btn-sm custom-font-size">YES CLOSE THE SESSION</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal --}}
        @endforeach
    </tbody>
</table>