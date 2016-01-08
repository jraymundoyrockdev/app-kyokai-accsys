<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>Name</th>
        <th>Tithes</th>
        <th>Offering</th>
        <th>Special Fund</th>
        <th class="text-center">TOTAL</th>
        <th class="text-center">Action</th>
    </tr>
    </thead>
    <tbody>
    <tr ng-repeat="member in incomeService.member_fund_total">
        <td><a data-toggle="tab" href="#contact-1" class="client-link"><% member.member %></a></td>
        <td><% member.tithes | number%></td>
        <td><% member.offering | number%></td>
        <td><% member.others | number%></td>
        <td class="text-center"><strong><% member.total | number%></strong></td>
        <td class="text-center">
            <button class="btn btn-danger btn-xs demo3"
                    ng-click="removeMember(member.income_service_id, member.member_id)">Remove
            </button>
        </td>
    </tr>
    </tbody>
</table>
