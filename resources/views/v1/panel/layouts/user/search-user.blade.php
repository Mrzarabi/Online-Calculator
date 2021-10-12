<div class="row">
    <div class="col-sm-12 col-md-8 offset-md-2">
        <form class="d-flex justify-content-center mb-3" action="{{route('user.search')}}" method="get">
            <div class="input-group">
                <input type="search" class="form-control custom-form-control" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" name="search" value="{{old('user')}}"/>
                <button type="submit" class="btn btn-sm btn-warning">Search</button>
                <a href=" {{route('users.index')}} " class="btn btn-sm btn-warning ml-5">See All Users</a>
            </div>
        </form>
    </div>
</div>