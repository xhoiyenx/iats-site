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
                      <a class="log {!! is_active(['www.blog', 'www.home'], 'active') !!}" href="/">Articles</a>
                      <a class="map {!! is_active(['www.news', 'www.news.details'], 'active') !!}" href="{{ url('press-release') }}">Press Release</a>
                      <a class="{!! is_active(['www.about'], 'active') !!}" href="{{ url('about') }}">About Us</a>
                      <a class="faq {!! is_active(['www.members'], 'active') !!}" href="{{ url('member-list') }}">Member List</a>
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