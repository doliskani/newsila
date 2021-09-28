<div id="sources" class="p-3 pt-4 d-block">
    <h2 class="h5 text-secondary">Sources</h2>
    <hr class="mt-3 mb-3">
    @php
        $arr = array();
    @endphp
    @foreach($sources as $source)
        <a href="{{ '/' . $lang }}/sources/{!! $source !!}" class="btn btn-outline-secondary btn-sm mb-2">{!! $source !!}</a>
    @endforeach
</div>