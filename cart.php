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
                                <button type="button" class="btn btn-sm btn-danger" ng-click="remove_article(article)">
                                    <b>-</b>
                                </button>
                                <span class="btn btn-sm btn-outline-info ">{{ cart.articleQuantity(article) }}</span>
                                <button type="button" class="btn btn-success btn-sm" ng-click="add_article(article)">
                                    <b>+</b>
                                </button>
                            </td>
                            <td>{{ article.price }}</td>
                            <td>{{ cart.articleTotalPrice(article) }}</td>
                            <td>
                                <button ng-click="show($index)" class="btn btn-success btn-sm">Détails</button>
                                <button ng-click="remove_all_articles(article)" class="btn btn-outline-danger btn-sm">Supprimer</button>
                            </td>
                </div>
                </tr>
                <tr align="center">
                    <td style="visibility:hidden;"></td>
                    <td style="visibility:hidden;"></td>
                    <td>Total panier :</td>
                    <td>{{cart.totalPrice}}</td>
                    <td align="center">
                        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

                            <!-- Identify your business so that you can collect the payments. -->
                            <input type="hidden" name="business" value="applenotifier-sell@gmail.com">

                            <!-- Specify a Buy Now button. -->
                            <input type="hidden" name="cmd" value="_xclick">

                            <!-- Specify details about the item that buyers will purchase. -->
                            <input type="hidden" name="item_name" value="Panier LaBonnePoire.com">
                            <input type="hidden" name="amount" ng-value={{cart.totalPrice}}>
                            <input type="hidden" name="currency_code" value="EUR">

                            <!-- Display the payment button. -->
                            <button ng-click="empty()" class=" btn btn-outline-primary btn-lg" name="submit" alt="Payer avec Paypal">Payer avec Paypal</button>

                        </form>
                        <button ng-click="empty()" class="btn btn-danger btn-sm">Vider le panier</button>
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