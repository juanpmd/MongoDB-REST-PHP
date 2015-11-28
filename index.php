<!DOCTYPE html>
<html ng-app="WebApp">
  <head>
    <meta charset="utf-8">
    <title>MongoDB</title>
    <link rel="stylesheet" href="css/main.css"></link>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.4/angular.min.js"></script>
    <script src="Controllers/WebController.js"></script>
  </head>
  <body ng-controller="WebAppController">
    <header>
      <form id="new-note">
        <img ng-click="Add_Data()" src="img/Add.svg"/>
        <input type="text" ng-model="mainname" placeholder="Add new student here ..." autocomplete="off"/>
      </form>
    </header>
    <!-- ########################## -->
    <main>
      <div id="values-name">
        <div class="name-table">
          <p>Name</p>
        </div>
        <div class="lastname-table">
          <p>Last Name</p>
        </div>
        <div class="email-table">
          <p>Email</p>
        </div>
        <div class="age-table">
          <p>Age</p>
        </div>
        <div class="student-table">
          <p>Student</p>
        </div>
        <div class="edit-block">
          <p>Edit</p>
        </div>
      </div>
      <div class="note" ng-repeat="data in results">
        <!--<p>{{data._id["$oid"]}}</p>-->
        <div class="name-table">
          <p>{{data.name}}</p>
        </div>
        <div class="lastname-table">
          <p>{{data.lastname}}</p>
        </div>
        <div class="email-table">
          <p>{{data.email}}</p>
        </div>
        <div class="age-table">
          <p>{{data.age}}</p>
        </div>
        <div class="student-table">
          <p>{{data.student}}</p>
        </div>

        <div class="edit-block">
          <img class="edit-image-block" src="img/Edit.svg"/>
          <img class="edit-image-block" src="img/Delete.svg"/>
        </div>

      </div>
    </main>
    <!-- ########################## -->
    <div id="note-edit-page" class="hidden">
      <div id="note-edit-block">
        <div id="text_note_input">
          <p>Name</p>
          <input type="text" ng-model="nameform">
          <p>Last Name</p>
          <input type="text" ng-model="lastnameform">
          <p>Email</p>
          <input type="text" ng-model="emailform">
          <p>Age</p>
          <input type="text" ng-model="ageform">
          <p>Student</p>
          <input type="text" ng-model="studentform">

        </div>
        <div id="bottom-edit-block">
          <div id="cancel-edit-button">Cancel</div>
          <div ng-click="Finish_Add_Data()" id="done-edit-button">Done</div>
        </div>

      </div>
    </div>
    <!-- ########################## -->
    <script src="js/jQuery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>
