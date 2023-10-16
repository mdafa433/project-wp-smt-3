

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-12 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                <div class="bg-gradient-dark">
        <!-- Nested Row within Card Body -->
        <div class="row">
        <div class="col-lg-5 d-none d-lg-block">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://c4.wallpaperflare.com/wallpaper/153/860/948/movie-poster-star-wars-star-wars-the-rise-of-skywalker-2019-year-movies-hd-wallpaper-preview.jpg" class="d-block w-100" alt="gambar">
    </div>
    <div class="carousel-item">
      <img src="https://c4.wallpaperflare.com/wallpaper/361/823/829/avengers-endgame-iron-man-robert-downey-jr-captain-america-chris-evans-hd-wallpaper-preview.jpg" class="d-block w-100" alt="gambar">
    </div>
    <div class="carousel-item">
      <img src="https://c4.wallpaperflare.com/wallpaper/846/216/1006/godzilla-movies-movie-poster-godzilla-king-of-the-monsters-wallpaper-preview.jpg" class="d-block w-100" alt="gambar">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only"></span>
  </a></div></div>
                    <div class="col-lg-7">
                    <div class="p-5">
                    <div class="text-center">
                                <h1 class="h4 text-gray-100 mb-4">Create Your Account</h1>
                            </div>
                            <form class="user" method="post" action="<?=base_url('auth/registration')?>">
                                
                                           <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="name" name="name"placeholder="Full nama lu wir" value="<?=set_value('name')?>"> 
                                                <?= form_error('name','<small class="text-danger pl-3">','</small>') ?>
                                        </div>
                                           <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="Email" name="email"placeholder="Enter email wir" value="<?=set_value('email')?>">
                                                <?= form_error('email','<small class="text-danger pl-3">','</small>') ?>
                                        </div>
                                        
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="password1" name="password1" placeholder="Password">
                                            <?= form_error('password1','<small class="text-danger pl-3">','</small>') ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="password2" name="password2" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?=base_url('auth'); ?>">Already have an account? Login!</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

   