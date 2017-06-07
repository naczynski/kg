<article ng-cloak class="Transaction-content">
	<table class="Transaction-entries">
		<tbody>
			<tr class="Transaction-entry" ng-class="iconName(entry.type)" ng-repeat="entry in transaction.entries">
				<td class="Transaction-entryIcon">
					<div class="kg-icons">{{entry.class}}</div>
				</td>
				<td class="Transaction-entryInfo">
					<h6 class="Transaction-entryTitle" ng-bind-html="getHeadline(entry.headline)"></h6>
					<p class="Transaction-entryDescription" ng-bind-html="getDescrption(entry.desc)"></p>
				</td>
				<td class="Transaction-entryPrice">
					<span ng-bind="entry.price | currency"></span>
				</td>
			</tr>
		</tbody>
	</table>
	<div layout-align="center end" class="Transaction-summary">
		<div class="Transaction-summaryEntry">
			<span class="Transaction-summaryLabel">Razem (23% VAT):</span>
			<span class="Transaction-summaryPriceWithTax" ng-bind="transaction.priceWithTax | currency"></span>
		</div>
		<div class="Transaction-summaryEntry">
			<span class="Transaction-summaryLabel">netto:</span>
			<span class="Transaction-summaryPriceWithoutTax" ng-bind="transaction.priceWithoutTax | currency"></span>
		</div>
		<a target="_blank" flex ng-hide="hideInvoiceButton || transaction.hideInvoiceButton" class="Button Button--iconifiedLeft Button--free Transaction-linkToDocument" ng-href="{{transaction.invoiceUrl}}"><i class="material-icons">file_download</i>{{KG.currentPage}}Pobierz fakturę</a>
	</div>
</article>