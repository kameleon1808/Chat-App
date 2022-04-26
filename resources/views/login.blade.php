@include('header.header')

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
            <h4>User Login</h4>
            <hr>
            <form action="{{ route('check') }}" method="post" autocomplete="off">

                @if (session()->get('fail'))
                    <div class="alert alert-danger">
                        {{ session()->get('fail') }}
                    </div>
                @endif
                @csrf

                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter email address"
                        value="{{ old('email') }}">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password"
                        value="{{ old('password') }}">
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div> <br>

                <br>
                <a href="{{ route('register') }}">Create new Account</a>
            </form>
        </div>
    </div>
</div>
