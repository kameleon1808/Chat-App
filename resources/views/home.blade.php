@extends('layouts.master')

@section('home')
    <h1>Home strana</h1>
    {{-- ==========================FIND USER FOR CHATTING===================================================== --}}
    <br><br>
    <h3>Find someone</h3>
    <form action="{{ route('search') }}" method="post">
        @csrf
        <div class="input-group">
            <input type="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                aria-describedby="search-addon" />
            <button type="submit" class="btn btn-outline-primary">search</button>
        </div>
    </form>
@endsection
