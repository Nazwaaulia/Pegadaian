<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Creative - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon.ico')}}" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        @include('sweetalert::alert')
        <section class="vh-100 gradient-custom">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">

                <div class="mb-md-5 mt-md-4 pb-5">

                  <h2 class="fw-bold mb-2 text-uppercase">Login Page</h2>
                  <p class="text-white-50 mb-5">Please enter your login and password!</p>
                  @if ($errors->any())
                    <ul style="width: 100%; background: red; padding:10px ">
                       @foreach ($errors->all() as $error)
                          <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif

                {{-- munculin pemberitahuan gagal login --}}
                @if (Session::get('gagal'))
                    <div style="width: 100%; background:red; padding:10px; margin-bottom:20px">
                        {{Session::get('gagal')}}
                    </div>
                @endif
                <form action="{{route('auth')}}" method="POST">
                  @csrf
                  <div class="form-outline form-white mb-4">
                      <label class="form-label" for="typeEmailX" id="email">Email :</label>
                    <input type="email" id="typeEmailX" class="form-control form-control-lg" name="email">
                  </div>

                  <div class="form-outline form-white mb-4">
                      <label class="form-label" for="typePasswordX" id="password">Password :</label>
                    <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password">
                  </div>
                  <button class="btn btn-outline-light btn-lg px-5 mb-3" type="submit">Login</button><br>
                  <a href="/" class="back-btn">Batal</a>

                  {{-- <div class="d-flex justify-content-center text-center mt-4 pt-1">
                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                  </div> --}}

                </div>

                <div>
                  <p class="mb-0">Don't have an account? <a href="#" class="text-white-50 fw-bold">Sign Up</a>
                  </p>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    </body>
</html>
