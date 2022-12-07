<div class="col-sm-12 col-md-6 offset-md-3">
    <div class="custom-background-card rounded">
        <div class="row">
            <div class="col-8 offset-2">
                <form method="POST" action="{{ route('exchanges.store') }}" class="mb-4 mt-4">
                    <div class="form-group">
                        <label for="name" class="color">YOUR USER WILL SENT TO YOU (LEFT SIDE)</label>
                        <select name="currency_id" class="form-control form-control-sm background-color-inputs border-0"
                            id="currency_id" name="currency_id" value="{{ old('currency_id') }}" required>
                            <option selected>Select Currency</option>
                            @foreach ($currencies as $currency)
                                <option value="{{ $currency->id }}" class="background-color-inputs border-0">
                                    {{ $currency->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name" class="color">YOU WILL SEND TO YOUR USER (RIGHT SIDE)</label>
                        <input type="text" class="form-control form-control-sm background-color-inputs border-0"
                            id="name" name="name" value="{{ old('name') }}" required>
                        @if ($errors->has('name'))
                            <span class="d-block text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="price" class="color">DEFINE PRICE</label>
                        <input type="float" class="form-control form-control-sm background-color-inputs border-0"
                            id="price" name="price" value="{{ old('price') }}" required>
                        @if ($errors->has('price'))
                            <span class="d-block text-danger">{{ $errors->first('price') }}</span>
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
