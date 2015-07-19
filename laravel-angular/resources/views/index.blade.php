<!doctype html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Laravel Angular</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link href="styles/main.css" rel="stylesheet">

    </head>
    <body ng-app="chicoryApp">

        <div class="container">
            <div class="well" ui-view="content"></div>

            
        </div>

       
        <script src="bower_components/modernizr/modernizr.js"></script>
        <script src="bower_components/jquery/dist/jquery.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.js"></script>
        <script src="bower_components/json3/lib/json3.js"></script>
        <script src="bower_components/angular/angular.js"></script>
        <script src="bower_components/angular-bootstrap/ui-bootstrap-tpls.js"></script>
        <script src="bower_components/angular-ui-router/release/angular-ui-router.js"></script>
        <script src="bower_components/angular-resource/angular-resource.js"></script>
        <script src="bower_components/angular-cookies/angular-cookies.js"></script>
        <script src="bower_components/angular-sanitize/angular-sanitize.js"></script>
        <script src="bower_components/angular-translate/angular-translate.js"></script>
        <script src="bower_components/angular-translate-storage-cookie/angular-translate-storage-cookie.js"></script>
        <script src="bower_components/angular-translate-loader-partial/angular-translate-loader-partial.js"></script>
        <script src="bower_components/angular-dynamic-locale/src/tmhDynamicLocale.js"></script>
        <script src="bower_components/angular-local-storage/dist/angular-local-storage.js"></script>
        <script src="bower_components/angular-cache-buster/angular-cache-buster.js"></script>
        <script src="bower_components/ngInfiniteScroll/build/ng-infinite-scroll.js"></script>

    
    <script src="scripts/app/app.js"></script>
    <script src="scripts/app/app.constants.js"></script>
    <script src="scripts/app/main/main.js"></script>
    <script src="scripts/app/main/main.controller.js"></script>
    <script src="scripts/app/entities/recipe.js"></script>
    <script src="scripts/app/entities/recipe.controller.js"></script>
    <script src="scripts/components/recipe/recipe.service.js"></script>
    <script src="scripts/components/ingredient/ingredient.service.js"></script>

    
</body>
</html>
