<div ng-repeat="fund in incomeService.funds_structure">

    <h5 class="font-bold text-muted"><% fund.name %></h5>

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

    <hr>

</div>