@extends('v1.view.app')
@section('content')
    <div class="container p-0 h100 position-relative">
        <div class="col-md-12">
            @include('v1.view.layouts.top')
            @include('v1.view.layouts.navbar')
        </div>
        <div class="col-md-12 middle w100 h70">
            @if (! $tether && ! $perfect)
                <livewire:view.layouts.index />
            @endif
            @if ($tether && ! $perfect)
                <livewire:view.layouts.tether />
            @endif
            @if($perfect && ! $tether)
                <livewire:view.layouts.perfect />
            @endif
        </div>
        <div class="col-md-12 my-3 index-footer">
            @include('v1.view.layouts.footer')
        </div>
    </div>
@endsection