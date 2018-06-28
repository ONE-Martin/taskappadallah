<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Gestionnaire d'articles - LaBonnePoire.com</title>
    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
</head>

<body ng-app="App">

    <div ng-controller="ArticleController">
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
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Action</th>
                        </tr>
                        <tr ng-repeat="article in articles">
                            <td>{{ article.id }}</td>
                            <td>{{ article.name }}</td>
                            <td>{{ article.description }}</td>
                            <td>{{ article.price }}</td>
                            <td align="center">
                                <button ng-click="edit($index)" class="btn btn-primary btn-xs">Editer</button>
                                <button ng-click="delete($index)" class="btn btn-danger btn-xs">Supprimer</button>
                            </td>
                        </tr>
                    </table>
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
</body>

</html>