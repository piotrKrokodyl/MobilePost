app.controller('ParcelordersCtrl', ['$scope', '$resource', function ($scope, $resource) {
    var r = $resource('/api/v1/parcelorders.json', {}, {
    });
    $scope.data = r.query();
}]);

app.controller('LoginCtrl', ['$scope', '$location', 'User', function ($scope, $location, User) {
    $scope.loginFailed = false;
    $scope.login = function () {
        User.login($scope.username, $scope.password).then(function (user) {
            $location.path('/');
        }, function () {
            $scope.loginFailed = true;
        });
    };
}]);

app.controller('HomeCtrl', ['$scope', '$location', 'User', function ($scope, $location, User) {
    $scope.init = function () {
        // Scope init
        console.log('// Scope init');
        return User.getCurrentUser().then(function (user) {
            console.log('user');
            console.log(user);
            $location.path('/parcelorders');
        }, function () {
            console.log('nouser');
            $location.path('/login');
        });
    };
    $scope.init();
}]);
