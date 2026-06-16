<h2>Create Short URL</h2>

<form method="POST" action="/short-urls">
    @csrf

    <input type="text" name="original_url" placeholder="Enter URL">

    <button type="submit">
        Create Short URL
    </button>
</form>
