<main class="Layout-main no-subscription">
	
	<div>
		<h1>Dostęp do treści</h1>
		<p>Aby uzyskać dostęp do zasobów musisz wykupić abonament. </p>
		<p>W razie pytań czy wątpliwości pamiętaj, że zawsze możesz się z nami skontaktować pisząc na: kg@questus.pl </p>
		<a href="<?= get_permalink(KG_Config::getPublic('extend_subscription_page_id')); ?>" class="Button Button--iconifiedLeft Button--cost"><i class="material-icons">shopping_cart</i>Kup abomonament</a>
	</div>

	<img src="<?=get_template_directory_uri(); ?>/assets/no_subscription_macbook.png">
</main>