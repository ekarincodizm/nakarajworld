if (typeof jQuery === "undefined") {
    throw new Error("jQuery plugins need to be before this file");
}

var AdminApp = angular.module('AdminApp', ['ngAnimate', 'ngSanitize']);

AdminApp.controller('MemberCtrl', function ($scope, $http) {
  $scope.loading = true;
  $http.get(SITE_URL + '/MemberService/MemberList').success(function (data) {
    $scope.MemberList = data;

  }).error(function () {});
});

AdminApp.controller('MemberProfileCtrl', function ($scope, $http, $location, $window) {
  var data = $location.absUrl().split("/");
  $scope.member_id = data[7];
	if($scope.member_id) {
		$http.post(SITE_URL + '/MemberService/LoadProfile', {'id':$scope.member_id}).success(function (data) {
			console.log(data);
			var card_type = "";
			if(data.Profile[0].member_id_card_type==1){
				card_type = "หมายเลขประจำตัวประชาขน";
			}else if(data.Profile[0].member_id_card_type==2) {
				card_type = "Passport";
			}else if(data.Profile[0].member_id_card_type==3) {
				card_type = "Work Permit";
			}
			$scope.member_id = data.Profile[0].member_id;
			$scope.member_prefix = data.Profile[0].member_prefix;
			$scope.member_firstname = data.Profile[0].member_firstname;
			$scope.member_lastname = data.Profile[0].member_lastname;
			$scope.member_id_card_type = card_type;
			$scope.member_citizen_id = data.Profile[0].member_citizen_id;
			$scope.member_born = data.Profile[0].member_born;
			$scope.member_age = data.Profile[0].member_age;
			$scope.member_phone = data.Profile[0].member_phone;
			$scope.member_email = data.Profile[0].member_email;
			$scope.member_address = data.Profile[0].member_address;
			$scope.member_line_id = data.Profile[0].member_line_id;
			$scope.member_skype = data.Profile[0].member_skype;
			$scope.member_whatapp = data.Profile[0].member_whatapp;
			$scope.member_contact_etc = data.Profile[0].member_contact_etc;
			$scope.member_status = data.Profile[0].member_status;

			$scope.AccountList = data.AccountList;

		}).error(function () {

		});
	}
});
