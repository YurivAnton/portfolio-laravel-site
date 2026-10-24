
<h1>Login</h1>

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('login.store') }}">
    @csrf

    <div>
        <label for="email">Email</label>
        <input
            id="email"
            type="email"
            name="email"
            value="{{ old('email') }}"
            required
            autofocus
            autocomplete="username"
        >
    </div>

    <div>
        <label for="password">Password</label>
        <input
            id="password"
            type="password"
            name="password"
            required
            autocomplete="current-password"
        >
    </div>

    <button type="submit">Log in</button>
</form>
