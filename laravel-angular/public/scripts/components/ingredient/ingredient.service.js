'use strict';

angular.module('chicoryApp')
    .factory('Ingredient', function ($resource) {
        return $resource('api/ingredients/:id', {}, {
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

