<div class="col-md-12">
    <div class="row">
        <div class="col-md-9 col-sm-12 custom-background-card">
            @if ($starter->closed == false)
                <div class="with-bottom-linear-gradient-to-left">
                    <div class="row">
                        <div class="col-8 offset-2">
                            <div class="d-flex justify-content-start mt-4 ml-0 mb-4">
                                <a href=" {{route('customer.starters.index')}} "> <img src="/defaultImages/panel/ticket/back-left.png" alt="back left"></a>
                            </div>
                            <div class="col-12">
                                <p class="text-center custom-size-text mt-2 text-justify text-color"> {{$starter->title}} </p>
                            </div>

                            <form method="POST" action="{{route('customer.tickets.store', ['starter' => $starter->id])}}" class="mb-4" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="body" class="color custom-font-size">TEXT</label>
                                    <textarea class="form-control form-control-sm background-color-inputs border-0" id="body" rows="5" name="body">{{old('body')}}</textarea>
                                    @if ($errors->has('body'))
                                        <span class="d-block text-danger">{{ $errors->first('body') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="importance" class="color custom-font-size">IMPORTANCE</label>
                                    <select class="form-control form-control-sm background-color-inputs border-0" name="importance" id="importance">
                                        <option value="0" selected>Not Important</option>
                                        <option value="1">A little Important</option>
                                        <option value="2">Important</option>
                                        <option value="3">Emergency</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label color custom-font-size" for="image"> IMAGE </label>
                                    <div class="input-group">
                                        <input type="file" name="image" class="text-color" id="iamge"/>
                                    </div>
                                    @if ($errors->has('image'))
                                        <span class="d-block text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <a href=" {{route('customer.starters.index')}} " class="btn text-color btn-sm mr-2 pr-3 pl-3">CANCEL</a>
                                    <button type="submit" class="btns text-color btn-sm pr-3 pl-3">SUBMIT</button>
                                </div>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            @endif
             {{-- show tickets --}}
            @include('v1.customer.layouts.ticket.show-tickets')
        </div>
        <div class="col-md-3 col-sm-12 display-image-none">
            <div class="d-flex justify-content-end">
                <img src="/defaultImages/Right.png" alt="vector" height="780" class="size-image-dashboard">
            </div>
        </div>
    </div>
</div>