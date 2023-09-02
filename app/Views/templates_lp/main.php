<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Travelo</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets-lp/'); ?>img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="<?= base_url('assets-lp/'); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets-lp/'); ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets-lp/'); ?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url('assets-lp/'); ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets-lp/'); ?>css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets-lp/'); ?>css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url('assets-lp/'); ?>css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('assets-lp/'); ?>css/gijgo.css">
    <link rel="stylesheet" href="<?= base_url('assets-lp/'); ?>css/animate.css">
    <link rel="stylesheet" href="<?= base_url('assets-lp/'); ?>css/slick.css">
    <link rel="stylesheet" href="<?= base_url('assets-lp/'); ?>css/slicknav.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" href="<?= base_url('assets-lp/'); ?>css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>

 <!-- Navbar Start -->
 <?= $this->include('templates_lp/header'); ?>
    <!-- Navbar End -->

    <!-- Content Wrapper. Contains page content -->
    <?= $this->renderSection('content'); ?>
    <!-- /.content-wrapper -->

    <!-- Footer Start -->
    <?= $this->include('templates_lp/footer'); ?>
    <!-- Footer End -->

 <!-- Modal -->
 <div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="serch_form">
            <input type="text" placeholder="Search" >
            <button type="submit">search</button>
        </div>
      </div>
    </div>
  </div>
    <!-- link that opens popup -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script>
    <!-- JS here -->
    <script src="<?= base_url('assets-lp/'); ?>js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?= base_url('assets-lp/'); ?>js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?= base_url('assets-lp/'); ?>js/popper.min.js"></script>
    <script src="<?= base_url('assets-lp/'); ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets-lp/'); ?>js/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets-lp/'); ?>js/isotope.pkgd.min.js"></script>
    <script src="<?= base_url('assets-lp/'); ?>js/ajax-form.js"></script>
    <script src="<?= base_url('assets-lp/'); ?>js/waypoints.min.js"></script>
    <script src="<?= base_url('assets-lp/'); ?>js/jquery.counterup.min.js"></script>
    <script src="<?= base_url('assets-lp/'); ?>js/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url('assets-lp/'); ?>js/scrollIt.js"></script>
    <script src="<?= base_url('assets-lp/'); ?>js/jquery.scrollUp.min.js"></script>
    <script src="<?= base_url('assets-lp/'); ?>js/wow.min.js"></script>
    <script src="<?= base_url('assets-lp/'); ?>js/nice-select.min.js"></script>
    <script src="<?= base_url('assets-lp/'); ?>js/jquery.slicknav.min.js"></script>
    <script src="<?= base_url('assets-lp/'); ?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url('assets-lp/'); ?>js/plugins.js"></script>
    <script src="<?= base_url('assets-lp/'); ?>js/gijgo.min.js"></script>
    <script src="<?= base_url('assets-lp/'); ?>js/slick.min.js"></script>
   

    
    <!--contact js-->
    <script src="<?= base_url('assets-lp/'); ?>js/contact.js"></script>
    <script src="<?= base_url('assets-lp/'); ?>js/jquery.ajaxchimp.min.js"></script>
    <script src="<?= base_url('assets-lp/'); ?>js/jquery.form.js"></script>
    <script src="<?= base_url('assets-lp/'); ?>js/jquery.validate.min.js"></script>
    <script src="<?= base_url('assets-lp/'); ?>js/mail-script.js"></script>


    <script src="<?= base_url('assets-lp/'); ?>js/main.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }
        });
    </script>
</body>

</html>
