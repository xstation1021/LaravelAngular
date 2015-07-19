'use strict';

angular.module('chicoryApp')
    .factory('Recipe', function ($resource) {
        return $resource('api/:method/recipes/:id/:item', {}, {
                'query': {method: 'GET', isArray: true},
                'get': {
                    method: 'GET',
                    transformResponse: function (data) {
                        data = angular.fromJson(data);
                        return data;
                    }
                },
                'update': {method: 'PUT'},
            });
        });

