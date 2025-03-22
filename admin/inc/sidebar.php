<div class="sidebar">
    <div class="sidebar-content">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark flex-column align-items-start">
            <!-- Nama User -->
            <div class="text-center w-100 py-3 text-white">
                <h5 class="mb-0">👋 Selamat Datang</h5>
                <p class="mb-2 font-weight-bold"><?= $_SESSION['nama'] ?? 'Guest'; ?></p>
            </div>

            <!-- Tombol Toggle (Mobile) -->
            <button type="button" class="navbar-toggler w-100" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu Sidebar -->
            <div class="collapse navbar-collapse w-100" id="navbarCollapse">
                <ul class="nav navbar-nav w-100">
                    <?php $currentPage = $_GET['page'] ?? 'education'; ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'education' ? 'aktif' : '' ?>" href="?page=education">
                            <i class="fa fa-graduation-cap"></i> Pendidikan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'experience' ? 'aktif' : '' ?>" href="?page=experience">
                            <i class="fa fa-briefcase"></i> Pengalaman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'message' ? 'aktif' : '' ?>" href="?page=message">
                            <i class="fa fa-comments"></i> Pesan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'project' ? 'aktif' : '' ?>" href="?page=project">
                            <i class="fa fa-folder-open"></i> Portfolio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'review' ? 'aktif' : '' ?>" href="?page=review">
                            <i class="fa fa-star"></i> Ulasan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'service' ? 'aktif' : '' ?>" href="?page=service">
                            <i class="fa fa-cogs"></i> Servis
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'skill' ? 'aktif' : '' ?>" href="?page=skill">
                            <i class="fa fa-lightbulb"></i> Keahlian
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'type' ? 'aktif' : '' ?>" href="?page=type">
                            <i class="fa fa-list"></i> Tipe
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Tombol Logout -->
            <div class="w-100 text-center mt-4">
                <a href="inc/logout.php" class="btn btn-danger btn-block">
                    <i class="fa fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </nav>
    </div>
</div>
