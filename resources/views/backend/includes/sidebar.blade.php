<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                @lang('menus.backend.sidebar.general')
            </li>
            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Route::is('admin/dashboard'))
                }}" href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    @lang('menus.backend.sidebar.dashboard')
                </a>
            </li>


            
            <li class= "nav-item">
            <a class="nav-link {{
                    active_class(Route::is('reports*'))
                }}" href="{{ route('reports.report.index') }}">
                         <i class="nav-icon fas fa-book"></i>
                    Reports                </a>
            </li>

            <li class= "nav-item">
            <a class="nav-link {{
                    active_class(Route::is('class_registers*'))
                }}" href="{{ route('class_registers.class_register.index') }}">
                         <i class="nav-icon fas fa-user-graduate"></i>
                    Enrollment List                </a>
            </li>


            <li class= "nav-item">
            <a class="nav-link {{
                    active_class(Route::is('uploads*'))
                }}" href="{{ route('uploads.index') }}">
                         <i class="nav-icon fas fa-edit"></i>
                    Uploads                </a>
            </li>

            <li class= "nav-item">
            <a class="nav-link {{
                    active_class(Route::is('schools*'))
                }}" href="{{ route('schools.school.index') }}">
                         <i class="nav-icon fas fa-school"></i>
                    MIA Centre               </a>
            </li>

            @if ($logged_in_user->isAdmin())
                <li class="nav-title">
                    @lang('menus.backend.sidebar.system')
                </li>

                <li class="nav-item nav-dropdown {{
                    active_class(Route::is('admin/auth*'), 'open')
                }}">
                    <a class="nav-link nav-dropdown-toggle {{
                        active_class(Route::is('admin/auth*'))
                    }}" href="#">
                        <i class="nav-icon far fa-user"></i>
                        @lang('menus.backend.access.title')

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Route::is('admin/auth/user*'))
                            }}" href="{{ route('admin.auth.user.index') }}">
                                @lang('labels.backend.access.users.management')

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Route::is('admin/auth/role*'))
                            }}" href="{{ route('admin.auth.role.index') }}">
                                @lang('labels.backend.access.roles.management')
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->
