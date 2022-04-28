@include('header.header')

<body>
    <div class="container">
        <div class="row">
            <h1>Chat room {{ auth()->guard('web')->user()->email }}</h1>

            <div class="form-outline">
                <input type="text" id="typeText" class="form-control" />
                <label class="form-label" for="typeText">Mail address</label>
            </div>

            <div class="form-outline">
                <textarea class="form-control" id="textAreaExample" rows="4"></textarea>
                <label class="form-label" for="textAreaExample">Message</label>
            </div>

            <button type="button" class="btn btn-success">Send</button>
        </div>
    </div>
