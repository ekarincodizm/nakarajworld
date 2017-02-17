var HomePageApp = angular.module('HomePageApp', ['ngAnimate', 'ngSanitize', 'ngLocale']);

HomePageApp.controller('AddBookBankCtrl', function ($scope, $http) {

	$http.post(SITE_URL + '/MemberService/ListBookBank', {'id':member_id}).then(function (response){
		// console.log(response.data);
		$scope.ListBookBank = response.data;
	},function (error){
	});

	$scope.FormSubmit = function (data) {
			console.log($scope.BookBankObject);
			data = $scope.BookBankObject;
			$http.post(SITE_URL + '/MemberService/AddBookBank', data).then(function (){
				$scope.BookBankObject.bank_id = null;
				$scope.BookBankObject.bookbank_bank_branch = null;
				$scope.BookBankObject.bookbank_account = null;
				$scope.BookBankObject.bookbank_number = null;
				$http.post(SITE_URL + '/MemberService/ListBookBank', {'id':member_id}).then(function (response){
					console.log(response.data);
					$scope.ListBookBank = response.data;
				},function (error){
				});
			});
		} // end $scope.SubmitRegister

	// $scope.DeleteBookBank = function(member_id,bookbank_id){
	// 	$http.post(SITE_URL + '/MemberService/DeleteBookBank', {'member_id':member_id,'bookbank_id':bookbank_id}).then(function (){
	// 		$http.post(SITE_URL + '/MemberService/ListBookBank', {'id':member_id}).then(function (response){
	// 			console.log(response.data);
	// 			$scope.ListBookBank = response.data;
	// 		},function (error){
	// 		});
	// 	});
	// };
			$scope.DisableBookBank = function(member_id,bookbank_id,bookbank_status){
				$http.post(SITE_URL + '/MemberService/DisableBookBank', {'member_id':member_id,'bookbank_id':bookbank_id,'bookbank_status':bookbank_status}).then(function (){
					$http.post(SITE_URL + '/MemberService/ListBookBank', {'id':member_id}).then(function (response){
						console.log(response.data);
						$scope.ListBookBank = response.data;
					},function (error){
					});
				});
			};

});


HomePageApp.controller('PanelExtendCtrl', function ($scope, $http, $window) {
	$http.post(SITE_URL + '/MemberService/AccountDetailExtend', {'account_id':account_id}).then(function (response){
		// console.log("History");
		// console.log(response.data);
		$scope.date_now = moment().format('YYYY-MM-DD');
		$scope.ListExtend = response.data;
		$scope.LastListExtend = $scope.ListExtend[0];
		$scope.accounting_id = $scope.LastListExtend.accounting_id;

	},function (error){});

	$scope.MemberExtend = function(member_id){
		$http.post(SITE_URL + '/MemberService/AddAccountDetailExtend', {'member_id':member_id,'account_id':account_id}).then(function (response){
			$scope.date_now = moment().format('YYY-MM-DD');
				$scope.ListExtend = response.data.AccountDetailExtend;
				$scope.LastListExtend = $scope.ListExtend[0];
				$scope.accounting_id = response.data.accounting_id;

		});
	};

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

HomePageApp.controller('PanelUpclassCtrl', function ($scope, $http) {
	$http.post(SITE_URL + '/MemberService/AccountDetailUpclass', {'account_id':account_id}).then(function (response){
		// console.log("History");
		// console.log(response.data);
		// $scope.date_now = moment().format('YYYY-MM-DD');
		$scope.ListUpclass = response.data;
		// $scope.LastListExtend = $scope.ListExtend[$scope.ListExtend.length - 1]
		// console.log($scope.LastListExtend);
	},function (error){});

	$scope.AccountUpclass = function(member_id){
		$http.post(SITE_URL + '/MemberService/AddAccountDetailUpclass', {'member_id':member_id,'account_id':account_id}).then(function (){
			$http.post(SITE_URL + '/MemberService/AccountDetailUpclass', {'account_id':account_id}).then(function (response){
				$scope.date_now = moment().format('YYY-MM-DD');
				$scope.ListUpclass = response.data;
				// console.log($scope.LastListExtend);
			},function (error){
			});
		});
	};
});
// HomePageApp.controller('ListBookBankCtrl', function ($scope, $http) {
//
// 	$http.post(SITE_URL + '/MemberService/ListBookBank', {'id':member_id}).then(function (response){
// 		console.log(response.data);
// 		$scope.ListBookBank = response.data;
// 	},function (error){
// 	});
// });
