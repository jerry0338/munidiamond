<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="Jerry Patel">
    <title>Dashboard eCommerce - Robust - Responsive Bootstrap 4 Admin Dashboard Template for Web Application</title>
    <link rel="apple-touch-icon" href="<?= base_url() ?>assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/app.min.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/core/menu/menu-types/horizontal-menu.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/core/colors/palette-gradient.min.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css">
    <!-- END Custom CSS-->
    <script src="<?= base_url() ?>assets/vendors/js/vendors.min.js"></script>
  </head>
  <body class="horizontal-layout horizontal-menu horizontal-menu-padding menu-expanded 2-columns" data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

  <!-- <body class="horizontal-layout horizontal-menu horizontal-menu-padding menu-expanded 1-column blank-page blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column"> -->
    

    <!-- Navbar -->
    <?php if(!isset($navbar)): ?>
    <?php $this->load->view('admin/includes/_navbar.php'); ?>
    <?php endif; ?>
    <!-- /.navbar -->

    <!-- Sideabr -->
    <?php if(!isset($sidebar)): ?>
    <?php $this->load->view('admin/includes/_header_menu.php'); ?>
    <?php endif; ?>
    <!-- / .Sideabr -->
