<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="../dashboard/index.html" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <img src="../assets/images/logo-dark.svg" alt="logo image" class="logo-lg" />
                <span class="badge bg-brand-color-2 rounded-pill ms-2 theme-version">v1.0</span>
            </a>
        </div>
        {{-- <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label>Navigation</label>
                </li>
             
                    <li class="pc-item">
                        <a href="{{ route('ticket.ticket_list') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="ph-duotone ph-projector-screen-chart"></i>
                            </span>
                            <span class="pc-mtext">Ticket List</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('department.department_list') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="ph-duotone ph-projector-screen-chart"></i>
                            </span>
                            <span class="pc-mtext">Department List</span>
                        </a>
                    </li>
            



             
                    <li class="pc-item">
                        <a href="{{ route('ticket.ticket_list') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="ph-duotone ph-projector-screen-chart"></i>
                            </span>
                            <span class="pc-mtext">Ticket List</span>
                        </a>
                    </li>
              

            </ul>

        </div> --}}
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label>Navigation</label>
                </li>

                <!-- Parent Menu -->
                <li class="pc-item pc-hasmenu">
                    <a href="javascript:void(0);" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-projector-screen-chart"></i>
                        </span>
                        <span class="pc-mtext">Exam Modules</span>
                        <span class="pc-arrow">
                            <i data-feather="chevron-right"></i>
                        </span>
                    </a>

                    <!-- Submenu -->
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a href="{{ route('exam_module.list') }}" class="pc-link">
                                <span class="pc-mtext">Add Exam Module</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="javascript:void(0);" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-projector-screen-chart"></i>
                        </span>
                        <span class="pc-mtext">Writing Modules Type</span>
                        <span class="pc-arrow">
                            <i data-feather="chevron-right"></i>
                        </span>
                    </a>

                    <!-- Submenu -->
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a href="{{ route('writing_module_type.type_list') }}" class="pc-link">
                                <span class="pc-mtext">Add writing Module Type</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="javascript:void(0);" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-projector-screen-chart"></i>
                        </span>
                        <span class="pc-mtext">Listening Modules</span>
                        <span class="pc-arrow">
                            <i data-feather="chevron-right"></i>
                        </span>
                    </a>

                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a href="{{ route('listening_module.list') }}" class="pc-link">
                                <span class="pc-mtext">Add Listening Module</span>
                            </a>
                        </li>

                        <li class="pc-item">
                            <a href="{{ route('listening_answer_module.create') }}" class="pc-link">
                                <span class="pc-mtext">Add Listening Answer</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="pc-item pc-hasmenu">
                    <a href="javascript:void(0);" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-projector-screen-chart"></i>
                        </span>
                        <span class="pc-mtext">Reading Modules</span>
                        <span class="pc-arrow">
                            <i data-feather="chevron-right"></i>
                        </span>
                    </a>

                    <!-- Submenu -->
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a href="{{ route('reading_module.list') }}" class="pc-link">
                                <span class="pc-mtext">Add Reading Module</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="javascript:void(0);" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-projector-screen-chart"></i>
                        </span>
                        <span class="pc-mtext">Writing Modules</span>
                        <span class="pc-arrow">
                            <i data-feather="chevron-right"></i>
                        </span>
                    </a>

                    <!-- Submenu -->
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a href="{{ route('writing_module.list') }}" class="pc-link">
                                <span class="pc-mtext">Add Writing Module</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- <li class="pc-item pc-hasmenu">
                    <a href="javascript:void(0);" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-projector-screen-chart"></i>
                        </span>
                        <span class="pc-mtext">Management</span>
                        <span class="pc-arrow">
                            <i data-feather="chevron-right"></i>
                        </span>
                    </a>

                    <!-- Submenu -->
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a href="{{ route('ticket.ticket_list') }}" class="pc-link">
                                <span class="pc-mtext">Ticket List</span>
                            </a>
                        </li>

                        <li class="pc-item">
                            <a href="{{ route('department.department_list') }}" class="pc-link">
                                <span class="pc-mtext">Department List</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                {{-- <li class="pc-item pc-hasmenu">
            <a href="javascript:void(0);" class="pc-link">
                <span class="pc-micon">
                    <i class="ph-duotone ph-projector-screen-chart"></i>
                </span>
                <span class="pc-mtext">Management</span>
                <span class="pc-arrow">
                    <i data-feather="chevron-right"></i>
                </span>
            </a>

            <!-- Submenu -->
            <ul class="pc-submenu">
                <li class="pc-item">
                    <a href="{{ route('ticket.ticket_list') }}" class="pc-link">
                        <span class="pc-mtext">Ticket List</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="{{ route('department.department_list') }}" class="pc-link">
                        <span class="pc-mtext">Department List</span>
                    </a>
                </li>
            </ul>
        </li> --}}

            </ul>
        </div>

        <div class="card pc-user-card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <img src="../assets/images/user/avatar-1.jpg" alt="user-image"
                            class="user-avtar wid-45 rounded-circle" />
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <div class="dropdown">
                            <a href="#" class="arrow-none dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false" data-bs-offset="0,20">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 me-2">
                                        <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                                        {{-- <small>Administrator</small> --}}
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="btn btn-icon btn-link-secondary avtar">
                                            <i class="ph-duotone ph-sign-out"
                                                style="font-size: 22px; font-weight:bold;"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu">
                                <ul>

                                    <li>
                                        <a class="pc-user-links" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="ph-duotone ph-power"></i>
                                            <span>Logout</span>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
