<header class="header">
  <div class="wrap">
    <div class="header__inner flex">
      <h1 class="header__heading">売上管理システム</h1>
      <ul class="header-nav flex">
        <li @class(["header-nav__item", "current"=> Functions::isCurrentPage(url()->current(), 'performances') !== false])>
          <a href="{{ route('performances.index') }}" class="header-nav__link">売上管理</a>
        </li>
        <li class="header-nav__item">
          <a href="{{ route('performances.index') }}" class="header-nav__link">顧客管理</a>
        </li>
        <li class="header-nav__item">
          <a href="{{ route('performances.index') }}" class="header-nav__link">売れ筋商品</a>
        </li>
        <li class="header-nav__item logout">
          <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
              this.closest('form').submit();">
              {{ __("ログアウト") }}
            </x-dropdown-link>
          </form>
        </li>
        <li class="header-nav__item admin">
          {{ Auth::user()->name }}
        </li>
      </ul>
    </div>
  </div>
</header>
