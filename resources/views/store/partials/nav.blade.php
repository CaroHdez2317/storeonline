<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{ route('home') }}"><img src="https://static.wixstatic.com/media/84770f_9c23f56a09a7f06d4dbf80ed6fdcd2e4.png/v1/fill/w_59,h_57,al_c,usm_0.66_1.00_0.01/84770f_9c23f56a09a7f06d4dbf80ed6fdcd2e4.png"> Servi-Partes Hidraúlicas</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active"><a class="nav-link" href="{{ route('about') }}">Conócenos</a></li>
      @auth
      <li class="nav-item active"><a class="nav-link" href="{{ route('cart-show') }}"><i class="fa fa-shopping-cart"></i></a></li>
      <li class="nav-item active"><a class="nav-link" href="{{ route('myorders') }}"><i class="fa fa-ticket"></i> Mis pedidos</a></li> 
      @endauth 
    </ul>
    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-user"></i> {{ __('Iniciar sesión') }}</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-pencil-square-o"></i> {{ __('Registrarse') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user-circle-o "></i> {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i> {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
  </div>
</nav>