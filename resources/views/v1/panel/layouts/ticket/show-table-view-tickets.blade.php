@php
    use Carbon\Carbon;
@endphp

<div class="rounded show-table-ticket">
    <div class="col-sm-12 col-md-10 offset-md-1">
        @if ($starter->closed == true)
            <div class="d-flex justify-content-start mt-4 ml-0 mb-4">
                <a href=" {{route('starters.index')}} "> <img src="/defaultImages/panel/ticket/back-left.png" alt="back left"></a>
            </div>
        @endif
        <div class="d-flex justify-content-center m-4">
            @if ($tickets)
            <div class="container">
                @foreach ($tickets as $ticket)
                    <div class="{{$ticket->user->email == 'helper@gmail.com' || $ticket->user->email == 'owner@gmail.com' ? 'col-sm-11 offset-sm-1' : 'col-sm-12'}} with-left-linear-gradient-to-bottom mb-4 mt-4">
                        <div class="p-3" >
                            <div class="mt-2"> 
                                <h4 class="mt-4 custom-font-size text-justify text-color" style="line-height: inherit;">{{$ticket->body ? $ticket->body : 'NO TEXT'}}</h4>
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
                                <div class="d-flex justify-content-start align-items-start">
                                    @if ($ticket->user->email != 'owner@gmail.com' && $ticket->user->email != 'helper@gmail.com')
                                        <span class="text-color custom-background-card custom-font-size p-1 mr-2">
                                            {{$value}}    
                                        </span>
                                    @endif
                                    <div class="d-block">
                                        @if (isset($ticket->image))
                                            <div class="d-flex justify-content-start mb-5">
                                                <button type="button" class="btns text-color custom-font-size p-1" data-toggle="modal" data-target="#see-{{ $ticket->id }}" data-whatever="@mdo">SEE THE IMAGE</button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="user d-flex justify-content-end">
                                    <img src=" {{$ticket->user->avatar ? $ticket->user->avatar : '/defaultImages/avatar.png'}} " class="rounded-circle mr-2" width="70" height="70" alt="user" />
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
                    </div>
                    
                    {{-- modal --}}
                        <div class="modal fade" id="see-{{$ticket->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content background-color-modals modal-border">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <img src=" {{$ticket->image}} " class="rounded " loading="lazy" alt="ticket" width="470" height="auto"/>
                    
                                            <div class="d-flex justify-content-end mt-3">
                                                <button type="button" class="btn color pr-3 pl-3 mr-1 btn-sm custom-font-size" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- end modal --}}
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>