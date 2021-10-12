@extends('adminlte::page')
@section('content')
    <div class="rounded custom-card-color">
        <div class="row">
            <div class="col-8 offset-2">
                <form method="POST" action="{{route('image.store', ['clearing' => $clearing->id])}}" class="mb-4" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label" for="image"> Image </label>
                        <div class="input-group">
                            <input type="file" name="image[]" id="iamge" multiple/>
                        </div>
                        @if ($errors->has('image'))
                            <span class="d-block text-danger">{{ $errors->first('image') }}</span>
                        @endif
                        <div class="d-flex justify-content-center">
                            @isset ($image->image)
                                <img src=" {{$image->image}} " alt="image">
                            @endisset
                        </div>
                        @if (isset($clearing->images))
                            <div id="myCarousel" class="carousel slide mt-3" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                </ol>
                                <div class="carousel-inner">
                                    @foreach($clearing->images as $key => $item)
                                        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                            <div class="d-flex justify-content-center">
                                                <img src="{{$item->image}}" class="d-block w-100 custom-size-clearing-image" alt="image"> 
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
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
@endsection