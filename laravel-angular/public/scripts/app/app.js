'use strict';

angular.module('chicoryApp', ['LocalStorageModule', 'tmh.dynamicLocale', 'pascalprecht.translate', 
               'ui.bootstrap', 
    'ngResource', 'ui.router', 'ngCookies', 'ngCacheBuster'])

    .run(function ($rootScope, $location, $window, $http, $state) {
        
        $rootScope.$on('$stateChangeStart', function (event, toState, toStateParams) {
            $rootScope.toState = toState;
 
            $rootScope.toStateParams = toStateParams;
            
        });

        $rootScope.$on('$stateChangeSuccess',  function(event, toState, toParams, fromState, fromParams) {

            
        });

        $rootScope.back = function() {
            
        };
    })
    .factory('authInterceptor', function ($rootScope, $injector, $q, $location, localStorageService) {
        return {
            // Add authorization token to headers
            request: function (config) {
                config.headers.Authorization = 'Bearer chicory-token' ;
                return config;
            },
            responseError: function(response) {
            	if (response.status == 401){
	            	var $state = $injector.get('$state');
	            	$state.go('error');
					
            	}
    			return $q.reject(response);
    		}
        };
    })
    .config(function ($stateProvider, $urlRouterProvider, $httpProvider, $locationProvider, $translateProvider, tmhDynamicLocaleProvider, httpRequestInterceptorCacheBusterProvider) {


        $urlRouterProvider.otherwise('/');
        

        $httpProvider.interceptors.push('authInterceptor');

        
      
        
    });
