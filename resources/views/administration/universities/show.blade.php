@extends("layout.master")

@section("content")
    <div class="container">
        <div class="d-flex">
            <div class="flex-grow-1">
                <h1>{{ $university->name }}</h1>
            </div>
            <div class="flex-grow-0">
                <a href="{{ route("administration.universities.edit", $university->id) }}" class="btn btn-primary">Upravit</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <b>Barva:</b> {{ $university->color }} <br>
                        <div style="width: 100%; height: 30px; background-color: {{ $university->color }}"></div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6">

                <div class="card">
                    <div class="card-body">
                        <b>Logo:</b><br> <img src="{{ $university->logo_url }}" height="100px">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 mt-5">
                <h4>Uživatelé z {{ $university->name }}</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Jméno</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($university->users as $user)
                        <tr>
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @if ($universities->count() > 1)
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <form action="{{ route("administration.universities.destroy", $university->id) }}" method="post">
                        @csrf
                        @method("delete")
                        <h4 class="text-danger">Smazat {{ $university->name }}</h4>
                        <div class="form-group">
                            <label for="university_id">Přesunout všechny uživatele do</label>
                            <select name="university_id" id="university_id" class="form-control">
                                @foreach($universities->filter(fn ($item) => $item->id !== $university->id) as $option)
                                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button onclick="return confirm('Opravdu smazat {{ $university->name }}? Tato akce je nevratná.');" class="btn btn-danger">Smazat</button>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection
