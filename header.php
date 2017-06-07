<?php
	$isUserInfoView = is_page(KG_Config::getPublic('setting_page_id')) || is_page(KG_Config::getPublic('my_profile_page_id'));
	$isUsersView = is_page(KG_Config::getPublic('users_page_id'));
	$isTasksView = is_page( KG_Config::getPublic('quizes_page_id') ) || is_singular('quiz') ||  is_page( KG_Config::getPublic('my_tasks_page_id') ) || is_singular('task');
	$isResourcesView = is_page(KG_Config::getPublic('my_resources_page_id')) || is_page(KG_Config::getPublic('recources_page_id'));

	$active_subscription = KG_get_curr_user()->get_current_subscription();
	$active_subscrition_data = $active_subscription ? $active_subscription : array();
	$enable_free_resources = $active_subscription ? $active_subscription->is_enable_free_resources() : false;

	$copy_buy_subscription = $active_subscription ? __( 'Odnów', 'kg' ) : __( 'Kup', 'kg' );
	$userType = KG_get_curr_user()->get_type();
?>

<nav class="card-panel Layout-header" ng-init='subscriptionStatus=<?=json_encode($active_subscrition_data);?>' ng-controller="HeaderCtrl">
	<div class="nav-base" layout="row">
		<a class="blue nav-logo" href="/" layout="column" layout-align="center center" layout-padding>
			<img class="circle nav-logo-img" src="<?= the_asset_uri('logo-cocpit.png'); ?>">
		</a>
		<div flex></div>
		<ul class="nav-tabs" layout="row">

			<li id="header-my-tasks-tab" class="cursor-pointer nav-section nav-tab cursor-pointer" layout-padding layout layout-align="center center" ng-click="expanded=(expanded!=='my-tasks') ? 'my-tasks': null" ng-class="{'active':((expanded===undefined))&&<?=$isTasksView?'true':'false';?>||(expanded=='my-tasks')}">
				<span>WYZWANIA</span>
			</li>

			<?php if (KG_get_curr_user()->can_networking()): ?>
			<li layout>
				<a class="cursor-pointer nav-section nav-tab cursor-pointer" ng-class="{'active':(expanded===undefined)&&<?=$isUsersView?'true':'false';?>}" layout layout-align="center center" layout-padding href="<?= get_permalink( KG_Config::getPublic('users_page_id') ); ?>" >
					<span>NETWORKING</span>
				</a>
			</li>
			<?php endif; ?>
			<li id="header-resources-tab" class="<?=KG_get_active_resource_page(); ?> cursor-pointer nav-section nav-tab cursor-pointer" layout-padding layout layout-align="center center" ng-click="expanded=(expanded!=='resources')?'resources':null" ng-class="{'active':((expanded===undefined)&&<?=$isResourcesView?'true':'false';?>)||(expanded=='resources')}">
				<span>ZASOBY</span>
			</li>
		</ul>

		<div id="header-user-tab" class="nav-tab cursor-pointer nav-section nav-user nav-user-avatar-container" layout="row" layout-align="center center" ng-click="expanded=(expanded=='self')?'':'self'"  ng-class="{'active':((expanded===undefined)&&<?=$isUserInfoView?'true':'false';?>)||(expanded=='self')}">
			<span class="center" layout-padding ng-bind="(userName||userSurname)?(userName+' '+userSurname):'<?= KG_get_curr_user()->get_name_and_surname(); ?>'"><?= KG_get_curr_user()->get_name_and_surname(); ?></span>
			<img layout-margin src="<?= KG_get_curr_user()->get_avatar() ;?>" ng-src="{{cropAvatarImage || '<?= KG_get_curr_user()->get_avatar() ;?>'}}" class="nav-avatar user-color-<?=$userType;?>"/>
		</div>
		<div layout-margin class="nav-icon cursor-pointer" layout layout-align="center center" ng-click="expanded=(expanded=='basket')?'':'basket'"  ng-class="expanded=='basket'?'active':''">
			<div class="resource_icon shop"></div>	
			<span ng-bind="basket.items_in_basket" ng-show="basket.items_in_basket > 0" class="nav-badge white-text center" ng-cloak></span>
		</div>

		<div class="nav-icon cursor-pointer" layout layout-align="center center" ng-click="expanded=(expanded=='alerts')?'':'alerts'"  ng-class="expanded=='alerts'?'active':''">
			<div class="resource_icon alerts"></div>	
			<span ng-bind="alerts" ng-show="alerts > 0" class="nav-badge white-text center" ng-cloak></span>
		</div>
		<div layout-margin class="nav-icon cursor-pointer" layout layout-align="center center" ng-click="expanded=(expanded=='info')?'':'info'" ng-class="expanded=='info'?'active':''">
			<div class="resource_icon info"></div>	
		</div>
	
	</div>
	<div class="nav-expansion white-text" ng-class="{'open':expanded=='my-tasks'}"  layout="row" layout-align="end">
		<ul align-under="header-my-tasks-tab" class="nav-tabs" layout="row">
			<li layout="row">
				<a href="<?= get_permalink( KG_Config::getPublic('quizes_page_id') ); ?>" class="cursor-pointer nav-tab white-text" layout-padding layout layout-align="center center" href="#" ng-click="expanded=null">
					<span class="white-text">Moje quizy</span>
				</a>
			</li>
			<li layout="row">
				<a href="<?= get_permalink( KG_Config::getPublic('my_tasks_page_id') ); ?>" class="cursor-pointer nav-tab white-text" layout-padding layout layout-align="center center" href="#" ng-click="expanded=null">
					<span class="white-text">Moje zadania</span>
				</a>
			</li>
		</ul>
	</div>
	<div class="nav-expansion white-text" ng-class="{'open':expanded=='info'}"  layout="row" layout-align="end">
		<ul class="nav-tabs" layout="row">
			<li layout="row">
				<a class="cursor-pointer nav-tab white-text" layout-padding layout layout-align="center center" href="#" ng-click="openContact()" ng-click="expanded=null">
					<span class="white-text">Kontakt</span>
				</a>

			</li>
			<li layout="row">
				<a class="cursor-pointer nav-tab white-text" layout-padding layout layout-align="center center" target="_blank" href="#howto" ng-click="expanded=null">
					<span class="white-text">Jak to działa?</span>
				</a>	
			</li>
			<li layout="row">
				<a class="cursor-pointer nav-tab white-text" layout-padding layout layout-align="center center" target="_blank" href="<?= get_permalink( KG_Config::getPublic('faq_page_id') ); ?>" ng-click="expanded=null">
					<span class="white-text">FAQ</span>
				</a>
			</li>
		</ul>
	</div>
	<div class="nav-expansion white-text" ng-class="{'open':expanded=='resources'}" layout="row">
		
		<?php if($enable_free_resources): ?>
			<div layout-padding layout-align="center center" layout="row" class="nav-self-subscription-info">
				<span>Zasoby w ramach abonamentu:&nbsp;</span>
				<span class="free-resources-start">0</span>
				<div layout="row" class="nav-progressbar-with-counters">
					<div ng-class="{'few-resources' : subscriptionStatus.is_few_free_resources}" class="nav-progressbar">
						<span ng-class="{'dark-text' : isBlueLabel(), 'red-text': subscriptionStatus.is_few_free_resources}" class="nav-progressbar-label {{subscriptionStatus.counter_class}}">{{subscriptionStatus.free_resources_remaining}}</span>
				
						<div class="nav-progressbar-value" style="width: {{subscriptionStatus.free_resources_percange_used}}%;">
						</div>
					</div>
				</div>
				<span>{{subscriptionStatus.free_resources_all}}</span>
			</div>
		<?php endif; ?>

		<div flex></div>
		<ul class="nav-tabs" layout="row" align-under="header-resources-tab">
			<li layout="row">
				<a class="cursor-pointer nav-tab <?//=KG_is_resource_page() ? 'active' : '';?> white-text" layout-padding layout layout-align="center center" href="<?= get_permalink( KG_Config::getPublic('recources_page_id') ); ?>" ng-click="expanded=null">
					<span class="white-text">Wszystkie</span>
				</a>
			</li>
			<li layout="row">
				<a class="cursor-pointer <?//=KG_is_my_resources_page() ? 'active' : '';?> nav-tab white-text" layout-padding layout layout-align="center center" href="<?= get_permalink( KG_Config::getPublic('my_resources_page_id') ); ?>" ng-click="expanded=null">
					<span class="white-text">Moje</span>
				</a>
			</li>
		</ul>
	</div>
	<div class="nav-expansion white-text" ng-class="{'open':expanded=='self'}" layout="row">
		<?php 
		if($active_subscription):
			$subscription = KG_get_curr_user()->get_current_subscription();
		?>
		<div layout-padding layout-align="center center" layout="row" class="nav-self-subscription-info">
			<span>Abonament&nbsp;</span>
			<div layout="row" class="nav-progressbar-with-counters">
				<div class="nav-progressbar">
					<div class="nav-progressbar-value <?= KG_get_curr_user()->is_user_on_end_of_subscription()?'red':''?>" style="width: <?= KG_get_curr_user()->get_days_subscription_elapsed_percange(); ?>%;"></div>
				</div>
			</div>
			<span>Pozostało <?= KG_get_curr_user()->get_days_to_end_all_subscriptions(); ?> dni</span>
		</div>
		<?php else: ?>
			<div layout-padding layout-align="center center" layout="row">
				<span class="white-text">Brak abonamentu!</span>
			</div>
		<?php endif; ?>
		
		<?php if(!KG_get_curr_user()->is_cim()): ?>
			<div layout="column" layout-align="center center">
				<a href="<?= get_permalink(KG_Config::getPublic('extend_subscription_page_id')); ?>" class="Button Button--centerdText Button--iconifiedLeft Button--cost" layout-padding ng-click="expanded=null">
					<i class="material-icons">shopping_cart</i><?= $copy_buy_subscription; ?>
				</a>
			</div>
		<?php endif; ?>

		<div flex></div>
		<ul class="nav-tabs" layout="row" layout-align="center" align-under="header-user-tab">
			<li layout="row">
				<a class="cursor-pointer <?//=KG_is_profile_page() ? 'active' : '';?> nav-tab white-text" layout-padding layout layout-align="center center" href="<?= get_permalink( KG_Config::getPublic('my_profile_page_id') ); ?>" ng-click="expanded=null">
					<span class="white-text">Profil</span>
				</a>
			</li>
			<li layout="row">
				<a class="cursor-pointer <?//=KG_is_settings_page() ? 'active' : '';?> nav-tab white-text" layout-padding layout layout-align="center center" href="<?= get_permalink( KG_Config::getPublic('setting_page_id') ); ?>" ng-click="expanded=null">
					<span class="white-text">Ustawienia</span>
				</a>
			</li>
			<li layout="row">
				<a class="cursor-pointer <?//=KG_is_settings_page() ? 'active' : '';?> nav-tab white-text" layout-padding layout layout-align="center center" href="<?= get_permalink( KG_Config::getPublic('my_trasaction_page_id') ); ?>" ng-click="expanded=null">
					<span class="white-text">Moje transakcje</span>
				</a>
			</li>
		</ul>
		<div layout-padding class="nav-tab nav-logout cursor-pointer" layout layout-align="center center" ng-click="expanded=null">
			<a href="<?= wp_logout_url(get_permalink(KG_Config::getPublic('login_page_id'))); ?>" class="resource_icon logout" layout-padding  ng-click="expanded=null"></a>
		</div>
	</div>
	<?php get_template_part('basket'); ?>
	<?php get_template_part('alerts'); ?>
</nav>