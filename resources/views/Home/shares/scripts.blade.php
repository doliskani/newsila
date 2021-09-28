<script>
    window.Laravel = {};
    window.Laravel.Auth = '{{ Auth::check() }}' == '' ? false : true;
    window.Laravel.csrfToken = '{{ csrf_token() }}';
</script>

<script src="{{ asset('js/home.js') }}"></script>
<script src="{{ asset('js/home-app.js') }}"></script>
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}


