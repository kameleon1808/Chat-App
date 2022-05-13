@extends('layouts.master')

@section('chat')
    {{-- <h1>Chat room {{ auth()->guard('web')->user()->email }}</h1> --}}

    <div>
        <ul class="list-group list-group-light list-group-numbered" id="chat">
            @if (session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @foreach ($users as $user)
                @if ($user->user_id ==
                    auth()->guard('web')->user()->id)
                    <input type="hidden" name="room_id" value="{{ $user->room_id }}">
                    <li class="me">
                        <div class="entete">
                            <h3>{{ $user->created_at }}</h3>
                            <h2>{{ $user->email }}</h2>
                            <span class="status blue"></span>
                        </div>
                        {{-- <div class="triangle"></div> --}}
                        <div class="message">
                            {{ $user->message_text }}
                        </div>
                        <form action="/deleteMessage/{{ $user->id }}" method="get">
                            @csrf
                            @method('DELETE')
                            <input value="Delete" type="submit" class="btn btn-link btn-sm btn-rounded">
                        </form>
                    </li>
                @else
                    <li class="you">
                        <div class="entete">
                            <span class="status green"></span>
                            <h3>{{ $user->created_at }}</h3>
                            <h2>{{ $user->email }}</h2>
                        </div>
                        {{-- <div class="triangle"></div> --}}
                        <div class="message">
                            {{ $user->message_text }}
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
        <form action="{{ route('send-message') }}" method="post">
            @csrf
            <div class="form-outline">
                <input type="hidden" name="room_id" value="{{ $room_id }}">
                <textarea name="message" class="form-control" id="textAreaExample" rows="3"></textarea>
                <label class="form-label" for="textAreaExample">Message</label>
            </div>
            <button type="submit" class="btn btn-success">Send</button>
        </form>
    </div>
@endsection
