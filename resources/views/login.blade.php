<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="container w-50">
        <h1>Login</h1>
        <form action="{{ route('postLogin') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" class="btn btn-primary">Login</button>
            </div>
            <div class="mb-3">
                <a href="{{ route('register') }}">Register</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
