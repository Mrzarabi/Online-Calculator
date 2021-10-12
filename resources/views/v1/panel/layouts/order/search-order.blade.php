<div class="row">
    <div class="col-md-8 offset-md-2 col-sm-12">
        <form class="d-flex justify-content-center mb-3" action="{{route('order.search')}}" method="get">
            <div class="input-group">
                <input type="search" class="form-control custom-form-control" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" name="search" value="{{old('order')}}"/>
                <button type="submit" class="btn btn-sm btn-warning">Search</button>
                <a href=" {{route('orders.index')}} " class="btn btn-sm btn-warning ml-5">See All Orders</a>
            </div>
        </form>
    </div>
</div>