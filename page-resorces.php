
<?php 
	
	if(Angular::wrap())
		return; 

	the_post();

	Angular::params([
		'application' => 'Resources',
	]);
	
	$tags = KG_Get::get('KG_Category')->get_tags();
	$categories = KG_Get::get('KG_Category')->get_categories();

	$tags_ids = [];

	foreach($tags as $tag){
		$tags_ids[] = $tag->id;
	}

	Angular::init('Tags',json_encode($tags_ids,JSON_NUMERIC_CHECK));
    Angular::init('CategoriesData',$categories);
    Angular::init('UserLogins',KG_get_curr_user()->get_sum_log_in());
?>

<body ng-controller="ResourcesCtrl" class="Layout-body Resources-page">
	<?php get_header(); ?>
	<div class="Layout-content">
		<?php get_sidebar('resources'); ?>
		<main class="Layout-main ResourceList">
			<?php include get_template_directory().'/resource-filters.php'; ?>
			<?php include get_template_directory().'/resource-list.php'; ?>
		</main>
	</div>
</body>