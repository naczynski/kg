<?php /* Template Name: Transakcje */ ?>
<?php 

    if(Angular::wrap())
        return; 

    the_post();

    Angular::params([
        'application' => 'Transactions',
    ]);

    $transactions = KG_Get::get('KG_My_Transactions_Loop', get_current_user_id() )->get();
	Angular::init('transactions', json_encode($transactions, JSON_UNESCAPED_UNICODE));
?>

<body class="Layout-body" ng-controller="TransactionsCtrl">
	<?php get_header(); ?>
	<div class="Layout-content">
		<main class="Layout-main Scrollable">
			<div class="Scrollable-wrapper Transactions-transactions">
				<ul ng-show="transactions.length > 0" class="Scrollable-scrolled" infinite-scroll="more()" infinite-scroll-container="'.Scrollable-wrapper'">
					<li class="Transactions-transaction" ng-repeat="transaction in transactions">
						<?php include get_template_directory()."/transaction.php"; ?>
					</li>
				</ul>
				<div ng-show="transactions.length == 0" class="Scrollable-scrolled Transactions-emptyContainer">
					<h5 class="Transactions-empty">Nie wykonałeś jeszcze żadnych transakcji.</h5>
				</div>
			</div>
		</main>
	</div>
</body>