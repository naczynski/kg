<div class="PresentSelector" ng-controller="YouGotPresentPopupCtrl" ng-show="visible" ng-cloak>
	<div class="PresentSelector-popupContainer">
		<div class="PresentSelector-background" ng-click="visible = false"></div>
		<div class="PresentSelector-popup YouGotPresent-popup">
			<div class="YouGotPresent-decoration">
				<i class="YouGotPresent-decorationIcon kg-icons">present</i>
				<span class="YouGotPresent-decorationMessage">Otrzymałeś prezent</span>
			</div>
			<div class="YouGotPresent-content">
				<button class="Button Button--icon Button--iconClose Button--tiny Button--iconTiny YouGotPresent-close" ng-click="visible = false"></button>
				<div class="YouGotPresent-userInfo" layout="column">
					<div layout="row">
						<div flex layout="column" layout-align="center center" class="YouGotPresent-yougotfrom">Otrzymałeś zasób od:</div>
						<div layout="column">
							<img class="PresentSelector-selectedUserAvatar align-center"  ng-class="'user-color-'+data.user_from.type" src="{{data.user_from.avatar}}"/>
							<span class="PresentSelector-selectedUserName text-center" ng-bind="data.user_from.name"></span>
						</div>
						<div flex class="YouGotPresent-yougotfrom"></div>
					</div>
					<p class="YouGotPresent-message" ng-show="isShowMessage(data.message)" ng-bind="data.message"></p>
				</div>
				<div class="YouGotPresent-resource">
					<img class="YouGotPresent-resourceImage" src="{{data.resource.thumbnail_big}}"/>
					<div flex layout="column">
						<a href="{{data.resource.link}}">
							<h6 class="resource-title truncate YouGotPresent-title" ng-bind="data.resource.name_with_subtype"></h6>
						</a>
						<p class="resource_short_description YouGotPresent-description" ng-bind-html="getDesc(data.resource.short_description)"></p>
					</div>
					<div>
						<a href="{{data.resource.download_link}}" target="_blank" class="Button Button--free">Pobierz zasób</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>