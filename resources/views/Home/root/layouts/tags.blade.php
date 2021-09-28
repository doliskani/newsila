<div id="tags" class="p-3 pt-2">
    <h2 class="h5 text-secondary">In the news</h2>
    <hr class="mt-3 mb-3">
    @php
        $arr = array();
    @endphp
    @foreach($tags as $tag)
        <a href="{{ '/' . $lang }}/tags/{!! $tag->slug !!}" class="btn btn-outline-secondary btn-sm mb-2">{!! $tag->title !!}</a>
    @endforeach
</div>