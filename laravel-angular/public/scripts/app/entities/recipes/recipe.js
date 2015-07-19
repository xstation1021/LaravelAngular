'use strict';

angular.module('chicoryApp')
    .config(function ($stateProvider) {
        $stateProvider
            .state('recipe_edit', {
                
                url: '/recipes/:id',
                
                views: {
                    'content@': {
                        templateUrl: 'scripts/app/entities/recipes/recipe.html',
                        controller: 'RecipeController'
                    }
                },

            });
    });
