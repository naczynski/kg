<?php /* Template Name: Quizy */ ?>
<?php 

	if(Angular::wrap())
		return; 

	the_post();

	Angular::params([
		'application' => 'Quizes',
	]);

	Angular::init('results', json_encode(KG_Get::get('KG_Loop_My_Quizes_Results', get_current_user_id())->get()));

	$active_subscription = KG_get_curr_user()->get_current_subscription();
?>

<body class="Layout-body" ng-controller="QuizesCtrl">
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
						<h5 class="List-emptyLabel">Nie rozwiązałeś jeszcze żadnego quizu.</h5>
					</div>
				</div>
			</div>	
		</main>
	</div>
</body>