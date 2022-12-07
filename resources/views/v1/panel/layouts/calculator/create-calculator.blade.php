<div class="col-sm-12 col-md-6 offset-md-3">
    <div class="custom-background-card rounded">
        <div class="row">
            <div class="col-8 offset-2">
                <form method="POST" action="{{ route('calculators.store') }}" class="mb-4 mt-4">
                    <div class="form-group">
                        <label for="name" class="color">DEFINE A CURRENCY</label>
                        <input type="text" class="form-control form-control-sm background-color-inputs border-0"
                            id="name" name="name" value="{{ old('name') }}" required>
                        @if ($errors->has('name'))
                            <span class="d-block text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="min" class="color">MINIMUM AMOUNT</label>
                        <input type="text" class="form-control form-control-sm background-color-inputs border-0"
                            id="min" name="min" value="{{ old('min') }}" required>
                        @if ($errors->has('min'))
                            <span class="d-block text-danger">{{ $errors->first('min') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="max" class="color">MAXIMUM AMOUNT</label>
                        <input type="text" class="form-control form-control-sm background-color-inputs border-0"
                            id="max" name="max" value="{{ old('max') }}" required>
                        @if ($errors->has('max'))
                            <span class="d-block text-danger">{{ $errors->first('max') }}</span>
                        @endif
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btns text-color pr-3 pl-3 btn-sm">SUBMIT</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
