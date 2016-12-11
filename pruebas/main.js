// Creación del módulo
var angularRoutingApp = angular.module('angularRoutingApp', ['ngRoute']);

// Configuración de las rutas
angularRoutingApp.config(function($routeProvider) {

    $routeProvider
        .when('/', {
            templateUrl : 'home.html',
            controller  : 'mainController'
        })
        .when('/acerca', {
            templateUrl : 'acerca.html',
            controller  : 'aboutController'
        })
        .when('/contacto', {
            templateUrl : 'contacto.html',
            controller  : 'contactController'
        })
        .otherwise({
            redirectTo: '/'
        });
})
.controller('mainController', function($scope) {
    $scope.message = 'Hola, Mundo!';
})
.controller('aboutController', function($scope) {
    $scope.message = 'Esta es la página "Acerca de"';
})
.controller('contactController', function($scope) {
    $scope.message = 'Esta es la página de "Contacto", aquí podemos poner un formulario';
})