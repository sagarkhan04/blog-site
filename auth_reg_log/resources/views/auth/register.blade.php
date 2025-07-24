<h2>Register</h2>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p style="color: red;">{{ $error }}</p>
    @endforeach
@endif

<form action="{{ route('register.submit') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name" /><br />
    <input type="email" name="email" placeholder="Email" /><br />
    <input type="password" name="password" placeholder="Password" /><br />
    <input type="password" name="password_confirmation" placeholder="Confirm Password" /><br />
    <button type="submit">Register</button><br /><br />
    <a href="{{ route('login') }}">Login</a>
</form>
