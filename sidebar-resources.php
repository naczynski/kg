<?php $categories = KG_Get::get('KG_Category')->get_categories(); ?>
<aside class="Sidebar Layout-sidebar" layout="column">
	<div class="Scrollable Scrollable--usesCodeToScroll" flex>
		<div class="Scrollable-wrapper" suppressScrollX perfect-scrollbar wheel-propagation="true">
			<div class="Scrollable-scrolled">
				<dl class="sidebar-list">
					<dt class="Button Button--white Sidebar-button category-badge category-badge-for-all Sidebar--topButton" ng-click="selectCategory(null,'Wyszukaj w zasobach:',null)" ng-class="{'active':isSelectedCategory(null,null)}">
						<span>Wszystkie kategorie</span>
					</dt>
					<?php foreach($categories as $category): ?>
						<dd>
							<dl>
								<dt class="Button Button--white Sidebar-button category-badge category-badge-for-<?= $category->id ?> Sidebar--topButton" ng-class="{'active':isSelectedCategory(<?= $category->id; ?>,null)}" ng-click="selectCategory(<?= $category->id; ?>,'<?= $category->name; ?>',null);"><span><?= $category->name ;?></span></dt>
								<?php foreach($category->children as $children_category): ?>
									<dd>
										<div class="Button Button--white Button--iconifiedLeft Sidebar-button subcategory-badge-for-<?= $category->id ?>" ng-class="{'active':isSelectedCategory(<?= $children_category->id; ?>,<?= $category->id ?>)}" ng-click="selectCategory(<?= $children_category->id; ?>,'<?= $children_category->name; ?>',<?= $category->id; ?>);"><i class="kg-icons"><?= $children_category->id ;?></i><?= $children_category->name ;?></div>
									</dd>
								<?php endforeach; ?>
							</dl>
						</dd>
					<?php endforeach; ?>
					<?php if(KG_get_curr_user()->is_cim()): ?>
						<button class="Button Button--white Sidebar-button category-badge category-badge-for-103 Sidebar--topButton" ng-class="{'active':show_only_sim_resources}" ng-click="selectCategory(null,'Wyszukaj w zasobach:',null);selectCIM()"><span>CIM</span></button>	
					<?php endif; ?>
				</dl>
			</div>
		</div>
	</div>
</aside>