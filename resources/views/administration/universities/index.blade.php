@extends("layout.master")

@section("content")
    <div class="container">
        <div class="d-flex">
            <div class="flex-grow-1">
                <h1>Správa univerzit</h1>
            </div>
            <div class="flex-grow-0">
                <a href="{{ route("administration.universities.create") }}" class="btn btn-success">Přidat univerzitu</a>
            </div>
        </div>
        <hr>
        <div class="row">
            @foreach($universities as $university)
                <div class="col-sm-12 col-md-4">
                    <div class="card">
                        <img src="https://singlecolorimage.com/get/{{ str_replace("#", "", $university->color) }}/1x1" class="card-img-top" alt="{{ $university->color }}" height="10px">
                        <div class="card-body d-flex flex-row justify-content-between align-items-center">
                            <h3 class="card-title">{{ $university->name }}</h3>
                            <a href="{{ route("administration.universities.show", $university->id) }}" class="btn btn-secondary">Detaily</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
