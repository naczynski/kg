<?php 

	if(Angular::wrap())
		return; 

    Angular::params([
        'application' => 'Login',
        'popupless' => true
    ]);

    KG_Get::get('KG_Linkedin')->log_in_action();
?>

<body class="Layout-body" ng-controller="LoginCtrl">
	<div class="Layout-content">
		<main class="Layout-main Scrollable">
			<div class="Scrollable-wrapper">
				<div class="Scrollable-scrolled BigCard-container">
					<div class="BigCard LRR-card--singleColumn">
						<div class="BigCard-decoration LRR-decoration--login">
							<div class="BigCard-decorationIcon">
								<?= the_svg_asset('latch'); ?>
							</div>
							<span class="BigCard-decorationLabel">Logowanie</span>
						</div>
						<div class="BigCard-main">
							<img class="BigCard-logo" src="<?= the_asset_uri('logo-cocpit-blue.png')?>">

							<div class="BigCard-content LRR-content">
								<form autocomplete="off" layout="column" class="LRR-form" flex layout-align="space-around">
									<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
									<div class="LRR-inputField LRR-inputFieldLogin input-field">
										<label set-active-input for="username">E-mail</label>
										<input type="email" name="username" required>
									</div>
									<div class="input-field  LRR-inputFieldLogin LRR-inputField">
										<label set-active-input for="password">Hasło</label>
										<input type="password" name="password" required ng-keyup="$event.keyCode == 13 ? login() : null">
									</div>
									<p layout="column" layout-margin class="LRR-checkbox">
										<input type="checkbox" id="keep_loged" class="filled-in" checked="checked" />
										<label for="keep_loged" layout-margin flex>Nie wylogowuj mnie</label>
									</p>
									
									<div class="LRR-footerButton Button Button-wide Button--blue Button--centerdText" ng-click="login()">Zaloguj się</div>
									<span class="LRR-or">lub</span>
									<a href="<?= KG_Get::get('KG_Linkedin')->get_url(); ?>" class="LRR-footerButton Button Button-wide Button--darkBlue Button--iconifiedLeft Button--centerdText"><i class="LRR-linkedin"><?= the_svg_asset('linkedin_white'); ?></i>Zaloguj się przy pomocy LinkedIn</a>
								</form>
							</div>
							<div class="BigCard-footer">
								<a class="LRR-footerButton Button Button--wide Button--transparentFree Button--centerdText" href="<?= get_permalink(KG_Config::getPublic('recover_password_page_id'))?>">Nie pamiętasz hasła?</a>
								<a class="LRR-footerButton Button Button--wide Button--cost Button--iconifiedLeft Button--centerdText" href="<?= get_permalink(KG_Config::getPublic('register_page_id'))?>"><i class="material-icons">person_add</i>Rejestracja</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
</body>