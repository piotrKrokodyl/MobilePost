var app = angular.module("myApp", ['ngRoute', 'ngResource']);

app.config(['$routeProvider', function ($routeProvider) {
    $routeProvider
        .when('/parcelorders', {
            'templateUrl': '/bundles/app/partials/parcelorders.html',
            'controller': 'ParcelordersCtrl'
        })
        .when('/login', {
            'templateUrl': '/bundles/app/partials/login.html',
            'controller': 'LoginCtrl'
        })
        .otherwise({
            'template': '',
            'controller': 'HomeCtrl'
        });
}]);
