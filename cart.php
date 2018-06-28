<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Panier - LaBonnePoire.com</title>
    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
</head>

<body ng-app="App">

    <div ng-controller="ArticleController">
        <div class="row">
            <div class="col-md-12">
                <h3>Panier :</h3>
                <div class='table-responsive'>
                    <table ng-if="cart.getNbArticles() > 0" class="table table-bordered table-striped">
                        <tr>
                            <th>Nom</th>
                            <th>Quantité</th>
                            <th>Prix unitaire</th>
                            <th>Prix total</th>
                            <th>Actions</th>
                        </tr>
                        <tr ng-repeat="article in cart.tabArticles |unique : 'id'" align="center">
                            <td>{{ article.name }}</td>
                            <td>
                                <span class="alert alert-info">{{ cart.articleQuantity(article) }}</span>

                                <button type="button" class="btn btn-danger btn-xs" ng-click="remove_article(article)">
                                    <b>-</b>
                                </button>
                                <button type="button" class="btn btn-success btn-xs" ng-click="add_article(article)">
                                    <b>+</b>
                                </button>
                            </td>
                            <td>{{ article.price }}</td>
                            <td>{{ cart.articleTotalPrice(article) }}</td>
                            <td>
                                <button ng-click="show($index)" class="btn btn-success btn-xs">Détails</button>
                                <button ng-click="remove_all_articles(article)" class="btn btn-danger btn-xs">Supprimer</button>
                            </td>
                </div>
                </tr>
                <tr class=>
                    <td style="visibility:hidden;"></td>
                    <td style="visibility:hidden;"></td>
                    <td>Total panier :</td>
                    <td>{{cart.totalPrice}}</td>
                    <td align="center">
                        <a href="#!order" class="btn btn-primary btn-xs">Valider la commande</a>
                        <button ng-click="empty()" class="btn btn-danger btn-xs">Vider le panier</button>
                    </td>
                </tr>
                </table>
            </div>
        </div>
        <!-- Show Article -->
        <div class="modal fade" id="modal_show_article" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Article Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <ul class="alert alert-danger" ng-if="errors.length > 0">
                            <li ng-repeat="error in errors">
                                {{ error }}
                            </li>
                        </ul>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input ng-model="article_details.name" type="text" id="name" class="form-control" disabled/>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea ng-model="article_details.description" class="form-control" name="description" disabled></textarea>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input ng-model="article_details.price" type="number" id="price" class="form-control" disabled/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- empty cart -->
        <div class="modal fade" id="modal_empty_cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Achtung !</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h2> Do you really want to delete your cart ? </h2>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">No, I want to keep getting such good deals !</button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" ng-click="empty_cart()">Yes, I like paying a higher price elsewhere.</button>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>