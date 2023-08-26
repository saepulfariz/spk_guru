<?php

$segment = $this->uri->segment(1);
$segment2 = $this->uri->segment(2);


?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-tie"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SPK GURU <sup>1</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <li class="nav-item <?= ($segment == 'dashboard') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>


    <li class="nav-item <?= ($segment == 'user') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('user'); ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Kelola User</span>
        </a>
    </li>

    <li class="nav-item <?= ($segment == 'guru') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('guru'); ?>">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Calon guru</span>
        </a>
    </li>


    <li class="nav-item <?= ($segment == 'alternatif') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('alternatif'); ?>">
            <i class="fab fa-fw fa-twitter"></i>
            <span>Alternatif</span>
        </a>
    </li>

    <li class="nav-item <?= ($segment == 'sub_alternatif') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('sub_alternatif'); ?>">
            <i class="fas fa-fw fa-calendar-check"></i>
            <span>Sub Alternatif</span>
        </a>
    </li>

    <li class="nav-item <?= ($segment == 'bobot_alternatif') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('bobot_alternatif'); ?>">
            <i class="fas fa-fw fa-minus"></i>
            <span>Bobot Alternatif</span>
        </a>
    </li>

    <li class="nav-item <?= ($segment == 'perhitungan') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('perhitungan'); ?>">
            <i class="fas fa-fw fa-signal"></i>
            <span>Perhitungan</span>
        </a>
    </li>

    <li class="nav-item <?= ($segment == 'seleksi') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('seleksi'); ?>">
            <i class="fas fa-fw fa-signal"></i>
            <span>Proses Seleksi</span>
        </a>
    </li>

    <li class="nav-item <?= ($segment == 'perhitungan') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('perhitungan'); ?>">
            <i class="fas fa-fw fa-signal"></i>
            <span>Informasi Selanjutnya</span>
        </a>
    </li>

    <li class="nav-item <?= ($segment == 'perhitungan') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('perhitungan'); ?>">
            <i class="fas fa-fw fa-signal"></i>
            <span>Hasil</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>