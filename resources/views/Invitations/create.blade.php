@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form method="POST" action="/invitations">
    @csrf

    <input type="email" name="email" placeholder="User Email">

    <select name="role">
        <option value="Admin">Admin</option>
        <option value="Member">Member</option>
    </select>

    <select name="company_id">
        @foreach($companies as $company)
            <option value="{{ $company->id }}">
                {{ $company->name }}
            </option>
        @endforeach
    </select>

    <button type="submit">Send Invitation</button>
</form>
