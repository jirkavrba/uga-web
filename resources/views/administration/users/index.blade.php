@extends("layout.master")

@section("content")
    <div class="container">
        <div class="d-flex">
            <div class="flex-grow-1">
                <h1>Správa uživatelů</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 mt-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Jméno</th>
                                <th>Email</th>
                                <th>Univerzita</th>
                                <th>Administrátor</th>
                                <th>Akce</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->university->name }}</td>
                                    <td>{{ $user->is_admin ? "Ano" : "Ne" }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-secondary" href="{{ route("administration.users.show", $user->id) }}">Detaily</a>
                                        <a class="btn btn-sm btn-secondary" href="{{ route("administration.users.edit", $user->id) }}">Upravit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="mt-5">
                    <div class="d-flex justify-content-center">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
