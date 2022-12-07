<div class="d-flex justify-content-center mb-5">
    <button type="button" class="btns text-color justify-center custom-font-size pr-3 pl-3 pt-2 pb-2" data-toggle="modal"
        data-target="#create-country" data-whatever="@mdo">CREATE NEW COUNTRY</button>
</div>
{{-- modal --}}
<div class="modal fade" id="create-country" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content background-color-modals modal-border">
            <div class="modal-body">
                <div class="form-group">
                    <form action=" {{ route('countries.store') }} " method="post">
                        @csrf

                        <label for="name" class="color">NAME OF COUNTRY</label>
                        <input type="text" class="form-control form-control-sm background-color-inputs border-0"
                            id="name" name="name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span class="d-block text-danger">{{ $errors->first('name') }}</span>
                        @endif

                        <div class="d-flex justify-content-end mt-3">
                            <button type="button" class="btn text-color pr-4 pl-4 mr-1 btn-sm custom-font-size"
                                data-dismiss="modal">CLOSE</button>
                            <button type="submit"
                                class="btns text-color custom-font-size pr-3 pl-3 btn-sm">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end modal --}}
