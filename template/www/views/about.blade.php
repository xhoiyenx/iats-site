<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="hoiyen.2000@gmail.com">
    @stack('head')
    <title>
      @hasSection ('title')
        @yield('title') - IATS
      @else
        IATS
      @endif
    </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
    {{ Html::style( $assets . '/css/fonts.css') }}
    {{ Html::style( $assets . '/css/font-awesome.min.css') }}
    {{ Html::style( $assets . '/css/bootstrap.min.css') }}
    {{ Html::style( $assets . '/css/stylesheet.css') }}
    {{ Html::style( $assets . '/css/responsive.css') }}
  </head>
  <body>
    <div class="wrap">
      <div class="body">

        <!--# mobile menu #-->
        <div class="mobile-menu">
          <ul>
            <li>
              <a href="/"><span>Articles</span></a>
            </li>
            <li>
              <a href="{{ url('press-release') }}"><span>Press Release</span></a>
            </li>
            <li>
              <a href="{{ url('about') }}">About Us</a>
            </li>
            <li>
              <a class="faq" href="{{ url('member-list') }}"><span>Member List</span></a>
            </li>
          </ul>
        </div>
        <!--# mobile menu #-->

        <!--# main screen #-->
        <div class="main">
          <div id="iats">

            <header>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6">
                    <div class="logo">
                      <span class="helper"></span><a href="{{ url('/') }}"><img src="{{ $assets }}/images/logo.png"></a>
                    </div>
                    <a class="toggle-nav hidden-lg" href="#"><i class="fa fa-fw fa-bars" style="color: #FFF; font-size: 23px"></i></a>
                  </div>
                  <div class="col-md-6">
                    <div class="header-links">
                      <a class="log" href="/">Articles</a>
                      <a class="map" href="{{ url('press-release') }}">Press Release</a>
                      <a class="active" href="{{ url('about') }}">About Us</a>
                      <a class="faq" href="{{ url('member-list') }}">Member List</a>
                    </div>
                  </div>
                </div>
              </div>
            </header>
            
            <!--# content #-->
            <div class="content" style="background: url('about-bg.jpg') no-repeat; background-size: 100% 100%; background-attachment: fixed; min-height: 500px">

              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <div class="entry-content" style="text-align: center;">
                      <h3>VISI</h3>
                      <p>Menjadi Asosiasi Trimmer yang diakui oleh dunia International dan mengharumkan nama Indonesia melalui karya anak bangsa terbaik.</p>

                      <h3>MISI</h3>
                      <p>Mendongkrak dan memberikan iklim yang kondusif bagi industri Otomotif Indonesia khususnya Interior. Mengedukasi dan memberi pengetahuan serta skill kepada para Trimmer dalam bentuk Standarisasi Nasional, untuk dapat berkompetisi di taraf Nasional & International serta memberikan pelayanan terbaik kepada para konsumen baik di dalam maupun luar negeri.</p>

                      <h3>TENTANG IATS</h3>
                      Indonesia Authorized Trimmer Summit (IATS®) merupakan asosiasi pengrajin interior mobil (Trimmer) pertama & terbesar di Indonesia yang diakui secara Sah dan berbadan Hukum melalui
                      <br>
                      KEPUTUSAN MENTERI HUKUM DAN HAK ASASI MANUSIA REPUBLIK INDONESIA NOMOR AHU-0003005.AH.01.07.TAHUN 2017
                      <br><br>
IATS didirikan oleh Oscar Widjaja yang merangkap sebagai Ketua Umum IATS dan telah menunjuk 6 orang Dewan Pengurus Pusat yang terdiri dari Profesional & Trimmer Senior terbaik di Indonesia
<br><br>
Kekuasaan tertinggi berada di keputusan Rapat Anggota & Rapat Kerja Nasional (Summit 2017) yang dipimpin oleh Jajaran Dewan Pengurus Pusat IATS® dan diikuti oleh seluruh member IATS® yang merupakan Trimmer terbaik di Indonesia
<br><br>
Sesuai dengan hasil keputusan Dewan Pengurus Pusat pada Summit 2017, maka seluruh member IATS® sepakat untuk melakukan Standarisasi Nasional (SNIATS) dalam hal kualitas pengerjaan dan penggunaan bahan baku pendukung
<br><br>
Seluruh member IATS® wajib memberikan Garansi Nasional untuk pengerjaan selama 1 (satu) Tahun
<br><br>
Member resmi IATS® adalah yang mengindahkan, menjunjung tinggi dan melaksanakan seluruh AD/ART IATS® dan keputusan Summit 2017 dan diakui oleh Dewan Pengurus Pusat yang ditandai dengan adanya Kartu Tanda Anggota IATS® serta tercantum dalam website resmi <a href="/member-list">www.indonesiatrimmer.com/member-list</a>
<br><br>
Segala bentuk kerjasama dengan pihak external, dalam bentuk benefit, dukungan, dll harus malalui pengetahuan dan persetujuan Dewan Pengurus Pusat dan melalui prosedur resmi IATS®
<br><br>
Untuk menjadi member ataupun ingin melakukan kerjasama dengan IATS® silahkan hubungi Hotline IATS® di 021-30055169.
<br><br>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!--# content #-->

          </div>
        </div>
        <!--# end main screen #-->

        <!--# footer #-->
        <footer>
        </footer>
        <!--# footer #-->

      </div>
    </div>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    {{ Html::script( $assets . '/js/jquery-2.2.4.min.js') }}
    {{ Html::script( $assets . '/js/bootstrap.min.js') }}
    {{ Html::script( $assets . '/js/application.js') }}
  </body>
</html>