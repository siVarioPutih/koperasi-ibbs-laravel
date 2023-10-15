
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Koperasi Imam Bukhari Boarding School</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('')}}{{asset('')}}images/favicon.png">
    <link rel="stylesheet" href="{{asset('')}}vendor/chartist/css/chartist.min.css">
    <link href="{{asset('')}}vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{asset('')}}vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="{{asset('')}}css/style.css" rel="stylesheet">
    @stack('css')
    <!-- Pick date -->
    <link rel="stylesheet" href="{{asset('')}}vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="{{asset('')}}vendor/pickadate/themes/default.date.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>

<!--*******************
    Preloader start
********************-->
{{--<div id="preloader">--}}
{{--    <div class="sk-three-bounce">--}}
{{--        <div class="sk-child sk-bounce1"></div>--}}
{{--        <div class="sk-child sk-bounce2"></div>--}}
{{--        <div class="sk-child sk-bounce3"></div>--}}
{{--    </div>--}}
{{--</div>--}}
<!--*******************
    Preloader end
********************-->

<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">



    <!--**********************************
        Content body start
    ***********************************-->
    @include('nara.header');
    <div class="content-body">

        <!-- row -->
        <div class="container-fluid">
            @yield('content')

        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->

    <!--**********************************
        Footer start
    ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2020</p>
        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->

    <!--**********************************
       Support ticket button start
    ***********************************-->

    <!--**********************************
       Support ticket button end
    ***********************************-->


</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{asset('')}}vendor/global/global.min.js"></script>
<script src="{{asset('')}}vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="{{asset('')}}vendor/chart.js/Chart.bundle.min.js"></script>
<script src="{{asset('')}}js/custom.min.js"></script>
<script src="{{asset('')}}js/deznav-init.js"></script>
<script src="{{asset('')}}vendor/owl-carousel/owl.carousel.js"></script>

<!-- Chart piety plugin files -->
<script src="{{asset('')}}vendor/peity/jquery.peity.min.js"></script>

<!-- Apex Chart -->
<script src="{{asset('')}}vendor/apexchart/apexchart.js"></script>

<!-- Dashboard 1 -->
<script src="{{asset('')}}js/dashboard/dashboard-1.js"></script>
<script>
    $(document).ready(function(){
        $('#aksi').submit(function(){
            $('.formSubmit').attr('disabled', true);
        });
    });


</script>
<!-- pickdate -->
<script src="{{asset('')}}vendor/pickadate/picker.js"></script>
<script src="{{asset('')}}vendor/pickadate/picker.time.js"></script>
<script src="{{asset('')}}vendor/pickadate/picker.date.js"></script> <!-- Pickdate -->
<script src="{{asset('')}}js/plugins-init/pickadate-init.js"></script>

@stack('js')

</body>
</html>
