<div class="PopupLayout" ng-class="{'PopupLayout--visible':expanded=='alerts'}" ng-controller="AlertsCtrl">
	<div class="PopupLayout-overlay Alerts-overlay" ng-click="hide()"></div>
	<div class="PopupLayout-content HeaderPopup HeaderPopup--withoutFotter Alerts" ng-class="{'HeaderPopup--empty':alerts.length==0,'Allerts--hasUnreadMessages':alerts.length>0}">
		<header class="HeaderPopup-header Alerts-header">
			<span class="HeaderPopup-headerLabel">POWIADOMIENIA</span>
			<span class="Button Button--white Button--tiny" ng-click="markAllAsRead()"  ng-show="unread > 0" >Oznacz wszystkie jako przeczytane</span>
		</header>
		<div class="HeaderPopup-content Alerts-content Scrollable Scrollable--usesCodeToScroll">
			<div id="AlertsPopupList" class="Scrollable-wrapper" perfect-scrollbar wheel-propagation="true" refresh-on-change="refresh_bugfix">
				<ul class="Scrollable-scrolled"  infinite-scroll="more()" infinite-scroll-container="'#AlertsPopupList'">
					<li ng-repeat="alert in alerts" class="Alert" ng-class="{'Alert--readed': alert.is_readed}" layout-align="center">
						<div class="Alert-icon" layout="row" ng-class="'Alert-icon--'+alert.type" layout-align="center center">
							<div class="kg-icons">{{alert.type}}</div>
						</div>
						<div class="Alert-message">
							<h6 class="Alert-title" ng-bind="alert.message"></h6>
							<small class="Alert-more truncate" ng-bind="alert.date"></small>
						</div>
						<div class="Allert-button" ng-show="alert.action=='none'"></div>
						<button class="Button Button--free Button--iconifiedLeft Button--centerdText Button--tiny Button--iconTiny Allert-button" ng-if="alert.action != 'none' && alert.action != 'link'" ng-click="doAction(alert)"><i ng-class="iconSet(alert)">{{icon(alert)}}</i>{{alert.button_label}}</button>
						<a ng-click="markAsReadButton($event, alert)" class="Button Button--free Button--iconifiedLeft Button--centerdText Button--tiny Button--iconTiny Allert-button" target="_blank" ng-href="{{alert.link}}" ng-if="alert.action == 'link'"><i ng-class="iconSet(alert)">{{icon(alert)}}</i>{{alert.button_label}}</a>
						<button class="Button Button--icon Button--iconClose Button--tiny Button--iconTiny Alert-markAsRead" ng-click="markAsRead(alert)" ng-class="{'Alert-markAsRead--hide':alert.is_readed}"></button>
					</li>
				</ul>
			</div>
		</div>
		<div class="HeaderPopup-contentEmpty">
			Nie masz żadnych powiadomień.
		</div>
	</div>
</div>