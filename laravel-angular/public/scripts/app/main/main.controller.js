'use strict';

angular.module('chicoryApp')
    .controller('MainController', function ($scope, Recipe, Ingredient, Product, Category) {
       Recipe.query().$promise.then(function(data){
       		$scope.recipes = data;
       });

       Ingredient.query().$promise.then(function(data){
       		$scope.ingredients = data;
       });
       
       Product.query().$promise.then(function(data){
      		$scope.products = data;
       });
       Category.query().$promise.then(function(data){
      		$scope.categories = data;
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
        	   $scope.custom_error = error.data;
        	   $scope.showIngredientError = true;
           });
       }
       
       $scope.createProduct = function(){
    	   $scope.showProductSuccess = false;
    	   $scope.showProductError = false;
    	   Product.save($scope.product,
                   function (data) {
    		   Product.query().$promise.then(function(data){
    	       		$scope.products = data;
    	       });
    		   $scope.showProductSuccess = true;

           }, function (error){
        	   $scope.showProductError = true;
           });
       }
       
       $scope.createCategory = function(){
    	   $scope.showCategorySuccess = false;
    	   $scope.showCategoryError = false;
    	   Category.save($scope.category,
                   function (data) {
    		   Category.query().$promise.then(function(data){
    	       		$scope.categories = data;
    	       });
    		   $scope.showCategorySuccess = true;

           }, function (error){
        	   $scope.showCategoryError = true;
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
