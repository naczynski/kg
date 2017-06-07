
<div id="concat-popup-wrapper" ng-controller="ContactPopupCtrl as contactPopup">
	
	<button id="contact-popup-button" class="Button Button--free Button--centerdText" ng-click="showPopup()">
		<i class="material-icons">email</i>
	</button>

	<div id="contact-popup" class="modal">
		<div class="modal-content"  layout-padding>
			<div layout="row" layout-align="space-between center">
				<span layout-margin><?= __( 'Masz pytanie lub uwagi? Napisz do nas.', 'kg' ); ?></span>
				<button class="close-modal-contact Button Button--icon Button--tiny Button--iconClose Button--iconTiny" ng-click="closePopup()"></button>
			</div>
			<form id="contact-popup-form">
				<div class="input-field">
					<textarea id="home_email_message" name="message" class="materialize-textarea" maxlength="1000" ng-model="message"></textarea>
					<label for="home_email_message">Wiadomość</label>
				</div>
			</form>
		</div>
		<div class="modal-footer" layout="row" layout-padding layout-align="end center">
			<button class="Button Button--wide Button--free right" ng-click="sendMessage()">Wyślij</button>
		</div>
	</div>
</div>