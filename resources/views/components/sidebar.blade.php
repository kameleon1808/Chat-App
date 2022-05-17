<aside class="col-12 col-md-3 col-xl-2 p-0 bg-dark ">
    <nav class="navbar navbar-expand-md navbar-dark bd-dark flex-md-column flex-row align-items-center py-2 text-center sticky-top "
        id="sidebar">
        <div class="text-center p-3">
            <img src="https://impreza.us-themes.com/wp-content/uploads/paolo-bendandi-D-8XODEIr_s-unsplash.jpg"
                alt="profile picture" class="img-fluid rounded-circle my-4 p-1 d-none d-md-block shadow" />
            <a href="{{ route('home') }}"
                class="navbar-brand mx-0 font-weight-bold  text-nowrap">{{ auth()->guard('web')->user()->email }}</a>
        </div>
        <button type="button" class="navbar-toggler border-0 order-1" data-toggle="collapse" data-target="#nav"
            aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-last" id="nav">
            <ul class="navbar-nav flex-column w-100 justify-content-center">
                <li class="nav-item">
                    <a href="{{ route('showRequests') }}" type="submit" class="nav-link active">All
                        request</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('showFriends') }}" class="nav-link"> Friends</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('showChatRooms') }}" class="nav-link"> Messages </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"> Log out </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</aside>
