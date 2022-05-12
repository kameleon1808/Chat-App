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
            {{-- ============================ALL CHAT ROOMS=============================================== --}}
            <br><br>
            {{-- <form action="{{ route('showChatRooms') }}" method="get">
                <button type="submit" class="btn btn-outline-primary btn-rounded" data-mdb-ripple-color="dark">All
                    chat rooms</button>
            </form> --}}

            <div class="container">
                <div class="row">

                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->count())
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                                                    style="width: 45px; height: 45px" class="rounded-circle" />

                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1">{{ $user->name }}</p>
                                                    <p class="text-muted mb-0">{{ $user->user_id }}</p>
                                                    <input type="hidden" name="receiver" value="{{ $user->id }}">
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <a href="chat/{{ $user->room_id }}"
                                                class="btn btn-link btn-sm btn-rounded">
                                                Send message
                                            </a>
                                            {{-- <form action="{{ route('chat') }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-link btn-sm btn-rounded">
                                                    Send messagee
                                                </button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>
                                        No user found
                                    </td>
                                </tr>
                            @endif


                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</body>

</html>
