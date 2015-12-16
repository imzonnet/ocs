<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{route('backend.home')}}">.:[ HighMark ]:.</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> {{ current_user()->present()->fullName }} <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="{{route('backend.auth.getLogout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{route('backend.home')}}"><i class="fa fa-dashboard fa-fw"></i> {{ trans('cms.dashboard') }}</a>
                </li>
                <li>
                    <a href="{{url('/')}}"><i class="fa fa-dashboard fa-fw"></i> Visit Website</a>
                </li>
                <!-- Role & Permission -->
                @if( current_user()->hasRole(['admin']) )
                    <li>
                        <a href="{{route('backend.role.index')}}"><i class="fa fa-cogs fa-fw"></i> {{ trans('Dashboard::cms.role.index') }}<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('backend.role.index')}}"><i class="fa fa-angle-double-right fa-fw"></i>{{ trans('Dashboard::cms.role.list') }}</a>
                            </li>
                            <li>
                                <a href="{{route('backend.role.create')}}"><i class="fa fa-angle-double-right fa-fw"></i>{{ trans('Dashboard::cms.role.create') }}</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    @endif
                <!-- End Role & Permission -->
                <!-- Groups -->
                    @if( current_user()->ability(['admin'], ['customer_group.index', 'customer_group.create', 'customer_group.update', 'customer_group.delete']) )
                        <li>
                            <a href="{{route('backend.group.index')}}"><i class="fa fa-cogs fa-fw"></i> {{ trans('Dashboard::cms.group.index') }}<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('backend.group.index')}}"><i class="fa fa-angle-double-right fa-fw"></i>{{ trans('Dashboard::cms.group.list') }}</a>
                                </li>
                                <li>
                                    <a href="{{route('backend.group.create')}}"><i class="fa fa-angle-double-right fa-fw"></i>{{ trans('Dashboard::cms.group.create') }}</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    @endif
                <!-- End  Groups -->
                <!-- Organizes -->
                    @if( current_user()->ability(['admin'], ['customer_organize.index', 'customer_organize.create', 'customer_organize.update', 'customer_organize.delete']) )
                        <li>
                            <a href="{{route('backend.organize.index')}}"><i class="fa fa-cogs fa-fw"></i> {{ trans('Dashboard::cms.organize.index') }}<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('backend.organize.index')}}"><i class="fa fa-angle-double-right fa-fw"></i>{{ trans('Dashboard::cms.organize.list') }}</a>
                                </li>
                                <li>
                                    <a href="{{route('backend.organize.create')}}"><i class="fa fa-angle-double-right fa-fw"></i>{{ trans('Dashboard::cms.organize.create') }}</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    @endif
                <!-- End Organizes -->
                <!-- User -->
                @if( current_user()->ability(['admin'], ['user.index', 'user.create', 'user.update', 'user.delete']) )
                <li>
                    <a href="{{route('backend.user.index')}}"><i class="fa fa-user fa-fw"></i> {{ trans('Dashboard::cms.user.index') }}<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('backend.user.index')}}"><i class="fa fa-angle-double-right fa-fw"></i>{{ trans('Dashboard::cms.user.list') }}</a>
                        </li>
                        <li>
                            <a href="{{route('backend.user.create')}}"><i class="fa fa-angle-double-right fa-fw"></i>{{ trans('Dashboard::cms.user.create') }}</a>
                        </li>
                        <li>
                            <a href="{{route('backend.country.index')}}"><i class="fa fa-globe fa-fw"></i>{{ trans('Dashboard::cms.country.index') }}</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                @endif
                <!-- OCS Product -->
                @if( current_user()->ability(['admin'], ['ocs.product.index', 'ocs.product.create', 'ocs.product.update', 'ocs.product.delete']) )
                <li>
                    <a href="{{route('backend.ocs.product.index')}}"><i class="fa fa-user fa-fw"></i> {{ trans('OCS::cms.product.index') }}<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('backend.ocs.product.index')}}"><i class="fa fa-angle-double-right fa-fw"></i>{{ trans('OCS::cms.product.list') }}</a>
                        </li>
                        <li>
                            <a href="{{route('backend.ocs.product.create')}}"><i class="fa fa-angle-double-right fa-fw"></i>{{ trans('OCS::cms.product.create') }}</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                @endif
                <!-- OCS Service -->
                @if( current_user()->ability(['admin'], ['ocs.service.index', 'ocs.service.create', 'ocs.service.update', 'ocs.service.delete']) )
                <li>
                    <a href="{{route('backend.ocs.service.index')}}"><i class="fa fa-user fa-fw"></i> {{ trans('OCS::cms.service.index') }}<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('backend.ocs.service.index')}}"><i class="fa fa-angle-double-right fa-fw"></i>{{ trans('OCS::cms.service.list') }}</a>
                        </li>
                        <li>
                            <a href="{{route('backend.ocs.service.create')}}"><i class="fa fa-angle-double-right fa-fw"></i>{{ trans('OCS::cms.service.create') }}</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                @endif
                <!-- OCS Service -->
                @if( current_user()->ability(['admin'], ['ocs.order.index', 'ocs.order.create', 'ocs.order.update', 'ocs.order.delete']) )
                <li>
                    <a href="{{route('backend.ocs.order.index')}}"><i class="fa fa-user fa-fw"></i> {{ trans('OCS::cms.order.index') }}<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('backend.ocs.order.index')}}"><i class="fa fa-angle-double-right fa-fw"></i>{{ trans('OCS::cms.order.list') }}</a>
                        </li>
                        <li>
                            <a href="{{route('backend.ocs.order.create')}}"><i class="fa fa-angle-double-right fa-fw"></i>{{ trans('OCS::cms.order.create') }}</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                @endif
                <!-- OCS Status -->
                @if( current_user()->ability(['admin'], ['ocs.order.index', 'ocs.order.create', 'ocs.order.update', 'ocs.order.delete']) )
                <li>
                    <a href="{{route('backend.ocs.status.index')}}"><i class="fa fa-user fa-fw"></i> {{ trans('OCS::cms.status.index') }}<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('backend.ocs.status.index')}}"><i class="fa fa-angle-double-right fa-fw"></i>{{ trans('OCS::cms.status.list') }}</a>
                        </li>
                        <li>
                            <a href="{{route('backend.ocs.status.create')}}"><i class="fa fa-angle-double-right fa-fw"></i>{{ trans('OCS::cms.status.create') }}</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                @endif
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
