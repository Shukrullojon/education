<div class="aside-menu flex-column-fluid">
    <!--begin::Aside Menu-->
    <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
         data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
         data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
         data-kt-scroll-offset="0">
        <!--begin::Menu-->
        <div
            class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
            id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">

            <div data-kt-menu-trigger="click"
                 class="menu-item {{ (Request::is('home')) ? 'here show' : '' }} menu-accordion">
									<span class="menu-link">
										<i class="fa fa-home" style="margin-right: 7px"></i>
										<span class="menu-title">Home</span>
										<span class="menu-arrow"></span>
									</span>
                <div class="menu-sub menu-sub-accordion menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is('home') ? 'active' : '' }}" href="{{ route('home') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                            <span class="menu-title">Home</span>
                        </a>
                    </div>

                </div>
            </div>

            <div data-kt-menu-trigger="click"
                 class="menu-item {{ (Request::is('room*') or Request::is('task-room*')) ? 'here show' : '' }} menu-accordion">
                <span class="menu-link">
										<i class="fa fa-inbox" style="margin-right: 7px"></i>
										<span class="menu-title">Rooms</span>
										<span class="menu-arrow"></span>
									</span>
                <div class="menu-sub menu-sub-accordion menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is('room*') ? 'active' : '' }}"
                           href="{{ route('room.index') }}">
												<span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>

												</span>
                            <span class="menu-title"><i class="fa fa-inbox" style="margin-right: 7px"></i>Room</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ Request::is('task-room*') ? 'active' : '' }}"
                           href="{{ route('task-room.index') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                            <span class="menu-title"><i class="fa fa-tasks" style="margin-right: 7px"></i>Task</span>
                        </a>
                    </div>

                </div>
            </div>

            <div data-kt-menu-trigger="click"
                 class="menu-item {{ (Request::is('cource*') or Request::is('cource*')) ? 'here show' : '' }} menu-accordion">
                <span class="menu-link">
                    <i class="fa fa-database" style="margin-right: 7px"></i>
                    <span class="menu-title">Cources</span>
                    <span class="menu-arrow"></span>
				</span>
                <div class="menu-sub menu-sub-accordion menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is('cource/create') ? 'active' : '' }}"
                           href="{{ route('cource.create') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                            <span class="menu-title"><i class="fa fa-plus"
                                                        style="margin-right: 7px"></i>Add</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ (Request::is('cource*') and !Request::is('cource/create')) ? 'active' : '' }}"
                           href="{{ route('cource.index') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                            <span class="menu-title"><i class="fa fa-database"
                                                        style="margin-right: 7px"></i> Cource</span>
                        </a>
                    </div>
                </div>
            </div>

            <div data-kt-menu-trigger="click"
                 class="menu-item {{ (Request::is('group*') or Request::is('group*')) ? 'here show' : '' }} menu-accordion">
                <span class="menu-link">
										<i class="fa fa-layer-group" style="margin-right: 7px"></i>
										<span class="menu-title">Groups</span>
										<span class="menu-arrow"></span>
									</span>
                <div class="menu-sub menu-sub-accordion menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is('group*') ? 'active' : '' }}"
                           href="{{ route('group.index') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                            <span class="menu-title">Group</span>
                        </a>
                    </div>
                </div>
            </div>

            <div data-kt-menu-trigger="click"
                 class="menu-item {{ (Request::is('student*') or Request::is('event*')) ? 'here show' : '' }} menu-accordion">
                <span class="menu-link">
										<i class="fa fa-user-graduate" style="margin-right: 7px"></i>
										<span class="menu-title">Students</span>
										<span class="menu-arrow"></span>
									</span>
                <div class="menu-sub menu-sub-accordion menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is('student/create') ? 'active' : '' }}"
                           href="{{ route('studentCreate') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">➕ Add</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ Request::is('student/waiting') ? 'active' : '' }}"
                           href="{{ route('studentWaiting') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">⏳ Waiting</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ Request::is('student/active') ? 'active' : '' }}"
                           href="{{ route('studentActive') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">✅ Active</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ Request::is('student/all') ? 'active' : '' }}"
                           href="{{ route('studentAll') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">👨‍🎓 All</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ Request::is('student/archive') ? 'active' : '' }}"
                           href="{{ route('studentArchive') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">📦 Arxive</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ Request::is('event*') ? 'active' : '' }}"
                           href="{{ route('event.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">✨ Event</span>
                        </a>
                    </div>
                </div>
            </div>

            <div data-kt-menu-trigger="click"
                 class="menu-item {{ (Request::is('testresults*') or Request::is('pc*') or Request::is('pt*')) ? 'here show' : '' }} menu-accordion">
                <span class="menu-link">
                    <i class="fa fa-question-circle" style="margin-right: 7px"></i>
                    <span class="menu-title">Placement</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is('testresults/all') ? 'active' : '' }}"
                           href="{{ route('ptResult') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">📜 Results</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ Request::is('pc*') ? 'active' : '' }}" href="{{ route('pc.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">✨ Category</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is('pt*') ? 'active' : '' }}" href="{{ route('pt.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">📚 Test</span>
                        </a>
                    </div>
                </div>
            </div>

            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <span class="menu-link">
                    <i class="fa fa-donate" style="margin-right: 7px"></i>
                    <span class="menu-title">Salary</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link" href="">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Active</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link " href="">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Archive</span>
                        </a>
                    </div>
                </div>
            </div>

            <div data-kt-menu-trigger="click"
                 class="menu-item {{ (Request::is('task*') or Request::is('task*')) ? 'here show' : '' }} menu-accordion">
                <span class="menu-link">
										<i class="fa fa-tasks" style="margin-right: 7px"></i>
										<span class="menu-title">Tasks</span>
										<span class="menu-arrow"></span>
									</span>
                <div class="menu-sub menu-sub-accordion menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is('task*') ? 'active' : '' }}"
                           href="{{ route('task.index') }}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                            <span class="menu-title">Task</span>
                        </a>
                    </div>
                </div>
            </div>

            <div data-kt-menu-trigger="click"
                 class="menu-item {{ (Request::is('roles*') or Request::is('users*') or Request::is('permissions*') or Request::is('tags*') or Request::is('filial*')) ? 'here show' : '' }}  menu-accordion">
									<span class="menu-link">
										<i class="fa fa-cog" style="margin-right: 7px"></i>
										<span class="menu-title">Settings</span>
										<span class="menu-arrow"></span>
									</span>
                <div class="menu-sub menu-sub-accordion menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is('users*') ? 'active' : '' }}"
                           href="{{ route('users.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title"><i class="fa fa-users" style="margin-right: 7px"></i>Users</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ Request::is('roles*') ? 'active' : '' }}"
                           href="{{ route('roles.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title"><i class="fa fa-user-lock"
                                                        style="margin-right: 7px"></i>Roles</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ Request::is('permissions*') ? 'active' : '' }}"
                           href="{{ route('permissions.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title"><i class="fa fa-key"
                                                        style="margin-right: 7px"></i>Permissions</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ Request::is('filial*') ? 'active' : '' }}"
                           href="{{ route('filial.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title"><i class="fa fa-building"
                                                        style="margin-right: 7px"></i> Filial</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
