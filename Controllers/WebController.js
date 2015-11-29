
var app = angular.module('WebApp', []);

app.controller("WebAppController", ['$scope', '$http',
  function($scope, $http){

    $scope.results = [];
    $scope.id = "";
    $scope.student = "";
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
    $scope.Cancel_Edit_Data = function(){
      $("#note-edit-page").fadeOut(200).addClass("hidden");
      $scope.mainname = "";
      $scope.nameform = "";
      $scope.lastnameform = "";
      $scope.emailform = "";
      $scope.ageform = "";
      //$scope.studentform = "";
    }
    //----------------------------------------->>>
    $scope.Cancel_Update_Data = function(){
      $("#note-edit-page").fadeOut(200).addClass("hidden");
      $("#bottom-update-block").fadeOut(200).addClass("hidden");
      $scope.mainname = "";
      $scope.nameform = "";
      $scope.lastnameform = "";
      $scope.emailform = "";
      $scope.ageform = "";
      //$scope.studentform = "";
    }
    //----------------------------------------->>>
    $scope.Finish_Add_Data = function(){
      //console.log($scope.student["name"]);

      $http.post('Api.php?val=AddFile',{
        name: $scope.nameform,
        lastname: $scope.lastnameform,
        email: $scope.emailform,
        age: $scope.ageform,
        student: $scope.student["name"]
      }).success(function(data) {
        $("#note-edit-page").fadeOut(200).addClass("hidden");
        $scope.getData();
        $scope.mainname = "";
        $scope.nameform = "";
        $scope.lastnameform = "";
        $scope.emailform = "";
        $scope.ageform = "";
        //$scope.studentform = "";
    	}).error(function(data) {
    		console.log('Error: ' + data);
    	});
    }
    //----------------------------------------->>>
    $scope.Delete_Value = function(data){
      $http.post('Api.php?val=DeleteFile',{
        id: data._id["$oid"]
      }).success(function(data) {
        $scope.getData();
    	}).error(function(data) {
    		console.log('Error: ' + data);
    	});
    }
    //----------------------------------------->>>
    $scope.Update_Value = function(data){
      //console.log(data._id["$oid"]);
      $scope.id = data._id["$oid"];
      $scope.nameform = data.name;
      $scope.lastnameform = data.lastname;
      $scope.emailform = data.email;
      $scope.ageform = data.age;
      $scope.studentform = $scope.student["name"];
      $("#note-edit-page").fadeIn(200).removeClass("hidden");
      $("#bottom-update-block").fadeIn(200).removeClass("hidden");
    }
    //----------------------------------------->>>
    $scope.Finish_Update_Data = function(){
      //console.log($scope.id);
      $http.post('Api.php?val=UpdateFile',{
        id: $scope.id,
        name: $scope.nameform,
        lastname: $scope.lastnameform,
        email: $scope.emailform,
        age: $scope.ageform,
        student: $scope.student["name"]
      }).success(function(data) {
        $scope.getData();
        $("#note-edit-page").fadeOut(200).addClass("hidden");
        $("#bottom-update-block").fadeOut(200).addClass("hidden");
        $scope.mainname = "";
        $scope.nameform = "";
        $scope.lastnameform = "";
        $scope.emailform = "";
        $scope.ageform = "";
    	}).error(function(data) {
    		console.log('Error: ' + data);
    	});
    }
    //----------------------------------------->>>
    //----------------------------------------->>>
    $scope.getData();
    //----------------------------------------->>>
  }
]);
