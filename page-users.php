<?php /* Template Name: Użytkownicy */ ?>
<?php 

	if(!KG_get_curr_user()->can_networking()){
		wp_redirect('/');
	}

    if(Angular::wrap())
        return; 

    the_post();

    Angular::params([
        'application' => 'Users',
    ]);

    Angular::init('users',json_encode(KG_Get::get('KG_User_Loop')->get(['page' => 1, 's' => ''])));
?>

<body class="Layout-body" ng-controller="UsersCtrl">
	<?php get_header(); ?>
	<div class="Layout-content">
		<?php get_sidebar('users'); ?>
		<main class="Layout-main Scrollable">
            <div id="resources-wrapper" class="Scrollable-wrapper">
				<ul class="Scrollable-scrolled" ng-cloak layout-padding ng-show="users.length > 0" infinite-scroll-container="'#resources-wrapper'" infinite-scroll="loadNextPage()">
					<li class="UserCard" ng-repeat="user in users" layout="row" layout-margin layout-align="space-between center">
						<img ng-src="{{user.avatar}}" class="UserCard-avatar" ng-class="'user-color-'+user.type">
						<div class="UserCard-data" flex layout="column" layout-align="space-around start">
							<h5 class="UserCard-name"><i class="UserCard-star kg-icons" ng-if="user.isHavePremiumSubscription">star</i>{{user.name}}</h5>
							<span class="UserCard-description" ng-bind="user.desc"></span>
							<small class="UserCard-lastLogin" ng-if="user.lastLogged" ng-bind="user.lastLogged"></small>
						</div>
						<div layout="column" layout-align="space-around">
							<button class="Button Button--iconifiedLeft Button--sentMessageUsers Button--transparentFree" ng-click="sendMessageTo(user)"><i class="material-icons">email</i>Wyślij wiadomość</button>
							<button class="Button Button--iconifiedLeft Button--presentUsers Button--transparentFree" ng-click="makePresent(user)"><i class="kg-icons">present</i>Podaruj prezent</button>
						</div>
					</li>
				</ul>
				<div class="Scrollable-scrolled" ng-show="users.length == 0" layout="column" layout-align="center center" flex ng-cloak>
					<h5 class="center users-not-found">Nie znaleziono żadnych użytkowników.</h5>
				</div>
			</div>
		</main>
	</div>
</body>