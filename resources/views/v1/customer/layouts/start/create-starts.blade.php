<div class="d-flex justify-content-center mb-5">
    <button type="button" class="btns color justify-center pr-4 pl-4 pt-2 pb-2" data-toggle="modal" data-target="#create-starter-sm" data-whatever="@mdo">CREATE NEW SESSION</button>
</div>
{{-- modal --}}
    <div class="modal fade" id="create-starter-sm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content background-color-modals">
                <div class="modal-body">
                    <div class="form-group">
                        <form action=" {{route('customer.starters.store')}} " method="post">
                            @csrf

                            <label for="title" class="color">PLEACE WRITE A SHORT TITLE FOR YOUR TICKET</label>
                            <input type="text" class="form-control form-control-sm background-color-inputs border-0" id="title" name="title" value="{{isset($starter) ? $starter->title : old('title')}}">
                            @if ($errors->has('title'))
                                <span class="d-block text-danger">{{ $errors->first('title') }}</span>
                            @endif

                            <div class="d-flex justify-content-end mt-3">
                                <button type="button" class="btn color pr-4 pl-4 mr-1 btn-sm custom-font-size" data-dismiss="modal">Close</button>
                                <button type="submit" class="btns color pr-4 pl-4 btn-sm custom-font-size">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- end modal --}}