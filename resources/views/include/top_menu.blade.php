<nav class="navbar navbar-inverse navbar-fixed-top">
    <ul class="nav navbar-right top-nav pull-right">
        <li class="dropdown auth-drp">
            <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="{{asset('dist/img/user1.png')}}" alt="user_auth" class="user-auth-img img-circle"><span class="user-online-status"></span></a>
            <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                <li>
                    <a href="profile.html"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
                </li>
                <li class="divider"></li>
                <li>
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
                </li>
            </ul>
        </li>
    </ul>
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
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#auth_dr">Property<div class="pull-right"><i class="ti-angle-down "></i></div><div class="clearfix"></div></a>
                            <ul id="auth_dr" class="collapse collapse-level-2 dr-change-pos">
                                <li>
                                    <a href="/taxes/">Hotel Information</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#auth_dr">Settings<div class="pull-right"><i class="ti-angle-down "></i></div><div class="clearfix"></div></a>
                            <ul id="auth_dr" class="collapse collapse-level-2 dr-change-pos">
                                <li>
                                    <a href="/taxes/">Taxes</a>
                                </li>
                                <li>
                                    <a href="">Email Accounts</a>
                                </li>
                                <li>
                                    <a href="">SMS</a>
                                </li>
                                <li>
                                    <a class="active-page" href="#">Change Working Year</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#comp_dr"><div class="pull-left"> <span>General</span></div><div class="pull-right"><i class="ti-angle-down "></i></div><div class="clearfix"></div></a>
                            <ul id="auth_dr" class="collapse collapse-level-2 dr-change-pos">
                                <li>
                                <a href="/purpose/">Purpose Master</a>
                                </li>
                                <li>
                                    <a href="/function/">Function Master</a>
                                </li>
                                <li>
                                    <a href="/instruction/">Instruction Master</a>
                                </li>
                                <li>
                                    <a href="/reason/">Reason Master</a>
                                </li>
                                <li>
                                    <a href="/note/">Special Note Master</a>
                                </li>
                            </ul>
                        </li>    
                        <li>
                            <a href="#">Change Password</a>
                        </li>
                        <li>
                            <a href="#">Change User</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="active" href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="ti-dashboard mr-20"></i><span class="right-nav-text">Room</span></div><div class="pull-right"><i class="ti-angle-down"></i></div><div class="clearfix"></div></a>
                    <ul id="dashboard_dr" class="collapse collapse-level-1">
                        <li>
                            <a href="/amenity/">Amenities</a>
                        </li>
                        <li>
                            <a href="/tariffs/create">Room Master</a>
                        </li>
                        <li>
                            <a href="/roomtypes/create">Room Type Master</a>
                        </li>
                        <li>
                            <a href="/roomstatus/create">Room Status Master</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="active" href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="ti-dashboard mr-20"></i><span class="right-nav-text">House Keeping</span></div><div class="pull-right"><i class="ti-angle-down"></i></div><div class="clearfix"></div></a>
                    <ul id="dashboard_dr" class="collapse collapse-level-1">
                        <!--<li>
                            <a href="/housekeepers/">House Keepers</a>
                        </li>
                         <li>
                            <a href="">Unit</a>
                        </li>-->
                         <li>
                            <a href="/hkstatus/">Status</a>
                        </li>
                        <li>
                            <a href="/remarks/">Remarks</a>
                        </li>
                    </ul>
                </li>    
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><div class="pull-left"><i class="ti-shopping-cart  mr-20"></i><span class="right-nav-text">Account</span></div><div class="pull-right"><i class="ti-angle-down"></i></div><div class="clearfix"></div></a>
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
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><div class="pull-left"><i class="ti-shopping-cart  mr-20"></i><span class="right-nav-text">Masters</span></div><div class="pull-right"><i class="ti-angle-down"></i></div><div class="clearfix"></div></a>
                    <ul id="ecom_dr" class="collapse collapse-level-1">
                        <li>
                            <a href="/extracharges/">Extra Charges</a>
                        </li>
                        <li>
                            <a href="/discount/">Discount Master</a>
                        </li>
                        <li>
                            <a href="/identity/">Identity Type</a>
                        </li>
                        <li>
                            <a href="/transmode/">Transportation Mode</a>
                        </li>
                        <li>
                            <a href="/reservetype/">Reservation Type</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- <div id="mobile_only_nav" class="mobile-only-nav">
                    <ul class="nav navbar-right top-nav">
                        <li class="dropdown auth-drp">
                            <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="dist/img/user1.png" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
                            <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                                <li>
                                    <a href="profile.html"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
                                </li>
                                <li>
                                    <a href="#"><i class="zmdi zmdi-card"></i><span>my balance</span></a>
                                </li>
                                <li>
                                    <a href="inbox.html"><i class="zmdi zmdi-email"></i><span>Inbox</span></a>
                                </li>
                                <li>
                                    <a href="#"><i class="zmdi zmdi-settings"></i><span>Settings</span></a>
                                </li>
                                <li class="divider"></li>
                                <li class="sub-menu show-on-hover">
                                    <a href="#" class="dropdown-toggle pr-0 level-2-drp"><i class="zmdi zmdi-check text-success"></i> available</a>
                                    <ul class="dropdown-menu open-left-side">
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-check text-success"></i><span>available</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-circle-o text-warning"></i><span>busy</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-minus-circle-outline text-danger"></i><span>offline</span></a>
                                        </li>
                                    </ul>   
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
                                </li>
                            </ul>
                        </li>
                    </sul>
        </div>   -->          
    </div>
</nav>