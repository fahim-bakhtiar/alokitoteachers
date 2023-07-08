<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset_url('dist/img/alokito_logo.png')}}" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">Alokito Teachers</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset_url('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{get_logged_in_admin_user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link @if(get_page_name() == 'dashboard') bg-olive @endif)">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(admin_can('admin-user-management'))
                            <li class="nav-item">
                                <a href="{{route('admin.user-management.admins')}}" class="nav-link @if(get_page_name() == 'admin-mgt') bg-olive @endif">
                                    <i class="nav-icon far fa-arrow-alt-circle-right"></i>
                                    <p>Admins</p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{route('user-management.teacher.list')}}" class="nav-link @if(get_page_name() == 'teacher-mgt') bg-olive @endif">
                                <i class="nav-icon far fa-arrow-alt-circle-right"></i>
                                <p>Teachers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-arrow-alt-circle-right"></i>
                                <p>Students</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-arrow-alt-circle-right"></i>
                                <p>Schools</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @if(admin_can('admin-package-management'))
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-box-open"></i>
                        <p>
                            Packages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        
                        <li class="nav-item">
                            <a href="{{route('package-management.create')}}" class="nav-link @if(get_page_name() == 'package-mgt-create') bg-olive @endif">
                                <i class="nav-icon far fa-arrow-alt-circle-right"></i>
                                <p>Create</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{route('package-management.list')}}" class="nav-link @if(get_page_name() == 'package-mgt-list') bg-olive @endif">
                                <i class="nav-icon far fa-arrow-alt-circle-right"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>
                            Courses
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        
                        <li class="nav-item">
                            <a href="{{route('course-management.course.create')}}" class="nav-link @if(get_page_name() == 'course-mgt-create') bg-olive @endif">
                                <i class="nav-icon far fa-arrow-alt-circle-right"></i>
                                <p>Create</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{route('course-management.course.list')}}" class="nav-link @if(get_page_name() == 'course-mgt-list') bg-olive @endif">
                                <i class="nav-icon far fa-arrow-alt-circle-right"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="mt-2 nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Resources
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        
                        <li class="nav-item">
                            <a href="{{route('resource-management.lessonplan.index')}}" class="nav-link @if(get_page_name() == 'lesson-plan-index') bg-olive @endif">
                                <i class="nav-icon fab fa-leanpub"></i>
                                <p>Lesson Plans</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{route('resource-management.worksheet.index')}}" class="nav-link @if(get_page_name() == 'worksheet-index') bg-olive @endif">
                                <i class="nav-icon fab fa-leanpub"></i>
                                <p>Worksheets</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('resource-management.demo-class.index')}}" class="nav-link @if(get_page_name() == 'demo-class-index') bg-olive @endif">
                                <i class="nav-icon fab fa-leanpub"></i>
                                <p>Demo Class</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="mt-2 nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Workshops
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        
                        <li class="nav-item">
                            <a href="{{route('workshop-management.trainer.index')}}" class="nav-link @if(get_page_name() == 'trainer.index') bg-olive @endif">
                                <i class="nav-icon fab fa-leanpub"></i>
                                <p>Trainers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('workshop-management.trainer.create')}}" class="nav-link @if(get_page_name() == 'trainer.create') bg-olive @endif">
                                <i class="nav-icon fab fa-leanpub"></i>
                                <p>Create Trainer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('workshop-management.workshop.index')}}" class="nav-link @if(get_page_name() == 'workshop.index') bg-olive @endif">
                                <i class="nav-icon fab fa-leanpub"></i>
                                <p>Workshops</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('workshop-management.workshop.create')}}" class="nav-link @if(get_page_name() == 'workshop.create') bg-olive @endif">
                                <i class="nav-icon fab fa-leanpub"></i>
                                <p>Create Workshop</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="mt-2 nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Innovations
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        
                        <li class="nav-item">
                            <a href="{{route('innovation-management.innovation.index')}}" class="nav-link @if(get_page_name() == 'innovation.index') bg-olive @endif">
                                <i class="nav-icon fab fa-leanpub"></i>
                                <p>List</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>

                <li class="mt-2 nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        
                        <li class="nav-item mt-2">
                            <a href="{{route('category-management.create')}}" class="nav-link @if(get_page_name() == 'category-mgt-create') bg-olive @endif">
                                <i class="nav-icon far fa-arrow-alt-circle-right"></i>
                                <p>Create</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('category-management.list')}}" class="nav-link @if(get_page_name() == 'category-mgt-list') bg-olive @endif">
                                <i class="nav-icon far fa-arrow-alt-circle-right"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                
                
                
                <hr>
                <li class="nav-item">
                    <a href="{{route('admin.logout')}}" class="nav-link bg-danger" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Log Out
                        </p>
                    </a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>