var HomePageApp = angular.module('HomePageApp', ['ngAnimate', 'ngSanitize']);

HomePageApp.controller('AddBookBankCtrl', function ($scope, $http) {

	$http.post(SITE_URL + '/MemberService/ListBookBank', {'id':member_id}).then(function (response){
		console.log(response.data);
		$scope.ListBookBank = response.data;
	},function (error){
	});

	$scope.DeleteBookBank = function(member_id,bookbank_id){
		$http.post(SITE_URL + '/MemberService/DeleteBookBank', {'member_id':member_id,'bookbank_id':bookbank_id}).then(function (){
			$http.post(SITE_URL + '/MemberService/ListBookBank', {'id':member_id}).then(function (response){
				console.log(response.data);
				$scope.ListBookBank = response.data;
			},function (error){
			});
		});
  };

	$scope.FormSubmit = function (data) {
		console.log($scope.BookBankObject);
		data = $scope.BookBankObject;
		$http.post(SITE_URL + '/MemberService/AddBookBank', data).then(function (){
			$http.post(SITE_URL + '/MemberService/ListBookBank', {'id':member_id}).then(function (response){
				console.log(response.data);
				$scope.ListBookBank = response.data;
			},function (error){
			});
		});
	} // end $scope.SubmitRegister
});

HomePageApp.controller('PanelExtendCtrl', function ($scope, $http) {

	$http.post(SITE_URL + '/MemberService/AccountDetailExtend', {'account_id':account_id}).then(function (response){
		console.log(response.data);
		$scope.ListExtend = response.data;
	},function (error){
	});

	// $scope.MemberExtend = function(member_id){
	// 	$http.post(SITE_URL + '/MemberService/DeleteBookBank', {'member_id':member_id,'bookbank_id':bookbank_id}).then(function (){
	// 		$http.post(SITE_URL + '/MemberService/AccountDetailExtend', {'id':member_id}).then(function (response){
	// 			console.log(response.data);
	// 			$scope.ListExtend = response.data;
	// 		},function (error){
	// 		});
	// 	});
  // };

});
// HomePageApp.controller('ListBookBankCtrl', function ($scope, $http) {
//
// 	$http.post(SITE_URL + '/MemberService/ListBookBank', {'id':member_id}).then(function (response){
// 		console.log(response.data);
// 		$scope.ListBookBank = response.data;
// 	},function (error){
// 	});
// });
