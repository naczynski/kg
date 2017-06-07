<div class="Transaction" ng-cloak>
	<div class="Transaction-date">
		<span class="Transaction-dateDay" ng-bind="transaction.date * 1000 | date:'dd' "></span>
		<div class="Transaction-dateMonthAndYear">
			<span ng-bind="transaction.date  * 1000 | date:'MMM' ">{{transaction.date}}</span>
			<span ng-bind="transaction.date  * 1000 | date:'yyyy' ">{{transaction.date}}</span>
		</div>
	</div>
	<div class="Transaction-body">
		<div class="Transaction-header">
			<h5 class="Transaction-number">
				<span>Transakcja nr </span>
				<span ng-bind="transaction.number"></span>
			</h5>
			<p class="Transaction-status" ng-bind="transaction.status"></p>
		</div>
		<?php include get_template_directory()."/transaction-content.php"; ?>
	</div>
</div>