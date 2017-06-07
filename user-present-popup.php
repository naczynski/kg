<div class="PresentSelector" ng-controller="UserPresentPopupCtrl" ng-show="visible" ng-cloak>
	<div class="PresentSelector-popupContainer">
		<div class="PresentSelector-background" ng-click="visible = false"></div>
		<div class="PresentSelector-popup">
			<header class="PresentSelector-header">
				<h6 class="PresentSelector-label">Podaruj prezent</h6>
				<button class="Button Button--icon Button--iconClose Button--tiny Button--iconTiny Button--white" ng-click="visible = false"></button>
			</header>
			<div class="PresentSelector-content PresentSelector-withUserSearch">
				<div class="PresentSelector-searchColumn">
					<div class="PresentSelector-searchInputContainer">
						<input class="PresentSelector-searchInput" placeholder="Szukaj wśród użytkowników..." ng-model="search" ng-change="changeSearch()" ng-model-options="{ debounce: 200}">
					</div>
					<div id="UserPresentPopupList" class="PresentSelector-listContainer" perfect-scrollbar wheel-propagation="true" suppress-scroll-x="true" ng-show="users.length > 0" refresh-on-change="refresh_bugfix">
						<ul class="PresentSelector-list scroller cursor-pointer" infinite-scroll="more()" infinite-scroll-container="'#UserPresentPopupList'">
							<li class="PresentSelector-user" ng-repeat="user in users" ng-click="selectUser(user)" ng-class="{selected:isSelectedUser(user)}">
								<img class="PresentSelector-userAvatar" ng-src="{{user.avatar}}" ng-class="'user-color-'+user.type">
								<div class="PresentSelector-userData">
									<h6 class="PresentSelector-userName" ng-bind="user.name"></h6>
									<p class="PresentSelector-userMoreInfo" ng-bind="user.desc"></p>
								</div>
							</li>
						</ul>
					</div>
					<div ng-show="users.length == 0" class="PresentSelector-listEmpty">
						<h3 class="PresentSelector-listEmptyLabel">Nie znaleziono żadnych użytkowników.</h3>
					</div>

				</div>
				<div class="PresentSelector-messageColumn">
					<div class="PresentSelector-selectedUser">
						<img class="PresentSelector-selectedUserAvatar" ng-src="{{selectedUser?selectedUser.avatar:'<?=KG_Get::get('KG_User_Avatars')->get_default_avatar_url()?>'}}" ng-class="'user-color-'+selectedUser.type"></img>
						<h6 class="PresentSelector-selectedUserName" ng-bind="selectedUser.name||'Wybierz użytkownika'"></h6>
					</div>
					<textarea class="PresentSelector-message" placeholder="Wiadomość" ng-model="message"></textarea>
					<button class="Button Button--cost Button--sentPresent Button--iconifiedLeft Conversation-button" ng-disabled="isNotAnyResourceSelected()" ng-click="sendPresent()"><i class="kg-icons">present</i><?= __( 'Zapłać i podaruj', 'kg' );?></button>
					<p class="PresentSelector-desc-users"><?= __( 'Po dokonananiu płatności prezent automatycznie zostanie przesłany do użytkownika', 'kg' ); ?></p>
				</div>
			</div>
		</div>
	</div>
</div>