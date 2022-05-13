<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row min-vh-100 flex-column flex-md-row">
            <aside class="col-12 col-md-3 col-xl-2 p-0 bg-dark ">
                <nav class="navbar navbar-expand-md navbar-dark bd-dark flex-md-column flex-row align-items-center py-2 text-center sticky-top "
                    id="sidebar">
                    <div class="text-center p-3">
                        <img src="https://impreza.us-themes.com/wp-content/uploads/paolo-bendandi-D-8XODEIr_s-unsplash.jpg"
                            alt="profile picture" class="img-fluid rounded-circle my-4 p-1 d-none d-md-block shadow" />
                        <a href="{{ route('home') }}"
                            class="navbar-brand mx-0 font-weight-bold  text-nowrap">{{ auth()->guard('web')->user()->email }}</a>
                    </div>
                    <button type="button" class="navbar-toggler border-0 order-1" data-toggle="collapse"
                        data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
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
                                    <button type="submit"
                                        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </aside>

            <main class="col px-0 flex-grow-1">
                <nav class="navbar navbar-dark bg-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand"></a>
                        <form action="{{ route('search') }}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="search" name="search" class="form-control rounded" placeholder="Search"
                                    aria-label="Search" aria-describedby="search-addon" />
                                <button type="submit" class="btn btn-outline-light">Search</button>
                            </div>
                        </form>
                    </div>
                </nav>
                <div class="container py-3">
                    @yield('home')
                    @yield('requests')
                    @yield('friends')
                    @yield('chats')
                    @yield('chat')
                    @yield('search-res')
                    @yield('user-info')
                </div>
            </main>
        </div>
    </div>
</body>

</html>
