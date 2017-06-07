<?php /* Template Name: Nowy abonament */ ?>
<?php 

    if(Angular::wrap())
        return; 

	Angular::params([
		'application' => 'NewSubscription',
	]);

	if(KG_get_curr_user()->is_cim()){
		wp_redirect('/'); // cim cant buy new subscription
	}

?>

<body class="Layout-body" ng-controller="NewSubscriptionCtrl">
	<?php get_header(); ?>
	<div class="Layout-content">
		<main class="Layout-main Scrollable">
			<div class="Scrollable-wrapper Transactions-transactions">
				<div class="NewSubscription">
					<div class="NewSubscription-main">
						<div class="NewSubscription-row">
							<div class="NewSubscription-mainHeader NewSubscription-mainHeader--basic NewSubscription-column">
								<h6 class="NewSubscription-mainHeaderTitle NewSubscription-mainHeaderTitle--basic">Kwartalny</h6>
								<p class="NewSubscription-mainHeaderPrice">250 zł /<small>3 miesiące</small></p>
							</div>
							<div class="NewSubscription-mainHeader NewSubscription-mainHeader--premium NewSubscription-column">
								<h6 class="NewSubscription-mainHeaderTitle NewSubscription-mainHeaderTitle--premium">Premium</h6>
								<p class="NewSubscription-mainHeaderPrice">1800 zł /<small>rok</small></p>
							</div>
						</div>
						<div class="NewSubscription-info NewSubscription-infoAboutResources">
							<p class="NewSubscription-infoAboutResourcesHeader">Dostęp do portalu i materiałów z kategorii:</p>
							<ul class="NewSubscription-infoAboutResourcesList">
								<li>
									<i class="kg-icons">97</i>
									<p>Case studies</p>
								</li>
								<li>
									<i class="kg-icons">93</i>
									<p>Artykuły</p>
								</li>
								<li>
									<i class="kg-icons">88</i>
									<p>Knowledge to Inspire</p>
								</li>
								<li>
									<i class="kg-icons">95</i>
									<p>Raporty</p>
								</li>
								<li>
									<i class="kg-icons">94</i>
									<p>Rekomendowane ksiązki</p>
								</li>
								<li>
									<i class="kg-icons">98</i>
									<p>Rekomendowane wydarzenia</p>
								</li>
								<li>
									<i class="kg-icons">101</i>
									<p>Zadania</p>
								</li>
								<li>
									<i class="kg-icons">100</i>
									<p>Quizy</p>
								</li>
							</ul>
						</div>
						<div class="NewSubscription-row">
							<div class="NewSubscription-info NewSubscription-column">
								<p>10 zasobów do wyboru z kategorii Knowledge to Share i Knowledge to Master</p>
								<p>12 zasobów Knowledge to Share i Knowledge to Master, które ukażą się w trakcie trwania abonamentu</p>
							</div>
							<div class="NewSubscription-column NewSubscription-info NewSubscription-mainPremiumResources">
								<p><mark>60</mark> zasobów do wyboru z kategorii Knowledge to Share i&nbsp;Knowledge to Master</p>
							    <p class="NewSubscription-orText">ORAZ</p>
							    <p><mark>48</mark> zasobów Knowledge to Share i Knowledge to Master, które ukażą się w&nbsp;trakcie trwania abonamentu.</p>
							</div>
						</div>
						<div class="NewSubscription-row">
							<div class="NewSubscription-column NewSubscription-empty">
							</div>
							<div class="NewSubscription-column NewSubscription-info">
								<ul class="NewSubscription-mainPremiumList">
									<li>4 książki drukowane</li>
									<li>Eksluzywne spotkanie inspiracyjne</li>
								</ul>
							</div>
						</div>
						<div class="NewSubscription-row">
							<div class="NewSubscription-column NewSubscription-mainBuyContainer NewSubscription-mainBuyContainer--basic">
								<a ng-click="buyNormalSubscription()" class="NewSubscription-sideButton Button--cost Button  Button--iconifiedLeft"><i class="material-icons">shopping_cart</i>Wybierz</a>
							</div>
							<div class="NewSubscription-column NewSubscription-mainBuyContainer NewSubscription-mainBuyContainer--premium">
								<a ng-click="buyPremiumSubscription()" class="NewSubscription-sideButton Button--orange Button  Button--iconifiedLeft"><i class="material-icons">shopping_cart</i>Wybierz</a>
							</div>
						</div>
					</div>
					<div class="NewSubscription-side">
						<div class="NewSubscription-sideHeader">
							<h6>Spersonalizowany</h6>
						</div>
						<div class="NewSubscription-sideMain">
							<p>Możesz wykupić abonament dopasowany do potrzeb Twojej firmy</p>
							<p>Skontaktuj się z nami, by omówić szczegóły (<mark>kg@questus.pl</mark>)</p>
							<button class="NewSubscription-sideButton Button Button--free Button--iconifiedLeft" ng-click="openContact()"><i class="material-icons">email</i></button>
						</div>
					</div>				

				</div>
			</div>
		</main>
	</div>
</body>
