@auth
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
            <h1>Thông Tin User: {{ Auth::user()->fullname }}</h1>
            <a href="{{ route('logout') }}"><button class="btn btn-danger">Đăng Xuất</button></a>
            @if (Auth::user()->role == 'admin')
                <a href="{{ route('user.list') }}"><button class="btn btn-primary">danh sách user</button></a>
            @endif
            <form action="{{ route('user.update', Auth::user()) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3 text-center">
                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" width="200" alt="">
                    <input type="file" name="avatar" class="form-control mt-2" id="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id=""
                        value="{{ Auth::user()->username }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">fullname</label>
                    <input type="text" name="fullname" class="form-control" id=""
                        value="{{ Auth::user()->fullname }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">email</label>
                    <input type="text" name="email" class="form-control" id=""
                        value="{{ Auth::user()->email }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">role</label>
                    <input type="text" name="role" class="form-control" id=""
                        value="{{ Auth::user()->role }}" disabled>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" class="btn btn-primary">Sửa</button>
                </div>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    </body>

    </html>

@endauth
