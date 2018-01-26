<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/29/2017
 * Time: 3:28 PM
 */
session_start();
require 'constants.php';
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Success</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Success" />
    <meta name="keywords" content="Success" />
    <meta name="author" content="Success" />

    <!--

       -->

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<!--    <script src="--><?//=BASE_URL?><!--assets/js/jquery-form-validator.js"></script>-->
    <script  type="text/javascript” src=”http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        var BASE_URL = '<?=BASE_URL?>';
    </script>

</head>
<body>
    <div id="loading-part">
        <div id="loading-message">loading</div>
    </div>
    <?php

        require 'logo-part.php';
        require 'db_connection.php';
    ?>
