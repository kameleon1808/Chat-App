@include('header.header')

<body>
    <div class="container">
        <div class="row">
            <h1>Friends {{ auth()->guard('web')->user()->email }}</h1>
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @if ($data->receiver = auth()->guard('web')->user()->id) --}}
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                                        style="width: 45px; height: 45px" class="rounded-circle" />

                                    <div class="ms-3">
                                        <p class="fw-bold mb-1">{{ $user->email }}</p>

                                        <input type="hidden" name="receiver" value="{{ $user->id }}">
                                    </div>
                                </div>
                            </td>

                            <td>
                                {{-- <a href="{{ 'delete-friend/' . $user->id }}" class="btn btn-link btn-sm btn-rounded">
                                    Delete
                                </a> --}}
                                <form action="/delete-friend/{{ $user->id }}" method="get">
                                    <input type="hidden" name="receiver" value="{{ $user->id }}">

                                    @csrf
                                    @method('DELETE')
                                    <input value="Delete" type="submit" class="btn btn-link btn-sm btn-rounded">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    {{-- @elseif ($data->sender = auth()->guard('web')->user()->id)
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
