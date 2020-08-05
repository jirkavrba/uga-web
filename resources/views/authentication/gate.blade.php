<form action="{{ route("authentication.login") }}" method="post">
    <h1>Login</h1>
    @csrf

    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="{{ old("email") }}" required>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>

    <button>Login</button>
</form>

<form action="{{ route("authentication.register") }}" method="post">
    <h1>Register</h1>
    @csrf

    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ old("name") }}" required>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="{{ old("email") }}" required>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>

    <label for="password_confirmation">Password confirmation</label>
    <input type="password" name="password_confirmation" id="password_confirmation" required>

    <label for="university">University</label>
    <select name="university_id" id="university">
        @foreach($universities as $university)
            <option value="{{ $university->id }}">{{ $university->name }}</option>
        @endforeach
    </select>

    <button>Register</button>
</form>
