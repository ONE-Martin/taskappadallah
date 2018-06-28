// var app = angular.module('App', []);
var app = angular.module('App', ['ngRoute']);

app.filter('unique', function () {
  return function (collection, keyname) {
    var output = [],
      keys = [];

    angular.forEach(collection, function (article) {
      var key = article[keyname];
      if (keys.indexOf(key) === -1) {
        keys.push(key);
        output.push(article);
      }
    });
    return output;
  };
});

 app.config(function ($routeProvider, $locationProvider) {
   $routeProvider
     .when("/article_manager", {
       templateUrl: "article_manager.php"
     })
     .when("/cart", {
       templateUrl: "cart.php"
     })
     .when("/order", {
       templateUrl: "order.php"
     })
     .when("/catalogue", {
       templateUrl: "catalogue.php"
     })
     .otherwise("/", {
       templateUrl: "index.php"
     });
 });

app.controller('ArticleController', function($scope, $http) {

  $scope.cart = {
    totalPrice : 0,
    tabArticles : [],

    updateTotalPrice : function(price_to_add){
      // console.log("You are in the updateTotalPrice function :");
      this.totalPrice = Math.round((this.totalPrice + price_to_add)*1e2) / 1e2 ;
      // console.log("Now, total price is:", this.totalPrice);
    },
    getNbArticles : function(){
      return this.tabArticles.length;
    },
    updateLocalStorage : function(){
      // console.log("You are in the updateLocalStorage function:");
      localStorage.setItem("cartTotalPrice", this.totalPrice);
      localStorage.setItem("carttabArticles", JSON.stringify(this.tabArticles));
      console.log("cart saved:", $scope.cart);
    },
    getCartFromStorage : function(){
      console.log("You are in the getCartFromStorage function:");
      if(localStorage.getItem("cartTotalPrice") && localStorage.getItem("carttabArticles")){
        this.totalPrice = parseFloat(localStorage.getItem("cartTotalPrice"));
        this.tabArticles = JSON.parse(localStorage.getItem("carttabArticles"));
        console.log("current cart : ", $scope.cart);
      }
    },
   articleQuantity : function (article) {
    //  console.log("Entering articleQuantity function for article : ", article.name);
     var count = 0;
     for (i = 0; i < this.getNbArticles(); i++) {
       if (this.tabArticles[i].name == article.name) {
         count++;
       }
     }
     return count;
   },
   articleTotalPrice : function(article){
    //  console.log("Entering articleTotalPrice function");
     var price = Math.round(article.price * this.articleQuantity(article) * 1e2) / 1e2;
     return price;
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

  $scope.empty = function (index) {
    var modal_element = angular.element('#modal_empty_cart');
    modal_element.modal('show');
  };

  $scope.add_article = function(article){
    console.log("You are in the $scope.add_article function:");
    $scope.cart.tabArticles.push(article);
    console.log("cart.tabArticles after push:", $scope.cart.tabArticles);
    $scope.cart.updateTotalPrice(article.price);
    $scope.cart.updateLocalStorage();
  };

  $scope.remove_article = function(article){
    console.log("You are in the remove_article function");
    for(i=0; i<$scope.cart.getNbArticles(); i++){
      console.log("i :", i);
      if($scope.cart.tabArticles[i].id === article.id){
        $scope.cart.tabArticles.splice(i, 1);
        console.log("cart saved:", $scope.cart);
        $scope.cart.updateTotalPrice(- article.price);
        $scope.cart.updateLocalStorage();
        console.log("Removal successful");
        return;
      }
    }
    console.log("Can't remove that article");
  };

  $scope.remove_all_articles = function (article) {
    console.log("You are in the remove_article function");
    for (i = 0; i < $scope.cart.getNbArticles(); i++) {
      console.log("i :", i);
      if ($scope.cart.tabArticles[i].id === article.id) {
        $scope.cart.tabArticles.splice(i, 1);
        $scope.cart.updateTotalPrice(-article.price);
        $scope.cart.updateLocalStorage();
        i--;
      }
    }
    console.log("Removal successful");
  };

  $scope.empty_cart = function(){
    $scope.cart.totalPrice = 0;
    $scope.cart.tabArticles = [];
    localStorage.clear();
  };
});