@extends("layout.master")

@section("content")
    <div class="container">
        <h1>Upravit univerzitu</h1>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <form action="{{ route("administration.universities.update", $university->id) }}" method="post">
                    @csrf
                    @method("put")
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Název univerzity</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old("name", $university->name) }}" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="color">Barva</label>
                                <input type="color" name="color" id="color" value="{{ old("color", $university->color) }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="logo_url">Logo</label>
                                <input type="url" name="logo_url" id="logo_url" value="{{ old("logo_url") }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success">Uložit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
