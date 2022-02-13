@php
    use Carbon\Carbon;
@endphp

<div class="container show-card-ticket mt-3">
    @if ($starter->closed == true)
        <div class="d-flex justify-content-start mb-2">
            <a href=" {{route('customer.starters.index')}} " > <img src="/defaultImages/panel/ticket/back-left.png" alt="back left"></a>
        </div>
        <div class="col-12">
            <p class="text-center custom-size-text mt-2 text-justify text-color"> {{$starter->title}} </p>
        </div>
    @endif
    @if ($tickets)
        @foreach ($tickets as $ticket)
            <div class="{{$ticket->user->email == 'helper@gmail.com' || $ticket->user->email == 'owner@gmail.com' ? 'ml-4' : ''}} with-left-linear-gradient-to-bottom mb-3">
                
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
                        <h6 class="custom-font-size mb-1 color mb-2"> {{ $value }} </h6>
                    @endif
                    @if (isset($ticket->image))
                        <div class="d-flex justify-content-start mb-3">
                            <button type="button" class="btns text-color custom-font-size p-1" data-toggle="modal" data-target="#see-{{ $ticket->id }}-sm" data-whatever="@mdo">SEE THE IMAGE</button>
                        </div>
                    @endif
                    <div class="text-center w-100">
                        <div>
                            <div class="d-flex justify-content-center">
                                <h6 class="custom-font-size text-justify text-color" style="line-height: inherit;"> {{$ticket->body}} </h6>
                            </div>
                        </div>
                    </div>
                    <div class="user d-flex justify-content-end m-2">
                        <img src=" {{$ticket->user->avatar ? $ticket->user->avatar : '/defaultImages/avatar.png'}} " class="rounded-circle mr-2" width="40" height="40" alt="user" />
                        <div class="user-info">
                            @if ($ticket->user->email == 'owner@gmail.com' || $ticket->user->email == 'helper@gmail.com')
                                <h5 class="text-color">Admin</h5>
                            @else
                                <h5 class="text-color"> {{$ticket->user->name . ' ' . $ticket->user->family}} </h5>
                            @endif
                            <small class="text-color"> {{ Carbon::parse($ticket->created_at)->format('d/m/Y H:m') }} </small>
                        </div>
                    </div>
                </div>
            </div>
            {{-- modal --}}
                <div class="modal fade" id="see-{{$ticket->id}}-sm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content background-color-modals modal-border">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="d-flex justify-content-center">
                                        <img src=" {{$ticket->image}} " class="rounded " loading="lazy" alt="ticket" width="470" height="auto"/>
                                    </div>
            
                                    <div class="d-flex justify-content-end mt-3">
                                        <button type="button" class="btn text-color pr-3 pl-3 mr-1 btn-sm custom-font-size" data-dismiss="modal">CLOSE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- end modal --}}
        @endforeach
    @endif
</div>