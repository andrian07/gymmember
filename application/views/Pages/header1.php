<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <meta name="csrf-name" content="<?= $this->security->get_csrf_token_name(); ?>">
    <meta name="csrf-hash" content="<?= $this->security->get_csrf_hash(); ?>">
    <title>Elluna</title>
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/logo.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url() ?>assets/img/logo.png" sizes="192x192">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    <link rel="manifest" href="<?php echo base_url() ?>dist/manifest.json">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>dist/js/autonumeric.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?php echo base_url(); ?>dist/js/autonumeric.js"></script>
</head>

