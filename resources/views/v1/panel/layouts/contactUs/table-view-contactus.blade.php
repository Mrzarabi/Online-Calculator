@php
    use Carbon\Carbon;
@endphp
<table class="table table-hover text-center show-table">
    <thead class="tbh">
        <tr>
            <th scope="col" class="color border-0">#</th>
            <th scope="col" class="color border-0">NAME</th>
            <th scope="col" class="color border-0">EMAIL</th>
            <th scope="col" class="color border-0">TEXT</th>
            <th scope="col" class="color border-0">DATE</th>
            <th scope="col" class="color border-0">ACTIONS</th>
        </tr>
    </thead>
    <tbody class="tb">
        @php
            $i = 1;
        @endphp
        @foreach ($contactUses as $contactUs)
            <tr class="with-bottom-linear-gradient-to-left">
                <td class="border-top-0 text-color"> {{$i++}} </td>
                <td class="border-top-0 text-color"> {{$contactUs->name}} </td>
                <td class="border-top-0 text-color"> {{ $contactUs->email }} </td>
                <td class="border-top-0 text-color d-flex justify-content-center" title="{{$contactUs->body}}"> 
                    <button type="button" class="btns btn-sm color mr-1" data-toggle="modal" data-target="#contactUs-{{$contactUs->id}}" data-whatever="@mdo">TEXT</button>
                </td>
                <td class="border-top-0 text-color">{{Carbon::parse($contactUs->created_at)->format('d/m/Y')}}</td>
                <td class="border-top-0">
                    <div class="d-flex justify-content-center mb-2">
                        <button type="button" class="btns btn-sm color mr-1" data-toggle="modal" data-target="#delete-{{$contactUs->id}}" data-whatever="@mdo">DELETE</button>
                        {{-- <a href=" {{route('tickets.create', ['starter' => $start->id])}} " class="btns color btn-sm mr-1">SEND TICKET</a> --}}
                    </div>
                </td>
            </tr>
            {{-- modal --}}
            <div class="modal fade" id="contactUs-{{$contactUs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content background-color-modals modal-border">
                        <div class="modal-body">
                            <div class="modal-body">
                                <h5 class="text-justify text-color"> {{$contactUs->body}} </h5>
                                <div class="mt-3 d-flex justify-content-end mt-3">
                                    <button type="button" class="btn color pr-3 pl-3 mr-1 btn-sm custom-font-size" data-dismiss="modal">CANCLE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal --}}
            {{-- modal --}}
            <div class="modal fade" id="delete-{{$contactUs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content background-color-modals modal-border">
                        <div class="modal-body">
                            <form action="{{ route('contactUs.destroy', ['contactUs' => $contactUs->id]) }}" method="post">
                                <div class="modal-body">
                                    @csrf
                                    @method('DELETE')
                                    <h5 class="text-center text-color">ARE YOU SURE YOU WANT TO DELETE THIS MESSAGE?</h5>
                                    <div class="mt-3 d-flex justify-content-end mt-3">
                                        <button type="button" class="btn color pr-3 pl-3 mr-1 btn-sm custom-font-size" data-dismiss="modal">CANCLE</button>
                                        <button type="submit" class="btns color pr-3 pl-3 btn-sm custom-font-size">YES DELETE THE MESSAGE</button>
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