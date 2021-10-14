@php
    use App\Models\Clearing;
    use App\Models\Form;
    use App\Models\Calculator;
    use App\Models\Element;
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
                            <h6 class=" text-truncate custom-size-title-ticket" title="{{$start->title}}"> {{$start->title}} </h6>
                        </div>
                        <h6 class="d-flex justify-content-center">
                            @if (isset($newTicket))
                                @if ($newTicket->user->email != 'owner@gmail.com' && $newTicket->user->email != 'helper@gmail.com' )
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
                        <br>
                        <small class="custom-user-info"> {{$start->user->phone ? $start->user->phone : 'NO PHONE' }} </small>
                        <br>
                        <small class="custom-user-info">{{$start->user->address ? $start->user->address : 'NO ADDRESS'}}</small>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mb-2">
                <div class="d-flex justify-content-center mb-2">
                    @if (! $start->closed)
                        <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#start-{{$start->id}}" data-whatever="@mdo">Close</button>
                    @endif
                    <a href=" {{route('tickets.create', ['starter' => $start->id])}} " class="btn btn-warning btn-sm mr-1">Send Ticket</a>
                </div>
            </div>
        </div>
        {{-- modal --}}
        <div class="modal fade" id="start-{{$start->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content custom-card-color">
                    <div class="modal-body">
                        <form action="{{ route('starters.close', ['starter' => $start->id]) }}" method="post">
                            <div class="modal-body">
                                @csrf
                                @method('PUT')
                                <h5 class="text-center">Are you sure you want to Close this Session?</h5>
                                <div class="mt-3 d-flex justify-content-end">
                                    <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Yes, Close Session</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- end modal --}}
    @endforeach
</div>