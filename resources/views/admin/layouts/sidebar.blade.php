<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{ url('/admin') }}" class="d-block">Bảng điều khiển</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ url('/admin/') }}" class="nav-link">
                    <i class="fas fa-chart-line"></i>
                    <p>
                        Bảng điều khiển
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/tien-ao') }}" class="nav-link">
                    <i class="fab fa-bitcoin"></i>
                    <p>Tiền ảo</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/ty-suat-ngan-hang') }}" class="nav-link">
                    <i class="fas fa-university"></i>
                    <p>Tỷ xuất ngân hàng</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/tin-tuc') }}" class="nav-link">
                    <i class="fas fa-newspaper"></i>
                    <p>Tin tức</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/dai-ly') }}" class="nav-link">
                    <i class="fas fa-building"></i>
                    <p>Đại lý</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/banner') }}" class="nav-link">
                    <i class="fas fa-images"></i>
                    <p>Ảnh banner</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/widgets/index') }}" class="nav-link">
                    <i class="fas fa-text-width"></i>
                    <p>
                        Cài đặt hệ thống
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
