<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>LOGIN</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>plantillas/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?=base_url()?>plantillas/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>plantillas/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>plantillas/css/style-responsive.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style>
             body{ text-align:center; font-family: 'Lato', 'Helvetica Neue', Helvetica, sans-serif; background:#F9F9F9}
            .checkmark-circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #7ac142;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }

      .checkmark {
        width: 156px;
        height: 156px;
        border-radius: 50%;
        display: block;
        stroke-width: 2;
        stroke: #000;
        stroke-miterlimit: 10;
        margin: 10% auto;
        margin-bottom:6%;
        box-shadow: inset 0px 0px 0px #7ac142;
        animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
       }

      .checkmark-check {
        transform-origin: 50% 50%;
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
      }

      @keyframes stroke {
        100% {
          stroke-dashoffset: 0;
        }
      }
      @keyframes scale {
        0%, 100% {
          transform: none;
        }
        50% {
          transform: scale3d(1.1, 1.1, 1);
        }
      }
      @keyframes fill {
        100% {
          box-shadow: inset 0px 0px 0px 10px #7ac142;
        }
      }
</style>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">