<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand"></a>
        <form action="{{ route('search') }}" method="post">
            @csrf
            <div class="input-group">
                <input type="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" />
                <button type="submit" class="btn btn-outline-light">Search</button>
            </div>
        </form>
    </div>
</nav>
