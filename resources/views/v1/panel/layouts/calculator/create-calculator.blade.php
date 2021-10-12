<div class="col-sm-12 col-md-6 offset-md-3">
    <div class="bg-dark rounded">
        <div class="row">
            <div class="col-8 offset-2">
                <form method="POST" action="{{route('calculators.store') }}" class="mb-4 mt-4">
                    <div class="form-group">
                        <label for="name">Make Conversion Cost Name</label>
                        <input type="text" class="form-control form-control-sm custom-form-control" id="name" name="name" value="{{old('name')}}" required>
                        @if ($errors->has('name'))
                            <span class="d-block text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>