<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="MAP">
    <meta name="generator" content="">
    <title>Colecciones La Nacion</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ $carpetaAssetsEstaticos.'css/bootstrap.min.css' }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="{{ $carpetaAssetsEstaticos.'css/styles.css' }}" rel="stylesheet">
  </head>
  <body>
    <div class="container-fluid">
        @include('../front/includes/header')
        @yield('content')                   
        <a class="" href="#" title="Back to top" aria-hidden="true" id="myBtnScroll">
          <i class="fa fa-chevron-up"></i>
        </a>           
        @include('../front/includes/footer')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script>
      //Get the button:
      mybutton = document.getElementById("myBtnScroll");

      var navbar = document.getElementById("navbar");

      // Get the offset position of the navbar
      var sticky = navbar.offsetTop;

      // When the user scrolls down 20px from the top of the document, show the button
      window.onscroll = function() {scrollFunction()};

      function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          mybutton.style.display = "block";
        } else {
          mybutton.style.display = "none";
        }
        if (window.pageYOffset >= sticky) {
          navbar.classList.add("sticky")
        } else {
          navbar.classList.remove("sticky");
        }        
      }

      // When the user clicks on the button, scroll to the top of the document
      function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
      }      

      scrollFunction();

      $('.dropdown-item').on('click',function(event) {
        $('#navbarSupportedContent').collapse('hide');
      });
    </script>
  </body>
</html>