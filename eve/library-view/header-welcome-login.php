<!doctype html>
<html lang="en">
            <!-- HEAD -->
              <head>
                <!-- LOGO -->
                <link rel="icon" href="..\img\eve_logo.png">
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <!-- BOOTSTRAP -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
                <!-- FONTAWESOME -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <!-- PT SANS CDN -->
                <script src="https://kit.fontawesome.com/e1bff3e01e.js" crossorigin="anonymous"></script>
                <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
                <link rel="stylesheet" type="text/css" href="../css/welcome-login.css">

                <script
                  src="https://code.jquery.com/jquery-3.5.0.js"
                  integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
                  crossorigin="anonymous"></script>

                  <title>EVE</title>

                  <script>
                  jQuery(function ($) {

                    $(".sidebar-dropdown > a").click(function() {
                  $(".sidebar-submenu").slideUp(200);
                  if (
                    $(this)
                      .parent()
                      .hasClass("active")
                  ) {
                    $(".sidebar-dropdown").removeClass("active");
                    $(this)
                      .parent()
                      .removeClass("active");
                  } else {
                    $(".sidebar-dropdown").removeClass("active");
                    $(this)
                      .next(".sidebar-submenu")
                      .slideDown(200);
                    $(this)
                      .parent()
                      .addClass("active");
                  }
                  });

                  $("#close-sidebar").click(function() {
                  $(".page-wrapper").removeClass("toggled");
                  });
                  $("#show-sidebar").click(function() {
                  $(".page-wrapper").addClass("toggled");
                  });

                  });
                  $(document).ready(function(){
                      $("p").hide();

                      $("p").show();
                  });

                  //MY JQUERY CODE IS UNFEFINED *needs fixing @pol
                  //   $(document).ready(function(){
                  //   $("#visit").hide();
                  //   $("#confirm-code-user").hide();
                  //
                  //
                  //
                  //   /////////////////////
                  // $("#homelink").click(function(){
                  //
                  //   if ($('#home').is(':visible')) {
                  //
                  //   } else {
                  //     $("#home").fadeToggle();
                  //
                  //   }
                  //
                  //
                  //
                  //   });
                  //
                  // //////////////////////
                  // $("#visitlink").click(function(){
                  //
                  //
                  //     if ($('#visit').is(':visible')) {
                  //       } else {
                  //         $("#home").fadeToggle();
                  //         $("#visit").fadeToggle();
                  //       }
                  //
                  //   });
                  //
                  //
                  // ///////////////////////
                  // $("#visit-form").submit(function( event ) {
                  //   $("#visit").fadeToggle();
                  //   $("#confirm-code-user").fadeToggle();
                  //   e.preventDefault();
                  //     });
                  //
                  //
                  // $("#edit").click(function(){
                  //   $("#visit").fadeToggle();
                  //   $("#confirm-code-user").fadeToggle();
                  //
                  //   });
                  //
                  //
                  // $("#confirm-code").click(function(){
                  //   $("#home").fadeToggle();
                  //   $("#confirm-code-user").fadeToggle();
                  //
                  //   });
                  // });

                  </script>

              </head>


  <!-- BODY -->
  <body>
