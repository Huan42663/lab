@auth
    @if (Auth::user()->role == 'admin')
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

            <div class="container">
                <a href="{{ route('user.infor') }}"><button class="btn btn-primary">Quay lại</button></a>
                <h1>Danh Sách User</h1>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Email</th>
                                {{-- <th scope="col">Password</th> --}}
                                <th scope="col">Avatar</th>
                                <th scope="col">Role</th>
                                <th scope="col">Active</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="">
                                    <td scope="row">{{ $user->id }}</td>
                                    <td scope="row">{{ $user->fullname }}</td>
                                    <td scope="row">{{ $user->username }}</td>
                                    <td scope="row">{{ $user->email }}</td>
                                    {{-- <td scope="row">{{ $user->password }}</td> --}}
                                    <td scope="row"><img src="{{ asset('storage/' . $user->avatar) }}" width="50px"
                                            alt=""></td>
                                    <td scope="row">{{ $user->role }}</td>
                                    <td scope="row">{{ $user->active }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit', $user) }}"><button
                                                class="btn btn-primary">Sửa</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
            </script>
        </body>

        </html>
    @else
        @php
            return redirect()->back()->with('error', 'Bạn Không Đủ Thẩm Quyền');
        @endphp
    @endif
@endauth
