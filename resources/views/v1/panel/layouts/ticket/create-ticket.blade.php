<div class="rounded custom-card-color">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="d-flex justify-content-center m-4">
                <a href=" {{route('starters.index')}} " class="btn btn-primary mr-3 justify-center">Return To Page Tickets</a>
            </div>
            <form method="POST" action="{{route('tickets.store', ['starter' => $starter->id])}}" class="mb-4" enctype="multipart/form-data">
                <div class="form-group">
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea class="form-control form-control-sm custom-form-control" id="body" rows="5" name="body">{{old('body')}}</textarea>
                    @if ($errors->has('body'))
                        <span class="d-block text-danger">{{ $errors->first('body') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label" for="image"> Image </label>
                    <div class="input-group">
                        <input type="file" name="image" id="iamge"/>
                    </div>
                    @if ($errors->has('image'))
                        <span class="d-block text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <a href=" {{route('starters.index')}} " class="btn btn-secondary btn-sm mr-2">Cancel</a>
                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>