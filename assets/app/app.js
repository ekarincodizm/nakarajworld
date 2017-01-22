var HomePageApp = angular.module('HomePageApp', ['ngAnimate', 'ngSanitize']);

HomePageApp.controller('HomePageCtrl', function ($scope, $http, $window) {
	$scope.loading = true;
	$http.get(SITE_URL + '/HomePageService/LoadSetting').success(function (data) {
		// console.log(data);
		$scope.SiteName = data[0].frontend_setting_website_name;
		$scope.SiteID = data[0].frontend_setting_id;
		$scope.loading = false;
	}).error(function () {
		$scope.SiteName = "ขัดข้อง";
		$scope.loading = false;
	});
});

HomePageApp.controller('CheckRegisCtrl', function ($scope, $http, $window) {
	$scope.CheckRegis = function () {
		$scope.find = true;
		$http.post(SITE_URL + '/HomePageService/CheckRegis', {
			'member_id_card_type': $scope.member_id_card_type,
			'member_citizen_id': $scope.member_citizen_id
		}).success(function (data) {
			if (data.length > 0) {
				$scope.duplicate = true;
				$scope.avariable = false;
			} else {
				$window.location.href = SITE_URL + '/HomePage/RegisterPage/' + $scope.member_id_card_type + '/' + $scope.member_citizen_id;
			}
			$scope.find = false;
		}).error(function (data) {});
	};
});

HomePageApp.controller('RegisterCtrl', function ($scope, $http, $location) {

	var data = window.location.href.split("/");
	 console.log(window.location.href);
	console.log(data);
	$scope.member_id_card_type = data[7];
	$scope.member_citizen_id = data[8];
	$type = $scope.member_id_card_type;
	if ($type == 1) {
		$scope.member_id_card_type_name = 'บัตรประจำตัวประชาชน';
	} else if ($type == 2) {
		$scope.member_id_card_type_name = 'Passport';
	} else if ($type == 3) {
		$scope.member_id_card_type_name = 'Work Permit';
	}

	$scope.SubmitProfile = function () {
			$scope.SendForm = true;
			$scope.Loading = true;
			$http.post(SITE_URL + '/HomePageService/SubmitProfile', {
				'member_id_card_type': $scope.member_id_card_type,
				'member_citizen_id': $scope.member_citizen_id,
				'member_prefix': $scope.member_prefix,
				'member_firstname': $scope.member_firstname,
				'member_lastname': $scope.member_lastname,
				'member_born': $scope.member_born,
				'member_age': $scope.member_age,
				'member_address': $scope.member_address,
				'member_email': $scope.member_email,
				'member_line_id': $scope.member_line_id,
				'member_whatapp': $scope.member_whatapp,
				'member_contact_etc': $scope.member_contact_etc,
			}).success(function (data) {
				// $scope.AddSuccess = true;
				// $scope.AddFail = false;
				// console.log(data);

				$scope.FirstName = data[0].member_firstname;
				$scope.LastName = data[0].member_lastname;
			}).error(function () {
				$scope.AddFail = true;
				$scope.SendForm = false;
			});
			$scope.Loading = false;
		} // end $scope.SubmitRegister
});

HomePageApp.controller('LoginCtrl', function ($scope, $http, $location, $window) {
	$scope.SubmitLogin = function () {
			$scope.Loading = true;
			$http.post(SITE_URL + '/HomePageService/SubmitLogin', {
				'user_name': $scope.user_name,
				'user_pass': $scope.user_pass,
			}).success(function (data) {
				if (data.status == true) {
					$window.location.href = SITE_URL + '/HomePage/Profile';
				} else {
					$scope.LoginFail = true;
					$scope.SendForm = false;
				}
			}).error(function (data) {});
			$scope.Loading = false;
		} // end $scope.SubmitRegister
});

HomePageApp.controller('ProfileCtrl', function ($scope, $http, $location, $window) {
	if (MEMBER_ID) {
		$http.post(SITE_URL + '/HomePageService/LoadProfile', {
			'id': MEMBER_ID
		}).success(function (data) {
			console.log(data);
			var card_type = "";
			if (data.Profile[0].member_id_card_type == 1) {
				card_type = "หมายเลขประจำตัวประชาขน";
			} else if (data.Profile[0].member_id_card_type == 2) {
				card_type = "Passport";
			} else if (data.Profile[0].member_id_card_type == 3) {
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
			$scope.status = data.Profile[0].member_status;
		}).error(function () {

		});

	}
});

HomePageApp.controller('EditProfileCtrl', function ($scope, $http, $location, $window) {

	if (MEMBER_ID) {
		$http.post(SITE_URL + '/HomePageService/LoadProfile', {
			'id': MEMBER_ID
		}).success(function (data) {
			console.log(data);
			var card_type = "";
			if (data.Profile[0].member_id_card_type == 1) {
				card_type = "หมายเลขประจำตัวประชาขน";
			} else if (data.Profile[0].member_id_card_type == 2) {
				card_type = "Passport";
			} else if (data.Profile[0].member_id_card_type == 3) {
				card_type = "Work Permit";
			}
			$scope.member_id = data.Profile[0].member_id;
			$scope.member_prefix = data.Profile[0].member_prefix;
			$scope.member_firstname = data.Profile[0].member_firstname;
			$scope.member_lastname = data.Profile[0].member_lastname;
			$scope.member_id_card_type = data.Profile[0].member_id_card_type;
			$scope.member_id_card_type_name = card_type;
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
			$scope.status = data.Profile[0].member_status;


		}).error(function () {});

	}

	$scope.SubmitProfile = function () {
			$scope.SendForm = true;
			// $scope.Loading = true;
			$http.post(SITE_URL + '/HomePageService/SubmitProfile', {
				'member_id': $scope.member_id,
				'member_id_card_type': $scope.member_id_card_type,
				'member_citizen_id': $scope.member_citizen_id,
				'member_prefix': $scope.member_prefix,
				'member_firstname': $scope.member_firstname,
				'member_lastname': $scope.member_lastname,
				'member_born': $scope.member_born,
				'member_age': $scope.member_age,
				'member_address': $scope.member_address,
				'member_phone': $scope.member_phone,
				'member_email': $scope.member_email,
				'member_skype': $scope.member_skype,
				'member_line_id': $scope.member_line_id,
				'member_whatapp': $scope.member_whatapp,
				'member_contact_etc': $scope.member_contact_etc,
			}).success(function (data) {
				$window.location.href = SITE_URL + '/HomePage/Profile';

				// $scope.AddSuccess = true;
				// $scope.AddFail = false;
				// // console.log(data);
				// $scope.FirstName = data[0].member_firstname;
				// $scope.LastName = data[0].member_lastname;
			}).error(function () {
				// $scope.AddFail = true;
				// $scope.SendForm = false;
			});
			$scope.Loading = false;
		} // end $scope.SubmitRegister
});
HomePageApp.directive('PrintDirective', function () {
	return {
		templateUrl: SITE_URL + '/HomePage/TemplatePrintRegister'
	};
});

HomePageApp.controller('AddBookBankCtrl', function ($scope, $http) {

	$scope.FormSubmit = function (data) {
		console.log($scope.BookBankObject);
		data = $scope.BookBankObject;
		$http.post(SITE_URL + '/MemberService/AddBookBank', data).then(function (){
				console.log("inserted Successfully");
		});
	} // end $scope.SubmitRegister
});
