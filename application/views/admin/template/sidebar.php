<div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        <li><a href="<?= base_url('admin') ?>" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li>
            							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fa fa-user"></i> <span>Data Pengguna</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
            							<div id="subPages" class="collapse ">
            								<ul class="nav">
            									<li><a href="<?= base_url('admin/relawan')?>" class="">Relawan</a></li>
            									<li><a href="<?= base_url('admin/kontributor')?>" class="">Kontributor</a></li>
            								</ul>
            							</div>
            						</li>
                        <li>
            							<a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="fa fa-paper-plane-o"></i> <span>Data Posting</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
            							<div id="subPages2" class="collapse ">
            								<ul class="nav">
            									<li><a href="<?= base_url('admin/kategori')?>" class="">Kategori</a></li>
            									<li><a href="<?= base_url('admin/berita')?>" class="">Berita</a></li>
            								</ul>
            							</div>
            						</li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
