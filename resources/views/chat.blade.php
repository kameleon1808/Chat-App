@include('header.header')

<body>
    <div class="container">
        <div class="row">
            <h1>Chat room {{ auth()->guard('web')->user()->email }}</h1>

            <div class="form-outline">
                <input type="text" id="typeText" class="form-control" value="" />
                <label class="form-label" for="typeText">Mail address</label><br><br>
            </div>

            @foreach ($users as $user)
                {{-- <input type="hidden" name="room_id" value="{{ $user->room_id }}"> --}}
                <div>
                    <ul class="list-group list-group-light list-group-numbered">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Sender: {{ $user->email }}</div>
                                {{-- <div class="fw-bold">Sender: </div> --}}
                                {{ $user->message_text }}
                            </div>
                            <span class="badge badge-primary rounded-pill">14</span>
                        </li>

                    </ul><br><br>
                </div>
            @endforeach


            {{-- <form action="{{ route('send-message') }}" method="post"> --}}
            {{-- @csrf --}}
            <div class="form-outline">
                {{-- <input type="hidden" name="room_id" value="{{ $user->room_id }}"> --}}
                <textarea name="message" class="form-control" id="textAreaExample" rows="4"></textarea>
                <label class="form-label" for="textAreaExample">Message</label>
            </div>
            <button type="submit" class="btn btn-success">Send</button>
            {{-- </form> --}}

        </div>
    </div>
