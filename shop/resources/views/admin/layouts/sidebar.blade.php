 <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="/admin/dist/img/logo.png" alt="KNStore" class="brand-image">
            <span class="brand-text font-weight-light">KNStore</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img @if(Auth::user()->image!=null) src="{{ Auth::user()->image }}"
                    @else src="{{ env('AVATAR_ADMIN') }}" @endif class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ route('admin.profile') }}" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{ route('admin.dashboard') }}" 
                        @if(url()->current() == route('admin.dashboard')) class="nav-link active"
                        @else class="nav-link" @endif>
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>

                    </li>

                    @can('permission','list-admin')
                     <li class="nav-item has-treeview">
                        <a href="{{ route('admin.index') }}" 
                        @if(url()->current() == route('admin.index')) class="nav-link active"
                        @else class="nav-link" @endif>
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Quản lý người dùng
                            </p>
                        </a>
                    </li>
                    @endcan

                    @can('permission','list-product')
                    <li class="nav-item has-treeview">
                        <a href="{{ route('products.index') }}"
                        @if(url()->current() == route('products.index')) class="nav-link active"
                        @else class="nav-link" @endif>
                            <i class="nav-icon fas fa-shopping-basket"></i>
                            <p>
                                Quản lý sản phẩm
                            </p>
                        </a>
                    </li>
                    @endcan

                    @can('permission','list-category')
                     <li class="nav-item has-treeview">
                        <a href="{{ route('categories.index') }}" 
                        @if(url()->current() == route('categories.index')) class="nav-link active"
                        @else class="nav-link" @endif>
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Quản lý danh mục
                            </p>
                        </a>
                    </li>
                    @endcan

                     @can('permission','list-category')
                     <li class="nav-item has-treeview">
                        <a href="{{ route('options.index') }}" 
                        @if(url()->current() == route('options.index')) class="nav-link active"
                        @else class="nav-link" @endif>
                            <i class="nav-icon fas fa-filter"></i>
                            <p>
                                Quản lý option
                            </p>
                        </a>
                    </li>
                    @endcan
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                Quản lý sự kiện
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/UI/general.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sale</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/UI/icons.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sinh nhật</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @can('permission','list-bill')
                     <li class="nav-item has-treeview">
                        <a href="{{ route('bills.index') }}" 
                        @if(url()->current() == route('bills.index')) class="nav-link active"
                        @else class="nav-link" @endif>
                            <i class="fas fa-money-bill-alt"></i>
                            <p>
                                Quản lý hóa đơn
                            </p>
                        </a>
                    </li>
                    @endcan
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>