<?php $role = $this->session->userdata('role'); ?>

<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('dashboard')?>">
    <div class="sidebar-brand-text mx-3">PT Maju Jaya</div>
</a>

<hr class="sidebar-divider my-0">

<li class="nav-item active">
    <a class="nav-link" href="<?= site_url('dashboard') ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
</li>

<hr class="sidebar-divider">

<?php if($role == 'admin'): ?>

    <li class="nav-item">
    <a class="nav-link" href="<?= site_url('users') ?>">
        <i class="fas fa-user-cog"></i>
        <span>Users</span>
    </a>
</li>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('produk') ?>">
            <i class="fas fa-box"></i>
            <span>Produk</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('pelanggan') ?>">
            <i class="fas fa-users"></i>
            <span>Pelanggan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('salesorder') ?>">
            <i class="fas fa-shopping-cart"></i>
            <span>Sales Order</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('laporan') ?>">
            <i class="fas fa-chart-bar"></i>
            <span>Laporan</span>
        </a>
    </li>

<?php elseif($role == 'sales'): ?>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('salesorder') ?>">
            <i class="fas fa-shopping-cart"></i>
            <span>Sales Order Saya</span>
        </a>
    </li>

<?php elseif($role == 'manager'): ?>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('laporan') ?>">
            <i class="fas fa-chart-bar"></i>
            <span>Laporan Penjualan</span>
        </a>
    </li>

<?php endif; ?>

<hr class="sidebar-divider d-none d-md-block">

</ul>
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">