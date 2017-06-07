<aside class="Sidebar Layout-sidebar">
	<div class="sidebar-search">
		<label class="Sidebar-label material-icons" for="sidebar-input">search</label>
		<input class="sidebar-input" id="sidebar-input" ng-focus="phrase=''" hint="" ng-model="phrase" placeholder="Wyszukaj w wszystkich użytkownikach:" ng-attr-placeholder="{{searchLabel()}}" ng-change="updatePhrase()" ng-model-options="{debounce: 300}" ng-class="'user-search-color-'+selectedGroupName()">
	</div>
	<dl class="sidebar-list" layout="column">
		<dt ng-click="selectGroup('all')" class="Button Button--white Sidebar-button">Grupy</dt>
		<dd class="Button Button--white Sidebar-button category-badge category-badge-coach" ng-class="{'active':isUserGroupSelected('coach')}" ng-click="selectGroup('coach')">
			<span>Coach</span>
		</dd>
		<dd class="Button Button--white Sidebar-button category-badge category-badge-vip" ng-class="{'active':isUserGroupSelected('vip')}" ng-click="selectGroup('vip')">
			<span>VIP</span>
		</dd>	
		<dd class="Button Button--white Sidebar-button category-badge category-badge-cim" ng-class="{'active':isUserGroupSelected('cim')}" ng-click="selectGroup('cim')">
			<span>CIM</span>
		</dd>	
		<dd class="Button Button--white Sidebar-button category-badge category-badge-user"  ng-class="{'active':isUserGroupSelected('all')}" ng-click="selectGroup('all')">
			<span>Wszyscy</span>
		</dd
	</dl>
</aside>