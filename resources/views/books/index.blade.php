<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body class="container">
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @auth
        Username: {{ Auth::user()->fullname }}
        <a href="{{ route('logout') }}">Logout</a>
    @endauth
    <form class="mb-3" method="GET" action="{{ route('search') }}">
        <input type="text" name="search" id="" class="form-control" placeholder="Search..."
            aria-describedby="helpId" />
        {{-- <button type="submit" ></button> --}}
    </form>

    <a href="{{ route('movie.create') }}"><button class="container btn btn-success">Thêm</button></a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Poster</th>
                <th scope="col">Intro</th>
                <th scope="col">Release Date</th>
                <th scope="col">Gene</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $book)
                <tr class="">
                    <td scope="row">{{ $book->id }}</td>
                    <td scope="row">{{ $book->title }}</td>
                    <td scope="row"><img src="/storage/{{ $book->poster }}" width="100px" alt=""></td>
                    <td scope="row">{{ $book->intro }}</td>
                    <td scope="row">{{ $book->release_date }}</td>
                    <td scope="row">{{ $book->gene->name }}</td>
                    <td><a href="{{ route('movie.edit', $book) }}"><button class="btn btn-warning">Edit</button></a>
                        <form action="{{ route('movie.destroy', $book) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $movies->links() }}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
