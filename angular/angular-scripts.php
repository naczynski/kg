
<?php 

	if(!array_key_exists("popupless",$koda_angular_params) or ($koda_angular_params["popupless"]==false)){
		get_template_part('contact-popup');
		get_template_part('resource-popup');
		get_template_part('resource-present-popup');
		get_template_part('you-got-present-popup');
		get_template_part('conversation-popup'); 
		get_template_part('send-message-popup');
		get_template_part('user-present-popup');
		get_template_part('award-popup');
	}
	
	get_template_part('progress-bar');
	get_template_part('how-to');

	$alerts_loop = KG_Get::get('KG_Loop_Alerts', get_current_user_id());
	$alerts = $alerts_loop->get();
	$alerts_last_page = $alerts_loop->is_last_page() == true ? 'true' : 'false';

?>

<?php if ( KG_is_production() ): ?>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-63370322-1', 'auto');
	  ga('send', 'pageview');
	</script>
<?php endif ?>

<?php if( KG_is_register_page() ): ?>
	<script type="text/javascript" src="//platform.linkedin.com/in.js">
		api_key:   <?=KG_Config::getProtected('linkein_clinet_id'); ?>

		lang : pl_PL
		authorize: true
	</script>
<?php endif; ?>

<!-- build:js({app,.modules,bower_components}) js/framework.js -->
	<script src="jquery/dist/jquery.js"></script>	
	
	<script src="materialize/js/jquery.easing.1.3.js"></script>
	<script src="materialize/js/animation.js"></script>
	<script src="materialize/js/velocity.min.js"></script>
	<script src="materialize/js/hammer.min.js"></script>
	<script src="materialize/js/jquery.hammer.js"></script>
	<script src="materialize/js/global.js"></script>
	<script src="materialize/js/leanModal.js"></script>
	<script src="materialize/js/waves.js"></script>
	<script src="materialize/js/toasts.js"></script>
	<script src="materialize/js/forms.js"></script>

	<script src="angular/angular.js"></script>
	<script src="angular-animate/angular-animate.js"></script>
	<script src="angular-i18n/angular-locale_pl.js"></script>
	<script src="angular-cookies/angular-cookies.js"></script>

	<script src="bootstrap/js/tooltip.js"></script>		

	<script src="perfect-scrollbar/min/perfect-scrollbar.min.js"></script>
	<script src="perfect-scrollbar/min/perfect-scrollbar.with-mousewheel.min.js"></script>
	<script src="angular-perfect-scrollbar/src/angular-perfect-scrollbar.js"></script>

	<script src="ngInfiniteScroll/build/ng-infinite-scroll.js"></script>
	<script src="ngImgCrop/compile/unminified/ng-img-crop.js"></script>
	<script src="angular-messages/angular-messages.js"></script>

	<script src="js/Modules/Initial.js"></script>
	<script src="js/Modules/Directives.js"></script>
	<script src="js/Modules/Backend.js"></script>
	<script src="js/Modules/ProgressBar.js"></script>
	<script src="js/Modules/Alerts.js"></script>
	<script src="js/Modules/YouGotPresentPopup.js"></script>
	<script src="js/Modules/Conversation.js"></script>
	<script src="js/Modules/ContactPopup.js"></script>
	<script src="js/Modules/UserPresentPopup.js"></script>
	<script src="js/Modules/ResourcePresentPopup.js"></script>
	<script src="js/Modules/SendMessagePopup.js"></script>
	<script src="js/Modules/ConversationPopup.js"></script>
	<script src="js/Modules/AwardPopup.js"></script>
	<script src="js/Modules/ResourcePopup.js"></script>
	<script src="js/Modules/HowTo.js"></script>

	<script src="js/Modules/Header.js"></script>

	<script src="js/Modules/SingleResource.js"></script>
	<script src="js/Apps/Resource.js"></script>
	<script src="js/Apps/Resources.js"></script>
	<script src="js/Apps/MyResources.js"></script>
	<script src="js/Apps/Transactions.js"></script>
	<script src="js/Apps/Finalize.js"></script>
	<script src="js/Apps/Users.js"></script>
	<script src="js/Apps/Register.js"></script>
	<script src="js/Apps/Login.js"></script>
	<script src="js/Apps/Recover.js"></script>
	<script src="js/Apps/Settings.js"></script>
	<script src="js/Apps/NotFound.js"></script>
	<script src="js/Apps/Dummy.js"></script>
	<script src="js/Apps/MyProfile.js"></script>
	<script src="js/Apps/PaymentGateway.js"></script>	
	<script src="js/Apps/NoSubscription.js"></script>
	<script src="js/Apps/NewSubscription.js"></script>
	<script src="js/Apps/Task.js"></script>
	<script src="js/Apps/Tasks.js"></script>
	<script src="js/Apps/Activation.js"></script>
	<script src="js/Apps/FAQ.js"></script>

	<script src="js/Apps/Quiz.js"></script>
	<script src="js/Apps/Quizes.js"></script>

<!-- endbuild --> 

<script>
	//TODO move to config
	KG = {
		pages : {
			resources: '<?= get_permalink( KG_Config::getPublic('recources_page_id') ) ;?>',
			sentPayment : '<?= get_permalink( KG_Config::getPublic('sent_payment') ) ;?>'
		},
		currentUserId : <?=get_current_user_id(); ?>,
		currentPage : '<?=KG_get_curr_page_name(); ?>',
		isNotActiveSubscription : <?=(!KG_get_curr_user()->is_have_active_subscription()) ? 'true' : 'false'; ?>,
		
		mainCategories : [
			<?=KG_Config::getPublic('category_knowledge'); ?>,
			<?=KG_Config::getPublic('category_recommended'); ?>,
			<?=KG_Config::getPublic('category_challenges'); ?>,
			<?=KG_Config::getPublic('category_cim'); ?>
		],

		subscriptions : {
			premium :  <?=KG_Config::getPublic('subscription_premium_id'); ?>,
			normal : <?=KG_Config::getPublic('subscription_normal_id'); ?>
		},
		
		api : {
			register : '<?= KG_get_api_url('api_register'); ?> ',
			login : '<?= KG_get_api_url('api_login'); ?>',
			buy : '<?= KG_get_api_url('api_buy'); ?>',
			like : '<?= KG_get_api_url('api_like'); ?>',
			resources : '<?= KG_get_api_url('api_resources'); ?>',
			recover : '<?= KG_get_api_url('api_recover'); ?>',
			mail : '<?= KG_get_api_url('api_mail'); ?>',
			changeAvatar : '<?= KG_get_api_url('api_change_avatar'); ?>' ,
			changeField : '<?= KG_get_api_url('api_change_field'); ?>',
			changePassword : '<?= KG_get_api_url('api_change_password_settings'); ?>',    
			deleteAccount : '<?= KG_get_api_url('api_delete_account_settings'); ?>' 
		},
		<?php if( KG_is_profile_page() ): ?>
			changeAvatar: {
				tooSmallImage: '<?php printf( __('Wgrałeś za małe zdjęcie, minimalne wymiary to %sx%s(px)', 'kg') , KG_Config::getPublic('big_thumb_w'), KG_Config::getPublic('big_thumb_w') ); ?>', 
				errorImage: '<?= __('Wystąpił błąd podczas wczytywania obrazka, na pewno ma rozszerzenie jpg, gif lub png?', 'kg'); ?>',
				notSupport: '<?= __('Przykro nam ale Twoja przeglądarka nie wspiera przycinania obrazków.', 'kg'); ?>', 
				minSize: <?= KG_Config::getPublic('big_thumb_w'); ?>,
				reloadAfter : '<?= get_permalink( KG_Config::getPublic('my_profile_page_id') ); ?>'
			}
		<?php endif; ?>
	};

	angular.module('Initial',[])
		.value('basket',<?=json_encode(KG_Get::get('KG_Basket'));?>)
		.value('alerts',<?=json_encode($alerts);?>)
		.value('alertsIsLastPage',<?= $alerts_last_page;?>)
		.value('alertsUnreaded', <?=KG_Get::get('KG_Alerts_Not_Readed_Counter')->get_quantity_not_read(get_current_user_id());?>)
	<?php foreach($koda_angular_init as $key => $value):?>
		.value('')
		.value('<?=$key?>',<?=$value?>)
	<?php endforeach; ?>
	;
</script>