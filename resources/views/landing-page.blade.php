<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Penggadaian Apps</title>
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
    <body id="page-top">
        @include('sweetalert::alert')
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">PawnShop</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#service">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Daftar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead" style="background-color: 1C315E;">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Quick & Easy Process with best pawnshop</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">Start Bootstrap can help you build better websites using the Bootstrap framework! Just download a theme and start customizing, no strings attached!</p>

                        @if (auth()->check())
                            @if (auth()->user()->role == 'admin')
                                <a class="btn btn-primary btn-xl" href="/admin">Dashboard</a>
                            @else
                                <a class="btn btn-primary btn-xl" href="/petugas">Dashboard</a>
                            @endif
                        @else
                            <a class="btn btn-primary btn-xl" href="{{route('login')}}">Login</a>
                        @endif
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <img src="{{asset('assets/img/penggadaian.jpeg')}}" alt="">
                        <h2 class="text-white mt-0">Our Vision</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, suscipit dicta, veniam, eum autem nemo molestiae dolorem magnam recusandae placeat error minima fugiat itaque iusto!</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="page-section" id="services">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <h3 class="h4 mb-2">500+</h3>
                            <p class="text-muted mb-0">Visitors</p>
                            <hr class="divider" />
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <h3 class="h4 mb-2">95%</h3>
                            <p class="text-muted mb-0">Liked</p>
                            <hr class="divider" />
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <h3 class="h4 mb-2">440+</h3>
                            <p class="text-muted mb-0">Propose</p>
                            <hr class="divider" />
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <h3 class="h4 mb-2">350+</h3>
                            <p class="text-muted mb-0">Reviews</p>
                            <hr class="divider" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Star Pawning Your Stuff</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste ipsa dolorem perspiciatis magnam, corrupti consectetur excepturi harum, quidem commodi explicabo voluptatum animi labore ea quo.</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        @if ($errors->any())
                <ul style="width: 100%; background: red; padding:10px">
                @endif
                   @foreach ($errors->all() as $error)
                      <li>{{$error}}</li>
                    @endforeach
                </ul>
                        @if(Session::get('sucessAdd'))
                        @endif
                    <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <!--NIK input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="Nik" type="number" name="nik" id=" "placeholder="Enter your Nik..." data-sb-validations="required" />
                                <label for="Nik">Nik</label>
                                <div class="invalid-feedback" data-sb-feedback="nik:required">A nik is required.
                                </div>
                            </div>
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" name="name" id=" "placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Full name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!--umur input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="ge" type="text" name="age" id=" "placeholder="Enter your ge..." data-sb-validations="required" />
                                <label for="Age">Age</label>
                                <div class="invalid-feedback" data-sb-feedback="age:required">A Age is required.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" name="email" id=" " placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="number" name="phone" id=" "placeholder="(123) 456-7890" data-sb-validations="required" />
                                <label for="phone">Phone number</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.
                            </div>
                            <!-- Item input-->
                            <div class="form-floating mb-3" style="margin-top: 15px">
                                <input class="form-control" id="item" type="text" name="item" placeholder="Enter your item..." data-sb-validations="required" />
                                <label for="name">Put your Item</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- chooces file-->
                            <div class style="form-floating mb-3">
                            <div class="form-control" style="margin-bottom:15px;">
                                <label for="">Upload Gambar Terkait :</label>
                                <input type="file" name="foto">
                            </div>
                            <!--submit input-->
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit" formmethod="post" formaction="{{route('store')}}" formenctype="multipart/form-data">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-4 text-center mb-5 mb-lg-0">
                        <i class="bi-phone fs-2 mb-3 text-muted"></i>
                        <div>+1 (555) 123-4567</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2023 - Nazwa Aulia</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
