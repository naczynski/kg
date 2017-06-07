<?php 
	
    if(Angular::wrap())
        return; 

    the_post();

    Angular::params([
        'application' => 'MyResources',
    ]);

    Angular::init('resources',json_encode(KG_Get::get('KG_My_Resources_Loop')->get()));
?>

<body class="Layout-body" ng-controller="MyResourcesCtrl">
    <?php get_header(); ?>
    <div class="Layout-content" layout="row" flex-auto flex>
    	<?php get_sidebar('my'); ?>
    	<main class="Layout-main ResourceList">
            <?php include get_template_directory().'/resource-list.php'; ?>
    	</main>
    </div>
    <div id="remove_like" class="modal no-shadow">
        <div class="modal-content">
            <h4><?= __( 'Zasób został usunięty z ulubionych.', 'kg' ); ?></h4>
            <p><?= __( 'Dodawanie zasobów do ulubionych to najlepszy sposób, aby łatwo wrócić do nich w przyszłości.', 'kg' ) ; ?></p>
        </div>
        <div class="modal-footer">
            <button class="Button Button--wide Button--free right modal-close">OK</button>
        </div>
    </div>
</body>
