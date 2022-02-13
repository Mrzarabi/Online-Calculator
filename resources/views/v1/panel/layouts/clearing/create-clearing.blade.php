<div class="rounded">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="d-flex justify-content-start mt-4 ml-0 mb-4">
                <a href=" {{route('orders.index')}} "> <img src="/defaultImages/panel/ticket/back-left.png" alt="back left"></a>
            </div>
            <form method="POST" action="{{isset($order->clearing) ? route('clearing.update', ['clearing' => $order->clearing->id]) : route('clearing.store')}}" class="mb-4" enctype="multipart/form-data">
                @isset ($order->clearing)
                    @method('PUT')
                @endisset
                <div class="form-group">
                    <label for="title" class="color custom-font-size">TITLE</label>
                    <input type="text" class="form-control form-control-sm background-color-inputs border-0" id="title" name="title" value="{{isset($order->clearing) ? $order->clearing->title : old('title')}}">
                    @if ($errors->has('title'))
                        <span class="d-block text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="hidden" name="order_id" value="{{$order->id}}">
                </div>
                <div class="form-group">
                    <label for="body" class="color custom-font-size">TEXT</label>
                    <textarea class="form-control form-control-sm background-color-inputs border-0" id="body" rows="5" name="body">{{isset($order->clearing) ? $order->clearing->body : old('body')}}</textarea>
                    @if ($errors->has('body'))
                        <span class="d-block text-danger">{{ $errors->first('body') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="clear" class="color custom-font-size">CLEAR</label>
                    <div class="input-group">
                        <input type="radio" id="true" class="mt-2 mr-1 background-color-inputs border-0" name="clear" @isset($order->clearing->clear) @if($order->clearing->clear == 1) checked @endif value=1 @else value=1 @endisset >
                        <label for="true" class="pr-3 color">CLEAR</label><br>
                        <input type="radio" id="false" class="mt-2 mr-1" name="clear" @isset($order->clearing->clear) @if($order->clearing->clear == 0) checked @endif value=0 @else value=0 @endisset>
                        <label for="false" class="pr-3 color">NOT CLEAR</label><br>
                        <div class="input-group-addon"><i class="ti-layout-grid2-alt"></i></div>
                    </div>
                    @if( $errors->has('clear') )
                        <span class="d-block text-danger">{{ $errors->first('clear') }}</span>
                    @endif
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <a href=" {{route('orders.index')}} " class="custom-font-size p-2 mr-2 text-color">CANCEL</a>
                    <button type="submit" class="btns custom-font-size pr-3 pl-3 text-color">SUBMIT</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>