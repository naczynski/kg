<?php 
	
    if(Angular::wrap())
        return; 

    if (KG_get_curr_user()->is_have_active_subscription()){

        the_post();
        Angular::params([
            'application' => 'Resource',
        ]);

        $controller = 'ResourceCtrl';
    
        $item = KG_get_resource_object(get_the_ID())->get_serialized_fields_for(get_current_user_id());
        Angular::init('resource',json_encode($item));
    } else {
        Angular::params([
            'application' => 'NoSubscription',
        ]);

        $controller = 'NoSubscriptionCtrl';
    }

?>
<body class="Layout-body" ng-controller="<?=$controller?>">
    <?php get_header(); ?>
    <div class="Layout-content">
        <?php if (KG_get_curr_user()->is_have_active_subscription()): ?>
            <main class="Layout-main Scrollable">
                <div class="Scrollable-wrapper">
                    <div class="Scrollable-scrolled">
                        <div class="container" flex layout-align="center center" layout="column" ng-init="item = item">
                            <?php include(get_template_directory().'/resource.php'); ?>
                        </div>
                    </div>
                </div>
            </main>
        <?php else: ?>
            <?php get_template_part('no-subscription'); ?>
        <?php endif; ?>
    </div>
</body>