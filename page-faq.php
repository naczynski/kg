<?php /* Template Name: FAQ */ ?>

<?php 

	if(Angular::wrap())
		return; 


	Angular::params([
		'application' => 'FAQ',
        'popupless' => true
	]);

	global $post;
	$questions = get_field('answers', $post->ID);
?>

<body class="Layout-body" ng-controller="FAQCtrl">
	<div class="Layout-content">
		<main class="Layout-main Scrollable">
			<div class="Scrollable-wrapper Transactions-transactions" layout="column">
				<nav>
					<a class="blue nav-logo" href="/" layout="column" layout-align="center center" layout-padding>
						<img class="circle nav-logo-img" src="<?= the_asset_uri('logo-cocpit.png'); ?>">
					</a>
				</nav>
				<header class="FAQ-headerIcon" layout="row" layout-align="center center">
					<div class="FAQ-icon">
						<?= the_svg_asset('faq'); ?>
					</div>
					<p class="FAQ-label"><mark>F</mark>requently
						<mark>A</mark>sked
						<mark>Q</mark>uestions</p>
				</header>
				<div layout="row" flex layout-align="center center">
					<div flex class="center">
						<a href="/" class="FAQ-back">
							<i class="material-icons">navigate_before</i>
						</a>
					</div>
					<ul layout="column" class="container FAQ-list">
						<?php foreach ( (array) $questions as $index=>$question): ?>
							<li layout-margin layout="row" layout-align="start start">
								<div class="FAQ-decoration">
									<div class="resource_icon chat"></div>
								</div>
								<div class="FAQ-question" ng-click="toggleExpand(<?=$index?>)" flex>
									<div class="FAQ-header"><?= $index + 1 ?>. <?= $question['question'] ?></div>
									<div collapse="isExpanded(<?=$index?>)">
										<div class="FAQ-body"><?= $question['answer'] ?></div>
									</div>
								</div>
							</li>
						<?php endforeach ?>
					</ul>
					<div flex></div>
				</div>
				<footer class="FAQ-footer">
					<span>Zespół Knowledge Garden</span>
				</footer>
			</div>
		</main>
	</div>
</body>