<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="nav-wrap">
        <div class="mobile-only-brand pull-left">
            <div class="nav-header pull-left">
                <div class="logo-wrap">
                    <a href="#">
                        <img class="brand-img" src="{{asset('dist/img/brand.png')}}" alt="brand"/>
                        <span class="brand-text"><img  src="{{asset('dist/img/brand.png')}}" alt="brand" style="width:200px;"/></span>
                    </a>
                </div>
            </div>
            <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="ti-align-left"></i></a>
            <!--<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>-->
            <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="ti-more"></i></a>
        </div>
        <!-- Left Sidebar Menu -->
        <div class="fixed-sidebar-left">
            <ul class="nav navbar-nav side-nav nicescroll-bar">
                <li class="navigation-header">
                    <span>Masters</span>
                    <hr/>
                </li>
                <li>
                    <a class="active" href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="ti-dashboard mr-20"></i><span class="right-nav-text">System</span></div><div class="pull-right"><i class="ti-angle-down"></i></div><div class="clearfix"></div></a>
                    <ul id="dashboard_dr" class="collapse collapse-level-1">
                        <li>
                            <a class="active-page" href="#">Change Working Year</a>
                        </li>
                        <li>
                            <a href="#">Configure Users</a>
                        </li>
                        <li>
                            <a href="#">Change Password</a>
                        </li>
                        <li>
                            <a href="#">Change User</a>
                        </li>
                        <li>
                            <a href="#">Change Item Rate</a>
                        </li>
                        <li>
                            <a href="#">Hotel Details</a>
                        </li>
                        <li>
                            <a href="#">Settings</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo e(csrf_field()); ?>

                            </form>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="active" href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="ti-dashboard mr-20"></i><span class="right-nav-text">Room Masters</span></div><div class="pull-right"><i class="ti-angle-down"></i></div><div class="clearfix"></div></a>
                    <ul id="dashboard_dr" class="collapse collapse-level-1">
                        <li>
                            <a href="/tariffs/create">Tariff Master</a>
                        </li>
                        <li>
                            <a href="/roomtypes/create">Room Type Master</a>
                        </li>
                        <li>
                            <a href="/rooms/create">Room Number Master</a>
                        </li>
                        <li>
                            <a href="/roomstatus/create">Room Status Master</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><div class="pull-left"><i class="ti-shopping-cart  mr-20"></i><span class="right-nav-text">Account Master</span></div><div class="pull-right"><i class="ti-angle-down"></i></div><div class="clearfix"></div></a>
                    <ul id="ecom_dr" class="collapse collapse-level-1">
                        <li>
                            <a href="/ledgers/">Ledger Master</a>
                        </li>
                        <li>
                            <a href="/ledgergroups/">Ledger Group Master</a>
                        </li>
                        <li>
                            <a href="/designations/">Designation Master</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr"><div class="pull-left"><i class="ti-image mr-20"></i><span class="right-nav-text">Food Masters</span></div><div class="pull-right"><i class="ti-angle-down"></i></div><div class="clearfix"></div></a>
                    <ul id="app_dr" class="collapse collapse-level-1">
                        <li>
                            <a href="#">Group Master</a>
                        </li>
                        <li>
                            <a href="#">Item Master</a>
                        </li>
                        <li>
                            <a href="#">Table Master</a>
                        </li>
                        <li>
                            <a href="#">Master Material Group</a>
                        </li>
                        <li>
                            <a href="#">Location Masters</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#comp_dr"><div class="pull-left"><i class="ti-check-box  mr-20"></i><span class="right-nav-text">General Masters</span></div><div class="pull-right"><i class="ti-angle-down "></i></div><div class="clearfix"></div></a>
                    <ul id="comp_dr" class="collapse collapse-level-1">
                        <li>
                            <a href="#">Purpose Master</a>
                        </li>
                        <li>
                            <a href="#">City Master</a>
                        </li>
                        <li>
                            <a href="#">State Master</a>
                        </li>
                        <li>
                            <a href="#">Nationality Master</a>
                        </li>
                        <li>
                            <a href="#">Hall Master</a>
                        </li>
                        <li>
                            <a href="#">Function Master</a>
                        </li>
                        <li>
                            <a href="#">Instruction Master</a>
                        </li>
                        <li>
                            <a href="#">Reason Master</a>
                        </li>
                        <li>
                            <a href="#">Special Note Master</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>