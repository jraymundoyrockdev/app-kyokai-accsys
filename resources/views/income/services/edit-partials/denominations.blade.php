{!! Form::open(['class' => 'form-horizontal', 'id' => 'denominationStructureForm']) !!}

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="col-lg-4">
        <table class="table table-hover no-margins">
            <thead>
            <tr>
                <th>Amount</th>
                <th>Piece</th>
                <th class="text-right">Total</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="(key, denomination) in incomeService.denominations_structure">
                <td><% denomination.amount %></td>
                <td>
                    <input class="form-control text-right input-sm" type="text" value="<%denomination.total%>"
                           name="denomination_<% denomination.id %>"
                           ng-keyup="
                           totalPerDenomination =  piece * denomination.amount;
                           updateDenominationObject(key, piece, 'piece');
                           updateDenominationObject(key, totalPerDenomination, 'total');
                           sumDenomination()"
                           ng-init="totalPerDenomination=denomination.total; piece = denomination.piece; sumDenomination()"
                           ng-model="piece">
                <td class="text-right"><h3><%totalPerDenomination | number%></h3></td>
            </tr>
            <tr>
                <th colspan="3" class="text-right">
                    <h1 class="no-margins"><%denominationTotal | number%></h1>
                    <small>Total Income</small>
                </th>
            </tr>
            </tbody>
        </table>

        <hr>
        <div class="col-lg-12">
            <button class="btn btn-success btn-block" type="submit">Accept Total</button>

            <button class="btn btn-success btn-block" type="button" id="saveDenominationBtn" style="display: none;"
                    ng-click="saveDenomination()">Accept Total
            </button>
        </div>
    </div>
</div>

{!! Form::close() !!}