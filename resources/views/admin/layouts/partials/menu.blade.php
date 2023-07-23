    <div class="app-menu navbar-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <!-- Dark Logo-->
            <a href="index.html" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="{{asset_url('dashboard/assets/images/logo-sm.png')}}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{asset_url('dashboard/assets/images/logo-dark.png')}}" alt="" height="17">
                </span>
            </a>
            <!-- Light Logo-->
            <a href="index.html" class="logo logo-light">
                <span class="logo-sm">
                    <img src="{{asset_url('dashboard/assets/images/logo-sm.png')}}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{asset_url('dashboard/assets/images/logo-light.png')}}" alt="" height="17">
                </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>
        </div>

        <div id="scrollbar">
            <div class="container-fluid">

                <div id="two-column-menu">
                </div>
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                    
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                            <i class="bx bx-user-circle"></i> <span data-key="t-multi-level">Users</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarMultilevel">
                            <ul class="nav nav-sm flex-column">
                                @if(admin_can('admin-user-management'))
                                <li class="nav-item">
                                    <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> Admins
                                    </a>
                                    <div class="collapse menu-dropdown" id="sidebarAccount">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{route('admin.user-management.create')}}" class="nav-link" data-key="t-level-2.1"> Create </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('admin.user-management.admins')}}" class="nav-link" data-key="t-level-2.1"> List </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> Teachers
                                    </a>
                                    <div class="collapse menu-dropdown" id="sidebarAccount">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{route('user-management.teacher.create')}}" class="nav-link" data-key="t-level-2.1"> Create </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('user-management.teacher.list')}}" class="nav-link" data-key="t-level-2.1"> List </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                            <i class="bx bx-package"></i> <span data-key="t-multi-level">Packages</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarMultilevel">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{route('package-management.create')}}" class="nav-link" data-key="t-level-2.1"> Create </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('package-management.list')}}" class="nav-link" data-key="t-level-2.1">  List </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                            <i class="bx bx-video-plus"></i> <span data-key="t-multi-level">Courses</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarMultilevel">
                            <ul class="nav nav-sm flex-column">
                                
                                <li class="nav-item">
                                    <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> Course
                                    </a>
                                    <div class="collapse menu-dropdown" id="sidebarAccount">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{route('course-management.course.create')}}" class="nav-link" data-key="t-level-2.1"> Create </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('course-management.course.list')}}" class="nav-link" data-key="t-level-2.1"> List </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> Activists
                                    </a>
                                    <div class="collapse menu-dropdown" id="sidebarAccount">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{route('faculty-management.faculty.create')}}" class="nav-link" data-key="t-level-2.1"> Create </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('faculty-management.faculty.list')}}" class="nav-link" data-key="t-level-2.1"> List </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                            <i class="bx bx-book-reader"></i> <span data-key="t-multi-level">Resources</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarMultilevel">
                            <ul class="nav nav-sm flex-column">
                                
                                <li class="nav-item">
                                    <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> Lesson Plan
                                    </a>
                                    <div class="collapse menu-dropdown" id="sidebarAccount">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{route('resource-management.lessonplan.create')}}" class="nav-link" data-key="t-level-2.1"> Create </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('resource-management.lessonplan.list')}}" class="nav-link" data-key="t-level-2.1"> List </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> Worksheet
                                    </a>
                                    <div class="collapse menu-dropdown" id="sidebarAccount">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{route('resource-management.worksheet.create')}}" class="nav-link" data-key="t-level-2.1"> Create </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('resource-management.worksheet.list')}}" class="nav-link" data-key="t-level-2.1"> List </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> Demo Class
                                    </a>
                                    <div class="collapse menu-dropdown" id="sidebarAccount">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{route('resource-management.demo-class.create')}}" class="nav-link" data-key="t-level-2.1"> Create </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('resource-management.demo-class.list')}}" class="nav-link" data-key="t-level-2.1"> List </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                            <i class="bx bx-spreadsheet"></i> <span data-key="t-multi-level">Workshops</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarMultilevel">
                            <ul class="nav nav-sm flex-column">
                                
                                <li class="nav-item">
                                    <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> Workshops
                                    </a>
                                    <div class="collapse menu-dropdown" id="sidebarAccount">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{route('workshop-management.workshop.create')}}" class="nav-link" data-key="t-level-2.1"> Create </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('workshop-management.workshop.index')}}" class="nav-link" data-key="t-level-2.1"> List </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> Trainers
                                    </a>
                                    <div class="collapse menu-dropdown" id="sidebarAccount">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{route('workshop-management.trainer.create')}}" class="nav-link" data-key="t-level-2.1"> Create </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('workshop-management.trainer.index')}}" class="nav-link" data-key="t-level-2.1"> List </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> Workshop Requests
                                    </a>
                                    <div class="collapse menu-dropdown" id="sidebarAccount">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{route('workshop-management.workshop-request.index')}}" class="nav-link" data-key="t-level-2.1"> List </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                            <i class="bx bx-spreadsheet"></i> <span data-key="t-multi-level">Need Assessment</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarMultilevel">
                            <ul class="nav nav-sm flex-column">
                                
                                <li class="nav-item">
                                    <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> Questions
                                    </a>
                                    <div class="collapse menu-dropdown" id="sidebarAccount">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{route('need-assessment.question.create')}}" class="nav-link" data-key="t-level-2.1"> Create </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('need-assessment.question.index')}}" class="nav-link" data-key="t-level-2.1"> List </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> Responses
                                    </a>
                                    <div class="collapse menu-dropdown" id="sidebarAccount">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{route('workshop-management.trainer.create')}}" class="nav-link" data-key="t-level-2.1"> List </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> Ranges
                                    </a>
                                    <div class="collapse menu-dropdown" id="sidebarAccount">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{route('workshop-management.workshop-request.index')}}" class="nav-link" data-key="t-level-2.1"> Create </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('workshop-management.trainer.index')}}" class="nav-link" data-key="t-level-2.1"> List </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('innovation-management.innovation.index')}}" class="nav-link" data-key="t-level-2.1">
                            <i class=" bx bx-bulb"></i> <span data-key="t-multi-level">Innovations</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                            <i class="bx bx-purchase-tag-alt"></i> <span data-key="t-multi-level">Categories</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarMultilevel">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{route('category-management.create')}}" class="nav-link" data-key="t-level-2.1"> Create </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('category-management.list')}}" class="nav-link" data-key="t-level-2.1">  List </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                            <i class="bx bxl-chrome"></i> <span data-key="t-multi-level">CMS</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarMultilevel">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" data-key="t-level-2.1"> Home Page </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" data-key="t-level-2.1">  Courses Page </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" data-key="t-level-2.1">  Contact Page </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                            <i class="bx bx-bar-chart-square"></i> <span data-key="t-multi-level">Reporting</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarMultilevel">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" data-key="t-level-2.1"> Course </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" data-key="t-level-2.1">  Susbcription </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" data-key="t-level-2.1">  User </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    

                </ul>
            </div>
            <!-- Sidebar -->
        </div>

        <div class="sidebar-background"></div>
    </div>