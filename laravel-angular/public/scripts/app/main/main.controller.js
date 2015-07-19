'use strict';

angular.module('chicoryApp')
    .controller('MainController', function ($scope, Recipe, Ingredient) {
       Recipe.query().$promise.then(function(data){
       		$scope.recipes = data;
       });

       Ingredient.query().$promise.then(function(data){
       		$scope.ingredients = data;
       });
       
       $scope.createRecipe = function(){
    	   $scope.showRecipeSuccess = false;
    	   $scope.showRecipeError = false;
    	   Recipe.save($scope.recipe,
                   function (data) {
    		   Recipe.query().$promise.then(function(data){
    	       		$scope.recipes = data;
    	       });
    		   $scope.showRecipeSuccess = true;

           }, function (error){
        	   $scope.showRecipeError = true;
           });
       }
       
       $scope.createIngredient = function(){
    	   $scope.showIngredientSuccess = false;
    	   $scope.showIngredientError = false;
    	   Ingredient.save($scope.ingredient,
                   function (data) {
    		   Ingredient.query().$promise.then(function(data){
    	       		$scope.ingredients = data;
    	       });
    		   $scope.showIngredientSuccess = true;

           }, function (error){
        	   $scope.showIngredientError = true;
           });
       }
       
       $scope.searchCode = function(){
    	   Recipe.query({method:"search_code", item:$scope.codeText}).$promise.then(function(data){
	       		$scope.recipes = data;
	       });
       }
       
       $scope.search = function(){
    	   Recipe.query({method:"search", item:$scope.searchText}).$promise.then(function(data){
	       		$scope.recipes = data;
	       });
       }

    });
