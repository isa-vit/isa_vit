var app = angular.module("myApp",[]);
              app.filter("goit", function(){
                  return function (goit){
                      switch(goit){
                          case "1":
                            return "Present";
                          default:
                            return "Absent";
                      }
                  }
              })
              app.controller("main", function($scope,$http){
                   $scope.reglist = true;
                   $scope.exactMatch = true;
                   $scope.num = 1;

                   $http.get('viewAtten.php')
                   .then(function(response) {
                     $scope.Details = response.data;
                   })

                  $scope.clickHua = function(regNum, name) {
                    $scope.regNum = regNum;
                    $scope.name = name;
                    $scope.reglist = false;
                    $http({
							method:'post',
							url:'findperson.php',
							data:{'regNum':$scope.regNum}
										})
                    .then(function(response) {
                      console.log(response.data);
                      $scope.personDetail = response.data;
                    })
                    $http({
                            method:'post',
						    url:'getsum.php',
							data:{'regNum':$scope.regNum}
                      })
                      .then(function(response){
                          $scope.percent = response.data;
                          if($scope.percent < 75){
                              document.getElementsByTagName("H1")[1].setAttribute("class", "lowattn"); 
                          }
                          else{
                              document.getElementsByTagName("H1")[1].setAttribute("class", "highattn"); 
                          }
                      })
                  }
                 })
