var app = angular.module('App', []);


app.controller('ArticleController', function($scope, $http) {
  $scope.cart = {
    totalPrice : 0,
    tabItems : [],

    updateTotalPrice : function(price_to_add){
      console.log("You are in the updateTotalPrice function :");
      this.totalPrice += price_to_add;
      console.log("Now, total price is:", this.totalPrice);
    },
    getNbItems : function(){
      return this.tabItems.length();
    },
    updateLocalStorage : function(){
      console.log("You are in the updateLocalStorage function:");
      localStorage.setItem("cartTotalPrice", this.totalPrice);
      localStorage.setItem("carttabItems", JSON.stringify(this.tabItems));
      console.log("cart saved:", $scope.cart);
    },
    getCartFromStorage : function(){
      console.log("You are in the getCartFromStorage function:");
      if(localStorage.getItem("cartTotalPrice") && localStorage.getItem("carttabItems")){
        this.totalPrice = parseFloat(localStorage.getItem("cartTotalPrice"));
        this.tabItems = JSON.parse(localStorage.getItem("carttabItems"));
        console.log("current cart : ", $scope.cart);
      }
    }
  };
  $scope.cart.getCartFromStorage();

  $scope.articles = [];
  // Add new article
  $scope.addArticle = function() {
    console.log("add article: ", $scope.article);
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
    console.log("update article: ", $scope.article_details);
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
    console.log("delete article: ", $scope.article_details);
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

      console.log("get article: ", $scope.articles);

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
    $scope.cart.tabItems.push(item);
    console.log("cart.tabItems after push:", $scope.cart.tabItems);
    $scope.cart.updateTotalPrice(item.price);
    $scope.cart.updateLocalStorage();
  };

  $scope.itemQuantity = function(item){
    console.log("Entering itemQuantity function");
    var count = 0;
    for (i = 0; i < $scope.cart.getNbItems(); i++){
      if ($scope.cart.tabItems[i] == item) {
        count ++;
      }
    }
    return count;
  };
});
