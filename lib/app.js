var app = angular.module('App', []);

app.controller('TaskController', function($scope, $http) {
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


  $scope.tasks = [];
  // Add new task
  $scope.addTask = function() {
    console.log($scope.task);
    $http.post('script/create.php', {
        task: $scope.task // json
      })
      .then(function success(e) {
        $scope.errors = [];
        $scope.tasks.push(e.data.task);
        var modal_element = angular.element('#add_new_task_modal');
        modal_element.modal('hide');
      }, function error(e) {
        $scope.errors = e.data.errors;
      });
  };

  // update the task
  $scope.updateTask = function() {
    console.log($scope.task_details);
    $http.post('script/update.php', {
        task: $scope.task_details
      })
      .then(function success(e) {
        $scope.errors = [];
        var modal_element = angular.element('#modal_update_task');
        modal_element.modal('hide');
      }, function error(e) {
        $scope.errors = e.data.errors;
      });
  };

  // delete the task
  $scope.deleteTask = function() {
    console.log($scope.task_details);
    $http.post('script/delete.php', {
        task: $scope.task_details
      })
      .then(function success(e) {
        $scope.errors = [];
        var modal_element = angular.element('#modal_delete_task');
        modal_element.modal('hide');
        $scope.tasks.splice($scope.index, 1);
      }, function error(e) {
        $scope.errors = e.data.errors;
      });
  };


  $http.get('script/list.php')
    .then(function success(e) {

      $scope.errors = [];
      $scope.tasks = e.data.tasks;
      $scope.cart = e.data.cart;
      console.log($scope.tasks);
      console.log($scope.cart);

    }, function error(e) {
      $scope.errors = e.data.errors;
    });

  $scope.edit = function(index) {
    $scope.task_details = $scope.tasks[index];
    var modal_element = angular.element('#modal_update_task');
    modal_element.modal('show');
  };

  $scope.delete = function(index) {
    $scope.task_details = $scope.tasks[index];
    $scope.index = index;
    var modal_element = angular.element('#modal_delete_task');
    modal_element.modal('show');
  };

  $scope.show = function (index) {
    $scope.task_details = $scope.tasks[index];
    var modal_element = angular.element('#modal_show_task');
    modal_element.modal('show');
  };

  $scope.add_item = function(item){
    console.log("You are in the $scope.add_item function:");
    cart.tabItems.push(item);
    console.log("cart.tabItems after push:", cart.tabItems);
    cart.updateTotalPrice(item.price);
  }
});
