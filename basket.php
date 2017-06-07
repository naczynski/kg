<div class="PopupLayout" ng-class="{'PopupLayout--visible':expanded=='basket'}">
	<div class="PopupLayout-overlay Basket-overlay" ng-click="expanded=null"></div>
	<div class="PopupLayout-content HeaderPopup Basket"  ng-class="{'HeaderPopup--empty':isBasketEmpty()}">
		<header class="HeaderPopup-header Basket-header">
			<span class="HeaderPopup-headerLabel">KOSZYK</span>
			<button class="Button Button--icon Button--iconClose Button--tiny Button--icon Button--iconTiny Button--white" ng-click="expanded = null"></button>
		</header>
		<div class="HeaderPopup-content Basket-content Scrollable Scrollable--usesCodeToScroll">
			<div class="Scrollable-wrapper" perfect-scrollbar wheel-propagation="true" refresh-on-change="refresh_bugfix">
				<ul class="Scrollable-scrolled">
					<li ng-repeat="item in basket.items" layout="row" class="Basket-item">
						<div class="Basket-item-icon" ng-class="'Basket-item-'+iconName(item.type)" layout="column" layout-align="center center">
							<div class="kg-icons">{{iconNameExactly(item.type,item.class)}}</div>
						</div>
						<div layout="column" flex class="Basket-item-info">
							<h5 class="Basket-item-title truncate" ng-bind-html="headline(item.headline)"></h5>
							<small class="Basket-item-description truncate" ng-bind-html="desc(item.desc)"></small>
						</div>
						<div class="Basket-item-divider"></div>
						<div class="Basket-item-price" layout-padding layout="row" layout-align="end center">
							<span class="Basket-item-price-value" ng-bind="item.price | currency : 'zł' : 0"></span>
							<button class="Button Button--icon Button--iconClose Button--tiny Button--iconTiny Alert-removeItemButton" ng-click="removeItem(item)"></button>
						</div> 
					</li>
				</ul>
			</div>
		</div>
		<div class="HeaderPopup-contentEmpty">
			Twój koszyk jest pusty.
		</div>
		<footer class="HeaderPopup-footer Basket-footer" layout="row" layout-margin layout-align="space-between center">
			<span class="total-price" layout-padding>Suma: {{basket.total | currency}}</span>
			<a href="<?=get_permalink(KG_Config::getPublic('finalize_order_page_id')); ?>" class="Button Button--centerdText Button--cost Button--iconifiedLeft" g-click="expanded=null"><i class="material-icons">shopping_cart</i>Finalizuj zamówienie</a>
		</footer>
	</div>
</div>