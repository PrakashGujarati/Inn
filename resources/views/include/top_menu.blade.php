<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="nav-wrap">
        <div class="mobile-only-brand pull-left">
            <div class="nav-header pull-left">
                <div class="logo-wrap">
                    <a href="index-2.html">
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
                            <a class="active-page" href="index-2.html">Change Working Year</a>
                        </li>
                        <li>
                            <a href="index2.html">Configure Users</a>
                        </li>
                        <li>
                            <a href="profile.html">Change Password</a>
                        </li>
                        <li>
                            <a href="profile.html">Change User</a>
                        </li>
                        <li>
                            <a href="index2.html">Change Item Rate</a>
                        </li>
                        <li>
                            <a href="profile.html">Hotel Details</a>
                        </li>
                        <li>
                            <a href="profile.html">Settings</a>
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
                            <a href="/tariffs">Tariff Master</a>
                        </li>
                        <li>
                            <a href="/roomtypes">Room Type Master</a>
                        </li>
                        <li>
                            <a href="/rooms">Room Service Master</a>
                        </li>
                        <li>
                            <a href="/roomstatus">Room Status Master</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><div class="pull-left"><i class="ti-shopping-cart  mr-20"></i><span class="right-nav-text">Account Master</span></div><div class="pull-right"><i class="ti-angle-down"></i></div><div class="clearfix"></div></a>
                    <ul id="ecom_dr" class="collapse collapse-level-1">
                        <li>
                            <a href="e-commerce.html">Ledger Master</a>
                        </li>
                        <li>
                            <a href="product.html">Ledger Group Master</a>
                        </li>
                        <li>
                            <a href="product-detail.html">Designation Master</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr"><div class="pull-left"><i class="ti-image mr-20"></i><span class="right-nav-text">Food Masters</span></div><div class="pull-right"><i class="ti-angle-down"></i></div><div class="clearfix"></div></a>
                    <ul id="app_dr" class="collapse collapse-level-1">
                        <li>
                            <a href="chats.html">Group Master</a>
                        </li>
                        <li>
                            <a href="calendar.html">Item Master</a>
                        </li>
                        <li>
                            <a href="weather.html">Table Master</a>
                        </li>
                        <li>
                            <a href="file-manager.html">Master Material Group</a>
                        </li>
                        <li>
                            <a href="todo-tasklist.html">Location Masters</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#comp_dr"><div class="pull-left"><i class="ti-check-box  mr-20"></i><span class="right-nav-text">General Masters</span></div><div class="pull-right"><i class="ti-angle-down "></i></div><div class="clearfix"></div></a>
                    <ul id="comp_dr" class="collapse collapse-level-1">
                        <li>
                            <a href="todo-tasklist.html">Purpose Master</a>
                        </li>
                        <li>
                            <a href="todo-tasklist.html">City Master</a>
                        </li>
                        <li>
                            <a href="todo-tasklist.html">State Master</a>
                        </li>
                        <li>
                            <a href="todo-tasklist.html">Nationality Master</a>
                        </li>
                        <li>
                            <a href="todo-tasklist.html">Hall Master</a>
                        </li>
                        <li>
                            <a href="todo-tasklist.html">Function Master</a>
                        </li>
                        <li>
                            <a href="todo-tasklist.html">Instruction Master</a>
                        </li>
                        <li>
                            <a href="todo-tasklist.html">Reason Master</a>
                        </li>
                        <li>
                            <a href="todo-tasklist.html">Special Note Master</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>