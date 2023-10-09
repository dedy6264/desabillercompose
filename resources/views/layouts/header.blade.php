<nav class="navbar bg-light navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route("home")}}">
              <img src="https://drive.google.com/uc?export=view&id=1TV5XS_Yr7WCfHiekKJ0tU38RL9qz3Iqn" alt="Bootstrap" width="100%" height="50"> 
            </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="mb-2 navbar-nav me-auto mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route("posting")}}">Iklan Gratis</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Registrasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route("in")}}">Login</a>
            </li>
            {{-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li> --}}
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
    </div>
</nav>