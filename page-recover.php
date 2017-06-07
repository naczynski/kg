<?php 

	if(Angular::wrap())
		return; 

	Angular::params([
		'application' => 'Recover',
        'popupless' => true
	]);
?>

<body class="Layout-body" ng-controller="RecoveryCtrl">
	<div class="Layout-content">
		<main class="Layout-main Scrollable">
			<div class="Scrollable-wrapper">
				<div class="Scrollable-scrolled BigCard-container">
					<div class="BigCard LRR-card--singleColumn">
						<div class="BigCard-decoration LRR-decoration--recover">
							<div class="BigCard-decorationIcon">
								<?= the_svg_asset('envelope'); ?>
							</div>
							<span class="BigCard-decorationLabel">Odzyskiwanie hasła</span>
						</div>
						<div class="BigCard-main">
							<img class="BigCard-logo" src="<?= the_asset_uri('logo-cocpit-blue.png')?>">
							<div class="BigCard-content">
								<form layout="column" class="LRR-form" flex layout-align="space-around">
									<?php wp_nonce_field( 'kg-recover-password', 'security' ); ?>
									<div class="LRR-inputFieldLogin LRR-inputField input-field" required ng-keyup="$event.keyCode == 13 ? recover() : null">
										<label>Adres e-mail</label>
										<input type="email" name="user_email" required>
									</div>
								</form>
							</div>
							<div class="BigCard-footer">
								<button class="LRR-footerButton Button Button--wide Button--free Button--centerdText" ng-click="recover()">Przypomnij</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
	<div id="sucess_dialog" class="modal">
		<div class="modal-content">
			<h4><?= __( 'Hasło zostało zresetowane.', 'kg' ); ?></h4>
			<p><?= __( 'Sprawdź swoją skrzynkę pocztową, znajdziesz tam Twoje nowe hasło do portalu.', 'kg' ) ; ?></p>
		</div>
		<div class="modal-footer">
			<a href="/" class="modal-action modal-close Button Button--loud Button--wide Button--free right">OK</a>
		</div>
	</div>
</body>