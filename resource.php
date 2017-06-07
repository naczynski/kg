<?php
	$active_subscription = KG_get_curr_user()->get_current_subscription();
	$free_resources_remaining = $active_subscription ? $active_subscription->get_status()['free_resources_remaining'] : 0;
?>

<div class="Resource" ng-controller="SingleResourceController as resource" data-tooltiped>
	<div class="Resource-side">
		<button class="Resource-icon Resource-sideIcon" ng-class="'Resource-icon--'+item.category_id" title="{{item.tooltip_icon}}" data-tooltip data-placement="bottom" ng-click="filter(item.filter)">
			<i class="kg-icons" ng-bind="item.category_id"></i>
		</button>
		<div class="Resource-icon Resource-sideIcon Resource-sideIcon--promoted" ng-if="isPromoted(item)" title="Polecane" data-tooltiped data-tooltip  data-placement="top">
			<i class="kg-icons">star</i>
		</div>
		<span class="Resource-sideCIM" ng-if="item.is_cim_resource" title="Zasób przygotowany dla użytowników CIM" data-tooltiped data-tooltip data-placement="top">CIM</span>
	</div>
	<div class="Resource-main">
		<div class="Resource-header">
			<div class="Resource-tags">
				<span class="Resource-tag" ng-repeat="tag in item.tags" ng-bind="tag.name"></span>
			</div>
			<span class="Resource-timestamp" ng-bind="item.date_creation"></span>
		</div>
		<div class="Resource-demo" ng-click="toggleExpansion()">
			<img class="Resource-image" ng-src="{{item.thumbnail_big}}">
			<div class="Resource-demoContent">
				<h3 class="Resource-title" ng-bind-html="name(item.name)"></h3>
				<p class="Resource-post" ng-bind-html="shortDescription()"></p>
			</div>
			<div class="Resource-price" ng-if="item.price">
				<span class="Resource-priceValue">{{item.price}},-</span>
			</div>
			<div class="Resource-result" ng-if="item.type=='quiz' && item.is_user_solved" ng-class="item.solve.passed_quiz?'Resource-result--solved':'Resource-result--failed'">
				<span class="Resource-resultValue">{{item.solve.percange_result}}%</span>
			</div>
		</div>
		<div class="Resource-full" collapse="!isExpanded()">
			<p class="Resource-post Resource-post--full" ng-bind-html="longDescription()"></p>
			<div class="Resource-related" ng-if="item.related.length>0">
				<span class="Resource-relatedLabel">Zobacz również:</span>
				<div class="Resource-relatedContainer">
					<a class="Resource-relatedItem" ng-click="openRelated(related)" ng-repeat="related in item.related | limitTo:(4)">
						<div class="Resource-icon" ng-class="'Resource-icon--'+related.category_id">
							<i class="kg-icons" ng-bind="related.category_id"></i>
						</div>
						<img  class="Resource-relatedImage" ng-src="{{related.thumbnail_small}}">
						<div class="Resource-relatedDescription">
							<span class="Resource-relatedItemName" ng-bind="related.name"></span>
							<span class="Resource-relatedItemLabel" ng-bind="related.label"></span>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="Resource-footer">
			<div class="Resource-footerIcons">
				<button ng-show="item.type=='task' && item.task.is_user_participate" data-tooltip title="Opuść zadanie" ng-click="leaveTask(item)" class="Resource-footerIconWithLabel">
					<i class="material-icons">close</i>
				</button>

				<button class="Resource-footerIconWithLabel" ng-click="like($event)">
					<i class="material-icons Resource-footerIcon" title="{{isLiked()? 'Usuń z ulubionych' :'Dodaj do ulubionych'}}" data-tooltip data-placement="top" ng-class="item.is_user_like?'Resource-favrouteIcon--active':'Resource-favrouteIcon--inactive'">favorite</i>
					<span class="Resource-footerIconLabel" ng-bind="item.number_likes"></span>
				</button>
				<div class="Resource-footerIconWithLabel">
					<i class="kg-icons Resource-footerIcon Resource-favrouteIcon--inactive" title="Popularność" data-tooltip data-placement="top">cloud</i>
					<span class="Resource-footerIconLabel" ng-bind="item.count_actions"></span>
				</div>
				<div class="Resource-footerIconWithLabel" ng-if="item.can_present">
					<i class="kg-icons Resource-footerIcon Resource-presentIcon" title="Tyle osób dostało go w prezencie" data-tooltip data-placement="top">present</i>
					<span class="Resource-footerIconLabel" ng-bind="item.count_as_presents"></span>
				</div>
			</div>
			<div class="Resource-footerButtons">
				<?php get_template_part('resource-action-bar'); ?>
			</div>
		</div>
	</div>
</div>