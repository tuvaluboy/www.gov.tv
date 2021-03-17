<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v5.0.16, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.0.16, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="{{asset('assets/images/codeofarms-tranparent-180x200.jpg')}}" type="image/x-icon">
  <meta name="description" content="">


  <title>{{$titlename}}</title>
  <link rel="stylesheet" href="{{url('assets/web/assets/mobirise-icons2/mobirise2.css')}}">
  <link rel="stylesheet" href="{{url('assets/web/assets/mobirise-icons/mobirise-icons.css')}}">
  <link rel="stylesheet" href="{{url('assets/web/assets/mobirise-icons-bold/mobirise-icons-bold.css')}}">
  <link rel="stylesheet" href="{{url('assets/tether/tether.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap-grid.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap-reboot.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/facebook-plugin/style.css')}}">
  <link rel="stylesheet" href="{{url('assets/dropdown/css/style.css')}}">
  <link rel="stylesheet" href="{{url('assets/socicon/css/styles.css')}}">
  <link rel="stylesheet" href="{{url('assets/theme/css/style.css')}}">
  <script src="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"></script>
  <link rel="preload" as="style" href="{{url('assets/mobirise/css/mbr-additional.css')}}"><link rel="stylesheet" href="{{url('assets/mobirise/css/mbr-additional.css')}}" type="text/css">
  <link rel="stylesheet" href="{{url('assets/datatables/data-tables.bootstrap4.min.css')}}">




</head>
<body>
<!-- Menu -->
  @include('partials.frontmenu')

<!-- Content  -->
@yield('content')

<!-- Content End -->







<!-- Footer Section -->
@include('partials.footer')

  <script src="{{url('assets/web/assets/jquery/jquery.min.js')}}"></script>

  <script src="{{url('assets/popper/popper.min.js')}}"></script>
  <script src="{{url('assets/tether/tether.min.js')}}"></script>
  <script src="{{url('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"> </script>
  <!-- <script src="{{asset('assets/datatables/jquery.data-tables.min.js')}}"></script> -->
  <!-- <script src="{{asset('assets/datatables/data-tables.bootstrap4.min.js')}}"></script> -->
  <!-- <script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5"></script> -->
  <!-- <script src="https://apis.google.com/js/plusone.js')}}"></script> -->
  <!-- <script src="{{asset('assets/facebook-plugin/facebook-script.js')}}"></script> -->
  <script src="{{url('assets/smoothscroll/smooth-scroll.js')}}"></script>
  <script src="{{url('assets/dropdown/js/nav-dropdown.js')}}"></script>
  <script src="{{url('assets/dropdown/js/navbar-dropdown.js')}}"></script>
  <script src="{{url('assets/touchswipe/jquery.touch-swipe.min.js')}}"></script>
  <!-- <script src="{{asset('assets/ytplayer/jquery.mb.ytplayer.min.js')}}"></script> -->
  <!-- <script src="{{asset('assets/vimeoplayer/jquery.mb.vimeo_player.js')}}"></script> -->
  <!-- <script src="{{asset('assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js')}}"></script> -->
  <!-- <script src="{{asset('assets/mbr-popup-btns/mbr-popup-btns.js')}}"></script> -->
  <!-- <script src="{{asset('assets/parallax/jarallax.min.js')}}"></script> -->
  <!-- <script src="{{asset('assets/playervimeo/vimeo_player.js')}}"></script> -->
  <!-- <script src="{{asset('assets/theme/js/script.js')}}"></script> -->
  <script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5"></script>
  <script src="https://apis.google.com/js/plusone.js"></script>
  <script src="{{url('assets/facebook-plugin/facebook-script.js')}}"></script>
  <script src="{{url('assets/parallax/jarallax.min.js')}}"></script>
  <script src="{{url('assets/slidervideo/script.js')}}"></script>
  <script src="{{url('assets/theme/js/script.js')}}"></script>
  <script>
$(document).ready( function () {
    $('#announcement').DataTable({
      "order" :[[1,"desc"]]
    });
    $('#news').DataTable({
      "order" :[[1,"desc"]]
    });
    $('#budget').DataTable({
      "order" :[[1,"desc"]]
    });
    $('#vacancies').DataTable({
      "order" :[[1,"desc"]]
    });

} );
</script>

  @yield('scripts')
</body>
</html>
