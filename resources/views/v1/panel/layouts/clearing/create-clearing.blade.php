@php
    use App\Models\Clearing;
    use App\Models\Form;
    use App\Models\Calculator;
    use App\Models\Element;
    use Carbon\Carbon;
@endphp
<div class="rounded custom-card-color">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="d-flex justify-content-center m-4">
                <a href=" {{route('orders.index')}} " class="btn btn-primary mr-3 justify-center">Return To Page Orders</a>
            </div>
                @php
                    $clearing = Clearing::where('order_id', $order->id)->first();
                @endphp
            <form method="POST" action="{{isset($clearing) ? route('clearing.update', ['clearing' => $clearing->id]) : route('clearing.store')}}" class="mb-4" enctype="multipart/form-data">
                @isset ($clearing)
                    @method('PUT')
                @endisset
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control form-control-sm custom-form-control" id="title" name="title" value="{{isset($clearing) ? $clearing->title : old('title')}}">
                    @if ($errors->has('title'))
                        <span class="d-block text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="hidden" name="order_id" value="{{$order->id}}">
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea class="form-control form-control-sm custom-form-control" id="body" rows="5" name="body">{{isset($clearing) ? $clearing->body : old('body')}}</textarea>
                    @if ($errors->has('body'))
                        <span class="d-block text-danger">{{ $errors->first('body') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="clear">Clear</label>
                    <div class="input-group">
                        <input type="radio" id="true" class="mt-2 mr-1" name="clear" @isset($clearing->clear) @if($clearing->clear == 1) checked @endif value=1 @else value=1 @endisset >
                        <label for="true" class="pr-3">Clear</label><br>
                        <input type="radio" id="false" class="mt-2 mr-1" name="clear" @isset($clearing->clear) @if($clearing->clear == 0) checked @endif value=0 @else value=0 @endisset>
                        <label for="false" class="pr-3">Not Clear</label><br>
                        <div class="input-group-addon"><i class="ti-layout-grid2-alt"></i></div>
                    </div>
                    @if( $errors->has('clear') )
                        <span class="d-block text-danger">{{ $errors->first('clear') }}</span>
                    @endif
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <a href=" {{route('orders.index')}} " class="btn btn-secondary btn-sm mr-2">Cancel</a>
                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>