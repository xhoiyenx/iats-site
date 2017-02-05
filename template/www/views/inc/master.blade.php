<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="hoiyen.2000@gmail.com">

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
              <a href="#"><span>home</span></a>
            </li>
            <li class="have-submenu">
              <a href="#"><span>company</span></a>
              <ul>
                <li>
                  <a href="#">about us</a>
                </li>
                <li>
                  <a href="#">our factory</a>
                </li>
                <li>
                  <a href="#">awards & certification</a>
                </li>
              </ul>
            </li>
            <!--# submenu-level1 #-->
            <li class="have-submenu">
              <a href="#"><span>our products</span></a>
              <ul>
                <!--# submenu-level2 #-->
                <li class="have-subsubmenu">
                  <a href="#">wellness</a>
                  <ul>
                    <li>
                      <a href="#">beverages</a>
                    </li>
                    <li>
                      <a href="#">royal jelly</a>
                    </li>
                    <li>
                      <a href="#">narish</a>
                    </li>
                    <li>
                      <a href="#">choles balance</a>
                    </li>
                    <li>
                      <a href="#">rhuma ease</a>
                    </li>
                  </ul>
                </li>
                <!--# submenu-level2 #-->
                <li>
                  <a href="#">beauty and health</a>
                </li>
                <li>
                  <a href="#">brain and eye health</a>
                </li>
                <li>
                  <a href="#">gastrointestinal health</a>
                </li>
                <li>
                  <a href="#">healthcare for the young</a>
                </li>
              </ul>
            </li>
            <!--# submenu-level1 #-->
            <li>
              <a href="#"><span>news</span></a>
            </li>
            <li>
              <a href="#"><span>brochures</span></a>
            </li>
            <li>
              <a href="#"><span>partner program</span></a>
            </li>
            <li>
              <a href="#"><span>contact us</span></a>
            </li>
            <li>
              <a href="#"><span>login</span></a>
            </li>
            <li>
              <a href="#"><span>sitemap</span></a>
            </li>
            <li>
              <a href="#"><span>faqs</span></a>
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
                  </div>
                  <div class="col-md-6">
                    <div class="header-links">
                      <a class="log" href="#">About</a>
                      <a class="map" href="#">News</a>
                      <a class="faq" href="#">Member List</a>
                    </div>
                  </div>
                </div>
              </div>
            </header>
            
            <!--# content #-->
            <div class="content">

              <div class="container">
                <div class="row">
                  <div class="col-md-12">

                    @yield('content')

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