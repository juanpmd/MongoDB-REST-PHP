
var app = angular.module('WebApp', []);

app.controller("WebAppController", ['$scope', '$http',
  function($scope, $http){

    $scope.results = [];
    //----------------------------------------->>>
    $scope.getData = function(){
      $http.get('Api.php?val=allFiles').success(function(data) {
    		$scope.results = data;
    	}).error(function(data) {
    		console.log('Error: ' + data);
    	});
    }
    //----------------------------------------->>>
    $scope.Add_Data = function(){
      $scope.nameform = $scope.mainname;
      $("#note-edit-page").fadeIn(200).removeClass("hidden");
    }
    //----------------------------------------->>>
    $scope.Finish_Add_Data = function(){
      $http.post('Api.php?val=AddFile',{
        name: $scope.nameform,
        lastname: $scope.lastnameform,
        email: $scope.emailform,
        age: $scope.ageform,
        student: $scope.studentform
      }).success(function(data) {
        $("#note-edit-page").fadeOut(200).addClass("hidden");
        $scope.getData();
    	}).error(function(data) {
    		console.log('Error: ' + data);
    	});
    }
    //----------------------------------------->>>
    //----------------------------------------->>>
    //----------------------------------------->>>
    //----------------------------------------->>>
    $scope.getData();
    //----------------------------------------->>>
  }
]);
