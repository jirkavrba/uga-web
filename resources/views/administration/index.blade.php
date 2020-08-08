@extends("layout.master")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Správa univerzit</h5>
                        <p class="card-text">Celkem registrováno <b>{{ $universities }}</b> univerzit.</p>
                        <a href="{{ route("administration.universities.index") }}" class="btn btn-primary">Správa</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Správa univerzit</h5>
                        <p class="card-text">Celkem registrováno <b>{{ $universities }}</b> univerzit.</p>
                        <a href="#" class="btn btn-primary">Správa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
