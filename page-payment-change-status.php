<?php /* Template Name: Zmiana statusu transakcji */ 

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $body = file_get_contents('php://input');
        $data = stripslashes(trim($body));

        $response = OpenPayU_Order::consumeNotification($data);

        $kg_transaction = KG_get_order_object_by_payu_id($response->getResponse()->order->orderId);
        if(is_a($kg_transaction, 'KG_Transaction')){
          $kg_transaction->change_status( $response->getResponse()->order->status );
        }
    }