<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>==Sistem Informasi RT.08 RW.012==</title>
  <link rel="shortcut icon" href="<?= base_url() ?>/public/LOGO.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?= base_url() ?>/public/LOGO.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url() ?>/public/LOGO.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url() ?>/public/LOGO.png">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <script src="<?= base_url() ?>/public/ajax_daerah.js"></script>
  <script src="<?= base_url() ?>/public/plugins/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>/public/plugins/jquery/form.js"></script>
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/daterangepicker/daterangepicker.css">  
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/public/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<script>
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode >57))
      return false;
  }
  function huruf(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode>32)
      return false;
    return true;
  }
</script>