var app = angular.module('App', []);
app.controller('TaskController', function($scope, $http) {

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
    var modal_element = angular.element('#modal_delete_task');
    modal_element.modal('show');
  };

  // add_item
});
