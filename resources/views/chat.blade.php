@include('header.header')

<body>
    <div class="container">
        <div class="row">
            <h1>Chat room {{ auth()->guard('web')->user()->email }}</h1>

            <div class="form-outline">
                <input type="text" id="typeText" class="form-control" />
                <label class="form-label" for="typeText">Mail address</label><br><br>
            </div>

            <div>
                <ol class="list-group list-group-light list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Subheading</div>
                            Cras justo odio
                        </div>
                        <span class="badge badge-primary rounded-pill">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Subheading</div>
                            Cras justo odio
                        </div>
                        <span class="badge badge-primary rounded-pill">14</span>
                    </li>
                </ol><br><br>
            </div>


            <div class="form-outline">
                <textarea class="form-control" id="textAreaExample" rows="4"></textarea>
                <label class="form-label" for="textAreaExample">Message</label>
            </div>

            <button type="button" class="btn btn-success">Send</button>
        </div>
    </div>
