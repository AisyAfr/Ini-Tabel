<header>
  <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-black text-decoration-none">
      <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
    </a>

    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 mt-3">
      <li><a href="{{url('/')}}" class="nav-link px-2 text-secondary">Home</a></li>
    </ul>


    <div class="text-end mt-3 mx-3">
      @if(!Auth::check())
      <a href="{{url("login")}}" type="button" class="btn btn-primary">Login</a>
      <a href="{{url('register')}}" type="button" class="btn btn-warning ">Register</a>
      @else
      <div class="dropdown">
          
        <a class="btn btn-yellow dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{Auth::user()->name}}
        </a>
      
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{url('logout')}}">Log Out</a></li>
        </ul>
      </div>
      
      </div>

      @endif
    </div>
  </div>
  </header>