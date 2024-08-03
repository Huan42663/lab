<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
</div>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Thêm Sách</h1>
        <div class="mb-3">
            @if ($errors->any())
                <div class="alert alert-danger mt3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('PUT') --}}
                <label for="" class="form-label">Title</label>
                <input type="text" name="title" id="
                " class="form-control" placeholder=""
                    aria-describedby="helpId" />
                <label for="" class="form-label">Poster</label>
                <input type="file" name="poster" id="" class="form-control" placeholder=""
                    aria-describedby="helpId" />
                <label for="" class="form-label">Intro</label>
                <input type="text" name="intro" id="" class="form-control" placeholder=""
                    aria-describedby="helpId" />
                <label for="" class="form-label">Release Date</label>
                <input type="datetime-local" name="release_date" id="" class="form-control" placeholder=""
                    aria-describedby="helpId" />
                <label for="" class="form-label">Gene</label>
                <select name="gene_id" id="">
                    @foreach ($gene as $gene)
                        <option value="{{ $gene->id }}">{{ $gene->name }}</option>
                    @endforeach
                </select>
                <br>
                <input type="submit" class="mt-3 btn btn-primary" name="" value="Thêm" id="">
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
