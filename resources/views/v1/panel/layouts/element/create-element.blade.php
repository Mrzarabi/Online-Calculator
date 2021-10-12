<div class="col-sm-12 col-md-6 offset-md-3">
    <div class="bg-dark rounded">
        <div class="row">
            <div class="col-8 offset-2">
                <form method="POST" action="{{route('elements.store') }}" class="mb-4 mt-4">
                    <div class="form-group">
                        <label for="name">Your User will Send To You (Left Side)</label>
                        <select name="calculator_id" class="form-control form-control-sm custom-form-control" id="calculator_id" name="calculator_id" value="{{old('calculator_id')}}" required>
                            <option selected >Select Currency </option>
                            @foreach ($calculators as $calculator)
                                <option value="{{$calculator->id}}"> {{$calculator->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">You Will Send To Your User (Right Side)</label>
                        <input type="text" class="form-control form-control-sm custom-form-control" id="name" name="name" value="{{old('name')}}" required>
                        @if ($errors->has('name'))
                            <span class="d-block text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="price">Define Price</label>
                        <input type="float" class="form-control form-control-sm custom-form-control" id="price" name="price" value="{{old('price')}}" required>
                        @if ($errors->has('price'))
                            <span class="d-block text-danger">{{ $errors->first('price') }}</span>
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