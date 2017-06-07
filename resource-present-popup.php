<div class="PresentSelector" ng-controller="ResourcePresentPopupCtrl" ng-show="visible" ng-cloak>
	<div class="PresentSelector-popupContainer">
		<div class="PresentSelector-background" ng-click="visible = false"></div>
		<div class="PresentSelector-popup">
			<header class="PresentSelector-header">
				<h6 class="PresentSelector-label">Podaruj prezent</h6>
				<button class="Button Button--icon Button--tiny Button--iconClose Button--iconTiny Button--white" ng-click="visible = false"></button>
			</header>
			<div class="PresentSelector-content PresentSelector-withResourceSearch">
				<div class="PresentSelector-searchColumn">
					<div class="PresentSelector-searchInputContainer">
						<input class="PresentSelector-searchInput" placeholder="Szukaj wśród zasobów..." ng-model="search" ng-change="changeSearch()" ng-model-options="{ debounce: 200}">
					</div>
					<div id="ResourcePresentPopupList" class="PresentSelector-listContainer" perfect-scrollbar wheel-propagation="true" suppress-scroll-x="true" ng-show="resources.length > 0" refresh-on-change="refresh_bugfix">
						<ul class="PresentSelector-list scroller cursor-pointer" infinite-scroll="more()" infinite-scroll-container="'#ResourcePresentPopupList'">
							<li class="PresentSelector-resource" ng-repeat="resource in resources" ng-click="selectResource(resource.id)" ng-class="{selected:isSelectedResource(resource.id)}">
								<div class="PresentSelector-resourceThumbail" style="background-image:url('{{resource.thumbnail_big}}');"></div>
								<h6 class="PresentSelector-resourceName">
									<span ng-bind="resource.name" data-tooltiped title="{{resource.short_desc}}" data-tooltip></span>	
									<span ng-bind="getType(resource.short_type)" class="category-mark mark-{{resource.category_id}}" data-tooltiped title="{{resource.tooltip}}" data-tooltip></span>
								</h6>
								<small class="PresentSelector-resourcePrice" ng-bind="resource.price | currency"></small>
							</li>
						</ul>
					</div>
					<div ng-show="resources.length == 0" class="PresentSelector-listEmpty">
						<h3 class="PresentSelector-listEmptyLabel">Nie znaleziono żadnych zasobów.</h3>
					</div>
				</div>
				<div class="PresentSelector-messageColumn">
					<div class="PresentSelector-selectedUser">
						<img class="PresentSelector-selectedUserAvatar" ng-src="{{selectedUser?selectedUser.avatar:'<?=KG_Get::get('KG_User_Avatars')->get_default_avatar_url()?>'}}" ng-class="'user-color-'+selectedUser.type"></img>
						<h6 class="PresentSelector-selectedUserName" ng-bind="selectedUser.name||'Nomen Nominandum'"></h6>
					</div>
					<textarea class="PresentSelector-message" placeholder="Wiadomość" ng-model="message"></textarea>
					<button class="Button Button--cost Button--sentPresent Button--iconifiedLeft Conversation-button" ng-disabled="isNotAnyResourceSelected()" ng-click="sendPresent()"><i class="kg-icons">present</i><?= __( 'Zapłać i podaruj', 'kg' );?></button>
					<p class="PresentSelector-desc"><?= __( 'Po dokonananiu płatności prezent automatycznie zostanie przesłany do użytkownika', 'kg' ); ?></p>
				</div>
			</div>
		</div>
	</div>
</div>