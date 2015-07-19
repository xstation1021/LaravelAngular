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
    .factory('authExpiredInterceptor', function ($rootScope, $q, $injector, localStorageService) {
        return {
            responseError: function(response) {
                    
                return $q.reject(response);
            }
        };
    })
    .config(function ($stateProvider, $urlRouterProvider, $httpProvider, $locationProvider, $translateProvider, tmhDynamicLocaleProvider, httpRequestInterceptorCacheBusterProvider) {

      

        $urlRouterProvider.otherwise('/');
        

        $httpProvider.interceptors.push('authExpiredInterceptor');


      
        
    });
