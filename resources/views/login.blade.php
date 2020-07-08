<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sistem Manajemen Informasi Proyek</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="/page/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/page/css/bootstrap.min.css">
    <link rel="stylesheet" href="/page/css/jquery-ui.css">
    <link rel="stylesheet" href="/page/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/page/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/page/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="/page/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="/page/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="/page/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="/page/css/aos.css">

    <link rel="stylesheet" href="/page/css/style.css">

    <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet" />
   <link href="{{ asset('assets') }}/css/font-awesome.min.css" rel="stylesheet" /> 

   <link rel="stylesheet" href="/css/style.css">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-25"><img class="img-fluid" src="{{asset('/images/logo-micro.png')}}" alt=""></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="#home" class="nav-link">Home</a></li>
                <li><a href="#proyek" class="nav-link">Proyek</a></li>
                <li><a href="#tentang" class="nav-link">About</a></li>
             
              </ul>
            </nav>
          </div>

          <div class="ml-auto w-25">
            <!-- <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="#contact-section" class="nav-link"><span>Contact Us</span></a></li>
              </ul>
            </nav> -->
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
      
    </header>

    <div class="intro-section" id="home">
      
      <div class="slide-1" style="background-image: url('/page/images/hero.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                <hr>
                <hr>
                  <h1  data-aos="fade-up" data-aos-delay="100">Sistem Manajemen Informasi Proyek</h1>
                  <p class="mb-4"  data-aos="fade-up" data-aos-delay="200" >Sistem Manajemen Proyek merupakan sebuah aplikasi web yang menyediakan akses Informasi Proyek mengenai Pembuatan Proyek, Detail Informasi Proyek,  dan Informasi Kontaktor, yang berkaitan dengan Joint Maintenance Utility PT. Gajah Tunggal Tbk.</p>
                  <p data-aos="fade-up" data-aos-delay="300" id="login" ><a href="#login" class="btn btn-primary py-3 px-5 btn-pill">Masuk Untuk Lanjutkan -></a></p>

                </div>
                
                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500" >
                  <form action="{{ route('login') }}" method="post" class="form-box">
                    @csrf
                    <h3 class="h4 text-black mb-4">Login</h3>


                    <div class="form-group">
                      <select class="form-control custom-select @error('departemen') is-invalid @enderror" name="departemen" id="exampleFormControlSelect1" required>
                        @foreach($user as $u)
                        <option value="{{ $u->departemen }}">{{ $u->departemen }}</option>
                        @endforeach
                      </select>
                      @error('departemen')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                    </div>

                    <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukan Password">
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                      @enderror
                    </div>
                   
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-pill" value="Masuk">
                    </div>
                  </form>

                </div>
                
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    
    <div class="site-section courses-title" style="background-color: darkslateblue;" id="proyek">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Proyek</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section courses-entry-wrap"  data-aos="fade-up" data-aos-delay="100">
      <div class="container">
        <div class="row">
        
          <div class="owl-carousel col-12 nonloop-block-14">  
          @foreach ($proyek as $p)
            <div class="course bg-white h-90 align-self-stretch pt-1" >
      
            <div class="card-body   mt-2" >
            <div class="progress mx-auto" data-value='{{ $p->persentase }}'>
                <span class="progress-left">
                                <span class="progress-bar border-warning"></span>
                </span>
                <span class="progress-right">
                                <span class="progress-bar border-warning"></span>
                </span>
                <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                    <div class="h2 font-weight-bold ">{{ $p->persentase }}<sup class="small">%</sup></div>
                </div>
                </div>
                </div>
                <div class="">
              <div class="course-inner-text py-3 px-4">
                <span class="course-price"><span class="icon-clock-o"></span></span>
                <div class="meta"><span class="icon-wrench"></span><b class="">{{ $p->status }}</b></div>
                <h3 class="card-title text-center mt-3">{{$p->project_no}}</h3>
                <h3><a href="#">{{$p->project_title}}</a></h3>
                <p>{{ $p->deskripsi }}</p>
              </div>
              <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-map-marker"></span> {{ $p->plant }}</div>
               
              </div>
              </div>
            </div>
            @endforeach
            
          </div>
        </div>
  
        <div class="row justify-content-center">
          <div class="col-7 text-center">
            <button class="customPrevBtn btn btn-primary m-1">Prev</button>
            <button class="customNextBtn btn btn-primary m-1">Next</button>
          </div>
        </div>
      </div>
    </div>



    
    <div class="site-section" id="tentang">
    <footer class="footer-section bg-black">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3 style="color: aliceblue">Tentang Joint Maintenance Utility</h3>
            <p>Sistem Manajemen Proyek merupakan sebuah aplikasi web yang menyediakan akses Informasi Proyek dan Data Perkembangan Proyek di departement Joint Maintenance Utility PT. Gajah Tunggal Tbk.</p>
          </div>

          <div class="col-md-3 ml-auto">
            <h3>Links</h3>
            <ul class="list-unstyled footer-links">
              <li><a href="#home">Home</a></li>
              <li><a href="#proyek">Proyek</a></li>
              <li></li>
              <li><a target="_blank" href="https://utility-idc.firebaseapp.com/">U-IDC</a></li>

            </ul>
          </div>

          <div class="col-md-4">
            <h3>Subscribe</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt incidunt iure iusto architecto? Numquam, natus?</p>
            <form action="#" class="footer-subscribe">
              <div class="d-flex mb-5">
                <input type="text" class="form-control rounded-0" placeholder="Email">
                <input type="submit" class="btn btn-primary rounded-0" value="Subscribe">
              </div>
            </form>
          </div>

        </div>

        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
            </div>
          </div>
          
        </div>
      </div>
    </footer>
    </div>

  
    
  </div> <!-- .site-wrap -->
  <script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script>
  <script src="/page/js/jquery-3.3.1.min.js"></script>
  <script src="/page/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="/page/js/jquery-ui.js"></script>
  <script src="/page/js/popper.min.js"></script>
  <script src="/page/js/bootstrap.min.js"></script>
  <script src="/page/js/owl.carousel.min.js"></script>
  <script src="/page/js/jquery.stellar.min.js"></script>
  <script src="/page/js/jquery.countdown.min.js"></script>
  <script src="/page/js/bootstrap-datepicker.min.js"></script>
  <script src="/page/js/jquery.easing.1.3.js"></script>
  <script src="/page/js/aos.js"></script>
  <script src="/page/js/jquery.fancybox.min.js"></script>
  <script src="/page/js/jquery.sticky.js"></script>
  <script src="/page/js/main.js"></script>
  <script class="">
    $(function() {

        $(".progress").each(function() {

            var value = $(this).attr('data-value');
            var left = $(this).find('.progress-left .progress-bar');
            var right = $(this).find('.progress-right .progress-bar');

            if (value > 0) {
                if (value <= 50) {
                right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
                } else {
                right.css('transform', 'rotate(180deg)')
                left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
                }
            }

        })

        function percentageToDegrees(percentage) {

        return percentage / 100 * 360

        }

    });
</script>
  </body>
</html>