@include('header.header')

<body>
    <div class="container">
        <div class="row">
            <h1>Friends</h1>
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @if ($users->count()) --}}
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
                                        <input type="hidden" name="email" value="{{ $user->email }}">
                                        <input type="hidden" name="sender" value="{{ $user->sender }}">
                                    </div>
                                </div>
                            </td>

                            <td>
                                <a href="{{ 'delete-friend/' . $user->id }}" class="btn btn-link btn-sm btn-rounded">
                                    Delete
                                </a>
                                {{-- <form action="{{ url('comfirm/' . $user->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-link btn-sm btn-rounded">
                                        Add friend
                                    </button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                    {{-- @else
                        <tr>
                            <td>
                                No user found
                            </td>
                        </tr>
                    @endif --}}


                </tbody>
            </table>

        </div>
    </div>
</body>
