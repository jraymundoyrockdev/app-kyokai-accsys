<div id="module2" ng-app="kyokaiNavigation" ng-controller="kyokaiNavigationCtrl" ng-init="setNavigation()">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <span><img alt="image" class="img-circle" src="images/profile_small.jpg"/></span>

                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs">
                                    <strong class="font-bold">DavidWilliams</strong>
                                </span>
                                <span class="text-muted text-xs block">
                                    Art Director <b class="caret"></b>
                                </span>
                            </span>
                        </a>

                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="/auth/logout">Logout</a></li>
                        </ul>

                    </div>
                    <div class="logo-element">
                        KA+
                    </div>
                </li>


                <li ng-repeat="module in moduleList">
                    <a ng-href="<%module.link%>">
                        <i class="<%module.icon%>"></i>
                        <span class="nav-label"><%module.name%></span>
                        <span class="fa arrow" ng-hide="module.child | isEmpty"></span>
                    </a>

                    <ul class="nav nav-second-level collapse" ng-if="!(module.child | isEmpty)">
                        <li ng-repeat="sub in module.child">
                            <a ng-href="<%sub.link%>"><%sub.name%></a>
                        </li>
                    </ul>

                </li>

            </ul>

        </div>
    </nav>

</div>