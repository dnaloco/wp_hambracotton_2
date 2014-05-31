"use strict";

HCApp.controller('TesteCtrl', ['$scope', '$http', '$sce',
	function ($scope, $http, $sce) {
		$scope.myname = "I'm the TestCtrl";

		var url = '/oferta-enviada/'; 

		$scope.renderHtml = function (html_code) {
			return $sce.trustAsHtml(html_code);
		};

		var data = {
			post_title: '2 . Testando Form-To-Post . 2',
			post_content: '2 . Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, possimus! . 2'
		};

		$http.post(url, jQuery.param(data))
		.success(function (data) {
			$scope.result = data;
		})
		.error(function (data, status) {
			$scope.data = data || "Request failed";
			$scope.status = status;
			console.log('erro');
		});


	}]);
/*---------------------------------------------------------------------------------------------------------------*/
HCApp.controller('BlogCtrl', ['$scope', '$http', '$routeParams', '$location', '_',
	function ( $scope, $http, $routeParams, $location, _ ) {
		$scope.location = $location;
		$scope.showSidebarMiddleTop = false;

		$scope.$watch('location.path()', function(newVal, oldVal) {
			if (newVal === '/') {
				$scope.showSidebarMiddleTop = true;
			} else {
				$scope.showSidebarMiddleTop = false;
			}
		}, true);

		$scope.getClass = function(path) {
			var ofertas_links = ["/consultar/venda", "/nova-oferta/venda", "/consultar/compra", "/nova-oferta/compra"];

			if ( $location.path() == path ) {
				return "highlighted";
			} else {
				return "";
			}
		}

	}]);

HCApp.controller('HomeCtrl', ['$scope', '$http', '$sce',
	function ($scope, $http, $sce) {
		$scope.renderHtml = function (html_code) {
			return $sce.trustAsHtml(html_code);
		};

		$http.get('/home')
		.success(function (result) {
			$scope.data = result;
		})
		.error(function (data, stuatus) {
			console.log('erro');
		});
	}]);

HCApp.controller('SingleCtrl', ['$scope',
	function ($scope) {

	}]);

HCApp.controller('CategoryCtrl', ['$scope', '$http', '$sce', '$routeParams',
	function ($scope, $http, $sce, $routeParams) {
		var cat_slug;
		var per_page = 5;
		var offset = 0;
		$scope.showMore = true;
		$scope.renderHtml = function (html_code) {
			return $sce.trustAsHtml(html_code);
		};

		console.log($routeParams.tipo);

		switch ($routeParams.tipo) {
			case 'noticia':
				cat_slug = 'noticias';
				break;
			case 'evento':
				cat_slug = 'eventos';
				break;
			case 'compra':
				cat_slug = 'ofertas-de-compra';
				break;
			case 'venda':
				cat_slug = 'ofertas-de-venda';
				break;
			default:
				cat_slug = 'uncategorized';
		}

		$http.get('/archive/' + cat_slug + '/' + per_page + '/' + offset)
		.success(function (result) {
			$scope.page = result;
			if ($scope.page.posts.length == 0 || $scope.page.posts.length < 5) {
				$scope.showMore = false;
			}
			offset += 5;
		})
		.error(function (data, stuatus) {
			console.log('erro');
		});

		$scope.getMorePosts = function () {
			$http.get('/archive/' + cat_slug + '/' + per_page + '/' + offset)
			.success(function (result) {
				$scope.morePosts = result;
				for (var p in $scope.morePosts.posts) {
					$scope.page.posts.push({
						'title': $scope.morePosts.posts[p].title,
						'excerpt': $scope.morePosts.posts[p].excerpt,
						'time': $scope.morePosts.posts[p].time,
						'link': $scope.morePosts.posts[p].link,
					});
				}
				if ($scope.morePosts.posts.length == 0 || $scope.morePosts.posts.length < 5) {
					$scope.showMore = false;
				}
				offset += 5;
			})
			.error(function (data, stuatus) {
				console.log('erro');
			});
		}

	}]);

HCApp.controller('CategoryByDateCtrl', ['$scope',
	function ($scope) {

	}]);

HCApp.controller('FormOfertaCtrl', ['$scope', '$http', '$routeParams', '$rootScope',
	function ($scope, $http, $routeParams, $rootScope) {
		// verificar se todos os campos satisfazen a oferta e só assim enviar, não esquecendo que os campos:
		// post_title e post_content são OBRIGATÓRIOS...
		// outros campos post_category_name, post_author_name, post_status 
		$scope.page = {};
		$scope.page_title = $rootScope.myutils.capitalize($routeParams.tipo);

		$http.get('/login/')
		.success(function (result) {
			$scope.page = result;
		}).error(function (data, stuatus) {
			console.log('erro');
		});
	}]);

HCApp.controller('PostCtrl', ['$scope', '$routeParams',
	function ($scope, $routeParams) {
		
	}]);


HCApp.controller('SingleContatoCtrl', ['$scope',
	function ($scope) {

	}]);
