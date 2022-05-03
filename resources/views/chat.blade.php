@include('header.header')

<body>
    <div class="container">
        <div class="row">
            <h1>Chat room {{ auth()->guard('web')->user()->email }}</h1>

            <div class="form-outline">
                <input type="text" id="typeText" class="form-control" value="" />
                <label class="form-label" for="typeText">Mail address</label><br><br>
            </div>


            <div>
                <ul class="list-group list-group-light list-group-numbered">
                    {{-- @if ($users[0]->count()) --}}
                    @if (session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @foreach ($users as $user)
                        <input type="hidden" name="room_id" value="{{ $user->room_id }}">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Sender: {{ $user->email }}</div>
                                {{ $user->message_text }}
                            </div>
                            <span class="badge badge-primary rounded-pill">{{ $user->created_at }}</span>
                        </li><br>
                    @endforeach
                    {{-- @else
                        <tr>
                            <td>
                                No user found
                            </td>
                        </tr>
                    @endif --}}
                </ul>
            </div>


            <form action="{{ route('send-message') }}" method="post">
                @csrf
                <div class="form-outline">
                    <input type="hidden" name="room_id" value="{{ $room_id }}">
                    <textarea name="message" class="form-control" id="textAreaExample" rows="4"></textarea>
                    <label class="form-label" for="textAreaExample">Message</label>
                </div>
                <button type="submit" class="btn btn-success">Send</button>
            </form>

        </div>
    </div>
