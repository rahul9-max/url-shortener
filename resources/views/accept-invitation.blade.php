<h2>Accept Invitation</h2>

<form method="POST">
    @csrf

    <p>Email: {{ $invitation->email }}</p>

    <input type="password" name="password" placeholder="Set Password" required>

    <button type="submit">Create Account</button>
</form>
