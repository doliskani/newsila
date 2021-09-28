<aside id="menu" class="mt-4 d-none d-lg-block pt-lg-5 {{ isset($cls) ? $cls : "" }}">
    <div class=" d-lg-none ml-2 mt-2 mb-3">
        <a href="/{{ $lang }}" class=" ml-1">
            <img src="/img/logo.png" alt="">
        </a>
    </div>
    <ul class="nav flex-column pt-lg-3">
        <li class="nav-item">
            <a class="nav-link text-secondary {{ MostUse::activeAsideMenu("news.index") }}" href="/{{ $lang }}">
                <i class="fa fa-newspaper-o mr-2 "></i>
                <span>Top stories</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-secondary {{ MostUse::activeAsideMenu("news.fav") }}"
               href="{{ route('news.fav' , ['lang' => $lang]) }}">
                <i class="fa fa-heart mr-2 "></i>
                <span>Favorites</span>
            </a>
        </li>
    </ul>
    <div class="w-75 ml-3 border border-right-0 border-left-0 border-top-0 mt-3 mb-3">
    </div>

    <ul class="nav flex-column clearfix">
        @foreach($categories as $category)
            <li class="nav-item">
                <a class="nav-link text-secondary {{  '/' . request()->path() == $category->path() . '/' . $lang ? 'active' : ''  }}"
                   href="{{  '/' . $lang . $category->path()   }}">
                    <i class="fa {{ $category->icon_class }} mr-2 "></i>
                    <span>{{ ucfirst($category->title)   }}</span>
                </a>
            </li>
        @endforeach
        @if($user)
            <li class="nav-item">
                <a class="nav-link text-secondary"
                   href="{{ '/admin/profile' }}">
                    <i class="fa fa-user-circle-o mr-2 "></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary"
                   href="{{ '/logout/en' }}">
                    <i class="fa fa-sign-out mr-2 "></i>
                    <span>Logout</span>
                </a>
            </li>
        @endif

    </ul>
</aside>