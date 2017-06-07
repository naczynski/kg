<?php 

	if(Angular::wrap())
		return; 


	Angular::params([
		'application' => 'Register',
        'popupless' => true
	]);
	
?>

<body class="Layout-body" ng-controller="RegisterCtrl">
	<div class="Layout-content">
		<main class="Layout-main Scrollable">
			<div class="Scrollable-wrapper" layout="column" layout-align="center center">
				<div class="BigCard">
					<div class="BigCard-decoration LRR-decoration--login" layout="column" layout-align="center center">
						<div class="BigCard-decorationIcon">
							<?= the_svg_asset('register'); ?>
						</div>
						<span class="BigCard-decorationLabel">Rejestracja</span>
					</div>
					<div class="BigCard-main">
						<img class="BigCard-logo" src="<?= the_asset_uri('logo-cocpit-blue.png')?>">
						<div class="BigCard-content">
							<form layout="row" class="LRR-form LRR-form--2Columns" flex name="register_form">
								<div class="LRR-formColumn" layout="column">
										
										<?php 
											$group = KG_Get::get('KG_User_Group_Fields', 'group_fields_invoice_default' );
											$fields = $group->get_fields();
											foreach($fields as $field) : 
										?>	
											<div class="input-field LRR-inputField .with-messages" layout-padding>
												<label set-active-input for="<?= $field->get_name(); ?>"><?= $field->get_label(); ?></label>
												<input value=" " type="text" name="<?= $field->get_name(); ?>" ng-model="<?= $field->get_name(); ?>" <?= $field->is_required() ? 'ng-required="register_form.'.$field->get_name().'.$touched"' : '' ; ?> ng-change="clear_backend_error('<?= $field->get_name(); ?>')" ng-class="{'backend-error':register_form.<?= $field->get_name(); ?>.$error.backend_error}">
												<div ng-cloak ng-messages="register_form.<?= $field->get_name(); ?>.$error"  class="errors red-text">
													<div ng-message="required">To pole jest wymagane</div>
													<div ng-message="backend_error">{{errors['<?= $field->get_name(); ?>']}}</div>
												</div>
											</div>	
										<?php endforeach; ?>

										<div class="input-field LRR-inputField .with-messages"  layout-padding>
											<label set-active-input for="signup_email"><?php _e( 'E-mail', 'kg' ); ?></label>
											<input value="" ng-required="register_form.signup_email.$touched" ng-focus="register_form.signup_email.$focus=false" ng-blur="register_form.signup_email.$focus=true" type="email" name="signup_email" ng-model="signup_email" ng-change="clear_backend_error('signup_email')" ng-class="{'backend-error':register_form.signup_email.$error.backend_error}">
											<div ng-cloak ng-messages="register_form.signup_email.$error" role="alert" class="errors red-text">
												<div ng-message="required">To pole jest wymagane</div>
												<div ng-message="email">
													<div ng-if="register_form.signup_email.$focus" class="LRR-inputField .with-messagesErrorSpecialCase">To nie jest poprawny adres email</div>
												</div>
												<div ng-message="backend_error">{{errors['signup_email']}}</div>
											</div>
										</div>

										<div class="input-field LRR-inputField .with-messages"  layout-padding>
											<label set-active-input for="signup_password"><?php _e( 'Hasło', 'kg' ); ?></label>
											<input ng-required="register_form.signup_password.$touched" type="password" name="signup_password" ng-model="signup_password" ng-change="clear_backend_error('signup_password')" ng-class="{'backend-error':register_form.signup_password.$error.backend_error}">
											<div ng-cloak ng-messages="register_form.signup_password.$error" class="errors red-text">
												<div ng-message="required">To pole jest wymagane</div>
												<div ng-message="backend_error">{{errors['signup_password']}}</div>
											</div>
										</div>

										<div class="input-field LRR-inputField .with-messages"  layout-padding>
											<label set-active-input for="signup_password_confirm"><?php _e( 'Powtórz hasło', 'kg' ); ?></label>
											<input ng-required="register_form.signup_password_confirm.$touched" type="password" name="signup_password_confirm" ng-model="signup_password_confirm" ng-change="clear_backend_error('signup_password_confirm')" ng-class="{'backend-error': register_form.signup_password_confirm.$error.backend_error}">
											<div ng-cloak ng-messages="register_form.signup_password_confirm.$error" class="errors red-text">
												<div ng-message="required">To pole jest wymagane</div>
												<div ng-message="backend_error">{{errors['signup_password_confirm']}}</div>
											</div>
										</div>
														

									<div class="LRR-footerButton Button Button-wide Button--darkBlue Button--iconifiedLeft Button-linkedIn Button--centerdText" ng-click="getDataFromLinkedIn()" ><i class="LRR-linkedin"><?= the_svg_asset('linkedin_white'); ?></i>Pobierz dane z serwisu LinkedIn</div>
								</div>
								<div class="LRR-formColumn" layout="column">
									
										<?php 
											$group = KG_Get::get('KG_User_Group_Fields', 'group_fields_job' );
											$fields = $group->get_fields();
											foreach($fields as $field) : 
										?>	
											<div class="input-field LRR-inputField .with-messages" layout-padding>
												<label set-active-input for="<?= $field->get_name(); ?>"><?= $field->get_label(); ?></label>
												<input value=" " <?=($field->get_name()=="kg_field_trade")?'list="kg_field_trade_list"':''?> type="text" name="<?= $field->get_name(); ?>" ng-model="<?= $field->get_name(); ?>" <?= $field->is_required() ? 'ng-required="register_form.'.$field->get_name().'.$touched"' : '' ; ?> ng-change="clear_backend_error('<?= $field->get_name(); ?>')" ng-class="{'backend-error':register_form.<?= $field->get_name(); ?>.$error.backend_error}">
												<div ng-cloak ng-messages="register_form.<?= $field->get_name(); ?>.$error"  class="errors red-text">
													<div ng-message="required">To pole jest wymagane</div>
													<div ng-message="backend_error">{{errors['<?= $field->get_name(); ?>']}}</div>
												</div>
												<?php if($field->get_name()=="kg_field_trade"): ?>
													<datalist id="kg_field_trade_list">
														<option>Accounting</option>
														<option>Airlines/Aviation</option>
														<option>Alternative Dispute Resolution</option>
														<option>Alternative Medicine</option>
														<option>Animation</option>
														<option>Apparel & Fashion</option>
														<option>Architecture & Planning</option>
														<option>Arts & Crafts</option>
														<option>Automotive</option>
														<option>Aviation & Aerospace</option>
														<option>Banking</option>
														<option>Biotechnology</option>
														<option>Broadcast Media</option>
														<option>Building Materials</option>
														<option>Business Supplies & Equipment</option>
														<option>Capital Markets</option>
														<option>Chemicals</option>
														<option>Civic & Social Organization</option>
														<option>Civil Engineering</option>
														<option>Commercial Real Estate</option>
														<option>Computer & Network Security</option>
														<option>Computer Games</option>
														<option>Computer Hardware</option>
														<option>Computer Networking</option>
														<option>Computer Software</option>
														<option>Construction</option>
														<option>Consumer Electronics</option>
														<option>Consumer Goods</option>
														<option>Consumer Services</option>
														<option>Cosmetics</option>
														<option>Dairy</option>
														<option>Defense & Space</option>
														<option>Design</option>
														<option>Education Management</option>
														<option>E-learning</option>
														<option>Electrical & Electronic Manufacturing</option>
														<option>Entertainment</option>
														<option>Environmental Services</option>
														<option>Events Services</option>
														<option>Executive Office</option>
														<option>Facilities Services</option>
														<option>Farming</option>
														<option>Financial Services</option>
														<option>Fine Art</option>
														<option>Fishery</option>
														<option>Food & Beverages</option>
														<option>Food Production</option>
														<option>Fundraising</option>
														<option>Furniture</option>
														<option>Gambling & Casinos</option>
														<option>Glass, Ceramics & Concrete</option>
														<option>Government Administration</option>
														<option>Government Relations</option>
														<option>Graphic Design</option>
														<option>Health, Wellness & Fitness</option>
														<option>Higher Education</option>
														<option>Hospital & Health Care</option>
														<option>Hospitality</option>
														<option>Human Resources</option>
														<option>Import & Export</option>
														<option>Individual & Family Services</option>
														<option>Industrial Automation</option>
														<option>Information Services</option>
														<option>Information Technology & Services</option>
														<option>Insurance</option>
														<option>International Affairs</option>
														<option>International Trade & Development</option>
														<option>Internet</option>
														<option>Investment Banking/Venture</option>
														<option>Investment Management</option>
														<option>Judiciary</option>
														<option>Law Enforcement</option>
														<option>Law Practice</option>
														<option>Legal Services</option>
														<option>Legislative Office</option>
														<option>Leisure & Travel</option>
														<option>Libraries</option>
														<option>Logistics & Supply Chain</option>
														<option>Luxury Goods & Jewelry</option>
														<option>Machinery</option>
														<option>Management Consulting</option>
														<option>Maritime</option>
														<option>Marketing & Advertising</option>
														<option>Market Research</option>
														<option>Mechanical or Industrial Engineering</option>
														<option>Media Production</option>
														<option>Medical Device</option>
														<option>Medical Practice</option>
														<option>Mental Health Care</option>
														<option>Military</option>
														<option>Mining & Metals</option>
														<option>Motion Pictures & Film</option>
														<option>Museums & Institutions</option>
														<option>Music</option>
														<option>Nanotechnology</option>
														<option>Newspapers</option>
														<option>Nonprofit Organization Management</option>
														<option>Oil & Energy</option>
														<option>Online Publishing</option>
														<option>Outsourcing/Offshoring</option>
														<option>Package/Freight Delivery</option>
														<option>Packaging & Containers</option>
														<option>Paper & Forest Products</option>
														<option>Performing Arts</option>
														<option>Pharmaceuticals</option>
														<option>Philanthropy</option>
														<option>Photography</option>
														<option>Plastics</option>
														<option>Political Organization</option>
														<option>Primary/Secondary</option>
														<option>Printing</option>
														<option>Professional Training</option>
														<option>Program Development</option>
														<option>Public Policy</option>
														<option>Public Relations</option>
														<option>Public Safety</option>
														<option>Publishing</option>
														<option>Railroad Manufacture</option>
														<option>Ranching</option>
														<option>Real Estate</option>
														<option>Recreational</option>
														<option>Facilities & Services</option>
														<option>Religious Institutions</option>
														<option>Renewables & Environment</option>
														<option>Research</option>
														<option>Restaurants</option>
														<option>Retail</option>
														<option>Security & Investigations</option>
														<option>Semiconductors</option>
														<option>Shipbuilding</option>
														<option>Sporting Goods</option>
														<option>Sports</option>
														<option>Staffing & Recruiting</option>
														<option>Supermarkets</option>
														<option>Telecommunications</option>
														<option>Textiles</option>
														<option>Think Tanks</option>
														<option>Tobacco</option>
														<option>Translation & Localization</option>
														<option>Transportation/Trucking/Railroad</option>
														<option>Utilities</option>
														<option>Venture Capital</option>
														<option>Veterinary</option>
														<option>Warehousing</option>
														<option>Wholesale</option>
														<option>Wine & Spirits</option>
														<option>Wireless</option>
														<option>Writing & Editing</option>
													</datalist>
												<?php endif; ?>
											</div>	
										<?php endforeach; ?>

									<div flex></div>
									<p layout="column" layout-margin class="LRR-checkbox">
										<input type="checkbox" name="agree_personal_data" id="agree_personal_data" class="filled-in" checked="checked" />
										<label for="agree_personal_data" layout-margin flex>Wyrażam zgodę na przetwarzanie danych osobowych</label>
									</p>
									<p layout="column" layout-margin class="LRR-checkbox">
										<input type="checkbox" name="regulamin_accepted" id="regulamin_accepted" class="filled-in" checked="checked" />
										<label for="regulamin_accepted" layout-margin flex>Akceptuję <a class="terms-link" target="_blank" href="<?=KG_Config::getPublic('terms_pdf_link');?>">regulamin</a></label>
									</p>
									<div class="LRR-footerButton Button Button-wide Button--blue Button--centerdText" ng-click="register()">Zarejestruj</div>
								</div>
							</form>
						</div>
						<div class="BigCard-footer">
							<a class="Button LRR-footerButton Button--free Button--centerdText" href="<?= get_permalink(KG_Config::getPublic('login_page_id'))?>">Masz już konto? <mark>Zaloguj się</mark></a>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
	<div id="sucess_dialog" class="modal">
		<div class="modal-content">
			<h4>Wysłano zgłoszenie.</h4>
			<p>Sprawdź pocztę aby potwierdzić swój adres email.</p>
		</div>
		<div class="modal-footer">
			<a href="/" class="modal-action modal-close Button Button--loud Button--wide Button--free right">OK</a>
		</div>
	</div>
</body>