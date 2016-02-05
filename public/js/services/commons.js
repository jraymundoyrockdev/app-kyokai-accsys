angular.module('commons', [])
    .service('ValidatorErrorService', [function () {

        this.mapErrors = function (errordata) {
            var errorList = [];

            for (var name in errordata) {
                errorList[name] = errordata[name].shift();
            }

            return errorList;
        };
    }]);