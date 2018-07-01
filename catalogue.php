<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Catalogue - LaBonnePoire.com</title>
    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
</head>

<body ng-app="App">

    <div ng-controller="ArticleController">
        <div class="row">
            <div class="col-md-12">
                <h3>Articles:</h3>
                <div class='table-responsive'>
                    <table ng-if="articles.length > 0" class="table table-borderless table-striped">
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Actions</th>
                        </tr>
                        <tr ng-repeat="article in articles">
                            <td>{{ article.name }}</td>
                            <td>{{ article.description }}</td>
                            <td>{{ article.price }}</td>
                            <td>
                                <button ng-click="show($index)" class="btn btn-primary btn-sm">Détails</button>
                                <button ng-click="add_article(article)" class="btn btn-success btn-sm">Ajouter au panier</button>
                            </td>

                        </tr>
                    </table>
                </div>
            </div>
        </div>

</body>

</html>