<?php
	/* Template Name: Wysłanie płatności */ 

	// rsa_aes_256_sha


	$kg_transaction = KG_Get::get('KG_Transaction', (int) $_GET['id'] ); 

	if(
		empty($_GET['id']) ||
		$kg_transaction->is_error() ||
		!$kg_transaction->is_current_user_transaction() ||
		$kg_transaction->is_payment_complete()
	) {
		wp_redirect('/');
	}

    $order = array();
	
    // urls
	$order['notifyUrl'] = get_permalink( KG_Config::getPublic('change_payment_status') );
	$order['continueUrl'] = get_permalink( KG_Config::getPublic('payment_gateway') ) . '?id=' . $_GET['id'];
	
	// order_id 
	$order['extOrderId'] = rand(0, 1000000000000000000000);

	// products
	$order['totalAmount'] = $kg_transaction->get_payu_total();
	$order['products'] = $kg_transaction->get_products_data_for_payu();
	
	// user
	$order['buyer'] = $kg_transaction->get_user()->get_payu_data();
	$order['customerIp'] = $_SERVER['REMOTE_ADDR'];
	
	// settings
	$order['settings']['invoiceDisabled'] = true;
	$order['merchantPosId'] = OpenPayU_Configuration::getMerchantPosId();
	$order['description'] = 'Zamówienie z portalu Knowledge Garden';
	$order['currencyCode'] = 'PLN';

	try {
        $response = OpenPayU_Order::create($order);
        $status_desc = OpenPayU_Util::statusDesc($response->getStatus());
    } catch (OpenPayU_Exception $e){
        kg_log( (string)$e );
    }

    $kg_transaction->set_payu_transaction_id($response->getResponse()->orderId);

    header('Location:'.$response->getResponse()->redirectUri); 