<?php
$jml_chatting = $this->m_chatting->jml_chatting();
$daftar_chat = $this->m_chatting->daftar_chat();
?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('admin') ?>" class="nav-link">Home</a>
                </li>
                <!--<li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('kategori') ?>" class="nav-link">Kategori</a>
                </li>-->
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-envelope"></i>
                        <span class="badge bg-warning navbar-badge"><?= $jml_chatting ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <?php
                        foreach ($daftar_chat as $key => $value) {
                        ?>
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            <?= $value->nama_pelanggan ?>
                                        </h3>
                                        <p class="text-sm"><?= $value->pelanggan_send ?></p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i><?= $value->time_chatting ?></p>
                                    </div>
                                </div>
                                <a href="<?= base_url('chatting_admin/pesan/' . $value->id_pelanggan) ?>">
                                    Message End <button type="button" class="btn btn-block btn-outline-primary btn-sm">VIEW CHAT</button>
                                </a>
                            </a>
                            <div class="dropdown-divider"></div>
                        <?php
                        }
                        ?>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->