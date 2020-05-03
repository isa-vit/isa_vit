var app = angular.module("myApp", []);

              app.directive("fileInput", function($parse){
                return{
                  link: function($scope, element, attrs){
                    element.on("change", function(event){
                      var files = event.target.files;
                      //console.log(files[0].name);
                      $parse(attrs.fileInput).assign($scope, element[0].files);
                      $scope.$apply();
                    });
                  }}
              });

              app.controller("departments", function($scope) {
                    $scope.myObj =
                    [
                      {
                        "id" : "section1",
                        "padding" : "28px",
                        "Name" : "Technical",
                        "imgsrc" : "img/technical.png",
                        "desc1" : "The Technical Team forms the backbone of ISA-VIT. It focuses on imparting technical knowledge to the students both inside the VIT campus and outside in schools and colleges across Vellore and its neighbouring districts.",
                        "desc2" : "The sessions are on a variety of topics such as Arduino, Raspberry Pi, cloud computing, machine learning, Web Development, App Development, programming, etc. ",
                        "desc3" : "This team, at times, is also instrumental in giving its hand to the Project team of ISA for carrying out certain technical tasks.",
                        "desc4" :  "",
                      },
                      {
                        "id" : "section2",
                        "padding" : "28px",
                        "Name" : "Events and Documentation",
                        "imgsrc" : "img/doc.png",
                        "desc1" : "This team focuses on planning, preparing and executing all the events taking place in the chapter. ",
                        "desc2" : "They are also responsible for post-event feedback and reports to gain an insight into the effectiveness of the event.",
                        "desc3" : "",
                        "desc4" : ""
                      },
                      {
                        "id" : "section3",
                        "padding" : "28px",
                        "Name" : "Marketing and Design",
                        "imgsrc" : "img/designing.png",
                        "desc1" : "This team focuses on publicizing the various events, workshops, technitudes and guest lectures conducted by ISA throughout the year.",
                        "desc2" : "It also visits other colleges and schools, to give external students an opportunity to participate in the annual fest SPARK.",
                        "desc3" : "Publicity goes hand in hand with design, and the design team is responsible for all posters, videos and animations used.",
                        "desc4" : ""
                      },
                      {
                        "id" : "section4",
                        "padding" : "28px",
                        "Name" : "Project",
                        "imgsrc" : "img/proj.jpg",
                        "desc1" : "The project team, along with the Technical team of ISA-VIT forms the backbone of this chapter.",
                        "desc2" : "It is responsible for representing ISA in competitions and other events, and ensuring the  chapter showcases it's skills in form of exciting and advanced projects.",
                        "desc3" : "The aim is to develop solutions and products useful in the real world.",
                        "desc4" : ""
                      },
                      {
                        "id" : "section5",
                        "padding" : "28px",
                        "Name" : "Finance and Sponsorship",
                        "imgsrc" : "img/finance.png",
                        "desc1" : "The Finance and Sponsorship team is lead by the Finance head.",
                        "desc2" : "As ISA-VIT is a nonprofit student organisation, fund-raising and sponsorship helps us successfully conduct events and build long lasting relations with many major companies.",
                        "desc3" : "",
                        "desc4" : ""
                      },
                      {
                        "id" : "section6",
                        "padding" : "28px",
                        "Name" : "Editorial and PR",
                        "imgsrc" : "img/editorial.png",
                        "desc1" : "This team is responsible for handling the blog, handling all public relations and providing content for all the formal communication that takes place from the chapter.",
                        "desc2" : "ISA-VIT's blog section makes sure that students get to learn about new technological advancements, thus supplementing the technical sessions conducted.",
                        "desc3" : "",
                        "desc4" : ""
                      }
                    ]
                  });

                app.controller("alumni", function($scope,$http) {
                      $scope.main=false;
                      $scope.add=false;
                      $scope.view=false;
                      $scope.reverseSort = false;
                      $scope.data = false;
                      $scope.contact = false;
                      $scope.truedat = true;

                      $http.get('view_Alumni.php')
                      .then(function(response) {
                      console.log(response.data);
                      $scope.Details = response.data;
                    })

                    $scope.viewprofile = function() {
                      $scope.view = !($scope.view);
                      $scope.main = !($scope.main);
                    }

                    $scope.addnew = function() {
                      $scope.add = !($scope.add);
                      $scope.main = !($scope.main);
                    }



                    $scope.addMember = function() {
                      var txt;
                      var pintext = prompt("Please enter ISA-PIN mentioned in description of Whatsapp Group:", "ISA-PIN");

                      if (pintext == "IsAwALE") {
                        console.log("1234");
   									 		$http({
   												method:'post',
   												url:'add_Alumni.php',
   												data: {'name':$scope.name,'mobile':$scope.mobile,'email':$scope.email,'job':$scope.job,'city':$scope.city,'year':$scope.year}
   											})
   											.success(function(data) {
   												console.log(data);
                          {

                             var form_data = new FormData();
                             angular.forEach($scope.files, function(file){
                                  form_data.append('file', file);
                             });
                             $http.post('upload.php', form_data,
                             {
                                transformRequest: angular.identity,
                                headers: {'Content-Type': undefined,'Process-Data': false}
                             })
                             .success(function(response) {
                                  alert(response);
                                  $http.get('delete.php')
                                  .then(function(response) {
                                    $http.get('view_Alumni.php')
             												.then(function(response) {
                 		 									 	console.log(response.data);
                 		 										$scope.Details = response.data;
             		 									 })
                                  })
                               });
                             }
   											})
                      }
                      else {
                        alert("You need to be a valid person to sign up for these services.")
                      }
                      $scope.name="";
                      $scope.mobile="";
                      $scope.email="";
                      $scope.job="";
                      $scope.city="";
                      $scope.year="";
 									 }

                   $scope.alumni_contact = function() {
                     var pintext = prompt("Please enter ISA-PIN mentioned in description of Whatsapp Group:", "ISA-PIN");
                     if (pintext == "IsAwALE") {
                       $scope.contact = true;
                     }
                     else {
                       alert("You need to be a valid person to sign up for these services.")
                     }
                   }

                     $scope.sortItem = function(xyz) {
   										if (xyz == $scope.sortby) {
   											$scope.reverseSort = !$scope.reverseSort;
   										}
   										$scope.sortby = xyz;
   									}

                    $scope.detailView = function(name,mobile,email,job,city,year,image) {
                      $scope.viewName = name;
                      $scope.viewMobile = mobile;
                      $scope.viewEmail = email;
                      $scope.viewJob = job;
                      $scope.viewCity = city;
                      $scope.viewYear = year;
                      $scope.viewImage = image;
                      $scope.view = !($scope.view);
                      $scope.data = !($scope.data);
                    }

                    $scope.antiDetails = function() {
                      $scope.view = !($scope.view);
                      $scope.data = !($scope.data);
                    }
                  })
