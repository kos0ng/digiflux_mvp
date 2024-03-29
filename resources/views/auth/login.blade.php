<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css-reset/reset.css" />
    <link rel="stylesheet" href="assets/css/login_style.css" />
    <title>Login Influencer</title>
  </head>
  <body>
    <div class="container">
      <img alt="Digiflux" class="digiflux-logo" src="assets/img/digiflux.png" />

      <div class="login">
        <div class="login__options">
          <a href="/login_brand" style="text-decoration: none"><button class="login__options-btn">Brand</button></a>
          <button class="login__options-btn btn-active">Influencer</button>
        </div>

        <h1 class="login__title">Masuk Sebagai Influencer</h1>

        <p class="login__desc">
          Ciptakan kolaborasi terbaik antara Brand dan Influencer!
        </p>

        <form class="login__form" method="POST" action="{{ route('login') }}">
          @csrf
          <div class="login__form-input">
            <input type="text" placeholder="Email" name="email" />
            <img src="assets/img/email.png" alt="Email icon" />
          </div>

          <div class="login__form-input">
            <input type="password" placeholder="Password" name="password" />
            <img src="assets/img/password.png" alt="Password icon" />
            <a href="#" class="forget-password">Lupa?</a>
          </div>

          <button type="submit" class="login__submit-btn">Masuk</button>
        </form>

        <p class="login__account">
          belum punya akun?
          <a href="/register">Daftar</a>
        </p>
      </div>
    </div>
  </body>
</html>
