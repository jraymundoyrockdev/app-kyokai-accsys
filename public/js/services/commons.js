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
            '401': 'Unauthorized',
            '422': 'Validation Error'
        };

        var defaultErrorMessage = 'Aww something went wrong :(';
        var defaultSuccessMessage = 'Aww yeah! :)';

        this.popUp = function (code, type, message) {

            if (type == 'error') {
                message = (!message) ? defaultErrorMessage : message;
                toastr.error(statusCodes[code], message);
            }

            if (type == 'success') {
                message = (!message) ? defaultSuccessMessage : message;
                toastr.success(statusCodes[code], message);
            }
        }
    }]);