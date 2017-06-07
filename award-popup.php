<div class="PresentSelector" ng-controller="AwardPopupCtrl" ng-show="visible" ng-cloak>
	<div class="PresentSelector-popupContainer">
		<div class="PresentSelector-background" ng-click="visible = false"></div>
		<div class="PresentSelector-popup">
			<header class="PresentSelector-header">
				<h6 class="PresentSelector-label" ng-bind="getHeader()"></h6>
				<button class="Button Button--icon Button--iconClose Button--tiny Button--iconTiny Button--white" ng-click="visible = false"></button>
			</header>
			<div class="AwardPopup-main" layout="row">
				<div class="Award-decoration">
					<i class="kg-icons">present</i>
					<p ng-bind="getMessage()" class="Award-decorationMessage"></p>
				</div>
				<div class="AwardPopup-form" layout="column">
					<div id="ResourcePresentPopupList" class="PresentSelector-listContainer" perfect-scrollbar wheel-propagation="true" suppress-scroll-x="true">
						<ul class="PresentSelector-list cursor-pointer">
							<li class="PresentSelector-resource" ng-repeat="resource in resources" ng-click="selectResource(resource)" ng-class="{'selected':isSelectedResource(resource),'cursor-pointer':canChooseAward()}" data-placement="bottom">
								<div class="PresentSelector-resourceThumbail" style="background-image:url('{{resource.thumbnail_big}}');"></div>
								<h6 class="PresentSelector-resourceName">
									<span ng-bind="resource.name" data-tooltiped title="{{resource.short_desc}}" data-tooltip></span>	
									<span ng-bind="getType(resource.type)" class="category-mark mark-{{resource.category_id}}" data-tooltiped title="{{resource.tooltip}}" data-tooltip></span>
								</h6>
							</li>
						</ul>
					</div>
					<div class="Award-footer" ng-if="canChooseAward()" layout="column" layout-align="center center">
						<button class="Button Button--wide Button--iconifiedLeft Button--sentPresent Button--free" ng-disabled="isNotAnyResourceSelected()" ng-click="getAward()"><i class="kg-icons">present</i>Wybierz nagrodę</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>