<div class="col-sm-12 col-md-4 offset-md-4 mb-5">
    <form class="d-flex justify-content-center mb-3" action="{{route('user.search')}}" method="get">
        <div class="input-group">
            <input type="search" class="form-control background-color-inputs border-0 rounded-left" placeholder="Search" aria-label="Search"
                aria-describedby="search-addon" name="search" value="{{old('user')}}"/>
            <button type="submit" class="btn btn-sm background-color-inputs rounded-right">
                <img src="/defaultImages/panel/order/search_icon.png" alt="search">
            </button>
            <a href=" {{route('users.index')}} " class="btns text-color p-2 custom-font-size btn-group-vertical ml-3">SEE ALL USERS</a>
        </div>
    </form>
</div>