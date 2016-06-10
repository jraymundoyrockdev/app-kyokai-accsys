<div class="row border-bottom" ng-app="kyokaiHeader" id="headerModule" ng-controller="kyokaiHeaderCtrl"
     ng-init="setHeader()">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message">Kyokai Accouting System</span>
            </li>

            <li class="dropdown" ng-if="isKyokaiAccountant">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-wrench"></i> Admin Settings
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li>
                        <div class="dropdown-messages-box">

                            <a href="/admin/members" class="pull-left">
                                <div class="media-body">
                                    <i class="fa fa-users fa-lg"></i>
                                    <strong>Members</strong> <br>
                                    <small class="text-muted">Manage church members</small>
                                </div>
                            </a>

                            <a href="/admin/users" class="pull-left">
                                <div class="media-body">
                                    <i class="fa fa-users fa-lg"></i>
                                    <strong>Users Account</strong> <br>
                                    <small class="text-muted">Manage Users Accounts and Information</small>
                                </div>
                            </a>

                            <a href="/admin/roles" class="pull-left">
                                <div class="media-body">
                                    <i class="fa fa-users fa-lg"></i>
                                    <strong>User Roles</strong> <br>
                                    <small class="text-muted">Shows All types of Roles in the system</small>
                                </div>
                            </a>

                            <a href="/admin/ministry" class="pull-left">
                                <div class="media-body">
                                    <i class="fa fa-users fa-lg"></i>
                                    <strong>Ministries</strong> <br>
                                    <small class="text-muted">Manage Ministries</small>
                                </div>
                            </a>

                            <a href="/admin/denominations" class="pull-left">
                                <div class="media-body">
                                    <i class="fa fa-users fa-lg"></i>
                                    <strong>Denomination</strong> <br>
                                    <small class="text-muted">Manage Money Denomination</small>
                                </div>
                            </a>

                            <a href="/admin/services" class="pull-left">
                                <div class="media-body">
                                    <i class="fa fa-users fa-lg"></i>
                                    <strong>Services</strong> <br>
                                    <small class="text-muted">Manage the all type of services</small>
                                </div>
                            </a>

                            <a href="/admin/funds" class="pull-left">
                                <div class="media-body">
                                    <i class="fa fa-users fa-lg"></i>
                                    <strong>Service Funds</strong> <br>
                                    <small class="text-muted">Manage funds on a service</small>
                                </div>
                            </a>

                        </div>
                    </li>
                </ul>
            </li>
            <li>
                <a ng-click="logOut()">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
            </li>
        </ul>
    </nav>
</div>