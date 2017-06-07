<div class="ResourceList-header">
	<div class="ResourceList-search">
		<div class="ResourceList-phrase">
			<i class="ResourceList-phraseIcon material-icons">search</i>
			<input class="ResourceList-phraseInput" hint="" ng-model="phrase" placeholder="Wyszukaj w: " ng-attr-placeholder="{{searchLabel()}}" ng-change="updatePhrase()" ng-model-options="{debounce: 300}">
		</div>
		<select class="ResourceList-sort" ng-model="sort" ng-change="updateSort()" ng-model-options="{debounce: 300}">
    		<option class="ResourceList-sortOption" value="" disabled selected>Sortuj</option>
			<option class="ResourceList-sortOption" value="date">Najnowsze</option>
			<option class="ResourceList-sortOption" value="actions">Najwięcej pobrań</option>
			<option class="ResourceList-sortOption" value="likes">Najwięcej polubień</option>
		</select>
		 <?php if(KG_get_curr_user()->is_cim()): ?>
			<label class="ResourceList-switch">
					Wszystkie
					<input type="checkbox" class="ResourceList-checbox" ng-checked="show_only_sim_resources" ng-change="updateCIM()" ng-model-options="{debounce: 300}" ng-model="show_only_sim_resources">
					<span class="ResourceList-lever"></span>
					CIM
			</label>
		<?php endif; ?>
	</div>
	<div class="ResourcesTags" ng-class="'ResourcesTags--colorizeForCategory-'+selectedCategoryID()">
		<button class="ResourcesTags-tag ResourcesTags-toggleAll" ng-click="toggleAllTags()">Zaznacz wszystkie</button>	
		<ul class="ResourcesTags-list">					
			<?php foreach ($tags as $tag): ?>
				<li class="ResourcesTags-listElement">
					<button class="ResourcesTags-tag" ng-class="{ 'ResourcesTags-tag--active': isActiveTag(<?=$tag->id;?>) }" ng-click="toggleTag(<?=$tag->id;?>);" ><?=$tag->name;?></button>
				</li>						
			<?php endforeach; ?>
		</ul>
	</div>
</div>