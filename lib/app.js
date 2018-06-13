var app = angular.module('App', []);


app.controller('ArticleController', function($scope, $http) {
  var cart = new Object();
  cart.jesaispasaquoivaressemblercetobjet = "moinonplus";
  cart.essayonsca  = "jeteregarde";
  cart.totalPrice = 0;
  cart.tabItems = [];

  cart.updateTotalPrice = function(price_to_add){
    console.log("You are in the cart.updateTotalPrice function :");
    cart.totalPrice += price_to_add;
    console.log("Now, total price is:", cart.totalPrice);
  }
  cart.getNbItems = function(){
    return cart.tabItems.length();
  }


  $scope.articles = [];
  // Add new article
  $scope.addArticle = function() {
    console.log($scope.article);
    $http.post('script/create.php', {
        article: $scope.article // json
      })
      .then(function success(e) {
        $scope.errors = [];
        $scope.articles.push(e.data.article);
        var modal_element = angular.element('#add_new_article_modal');
        modal_element.modal('hide');
      }, function error(e) {
        $scope.errors = e.data.errors;
      });
  };

  // update the article
  $scope.updateArticle = function() {
    console.log($scope.article_details);
    $http.post('script/update.php', {
        article: $scope.article_details
      })
      .then(function success(e) {
        $scope.errors = [];
        var modal_element = angular.element('#modal_update_article');
        modal_element.modal('hide');
      }, function error(e) {
        $scope.errors = e.data.errors;
      });
  };

  // delete the article
  $scope.deleteArticle = function() {
    console.log($scope.article_details);
    $http.post('script/delete.php', {
        article: $scope.article_details
      })
      .then(function success(e) {
        $scope.errors = [];
        var modal_element = angular.element('#modal_delete_article');
        modal_element.modal('hide');
        $scope.articles.splice($scope.index, 1);
      }, function error(e) {
        $scope.errors = e.data.errors;
      });
  };


  $http.get('script/list.php')
    .then(function success(e) {

      $scope.errors = [];
      $scope.articles = e.data.articles;
      $scope.cart = e.data.cart;
      console.log($scope.articles);
      console.log($scope.cart);

    }, function error(e) {
      $scope.errors = e.data.errors;
    });

  $scope.edit = function(index) {
    $scope.article_details = $scope.articles[index];
    var modal_element = angular.element('#modal_update_article');
    modal_element.modal('show');
  };

  $scope.delete = function(index) {
    $scope.article_details = $scope.articles[index];
    $scope.index = index;
    var modal_element = angular.element('#modal_delete_article');
    modal_element.modal('show');
  };

  $scope.show = function (index) {
    $scope.article_details = $scope.articles[index];
    var modal_element = angular.element('#modal_show_article');
    modal_element.modal('show');
  };

  $scope.add_item = function(item){
    console.log("You are in the $scope.add_item function:");
    cart.tabItems.push(item.name);
    console.log("cart.tabItems after push:", cart.tabItems);
    cart.updateTotalPrice(item.price);
  }
});
