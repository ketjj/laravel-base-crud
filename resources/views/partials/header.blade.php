
<header> 
  <div class="k_container k_nav">
    <div class="logo"><a href="{{ route('home')}}">Logo</a></div>
        <nav >
          <ul class="nav_list">

            <li><a class="{{ Route::currentRouteName() === 'home' ? 'active' : ''}}" href="{{ route('home')}}">Home</a></li>

            <li><a class="{{ Route::currentRouteName() === 'comics' ? 'active' : ''}}" href="{{ route('comics.index')}}">Comics</a></li>

          </ul>
        </nav>
      
    </div>
  
</header>

