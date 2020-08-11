@extends("layout.master")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="card" style="border: 2px solid {{ $user->university->color }}">
                    <img src="{{ $user->gravatar(256) }}" class="card-img-top">
                    <div class="card-body">
                        @if ($user->is_admin)
                            <b class="text-danger">Administrátor webu</b>
                        @endif
                        <h3 class="card-title">{{ $user->name }} &dash; <small>{{ $user->university->name }}</small></h3>
                        <code>{{ $user->email }}</code>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
