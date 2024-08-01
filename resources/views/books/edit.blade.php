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
        <h1>Sửa Thông Tin Sách</h1>
        <div class="mb-3">
            <form action="{{ route('movie.update', $movie) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="" class="form-label">Title</label>
                <input type="text" name="title" id="" class="form-control" placeholder=""
                    value="{{ $movie->title }}" aria-describedby="helpId" />
                <img src="{{ asset('storage/' . $movie->poster) }}" width="300px" alt="">
                <input type="file" class="form-control" name="poster" id="">
                <label for="" class="form-label">Intro</label>
                <input type="text" name="intro" id="" class="form-control" placeholder=""
                    value="{{ $movie->intro }}" aria-describedby="helpId" />
                <label for="" class="form-label">Release Date</label>
                <input type="text" name="release_date" id="" class="form-control" placeholder=""
                    value="{{ $movie->release_date }}" aria-describedby="helpId" />
                <label for="" class="form-label">Danh Mục</label>
                <select name="gene_id" id="">
                    @foreach ($gene as $gen)
                        <option value="{{ $gen->id }}" @if ($movie->gene_id == $gen->id) selected @endif>
                            {{ $gen->name }}</option>
                    @endforeach
                </select>
                <br>
                <input type="submit" class="mt-3 btn btn-primary" name="" value="Sửa" id="">
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
