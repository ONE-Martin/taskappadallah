<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>LaBonnePoire.com</title>
    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
</head>

<body ng-app="App">

    <div ng-controller="ArticleController">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>LaBonnePoire.com, votre maraîcher en ligne</h1>
                </div>
            </div>
            <div ng-view></div>
            <br>
            <a href="#!catalogue" class="btn btn-success btn-xs">Catalogue</a>
            <a href="#!cart" class="btn btn-primary btn-xs">Panier</a>
            <a href="#!article_manager" class="btn btn-warning btn-xs">Gestionnaire d'articles</a>

        </div>
    </div>

    <!-- Jquery JS file -->
    <script type="text/javascript" src="lib/jquery-3.3.1.min.js"></script>
    <!-- AngularJS file -->
    <script type="text/javascript" src="lib/angular-1.6.10/angular.js"></script>
    <!-- Bootstrap JS file -->
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Custom JS file -->
    <script type="text/javascript" src="lib/app.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.10/angular-route.js"></script>
</body>

</html>