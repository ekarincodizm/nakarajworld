var HomePageApp = angular.module('HomePageApp', ['ngAnimate', 'ngSanitize']);

HomePageApp.controller('AddBookBankCtrl', function ($scope, $http) {

	$scope.FormSubmit = function (data) {
		console.log($scope.BookBankObject);
		data = $scope.BookBankObject;
		$http.post(SITE_URL + '/MemberService/AddBookBank', data).then(function (){
				console.log("inserted Successfully");
		});
	} // end $scope.SubmitRegister
});
