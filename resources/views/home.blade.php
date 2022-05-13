@include('header.header')

<body>
    {{-- <div class="container">
        <div class="row">
            
        </div>
    </div> --}}

    <div class="container-fluid">
        <div class="row min-vh-100 flex-column flex-md-row">
            <aside class="col-12 col-md-3 col-xl-2 p-0 bg-dark ">
                <nav class="navbar navbar-expand-md navbar-dark bd-dark flex-md-column flex-row align-items-center py-2 text-center sticky-top "
                    id="sidebar">
                    <div class="text-center p-3">
                        <img src="https://impreza.us-themes.com/wp-content/uploads/paolo-bendandi-D-8XODEIr_s-unsplash.jpg"
                            alt="profile picture" class="img-fluid rounded-circle my-4 p-1 d-none d-md-block shadow" />
                        <a href="#" class="navbar-brand mx-0 font-weight-bold  text-nowrap">XcentPupil</a>
                    </div>
                    <button type="button" class="navbar-toggler border-0 order-1" data-toggle="collapse"
                        data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse order-last" id="nav">
                        <ul class="navbar-nav flex-column w-100 justify-content-center">
                            <li class="nav-item">
                                <a href="#" class="nav-link active"> Edit Profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"> Projects</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"> Tasks </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"> Users Info </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </aside>

            <main class="col px-0 flex-grow-1">
                <div class="container py-3">
                    <h1>Home strana</h1>
                    <h2>{{ auth()->guard('web')->user()->email }}</h2>
                    {{-- ==========================FIND USER FOR CHATTING===================================================== --}}
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                            Logout
                        </button>
                    </form>
                    {{-- ==========================FIND USER FOR CHATTING===================================================== --}}
                    <br><br>
                    <h3>Find someone</h3>
                    <form action="{{ route('search') }}" method="post">
                        @csrf
                        <div class="input-group">
                            <input type="search" name="search" class="form-control rounded" placeholder="Search"
                                aria-label="Search" aria-describedby="search-addon" />
                            <button type="submit" class="btn btn-outline-primary">search</button>
                        </div>
                    </form>
                    {{-- ============================ALL FRIEND REQUESTS=============================================== --}}
                    <br><br>
                    <form action="{{ route('showRequests') }}" method="get">
                        <button type="submit" class="btn btn-outline-primary btn-rounded"
                            data-mdb-ripple-color="dark">All
                            request</button>
                    </form>
                    {{-- ============================ALL FRIENDS=============================================== --}}
                    <br><br>
                    <form action="{{ route('showFriends') }}" method="get">
                        <button type="submit" class="btn btn-outline-primary btn-rounded"
                            data-mdb-ripple-color="dark">All
                            friends</button>
                    </form>
                    {{-- ============================ALL CHAT ROOMS=============================================== --}}
                    <br><br>
                    <form action="{{ route('showChatRooms') }}" method="get">
                        <button type="submit" class="btn btn-outline-primary btn-rounded"
                            data-mdb-ripple-color="dark">All
                            chat rooms</button>
                    </form>
                </div>
            </main>
        </div>


    </div>



</body>

</html>
