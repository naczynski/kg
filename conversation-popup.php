<div class="PresentSelector" ng-controller="ConversationPopupCtrl" ng-show="visible" ng-cloak>
	<div class="PresentSelector-popupContainer">
		<div class="PresentSelector-background" ng-click="visible = false"></div>
		<div class="PresentSelector-popup PresentSelector-messagePopup">
			<header class="PresentSelector-header">
				<h6 class="PresentSelector-label">Odpowiedz do: {{data.user_from.name}}</h6>
				<button class="Button Button--icon Button--iconClose Button--tiny Button--iconTiny Button--white" ng-click="visible = false"></button>
			</header>
			<div class="PresentSelector-messageColumn Conversation-mainWrapper">
				<div class="Conversation-list Scrollable Scrollable--usesCodeToScroll">
					<div class="Scrollable-wrapper Conversation-wrapper" suppressScrollX perfect-scrollbar wheel-propagation="true">
					
						<div ng-repeat="message in messages" ng-class="{'left' : isLeft(message), 'right': isRight(message)}"  class="PresentSelector-selectedUser Conversation Scrollable-scrolled">
							<img class="PresentSelector-selectedUserAvatar Conversation-avatar" ng-src="{{getAvatar(message)}}" ng-class="'user-color-'+getUserType(message)"></img>
							<div layout="column">
								<p class="YouGotPresent-message Conversation-cloud" ng-bind-html="getMessage(message)"></p>
								<small class="Conversation-cloud-desc"><span ng-bind="getName(message)"></span>, {{message.date}}</small>
							</div>
						</div>
						
					</div>
				</div>

				<div layout="column" class="Conversation-messageWrapper">
					<textarea class="PresentSelector-message Conversation-message" placeholder="Wiadomość" ng-model="message"></textarea>
					<button class="Button Button--free Conversation-button" ng-click="response()">Odpowiedz</button>
				</div>

			</div>
		</div>
	</div>
</div>