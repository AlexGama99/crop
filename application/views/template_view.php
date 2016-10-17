<!DOCTYPE HTML>
<style>

#iframe
{

}
</style>
<html>
<head>
    <title>Создание аватарок</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="/assets/js/jquery-3.0.0.min.js"></script>
    <script src="/assets/js/jquery-migrate-3.0.0.js"></script>

    <!--<script src="/scripts/jquery.min.js"></script>-->
    <script src="/scripts/jquery.Jcrop.js"></script>
    <link rel="stylesheet" href="/scripts/jquery.Jcrop.css" type="text/css" />

    <!--[if lte IE 8]><script src="/assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="/assets/css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="/assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="/assets/css/ie8.css" /><![endif]-->

    <script src="/sweetalert/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/sweetalert/sweetalert.css">
</head>
<!--<div class="resize"><iframe src="http://www.rundnsrun.ru" marginheight="0" marginwidth="0" align="left"></iframe></div>
<div class="resize"><iframe src="http://www.rundnsrun.ru" marginheight="0" marginwidth="0" align="right"></iframe></div>-->
<body>
<script type="text/javascript">
    $(function() {
        var iframe = $('#ourframe', parent.document.body);
        iframe.width($(document.body).width());
    });
</script>
<iframe id="ourframe" ></iframe>
<?php include 'header_view.php';?>
<iframe id="ourframe" ></iframe>
<?php include "$content_view";?>
<iframe id="ourframe" ></iframe>
<?php include 'copyright_view.php';?>
<!--<div class="resize"><iframe src="http://www.rundnsrun.ru" marginheight="0" marginwidth="0"></iframe></div>
<iframe src="http://www.rundnsrun.ru" width="265" height="1050" align="right" scrolling="no"></iframe>-->
<!--<iframe src="http://www.rundnsrun.ru" width="20%" height="200" frameborder="3"> </iframe>-->
<!-- Скрипты -->
<script src="/assets/js/skel.min.js"></script>
<script src="/assets/js/jquery.scrollex.min.js"></script>
<script src="/assets/js/util.js"></script>
<!--[if lte IE 8]><script src="/assets/js/ie/respond.min.js"></script><![endif]-->
<script src="/assets/js/main.js"></script>



</body>
</html>
