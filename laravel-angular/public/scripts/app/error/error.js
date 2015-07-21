'use strict';

angular.module('chicoryApp')
    .config(function ($stateProvider) {
        $stateProvider
            .state('error', {
                url: '/error',
                views: {
                    'content@': {
                        templateUrl: 'scripts/app/error/error.html'
                    }
                },
            })
    });
