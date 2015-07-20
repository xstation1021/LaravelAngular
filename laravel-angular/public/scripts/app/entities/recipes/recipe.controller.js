'use strict';

angular.module('chicoryApp')
    .controller('RecipeController', function ($scope, $stateParams, Recipe, Ingredient) {
    	Ingredient.query().$promise.then(function(data){
       		$scope.ingredients = data;
       });
    	
       Recipe.get({id:$stateParams.id}).$promise.then(function(data){
       		$scope.recipe = data;
       });
       
       Recipe.query({method:"suggest", id:$stateParams.id}).$promise.then(function(data){
      		$scope.suggestions = data;
      });
       
       $scope.updateRecipe = function(){
    	   $scope.showRecipeSuccess = false;
    	   $scope.showRecipeError = false;
    	   Recipe.update($scope.recipe,
                   function (data) {
    		
    		   $scope.showRecipeSuccess = true;

           }, function (error){
        	   $scope.showRecipeError = true;
           });
       }
       
       $scope.addItem = function(){
    	   $scope.recipe.ingredients.push({});
       }
       
    });
