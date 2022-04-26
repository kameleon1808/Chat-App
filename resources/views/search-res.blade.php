@include('header.header')

<body>
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
                                            <p class="fw-bold mb-1">John Doe</p>
                                            <p class="text-muted mb-0">{{ $user->email }}</p>
                                            <input type="hidden" name="receiver" value="{{ $user->id }}">
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <a href="{{ 'user-info/' . $user['id'] }}" class="btn btn-link btn-sm btn-rounded">
                                        View details
                                    </a>
                                    {{-- <form action="{{ route('add-friend') }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-link btn-sm btn-rounded">
                                            Add friend
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
</body>
