"use strict";
var underscore = angular.module('underscore', []);

underscore.factory('_', function() {
  return window._; // assumes underscore has already been loaded on the page
});

var HCApp = angular.module('HCApp', ['ngRoute', 'ngAnimate', 'underscore']);

HCApp.config(['$routeProvider', '$locationProvider', '$httpProvider',

	function ($routeProvider, $locationProvider, $httpProvider) {

		$locationProvider.html5Mode(true);

		$httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';

		$routeProvider.when('/', {
			templateUrl: '/wp-content/themes/angulartheme/templates/home.html',
			controller: 'HomeCtrl'
		}).when('/post/:category/:slug', {
			templateUrl: '/wp-content/themes/angulartheme/templates/post.html',
			controller: 'PostCtrl'
		}).when('/:ano/:mes/:dia', {
			templateUrl: '/wp-content/themes/angulartheme/templates/category-by-date.html',
			controller: 'CategoryByDateCtrl'
		}).when('/teste', {
			templateUrl: '/wp-content/themes/angulartheme/templates/teste.html',
			controller: 'TesteCtrl'
		}).when('/empresa', {
			templateUrl: '/wp-content/themes/angulartheme/templates/empresa.html',
			controller: 'SingleCtrl'
		}).when('/consultar/:tipo', {
			templateUrl: '/wp-content/themes/angulartheme/templates/category.html',
			controller: 'CategoryCtrl'
		}).when('/nova-oferta/:tipo', {
			templateUrl: '/wp-content/themes/angulartheme/templates/oferta-form.html',
			controller: 'FormOfertaCtrl'
		}).when('/oferta-de-venda/:slug', {
			templateUrl: '/wp-content/themes/angulartheme/templates/oferta.html',
			controller: 'PostOfertaCtrl'
		}).when('/oferta-de-compra/:slug', {
			templateUrl: '/wp-content/themes/angulartheme/templates/oferta.html',
			controller: 'PostOfertaCtrl'
		}).when('/contato', {
			templateUrl: '/wp-content/themes/angulartheme/templates/contato.html',
			controller: 'SingleContatoCtrl'
		}).otherwise({ redirectTo: '/' });
	}]);

HCApp.run(['$rootScope', 
	function ($rootScope) {
		$rootScope.myutils = {
			capitalize: function(string) {
				return string.charAt(0).toUpperCase() + string.substring(1).toLowerCase();
			}
		}
	}])