<?php /* Template Name: Przyjęcie płatności */ 

    if(Angular::wrap())
        return; 

	Angular::params([
		'application' => 'PaymentGateway',
	]);

	if (!function_exists('is_url_error2')){
		function is_url_error2() {
			$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			return ( strpos($actual_link, 'error' ) !== false );
		}
	}

	if(empty($_GET['id'])){
		wp_redirect('/');
	}

	$order_id = (int) $_GET['id'];
	$kg_transaction = KG_Get::get('KG_Transaction', $order_id);
	
	if( is_url_error2() ){
		if( KG_is_local() ) $kg_transaction->set_canceled();			
	} else {
		if( KG_is_local() ) $kg_transaction->pay();	
	}

?>

<?php

	if(is_user_logged_in()){
		get_header(); 		
	}

?>
<body layout="column" ng-controller="PaymentGatewayCtrl">
	<main ng-init="redirect=<?=is_url_error2() ? 'false' : 'true'; ?>" class="payment-gateway" flex>
		<div>
			<?php if( is_url_error2() ): ?>
				<h1>Transakcja anulowana</h1>
				<p>Przepraszamy w wyniku błędu transakcja: <strong><?=$kg_transaction->get_number_for_user(); ?></strong> została anulowana. Prosimy spróbuj ponownie.</p>
					<a href="<?= $kg_transaction->get_sent_to_payu_url(); ?>" class="Button Button-paymentGateway Button--free"><i class="left Basket-btn-icon resource_icon shop"></i>Powtórz transakcję</a>
				<p>W razie pytań czy wątpliwości pamiętaj, że zawsze możesz się z nami skontaktować pisząc na: <a ng-click="openContact()" href="">kg@questus.pl</a></p>	
			<?php else: ?>
				<h1>Oczekiwanie na potwierdzenie płatności</h1>
				<p>Oczekujemy na informację z systemu PayU o zaksięgowaniu transakcji numer
					<strong><?=$kg_transaction->get_number_for_user(); ?></strong>.</p>
				<p>
					Jeżeli weryfikacja płatności zakończy się pomyślnie, otrzymasz od nas mail z potwierdzeniem, a zakupione zasoby pojawią się w zakładce Zasoby->Moje->Kupione.
				</p>

				<a href="/" class="Button Button-paymentGateway Button--free">Przejdź do Platformy</a>
			<?php endif; ?>
		</div>
	</main>
</body>