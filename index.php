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
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <button class="btn btn-success" data-toggle="modal" data-target="#add_new_article_modal">Add Article
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3>Articles:</h3>
                    <div class='table-responsive'>
                        <table ng-if="articles.length > 0" class="table table-bordered table-striped">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            <tr ng-repeat="article in articles">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ article.name }}</td>
                                <td>{{ article.description }}</td>
                                <td>{{ article.price }}</td>
                                <td align="center">
                                    <button ng-click="show($index)" class="btn btn-success btn-xs">Détails</button>
                                    <button ng-click="edit($index)" class="btn btn-primary btn-xs">Editer</button>
                                    <button ng-click="delete($index)" class="btn btn-danger btn-xs">Supprimer</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <br>



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
                                    <button ng-click="show($index)" class="btn btn-primary btn-xs">Détails</button>
                                    <button ng-click="add_item(article.name)" class="btn btn-success btn-xs">Ajouter au panier</button>
                                </td>
                                
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <br>




            <br>
            <div class="row">
                <div class="col-md-12">
                    <h3>Panier :</h3>
                    <div class='table-responsive'>
                        <table ng-if="articles.length > 0" class="table table-bordered table-striped">
                            <tr>
                                <th>Nom</th>
                                <th>Quantité</th>
                                <th>Prix</th>
                                <th>Actions</th>
                            </tr>
                            <tr ng-repeat="item in cart">
                                <td>{{ item.name }}</td>
                                <td>{{ item.quantity }}</td>
                                <td>{{ item.price }}</td>
                                <td align="center">
                                    <button ng-click="show($index)" class="btn btn-success btn-xs">Détails</button>
                                    <button ng-click="delete(item.name)" class="btn btn-danger btn-xs">Delete</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--  Add New Article -->
        <div class="modal fade" id="add_new_article_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Add Article</h4>
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
                            <input ng-model="article.name" type="text" id="name" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea ng-model="article.description" class="form-control" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input ng-model="article.price" type="number" class="form-control" id="price">
                            </textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" ng-click="addArticle()">Add Article</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Article -->
        <div class="modal fade" id="modal_update_article" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                            <input ng-model="article_details.name" type="text" id="name" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea ng-model="article_details.description" class="form-control" name="description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input ng-model="article_details.price" type="number" id="price" class="form-control" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" ng-click="updateArticle()">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Article -->
        <div class="modal fade" id="modal_delete_article" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Article Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h2> Do you really want to delete this article ? </h2>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No, it was a mistake</button>
                        <button type="button" class="btn btn-primary" ng-click="deleteArticle($index)">Yes, i'm sure</button>
                    </div>
                </div>
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
        <!-- // Modal -->
    </div>


    <!-- Jquery JS file -->
    <script type="text/javascript" src="lib/jquery-3.3.1.min.js"></script>
    <!-- AngularJS file -->
    <script type="text/javascript" src="lib/angular-1.6.10/angular.min.js"></script>
    <!-- Bootstrap JS file -->
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Custom JS file -->
    <script type="text/javascript" src="lib/app.js"></script>
</body>

</html>