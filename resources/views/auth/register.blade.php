<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/assets/css-reset/reset.css" />
    <link rel="stylesheet" href="/assets/css/influencer_signup.css" />
    <title>Signup Influencer</title>
  </head>
  <body>
    <div class="container">
      <img alt="Digiflux" class="digiflux-logo" src="/assets/img/digiflux.png" />

      <div class="signin">
        <div class="signin__options">
          <a href="/register_brand" style="text-decoration: none"><button class="signin__options-btn">Brand</button></a>
          <button class="signin__options-btn btn-active">Influencer</button>
        </div>

        <h1 class="signin__form-title">Daftar Sebagai Influencer</h1>

        <p class="signin__form-desc">
          Daftar dan ciptakan kolaborasi terbaik antara brand dan influencer
        </p>

        <form class="signin__form" method="POST" action="{{route('register')}}">
          @csrf
          <div class="signin__form-input">
            <input type="text" placeholder="Nama" name="name" required />
            <img src="/assets/img/username.png" alt="User icon" />
          </div>

          <div class="signin__form-input">
            <input type="email" placeholder="Email" name="email" required />
            <img src="/assets/img/email.png" alt="Email icon" />
          </div>
          <input type="hidden" name="role" value="2">
          <div class="signin__form-agreement">
            <input type="checkbox" class="signin__checkbox-input" />

            <p class="signin__agreement-desc">
              Saya menyetujui semua <a href="#">syarat dan ketentuan</a>
            </p>
          </div>

          <button type="submit" class="signin__submit-btn">Kirim Verifikasi</button>
        </form>

        <p class="signin__account">
          sudah punya akun?
          <a href="/login">Masuk</a>
        </p>
      </div>
    </div>
  </body>
</html>
