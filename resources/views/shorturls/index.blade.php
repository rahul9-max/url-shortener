@foreach($urls as $url)
    <p>
        {{ $url->short_code }} → {{ $url->original_url }}
    </p>
@endforeach


















3
