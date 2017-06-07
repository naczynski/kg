<?php /* Template Name: Moje zadania */ 

    if(Angular::wrap())
        return; 

    the_post();

    Angular::params([
        'application' => 'Tasks',
    ]);

    Angular::init('results', KG_Get::get('KG_Loop_My_Tasks', get_current_user_id())->get());
?>
<body class="Layout-body" ng-controller="TasksCtrl">
	<?php get_header(); ?>
	<div class="Layout-content">
		<main class="Layout-main ResourceList">
			<div class="ResourceList-content Scrollable">
				<div id="resource-list-warapper" class="Scrollable-wrapper" ng-cloak>
					<ul ng-show="list.length>0" class="List Scrollable-scrolled" infinite-scroll-container="'#resource-list-warapper'" infinite-scroll="more()">
						<li ng-repeat="item in list" class="List-element">
							<?php include(get_template_directory().'/resource.php'); ?>
						</li>
					</ul>
					<div ng-hide="list.length>0" class="List-empty Scrollable-scrolled">
						<h5 class="List-emptyLabel">Nie brałeś jeszcze udziału w żadnym zadaniu.</h5>
					</div>
				</div>
			</div>	
		</main>
	</div>
</body>