angular.module('commons', [])
    .service('ValidatorErrorService', [function () {

        this.mapErrors = function (errordata) {
            var errorList = [];

            for (var name in errordata) {
                errorList[name] = errordata[name].shift();
            }

            return errorList;
        };
    }])
    .service('KyokaiHelpers', [function () {

        this.mapMonths = function (month) {

            var months = {
                '01': 'January',
                '02': 'February',
                '03': 'March',
                '04': 'April',
                '05': 'May',
                '06': 'June',
                '07': 'July',
                '08': 'August',
                '09': 'September',
                '10': 'October',
                '11': 'November',
                '12': 'December',
            };

            return months[month];
        };
    }])
    .service('toastBoxMsg', [function () {

        var statusCodes = {
            '200': 'Success',
            '401': 'Unauthorized',
            '422': 'Validation Error',
            '500': 'Server Error'
        };

        var defaultErrorMessage = 'Aww something went wrong :(';
        var defaultSuccessMessage = 'Aww yeah! :)';

        this.popUp = function (type, data, code, message) {


            if (code == 401 && angular.isUndefined(message)) {
                message = this._isTokenExpired(data);
            }

            if (type == 'error') {
                message = (!message) ? defaultErrorMessage : message;
                toastr.error(message, statusCodes[code]);
            }

            if (type == 'success') {
                message = (!message) ? defaultSuccessMessage : message;
                toastr.success(message, statusCodes[code]);
            }
        };

        this._isTokenExpired = function (data) {

            if (data.error == 'token_expired' || data.error == 'token_invalid') {
                return 'Token expired/invalid please Login again';
            }

            return false;
        };
    }])/*
 .service('IncomeServiceDashboardApp', ['$http', function ($http) {

 this.getTotalPerMonth = function (yearToday) {

 $http.defaults.headers.common['Authorization'] = 'Bearer         ' + localStorage.getItem('userJWT'); // jshint ignore:line

 return $http.get(BASE + 'income-services/total/' + yearToday).then(handleSuccess, handleError('Error getting all users'));

 };

 // private functions

 function handleSuccess(res) {
 return res.data;
 }

 function handleError(error) {
 return function () {
 return {success: false, message: error};
 };
 }

 }])*/;

