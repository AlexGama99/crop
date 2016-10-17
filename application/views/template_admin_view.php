<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Dashboard I Admin Panel</title>

    <link rel="stylesheet" href="/css/layout.css" type="text/css" media="screen" />
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="/css/ie.css" type="text/css" media="screen" />
   <!-- <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> -->
    <![endif]-->
    <script src="/js/jquery-1.5.2.min.js" type="text/javascript"></script>
    <script src="/js/hideshow.js" type="text/javascript"></script>
    <script src="/js/jquery.tablesorter.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/js/jquery.equalHeight.js"></script>

</head>
<body>

<?php include "$content_view";?>
<section id="main" class="column">
<?php include $_COOKIE['fileview'];?>
</section>

</body>

</html>
