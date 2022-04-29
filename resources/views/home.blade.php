@include('header.header')

<body>
    <div class="container">
        <div class="row">
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
                <button type="submit" class="btn btn-outline-primary btn-rounded" data-mdb-ripple-color="dark">All
                    request</button>
            </form>
            {{-- ============================ALL FRIENDS=============================================== --}}
            <br><br>
            <form action="{{ route('showFriends') }}" method="get">
                <button type="submit" class="btn btn-outline-primary btn-rounded" data-mdb-ripple-color="dark">All
                    friends</button>
            </form>
            {{-- ============================ALL MESSAGES=============================================== --}}
            <br><br>
            <form action="{{ route('showChats') }}" method="get">
                <button type="submit" class="btn btn-outline-primary btn-rounded" data-mdb-ripple-color="dark">All
                    messages</button>
            </form>

        </div>
    </div>
</body>

</html>
