<header id="header" class="fixed-top">

    <div  class="d-flex flex-row bg-light justify-content-between shadow">
        <div id="logo" class="d-flex">
            <span   class="ml-1 menu ">
                <i class="fa fa-bars"></i>
            </span>
            <a href="/" class=" ml-1">
                <img src="/img/logo.png" alt="">
            </a>
        </div>



        <front-search :language="{{ json_encode($lang) }}"></front-search>

        <div class="dropdown change-lng mr-2 mt-1 mr-sm-5">
            <div class="show-search d-block d-sm-none">
                <button type="submit" class="mr-2 input-group-text border border-0">
                    <i class="fa fa-search  text-dark"></i>
                </button>
            </div>
            <a href=""  class="dropdown-toggle text-dark d-flex" data-toggle="dropdown">
                <img src="/img/flags/{{ app()->getLocale() }}.png" alt="">
            </a>
            <div class="dropdown-menu h6">
                @if($langs->count())
                    @foreach($langs as $lang)
                        <a class="dropdown-item" href="{{ app()->getLocale() == $lang->abbrev ? 'javascript:;' : $current . $lang->abbrev }}">
                            <img src="{{ $lang->image }}" alt="">
                            <span>{{ ucfirst($lang->name) }}</span>
                        </a>
                    @endforeach
                @endif



            </div>
        </div>
    </div>
</header>