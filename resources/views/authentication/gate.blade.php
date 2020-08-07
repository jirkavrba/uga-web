@extends("layout.master")

@section("content")
    <div class="container">
        <div class="row">
            <form action="{{ route("authentication.login") }}" method="post" class="col-sm-12 col-md-6 mb-5">
                <div class="bg-discord p-3 rounded-lg">
                    @csrf
                    <div class="text-uppercase lead text-white font-weight-bold">Přihlášení</div>
                    <hr>

                    <div class="form-group">
                        <label for="email" class="text-white">Email</label>
                        <input class="form-control" type="email" name="email" id="email" value="{{ old("email") }}"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="password" class="text-white">Password</label>
                        <input class="form-control" type="password" name="password" id="password" required>
                    </div>

                    <hr>

                    <button class="btn btn-block bg-white text-discord">Přihlásit se</button>
                </div>
            </form>

            <form action="{{ route("authentication.register") }}" method="post" class="col-sm-12 col-md-6">
                <div class="bg-light p-3 rounded-lg">
                    @csrf
                    <div class="text-uppercase lead text-discord font-weight-bold">Registrace</div>
                    <hr>

                    <div class="form-group">
                        <label for="name">Jméno</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old("name") }}"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old("email") }}"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="password">Heslo</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Heslo znovu</label>
                        <input type="password" class="form-control" name="password_confirmation"
                               id="password_confirmation" required>
                    </div>

                    <div class="form-group">
                        <label for="university">University</label>
                        <select name="university_id" id="university" class="form-control">
                            @foreach($universities as $university)
                                <option value="{{ $university->id }}">{{ $university->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <hr>

                    <button class="btn btn-block bg-discord text-white">Registrovat</button>
                </div>
            </form>

        </div>
    </div>
@endsection

