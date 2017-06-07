<?php /* Template Name: Aktywacja */ 

	$key = !empty($_GET['key']) ? $_GET['key'] : '';

    if(Angular::wrap())
        return; 

    Angular::params([
        'application' => 'Dummy',
        'popupless' => true
    ]);

?>

<body layout="column" class="white-text light-blue accent-4 activation-page" style="padding:0;" layout-align="space-around center" flex>
	
	<div layout="column">
		<a class="logo" href="/" layout="column" layout-align="center center" layout-margin>
			<?php echo '<img src="' . get_template_directory_uri() . '/assets/logo-cocpit.png">'; ?>
		</a>
		<h1>
			<?php if( KG_Get::get('KG_Activation_Email')->is_email_activated_by_key( $key ) ): ?>
				<?= __( 'Twój adres email został już potwierdzony!', 'kg' ); ?>
			<?php elseif( KG_Get::get('KG_Activation_Email')->activate_email_by_key( $key ) ): ?>
				<?= __( 'Pomyślnie aktywowaliśmy Twoje konto!', 'kg' ); ?>
			<?php else: ?>
				<?= __( 'Nie udało się nam aktywować twojego adresu email!', 'kg' ); ?>
			<?php endif;  ?>
		</h1>
	</div>

	<a href="<?= get_permalink(KG_Config::getPublic('login_page_id')); ?>" class="Button Button--loud Button--whiteBlue Button--big" id="activate-buttons">WEJDŹ DO KNOWLEDGE GARDEN</a>

	<div layout="row" layout-wrap> 
		<a flex target="_blank" href="#howto" layout="column" class="white-text light-blue accent-4 activate-info   how-to" layout-align="center center" layout-margin>
			<?= the_svg_asset('note'); ?>
			<p class="center uppercase"><?= __( 'Instrukcja obsługi', 'kg' ); ?></p>
		</a>
		<a flex target="_blank" href="<?= KG_Config::getPublic('pdf_faq'); ?>" layout="column" class="white-text light-blue accent-4 activate-info  " layout-align="center center" layout-margin>
			<?= the_svg_asset('q&a'); ?>
			<p class="center uppercase"><?= __( 'faq', 'kg' ); ?></p>
		</a>
	</div>
</body>