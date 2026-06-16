@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form method="POST" action="/companies">
    @csrf

    <input type="text" name="name" placeholder="Company Name">

    <button type="submit">Create Company</button>
</form>
