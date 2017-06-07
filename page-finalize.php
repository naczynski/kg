<?php /* Template Name: Finalize */ ?>
<?php 

if(Angular::wrap())
	return; 

the_post();

Angular::params([
	'application' => 'Finalize'
	]);

if(KG_Get::get('KG_Basket')->is_empty()){
	wp_redirect('/');
}

$fieldsUser = json_encode( KG_get_curr_user()->get_field_group('group_fields_default')->get_fields() );
$fieldsInvoice = json_encode( KG_get_curr_user()->get_field_group('group_fields_company')->get_fields() );

$transaction = [
	'date' => 1435146318,
	'number' => '1234',
	'status' => 'Zakończona',
	'entries' => KG_Get::get('KG_Basket')->get_items(),
	'priceWithTax' => KG_Get::get('KG_Basket')->get_total_brutto(),
	'priceWithoutTax' => KG_Get::get('KG_Basket')->get_total_netto(),
	'documentUrl' => '/'
];

Angular::init('transaction',json_encode($transaction));
?>

<body class="Layout-body" ng-controller="FinalizeCtrl">
	<?php get_header(); ?>
	<div class="Layout-content">
		<main class="Layout-main Scrollable">
			<div class="Scrollable-wrapper Finalize">
				<div class="Scrollable-scrolled Finalize-content" ng-cloak>
					<h4 class="Finalize-subHeader">Szczegóły zamówienia</h4>
					<?php include get_template_directory()."/transaction-content.php"; ?>	
					

					<h4 class="Finalize-subHeader" disable>Dane do faktury</h4>
					
					<div layout="row" layout-align="start start" class="Finalize-chooseType">
						<div flex="15"> Wystaw fakturę na:</div>
						<div flex style="max-width: 16%">
							<input class="with-gap" value="user" name="cart" ng-model="cart" type="radio" id="invocie-person" checked/>
							<label for="invocie-person">Osobę fizyczną</label>
						</div>
						<div flex="15">
							<input class="with-gap" value="company" name="cart" ng-model="cart" type="radio" id="invoice-company"/>
							<label for="invoice-company">Firmę</label>
						</div>

					</div>

					<form id="form-user" ng-show="cart=='user'" ng-submit="onSubmit($event);" ng-init='fields=<?=$fieldsUser;?>' ng-controller="FinalizeFormCtrl" name="form">

						<div class="Finalize-paymentData">
							<div layout-padding>					
								<?php wp_nonce_field('finalize' ,'security') ;?>
								<div ng-repeat="field in fields" class="input-field {{field.name}}" layout-padding ng-hide="changingAvatar||preview">
									<input placeholder="{{field.placeholder}}" ng-class="{invalid: isError(field.name)}" type="text" name="{{field.name}}" id="{{field.name}}" ng-model="field.value" ng-model-options="{ debounce: 500, getterSetter:true }">
									<label for="{{field.name}}" class="force-active">{{field.label}}</label>
									<p ng-if="isError(field.name)" class="error-my-profile">{{field.errorMessage}}</p>
								</div>   
							</div>	

							<div layout="row" layout-align="end center">
								<button class="Button Button--iconifiedRight Button--finalizeOrder">Płacę z:<i class="Finalize-buttonPayuLogo"></i></button>
							</div>				
						</div>
					</form>

					<form id="form-company" ng-show="cart=='company'" ng-submit="onSubmit($event);" ng-init='fields=<?=$fieldsInvoice;?>' ng-controller="FinalizeFormCtrl" name="form">

						<div class="Finalize-paymentData">
							<div layout-padding>					
								<?php wp_nonce_field('finalize' ,'security') ;?>
								<div ng-repeat="field in fields" class="input-field {{field.name}}" layout-padding ng-hide="changingAvatar||preview">
									<input placeholder="{{field.placeholder}}" ng-class="{invalid: isError(field.name)}" type="text" name="{{field.name}}" id="{{field.name}}" ng-model="field.value" ng-model-options="{ debounce: 500, getterSetter:true }">
									<label for="{{field.name}}" class="force-active">{{field.label}}</label>
									<p ng-if="isError(field.name)" class="error-my-profile">{{field.errorMessage}}</p>
								</div>   
							</div>		

							<div layout="row" layout-align="end center">
								<button class="Button Button--iconifiedRight Button--finalizeOrder">Płacę z:<i class="Finalize-buttonPayuLogo"></i></button>
							</div>				
						</div>

					</form>

				</div>
			</div>
		</main>
	</div>
</body>