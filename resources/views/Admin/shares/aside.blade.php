<div class="sidebar" data-color="danger" data-background-color="white" data-image="/admin/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="{{ url()->to('/') }}" class="simple-text logo-normal">
            Home
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item  {{ Route::currentRouteName() == "profile.index" ? 'active' : '' }}">
                <a class="nav-link" href="/admin/profile">
                    <i class="material-icons">account_box</i>
                    <p>Profile</p>
                </a>
            </li>
            <li class="nav-item  {{ Route::currentRouteName() == "categories.index" ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('categories.index') }}">
                    <i class="material-icons">list</i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="nav-item  {{ Route::currentRouteName() == "posts.index" ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('posts.index') }}">
                    <i class="material-icons">language</i>
                    <p>News</p>
                </a>
            </li>
            <li class="nav-item  {{ Route::currentRouteName() == "tags.index" ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('tags.index') }}">
                    <i class="material-icons">local_offer</i>
                    <p>Tags</p>
                </a>
            </li>
            <li class="nav-item  {{ Route::currentRouteName() == "advertisements.index" ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('advertisements.index') }}">
                    <i class="material-icons">perm_media</i>
                    <p>Advertisements</p>
                </a>
            </li>
            <li class="nav-item  {{ Route::currentRouteName() == "security.edit" ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('security.edit' , ['user' => $user->id]) }}">
                    <i class="material-icons">person</i>
                    <p>Security</p>
                </a>
            </li>
            <li class="nav-item  {{ Route::currentRouteName() == "settings.edit" ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('settings.edit') }}">
                    <i class="material-icons">settings</i>
                    <p>Settings</p>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="sidebar" data-color="danger" data-background-color="white" data-image="/admin/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="danger | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="{{ url()->to('/') }}" class="simple-text logo-normal">
            Home
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item  {{ Route::currentRouteName() == "profile.index" ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('profile.index' , ['user' => $user->id]) }}">
                    <i class="material-icons">account_box</i>
                    <p>Profile</p>
                </a>
            </li>
            <li class="nav-item  {{ Route::currentRouteName() == "categories.index" ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('categories.index') }}">
                    <i class="material-icons">list</i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="nav-item  {{ Route::currentRouteName() == "posts.index" ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('posts.index') }}">
                    <i class="material-icons">language</i>
                    <p>News</p>
                </a>
            </li>
            <li class="nav-item  {{ Route::currentRouteName() == "tags.index" ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('tags.index') }}">
                    <i class="material-icons">local_offer</i>
                    <p>Tags</p>
                </a>
            </li>
            <li class="nav-item  {{ Route::currentRouteName() == "advertisements.index" ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('advertisements.index') }}">
                    <i class="material-icons">perm_media</i>
                    <p>Advertisements</p>
                </a>
            </li>
            <li class="nav-item  {{ Route::currentRouteName() == "security.edit" ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('security.edit' , ['user' => $user->id]) }}">
                    <i class="material-icons">person</i>
                    <p>Security</p>
                </a>
            </li>
            <li class="nav-item  {{ Route::currentRouteName() == "settings.edit" ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('settings.edit') }}">
                    <i class="material-icons">settings</i>
                    <p>Settings</p>
                </a>
            </li>

        </ul>
    </div>
</div>