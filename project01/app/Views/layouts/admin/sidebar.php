<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Menu</div>

                {{view('layouts/admin/menu_item', ['title' => 'Bài viết', 'name' => 'posts'])}}

                {{view('layouts/admin/menu_item', ['title' => 'Chuyên mục', 'name' => 'categories'])}}

                {{view('layouts/admin/menu_item', ['title' => 'Trang', 'name' => 'pages'])}}

                {{view('layouts/admin/menu_item', ['title' => 'Người dùng', 'name' => 'users'])}}
                <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                    aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a> -->

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Đăng nhập dưới:</div>
            {{Auth::user()->name}}
        </div>
    </nav>
</div>