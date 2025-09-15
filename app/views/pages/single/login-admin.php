<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?=BASEURL?>/assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="<?=BASEURL?>/assets/img/slack-logo-icon.png" />
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?=BASEURL?>/assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files from black dashboard -->
  <link href="<?=BASEURL?>/assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
   <!-- Sweet Alert -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">

  <!-- style css -->
  <link rel="stylesheet" href="<?=BASEURL?>/css/style.css" />
  <link rel="stylesheet" href="loginAdmin.css">
  <!-- bootstrap css -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
  <title>Rezerva | Admin | <?= $data['title'] ?></title>
</head>
<body class="">
  <div class="main-container">
    <div class="judul-container text-center py-4">
      <h1>REZERVA</h1>
    </div>
    <div class="form-login md-5">
      <div class="container login">
        <div class="row align-items-center">
          <div class="col-7 text-center left-image align-self-center">
            <img src="<?=BASEURL?>/img/rezerva.png" alt="" >
          </div>
          <div class="col-5 align-self-center">
            <div class="login-wrap p-4 p-md-5">
              <div class="d-flex">
                <div class="w-100">
                  <h3 class="mb-4">Login</h3>
                </div>
                <div class="w-100">
                  <p class="social-media d-flex justify-content-end">
                    <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                  </p>
                </div>
              </div>
              <form action="<?=BASEURL?>/admin/login/login" method="POST" class="signin-form">
                <div class="form-group mb-3">
                  <label class="label" for="email">Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Email" required value="<?=$data['email'] ?? ''?>">
                </div>
                <div class="form-group mb-3">
                  <label class="label" for="password">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password" required />
                </div>
                <div class="form-group text-center">
                  <button class="btn btn-info" type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
                  <div class="text-center mt-3">
                    <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                      <input type="checkbox" checked />
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="text-center mt-3">
                    <a href="#">Forgot Password</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="<?=BASEURL?>/assets/js/core/jquery.min.js"></script>
  <script src="<?=BASEURL?>/assets/js/core/popper.min.js"></script>
  <script src="<?=BASEURL?>/assets/js/core/bootstrap.min.js"></script>
  <script src="<?=BASEURL?>/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="<?=BASEURL?>/assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?=BASEURL?>/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=BASEURL?>/assets/js/black-dashboard.min.js?v=1.0.0"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?=BASEURL?>/assets/demo/demo.js"></script>

  <!-- Sweet Alert -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

  <?php 
  if(isset($_SESSION['alert'])){
    success_and_error($_SESSION['alert']['message'], $_SESSION['alert']['type']);
    unset($_SESSION['alert']);
  } 
  ?>

  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $(".sidebar");
        $navbar = $(".navbar");
        $main_panel = $(".main-panel");

        $full_page = $(".full-page");

        $sidebar_responsive = $("body > .navbar-collapse");
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $(
          ".sidebar .sidebar-wrapper .nav li.active a p"
        ).html();

        $(".fixed-plugin a").click(function(event) {
          if ($(this).hasClass("switch-trigger")) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $(".fixed-plugin .background-color span").click(function() {
          $(this).siblings().removeClass("active");
          $(this).addClass("active");

          var new_color = $(this).data("color");

          if ($sidebar.length != 0) {
            $sidebar.attr("data", new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr("data", new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr("filter-color", new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr("data", new_color);
          }
        });

        $(".switch-sidebar-mini input").on(
          "switchChange.bootstrapSwitch",
          function() {
            var $btn = $(this);

            if (sidebar_mini_active == true) {
              $("body").removeClass("sidebar-mini");
              sidebar_mini_active = false;
              blackDashboard.showSidebarMessage(
                "Sidebar mini deactivated..."
              );
            } else {
              $("body").addClass("sidebar-mini");
              sidebar_mini_active = true;
              blackDashboard.showSidebarMessage("Sidebar mini activated...");
            }

            // we simulate the window Resize so the charts will get updated in realtime.
            var simulateWindowResize = setInterval(function() {
              window.dispatchEvent(new Event("resize"));
            }, 180);

            // we stop the simulation of Window Resize after the animations are completed
            setTimeout(function() {
              clearInterval(simulateWindowResize);
            }, 1000);
          }
        );

        $(".switch-change-color input").on(
          "switchChange.bootstrapSwitch",
          function() {
            var $btn = $(this);

            if (white_color == true) {
              $("body").addClass("change-background");
              setTimeout(function() {
                $("body").removeClass("change-background");
                $("body").removeClass("white-content");
              }, 900);
              white_color = false;
            } else {
              $("body").addClass("change-background");
              setTimeout(function() {
                $("body").removeClass("change-background");
                $("body").addClass("white-content");
              }, 900);

              white_color = true;
            }
          }
        );

        $(".light-badge").click(function() {
          $("body").addClass("white-content");
        });

        $(".dark-badge").click(function() {
          $("body").removeClass("white-content");
        });
      });
    });
  </script>
  <!-- <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();
    });
  </script> -->
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free",
      });
  </script>
</body>

</html>