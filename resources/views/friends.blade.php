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
                    @foreach ($data as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                                        style="width: 45px; height: 45px" class="rounded-circle" />

                                    <div class="ms-3">
                                        <p class="fw-bold mb-1">John Doe</p>
                                        <p class="text-muted mb-0">{{ $user->email }}</p>


                                        {{-- ========================================================= --}}
                                        {{-- @if ($user->sender = $user->id)
                                            <p>If grana</p>
                                            <p class="text-muted mb-0">{{ $user->email }}</p>
                                        @elseif ($user->receiver = $user->id)
                                            <p>Else grana</p>
                                            <p class="text-muted mb-0">{{ $user->email }}</p>
                                        @endif --}}
                                        {{-- ========================================================= --}}
                                        <input type="hidden" name="receiver" value="{{ $user->id }}">
                                        {{-- <input type="hidden" name="email" value="{{ $user->email }}"> --}}
                                        {{-- <input type="hidden" name="sender" value="{{ $user->sender }}"> --}}
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