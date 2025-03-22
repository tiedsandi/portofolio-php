<div class="sidebar">
    <div class="sidebar-content">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">Admin</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="nav navbar-nav">
                    <?php $currentPage = isset($_GET['page']) ? $_GET['page'] : 'education'; ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'education' ? 'aktif' : '' ?>" href="?page=education">
                            Pendidikan <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'experience' ? 'aktif' : '' ?>" href="?page=experience">
                            Pengalaman <i class="fa fa-address-card"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'message' ? 'aktif' : '' ?>" href="?page=message">
                            Pesan <i class="fa fa-star"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'project' ? 'aktif' : '' ?>" href="?page=project">
                            Portfolio <i class="fa fa-tasks"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'review' ? 'aktif' : '' ?>" href="?page=review">
                            Ulasan <i class="fa fa-file-archive"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'service' ? 'aktif' : '' ?>" href="?page=service">
                            Servis <i class="fa fa-envelope"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'skill' ? 'aktif' : '' ?>" href="?page=skill">
                            Keahlian <i class="fa fa-envelope"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage === 'type' ? 'aktif' : '' ?>" href="?page=type">
                            Tipe <i class="fa fa-envelope"></i>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</div>