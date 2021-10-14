<div class="d-flex justify-content-center mb-5">
    <button type="button" class="btn btn-primary justify-center" data-toggle="modal" data-target="#create-starter-sm" data-whatever="@mdo">Create New Session</button>
</div>
{{-- modal --}}
    <div class="modal fade" id="create-starter-sm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content custom-card-color">
                <div class="modal-body">
                    <div class="form-group">
                        <form action=" {{route('customer.starters.store')}} " method="post">
                            @csrf

                            <label for="title">Title</label>
                            <input type="text" class="form-control form-control-sm custom-form-control" id="title" name="title" value="{{isset($starter) ? $starter->title : old('title')}}">
                            @if ($errors->has('title'))
                                <span class="d-block text-danger">{{ $errors->first('title') }}</span>
                            @endif

                            <div class="d-flex justify-content-end mt-3">
                                <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success btn-sm">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- end modal --}}