@include('header.header')

<body>
    <div class="container">
        <div class="row">
            <form action="{{ route('add-friend') }}" method="post">
                @csrf
                @if (session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <input type="hidden" name="id" value="{{ $data->id }}">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $data->email }}</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk
                            of
                            the card's content.</p>
                        <button type="submit" class="btn btn-primary">Add friend</button>

                        <a href="{{ route('chat') }}" type="button" class="btn btn-primary">Send message</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
