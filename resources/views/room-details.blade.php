@extends('layouts.public')
@section('content')
<nav class="info-room-navbar navbar fixed-top navbar-expand navbar-light justify-content-between">
  <div class="container">
    <div class="ul-left col-lg-6">
      <ul class="navbar-nav">
        <li>
          <a href="{{ url('/') }}"><img class="img-fluid logo" src="https://i2.wp.com/supportdriven.com/wp-content/uploads/2018/05/Belo.png?fit=301%2C323&ssl=1&w=640" alt="logo-bianco"></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link text-white" href="#title">Panoramica</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#services">Servizi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#maps">La posizione</a>
        </li>
      </ul>
    </div>
    <div class="ul-right col-lg-6">
      <ul class="navbar-nav float-right">
        <li class="nav-item">
          <a class="nav-link text-dark" href="#"><i class="far fa-share-square"></i> Condividi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="#"><i class="far fa-heart"></i> Salva</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid room">
  <div class="row">
    <div class="col-lg-6 col-md-6 previev">
      <img class="room-img" src="https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
    </div>
    <div class="col-lg-6 col-md-6 previev">
      <div class="col-lg-6 col-md-12 top">
        <img class="room-img" src="https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
        <img class="room-img" src="https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
      </div>
      <div class="col-lg-6 bottom">
        <img class="room-img" src="https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
        <img class="room-img" src="https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-sm-12 scrol-left">
      <div class="title" id="title">
        <h2>Titolo stanza</h2>
        <div class="user-container float-right">
          <img class="user-img" src="https://a0.muscache.com/im/pictures/user/bbb4fb56-fdd7-4ee5-8cc6-fc03ffd4d7bf.jpg?aki_policy=profile_x_medium" alt="">
          <p class="text-center">Nome user</p>
        </div>
      </div>
      <div class="info section">
        <a href="#">Città</a>
        <p>2 ospiti 1 camera da letto 1 letto 1 bagno</p>
      </div>
      <div class="other-info-container section">
        <div class="other-info">
          <strong><i class="fas fa-home"></i> Casa intera</strong>
          <p>Appartamento: sarà a tua completa disposizione.</p>
        </div>
        <div class="other-info">
          <strong><i class="fas fa-broom"></i> Pulizia perfetta</strong>
          <p>4 ospiti recenti hanno affermato che questo alloggio ha una pulizia impeccabile.</p>
        </div>
        <div class="other-info">
          <strong><i class="fas fa-map-marker-alt"></i> Ottima posizione</strong>
          <p>Il 100% degli ospiti recenti ha valutato la posizione con 5 stelle.</p>
        </div>
      </div>
      <div class="description section">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="services-container section" id="services">
        <strong>Servizi</strong>
        <div class="services">
          <div class="col-lg-6">
            <p>Wi-fi</p>
            <p>Posto macchina</p>
            <p>Piscina</p>
          </div>
          <div class="col-lg-6">
            <p>Vista mare</p>
            <p>Portineria</p>
            <p>Cucina</p>
          </div>
        </div>
      </div>
      <div class="maps" id="maps">
        <div class="maps-title">
          <h3>Il quartiere</h3>
          <p>La casa di Nome user si trova a Città, Regione, Nazione.</p>
        </div>
        <div class="maps-location">
          <img src="https://www.google.com/maps/d/thumbnail?mid=1eBOTPbXdQ5Zn4cj_n06wOPUVQHQ" alt="">
        </div>
      </div>
    </div>
    <div class="col-lg-4 fix-right">
      <div class="card card-scroll" style="width: 20rem;">
        <div class="card-body">
          <h5 class="card-title">Scrivi al proprietario</h5>
          <small>* Campi obbligatori</small>
          <form action="" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Nome*</label>
              <input type="text" class="form-control" name='name' id="name"  placeholder="Nome" required>
            </div>
            <div class="form-group">
              <label for="email">Email*</label>
              <input type="email" class="form-control" name='email' id="email" placeholder="Email" required>
            </div>
            <div class="form-group">
              <label for="subject">Oggetto*</label>
              <input type="text" class="form-control" name='subject' id="subject" placeholder="Oggetto" required>
            </div>
            <div class="form-group">
              <label for="message">Messaggio*</label>
              <textarea class="form-control" id="message" placeholder="Inserisci qui il tuo messaggio..." name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Invia</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection