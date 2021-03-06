@extends('layouts.master')

@section('user-info')
    <form action="{{ route('add-friend') }}" method="post">
        @csrf
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $data->email }}</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                    of
                    the card's content.</p>
                <input type="hidden" name="id" value="{{ $data->id }}">

                <button type="submit" class="btn btn-primary">Add friend</button>

                {{-- <a href="{{ route('chat') }}" type="button" class="btn btn-primary">Send message</a> --}}
            </div>
        </div>
    </form>

    <form action="{{ route('create-chat') }}" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{ $data->id }}">

        <button type="submit" class="btn btn-primary">Create chat room</button>
    </form>
    </div>
    </div>
    </body>
@endsection
