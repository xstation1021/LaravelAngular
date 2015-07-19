'use strict';

angular.module('chicoryApp')
    .config(function ($stateProvider) {
        $stateProvider
            .state('home', {
                
                url: '/',
                
                views: {
                    'content@': {
                        templateUrl: 'scripts/app/main/main.html',
                        controller: 'MainController'
                    }
                },

            });
    });
