<div class="PresentSelector" ng-controller="SendMessagePopupCtrl" ng-show="visible" ng-cloak>
	<div class="PresentSelector-popupContainer">
		<div class="PresentSelector-background" ng-click="visible = false"></div>
		<div class="PresentSelector-popup PresentSelector-messagePopup">
			<header class="PresentSelector-header">
				<h6 class="PresentSelector-label">Nowa wiadomość</h6>
				<button class="Button Button--icon Button--iconClose Button--tiny Button--iconTiny Button--white" ng-click="visible = false"></button>
			</header>
			<div class="PresentSelector-content PresentSelector-withResourceSearch">
				<div class="PresentSelector-messageColumn SendMessage">
					<div class="PresentSelector-selectedUser">
						<img class="PresentSelector-selectedUserAvatar" ng-src="{{selectedUser?selectedUser.avatar:'<?=KG_Get::get('KG_User_Avatars')->get_default_avatar_url()?>'}}" ng-class="'user-color-'+selectedUser.type"></img>
						<div layout="column" layotu-align="center center">
							<h6 class="PresentSelector-selectedUserName" ng-bind="selectedUser.name||'Nomen Nominandum'"></h6>
							<span class="SendMessage-description" ng-bind="selectedUser.desc"></span>
						</div>
					</div>
					<textarea class="PresentSelector-message SendMessage--message" placeholder="Wiadomość" ng-model="message"></textarea>
					<button class="Button Button--free Conversation-button" ng-click="send()">Wyślij</button>
				</div>
			</div>
		</div>
	</div>
</div>