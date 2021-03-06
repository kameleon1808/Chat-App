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
            <x-sidebar />

            <main class="col px-0 flex-grow-1">
                <x-navbar />

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
