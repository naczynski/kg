<aside class="Sidebar Layout-sidebar">
	<div class="sidebar-search">
		<label class="Sidebar-label material-icons" for="sidebar-input">search</label>
		<input class="sidebar-input" id="sidebar-input" hint="" ng-model="phrase" ng-attr-placeholder="Wyszukaj w: {{category_name}}..." ng-change="updatePhrase()" ng-class="'search-color-'+category" ng-model-options="{debounce: 300}" >
	</div>
	<dl class="sidebar-list" layout="column">
		<dt ng-click="changeRelationType(null)" class="Button Button--white Sidebar-button">Kategorie</dt>
		<?php foreach (KG_Config::getPublic('all_relations') as $key => $relation):
			$count = KG_get_relation_getter_object_by_name($relation['type_name'])->count(KG_get_curr_user()->get_ID());
		 ?>
			<dd class="Button Button--white Sidebar-button category-badge" ng-class="{'active':relation_type == '<?=$relation['type_name']; ?>'}" ng-click="setSearchLabel('<?=$relation['label'];?>'); changeRelationType('<?=$relation['type_name']; ?>')">
				<span ng-init="sidebar_counters['<?=$relation['type_name']?>']=<?=$count?>;"><?=$relation['label'] ;?> </span><span ng-cloak>({{sidebar_counters['<?=$relation['type_name']?>']}})</span>
			</dd>	
		<?php endforeach; ?>
	</dl>
</aside>