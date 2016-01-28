<div ng-repeat="fund in incomeService.funds_structure">

    <div ng-if="fund.name!='Ministry Funds'">
        <h5 class="font-bold text-muted"><% fund.name %></h5>
    </div>

    <div ng-if="fund.name=='Ministry Funds'">
        <a data-toggle="collapse" href="#<% fund.fund_id %>" aria-expanded="true">
            <h5 class="font-bold text-muted"><% fund.name %>
                <i class="fa fa-plus-square" ng-click="toggleMinistriesMemberFund(true)"
                   ng-show="!showMinistriesMemberFund"></i>
                <i class="fa fa-minus-square" ng-click="toggleMinistriesMemberFund(false)"
                   ng-show="showMinistriesMemberFund"></i>
            </h5>
        </a>
    </div>

    <div id="<% fund.fund_id %>" ng-class="(fund.fund_id==4) ? 'collapse out' : 'collapse in'">
        <div class="form-group" ng-repeat="item in fund.item">
            <label class="col-sm-3 control-label fundStructureLabel" for="<% item.name %>"><% item.name %></label>

            <div class="col-md-9 <% item.name %>-error">

                <input type="text"
                       ng-model="item.amount"
                       ng-init="item.amount=0"
                       class="form-control text-right input-sm"
                       name="<%item.name%>">
            </div>

        </div>

    </div>
    <hr>
</div>