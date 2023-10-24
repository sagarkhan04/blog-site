<h2>Login</h2>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p style="color: red;">{{ $error }}</p>
    @endforeach
@endif

@if (session('success'))
    {{ session('success') }}
@endif

<form action="{{ route('login.submit') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Email" /><br />
    <input type="password" name="password" placeholder="Password" /><br />
    <button type="submit">Login</button><br /><br />
    <a href="{{ route('register') }}">Register</a>
</form>
