<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('include/header'); ?>

<link rel="stylesheet" href="<?= base_url('public'); ?>/hiten/css/app.css">

<link rel="stylesheet" href="<?= base_url('public'); ?>/dist/libs/treant/Treant.css"/>
<link rel="stylesheet" href="<?=base_url('public');?>/dist/libs/treant/vendor/perfect-scrollbar/perfect-scrollbar.css"/>

<link href="<?= base_url('public'); ?>/components/bootstrap-toggle/css/bootstrap-toggle.min.css" rel="stylesheet">
<style>
    img {
        width: 45px;
        height: 50px !important;
        margin-left: 30px;
    }

</style>
<base href="/mlm/public/hiten/"/>
</head>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
<div class="wrapper">
    <?php $this->load->view('include/topbar'); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php $this->load->view('include/sidebar'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> Net Sale Growth Report
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('v3/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">
                    <?= $this->uri->segment(2) . '/' . $this->uri->segment(3); ?>
                </li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-body" align="center">
                            <div class="entry-content">
                                <div class="pull-left">
                                    <div class="form-group">
                                        <label class="sr-only" for="tree-switch"></label>
                                        <input type="checkbox" id="tree-switch" checked></div>
                                    </div>

                                <div id="tree-member-view"></div>
                                <!--div class="row" ng-app="amwayCalApp">
                                    <div class="span12" ng-view>
                                    </div>
                                </div-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php $this->load->view('include/footer'); ?>

    <script src="<?= base_url('public'); ?>/hiten/js/angular.min.js"></script>
    <script src="<?= base_url('public'); ?>/hiten/js/angular-route.min.js"></script>
    <script src="<?= base_url('public'); ?>/dist/libs/treant/vendor/raphael.js"></script>
    <script src="<?= base_url('public'); ?>/dist/libs/treant/Treant.js"></script>
    <script src="<?= base_url('public'); ?>/dist/libs/treant/vendor/jquery.easing.js"></script>

    <script type="text/javascript">
        var MemberID = '<?=$this->input->get('id');?>';
        var BaseUrl = '<?=base_url();?>';
    </script>
    <script src="<?= base_url('public'); ?>/components/bootstrap-toggle/js/bootstrap-toggle.min.js"></script>

    <script src="<?= base_url('public'); ?>/hiten/js/app-min.js"></script>
    <script src="<?= base_url('public'); ?>/pages/view_member/view_member.js"></script>

</body>
</html>