"use strict";

HCApp.factory('postsFactory', ['$http',
	function ($htpp) {
		var postsFactory = {};

		postsFactory.getPostByCatSlug = function ($category, $postSlug) {
			return $http.get($category + '/' + $postSlug);
		}

		postsFactory.getPostsByCategory = function ($catSlug) {
			return $http.get('/category/' + $catSlug);
		};

		postsFactory.getPostsByDate = function ($ano, $mes, $dia) {
			return $http.get('/' + $ano + '/' + $mes + '/' + $dia);
		}

	}]);