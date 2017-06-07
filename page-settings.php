<?php /* Template Name: ustawienia */ ?>
<?php 

	if(Angular::wrap())
		return; 

	the_post();

	Angular::params([
		'application' => 'Settings',
	]);
	$settings = '{"email":""}';
	Angular::init('settings',$settings);
?>

<body class="Layout-body" ng-controller="SettingsCtrl">
	<?php get_header(); ?>
	<div class="Layout-content">
		<main class="Layout-main Scrollable">
			<div class="Scrollable-wrapper">
				<div class="Scrollable-scrolled BigCard-container">
					<div class="BigCard" ng-cloak>
						<div class="BigCard-decoration Settings-decoration">
							<div class="BigCard-decorationIcon Settings-decorationIcon">
								<?= the_svg_asset('gear'); ?>
							</div>
							<span class="BigCard-decorationLabel">Ustawienia</span>
						</div>
						<div class="BigCard-main">
							<ul class="BigCard-tabs">
								<li class="BigCard-tab Settings-tab" ng-click="activeTab='general'" ng-class="{ 'BigCard-tab--active': activeTab=='general' }">Ogólne</li>
								<li class="BigCard-tab Settings-tab" ng-click="activeTab='delete'"  ng-class="{ 'BigCard-tab--active': activeTab=='delete' }">Wyłącz konto</li>
							</ul>
							<div class="BigCard-content Settings-content">
								
								<div ng-show="activeTab=='general'" ng-controller="SettingsGeneralCtrl as general"  ng-init="security=getSecurity()">
									<form id="form-change-password">
										<?php wp_nonce_field( KG_Config::getPublic('change_password_settings_nonce') ,'security');?>
										<div class="input-field" layout-padding layout-margin>
											<input name="<?=KG_Config::getPublic('name_current_password');?>" type="password" ng-model="passwordCurrent" id="settings_password_field">
											<label for="settings_password_field" class="force-active">Aktualne hasło</label>
										</div> 
										<div layout="row">
											<div class="input-field" layout-padding flex>
												<input name="<?=KG_Config::getPublic('name_new_password_01');?>" placeholder="Hasło musi mieć przynajmniej 6 znaków." type="password" ng-model="password" id="settings_password_field">
												<label for="settings_password_field" class="force-active">Hasło</label>
											</div>
											<div class="input-field" layout-padding flex>
												<input name="<?=KG_Config::getPublic('name_new_password_02');?>" placeholder="Hasło musi mieć przynajmniej 6 znaków."  type="password" ng-model="passwordConfirm" id="settings_password_confrim_field">
												<label for="settings_password_confrim_field" class="force-active">Powtórz hasło</label>
											</div>
											<div class="input-field" layout-padding>
												<button ng-disabled="!passwordValid()"  ng-click="changePassword()" class="Button Settings-button">Zmień hasło</button>
											</div> 
										</div>
										<p layout-padding class="center-align label-password-change"><?=__( 'Po poprawnej zmianie hasła zostaniesz automatycznie wylogowany. Następnie będziesz mógł zalogować się przy użyciu nowego hasła.', 'kg' ) ;?></p>
									</form>
								</div>

								<div ng-show="activeTab=='delete'" ng-controller="SettingsDeleteTabCtrl as delete" ng-init="security=getSecurity()">
									<form id="form-delete-account">
										<?php wp_nonce_field( KG_Config::getPublic('remove_settings_nonce') ,'security');?>
										<div layout-padding>
											<?php _e( 'Wyłączenie konta  spowoduje, że stracisz możliwość logowania się na naszej Platformie. Na pewno chcesz to zrobić?', 'kg' ); ?>
										</div>
										<div layout-padding>
											<input type="checkbox" class="filled-in" id="delete-account-understand" ng-click="userUnderstand=!userUnderstand" />
											<label for="delete-account-understand"><?php _e( 'Rozumiem konsekwencje', 'kg' ); ?></label>
										</div>
										<button ng-disabled="!userUnderstand"  ng-click="deleteAccount()" class="Button Settings-button">
											<?= __( 'Wyłącz konto', 'kg' ); ?>
										</button>
									</form>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
</body>