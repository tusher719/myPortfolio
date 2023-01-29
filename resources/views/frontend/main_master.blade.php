<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('frontend') }}/images/logo/logo.jpg" />
    <!-- Meta Description -->
    <meta name="description" content="" />
    <!-- Meta Keyword -->
    <meta name="keywords" content="" />
    <!-- meta character set -->
    <meta charset="UTF-8" />
    <!-- Adcash -->
    <meta name="a.validate.01" content="fdd1f4739abae7cec14b3d230561868b0df2" />
    <!-- Site Title -->
    <title>@yield('title') | Tusher</title>

    <!-- ============================ CSS ============================ -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/linearicons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/jquery.funnyText.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/animate_headline.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/magnific-popup.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/nice-select.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.carousel.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/main.css" />

    <!-- style switcher - for demo purposes only -->
    <link rel="stylesheet" type="text/css" class="alternate-style" title="color-1"
          href="{{ asset('frontend') }}/css/skins/color-1.css" />
    <link rel="stylesheet" type="text/css" class="alternate-style" title="color-2" href="{{ asset('frontend') }}/css/skins/color-2.css"
          disabled />
    <link rel="stylesheet" type="text/css" class="alternate-style" title="color-3" href="{{ asset('frontend') }}/css/skins/color-3.css"
          disabled />
    <link rel="stylesheet" type="text/css" class="alternate-style" title="color-4" href="{{ asset('frontend') }}/css/skins/color-4.css"
          disabled />
    <link rel="stylesheet" type="text/css" class="alternate-style" title="color-5" href="{{ asset('frontend') }}/css/skins/color-5.css"
          disabled />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style-switcher.css" />

    <!-- CSS Toastr Cdn -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
</head>

<body onload="myFunction()">




@yield('content')



<!-- ==========|| style switcher start - for demo purpses only ||========== -->
<div class="style-switcher outer-shadow">
    <div class="style-switcher-toggler s-icon">
        <i class="fas fa-cog fa-spin"></i>
    </div>
    <div class="day-night s-icon s-icon2">
        <i class="fas"></i>
    </div>

    <h4>theme colors</h4>
    <div class="colors">
        <span class="color-1" onclick="setActiveStyle('color-1')"></span>
        <span class="color-2" onclick="setActiveStyle('color-2')"></span>
        <span class="color-3" onclick="setActiveStyle('color-3')"></span>
        <span class="color-4" onclick="setActiveStyle('color-4')"></span>
        <span class="color-5" onclick="setActiveStyle('color-5')"></span>
    </div>
</div>
<!-- ==========|| style switcher end ||========== -->

<!-- ==========|| Start Scroll to Top Area ||========== -->
<div id="back-top">
    <a title="Back to Top" href="#">
        <i class="lnr lnr-arrow-up"></i>
    </a>
</div>
<!-- ==========|| End Scroll to Top Area ||========== -->

<script src="{{ asset('frontend') }}/js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="{{ asset('frontend') }}/js/vendor/bootstrap.min.js"></script>
<script src="{{ asset('frontend') }}/js/animate_headline.js"></script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="{{ asset('frontend') }}/js/easing.min.js"></script>
<script src="{{ asset('frontend') }}/js/hoverIntent.js"></script>
<script src="{{ asset('frontend') }}/js/superfish.min.js"></script>
<script src="{{ asset('frontend') }}/js/mn-accordion.js"></script>
<script src="{{ asset('frontend') }}/js/jquery.ajaxchimp.min.js"></script>
<script src="{{ asset('frontend') }}/js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('frontend') }}/js/owl.carousel.min.js"></script>
<script src="{{ asset('frontend') }}/js/jquery.nice-select.min.js"></script>
<script src="{{ asset('frontend') }}/js/isotope.pkgd.min.js"></script>
<script src="{{ asset('frontend') }}/js/jquery.circlechart.js"></script>
<script src="{{ asset('frontend') }}/js/mail-script.js"></script>
<script src="{{ asset('frontend') }}/js/wow.min.js"></script>
<script src="{{ asset('frontend') }}/js/jquery.funnyText.min.js"></script>
<!-- counter up cdn -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
<!-- Main JavaScript -->
<script src="{{ asset('frontend') }}/js/main.js"></script>
<script src="{{ asset('frontend') }}/js/app.js"></script>
<!-- style switcher js -->
<script src="{{ asset('frontend') }}/js/style-switcher.js"></script>

<script>
    $(document).ready(function () {
        $(".animatee").funnyText({
            speed: 200,
            borderColor: "false",
            activeColor: "false",
            color: "false",
            fontSize: "false",
            direction: "false",
        });
    });
    // Loading Animation
    var preloader = document.getElementById("loading");
    function myFunction() {
        preloader.style.display = "none";
    }
    // $('.count').counterUp();
    $(".count").counterUp({
        delay: 10,
        time: 1000,
    });
</script>

<!-- JS Toastr -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
        @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;
        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;
        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;
        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
</script>
<!--Js Toastr End-->
</body>

</html>








