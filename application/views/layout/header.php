<!DOCTYPE html>
<html lang="en">

<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title><?php echo $title; ?> - Sistem Rekomendasi Universitas Terbaik</title>

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    <link id="base-style" href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <!-- end: CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- start: Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.ico">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- end: Favicon -->

</head>

<body>

    <div class="navbarSPK" style="position: fixed; top: 0; width: 100%; z-index: 1000;">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="brand" href="<?= base_url() ?>">
                    <span class="brand-text">Kelompok 7 SPK - UPN "VETERAN" JATIM</span>
                </a>

                <ul class="headerSPK">
                    <li><a href="<?= base_url('home') ?>" class="flex-align">Home<span class="material-icons">chevron_right</span></a></li>
                    <li><a href="<?= base_url('kriteria') ?>" class="flex-align">Kriteria<span class="material-icons">chevron_right</span></a></li>
                    <li><a href="<?= base_url('alternatif') ?>" class="flex-align">Alternatif<span class="material-icons">chevron_right</span></a></li>
                    <li><a href="<?= base_url('alternatif/process_wp') ?>" class="flex-align">Hasil<span class="material-icons" style="opacity: 0;">chevron_right</span></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="navbarSPK">
        <div class="navbar-inner">
            <div class="container-fluid">
            </div>
        </div>
    </div>
    <div class="container-fluid-full">
        <div class="row-fluid"></div>