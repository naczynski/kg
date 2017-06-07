<?php 

	if(Angular::wrap())
		return; 

	the_post();

	$fields = KG_get_curr_user()->get_on_my_profile_page_groups_fields();

	Angular::params([
		'application' => 'MyProfile',
	]);
	
	Angular::init('fields',$fields);
?>

<body class="Layout-body" ng-controller="MyProfileCtrl">
	<?php get_header(); ?>
	<div class="Layout-content">
		<main class="Layout-main Scrollable">
			<div class="Scrollable-wrapper">
				<div class="Scrollable-scrolled BigCard-container">
					<div class="BigCard" ng-cloak>
						<div class="BigCard-decoration MyProfile-decoration">
							<div class="BigCard-decorationIcon MyProfile-decorationIcon">
								<?= the_svg_asset('profile'); ?>
							</div>
							<span class="BigCard-decorationLabel">Mój profil</span>
						</div>
						<div class="BigCard-main">
							<ul class="BigCard-tabs">
								<li class="BigCard-tab MyProfile-tab" layout-padding ng-repeat="group in fields" ng-class="{ 'BigCard-tab--active': isActiveGroup(group)}"  ng-click="setActiveGroup(group)">{{group.label}}</li>
								<li class="BigCard-tab MyProfile-tab" layout-padding ng-class="{ 'BigCard-tab--active': changingAvatar }" ng-click="setChangingAvatar(true)">Avatar</li>
							</ul>
							<div class="BigCard-content MyProfile-content">

								<div id="security_ajax_container">
									<?php wp_nonce_field( 'ajax-change-field', 'security' ); ?>
								</div>
								<div id="security_avatar_container">
									<?php wp_nonce_field( 'kg-change-avatar', 'security' ); ?>
								</div>

								<form ng-submit="updateFields($event);">
									<?php wp_nonce_field( 'security', 'change_fields' ); ?>
									<div ng-repeat="field in getActiveFields()" class="MyProfile-input input-field {{field.name}}" layout-padding ng-hide="changingAvatar||preview">
										<input placeholder="{{field.placeholder}}" ng-class="{invalid: isError(field.name)}" name="{{field.name}}" type="text" id="{{field.name}}" ng-model="field.value" ng-model-options="{ debounce: 500, getterSetter:true }">
										<label for="{{field.name}}" class="force-active">{{field.label}}</label>
										<div class="MyProfile-errors">
											<p ng-if="isError(field.name)" class="MyProfile-error red-text">{{field.errorMessage}}</p>
										</div>
									</div>     
									<div layout="column" layout-align="end center" ng-hide="changingAvatar||preview">
									  <button class="Button Button--free Conversation-button" flex>Aktualizuj</button>
									</div> 
								</form>

							  <div ng-show="changingAvatar" layout-padding layout="column">
								<button ng-show="myImage" ng-click="save()" ng-cloak ng-show="cropImage" id="save-avatar" class="Button Button--free Button--wide Button--iconifiedLeft MyProfile-saveAvatarButton"><?= __( 'Zapisz avatar', 'kg' ); ?><i class="material-icons">save</i></button>
								<img-crop class="MyProfile-avatar" ng-show="myImage" result-image-quality="0.9" result-image-size="<?= KG_Config::getPublic('big_thumb_w'); ?>"  on-change="changeAvatar($dataURI)"  on-load-begin="onLoadBegin($datUrl)" on-load-done="onLoadDone($datUrl)" on-load-error="onLoadError($dataUrl)" image="myImage"  result-image-format="image/jpeg" result-image="myCroppedImage"></img-crop>
								<p ng-hide="myImage"><?= __( 'Wybierz zdjęcie w formacie JPG, GIF lub PNG ze swojego komputera o minimalnych wymiarach. 300px na 300px.', 'kg' ); ?></p>
								<div class="MyProfile-avatarFileSelec file-field input-field" flex layout="row" layout-align="center">
									<span class="Button Button--free">
										<i class="material-icons">file_upload</i>
									</span>	
									<input class="file-path MyProfile-avatarFileSelectButton" type="text" flex placeholder="<?= __( 'Wybierz obrazek', 'kg' ); ?>"/>
									<input type="file" id="fileInput"/>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
</body>