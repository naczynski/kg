	<?php
		$active_subscription = KG_get_curr_user()->get_current_subscription();
		$free_resources_remaining = $active_subscription ? $active_subscription->get_status()['free_resources_remaining'] : 0;
	?>

	<?php if(KG_get_curr_user()->is_have_active_subscription()): ?>
		
		<?php if (KG_get_curr_user()->can_networking()): ?>
			<button ng-if="item.can_present" title="Podaruj" data-tooltiped data-tooltip  data-placement="top"  ng-click="makePresent()" class="Button Button--centerdText Button--iconifiedLeft Button--cost"><i class="kg-icons">present</i>Podaruj</button>
		<?php endif; ?>

		<!-- Event -->
		
		<p class="event-available-seats" ng-if="item.type=='event'" ng-bind-html="getHtml(item.info)"></p>

		<button ng-if="item.type=='event' && item.can_download" class="Button Button--centerdText Button--iconifiedLeft" disabled><i class="material-icons">shopping_cart</i>Kupione</button>

		<!-- Subscription -->

		<button ng-if="item.as_free_resource && !item.can_download"  ng-click="useAsFree(item.id)" class="Button Button--centerdText Button--iconifiedLeft Button--free"><i class="material-icons">file_download</i>Wybierz w ramach abonamentu ({{freeResourcesRemaining || <?=$free_resources_remaining; ?>}})</button>

		<!-- Basket -->

		<button ng-if="item.can_buy && !item.can_download" ng-click="buy($event)" class="Button Button--centerdText Button--iconifiedLeft Button--cost" ng-disabled="item.is_in_basket"><i class="material-icons">shopping_cart</i>{{item.btn_add_to_basket_label}}</button>

		<!-- Links -->

		<a target="_blank" ng-href="{{item.link_read_more}}" ng-if="item.link_read_more" class="Button Button--centerdText Button--free Button--iconifiedLeft"><i class="material-icons">remove_red_eye</i>Więcej</a>

		<!-- Download -->

		<a target="_blank" ng-href="{{item.private_file_link}}" ng-if="item.show_download_button" class="Button Button--centerdText Button--cost Button--iconifiedLeft"><i class="material-icons">file_download</i>Pobierz</a>

		<!-- Quizes (not solved) -->

		<button ng-if="item.type=='quiz' && !item.is_user_solved && !item.solve.choose_award" ng-click="showAwardsQuiz(item)" class="Button Button--centerdText Button--free Button--iconifiedLeft"><i class="material-icons">remove_red_eye</i>Zobacz nagrody</button>

		<a target="_blank" ng-href="{{item.link}}" ng-if="item.type=='quiz' && !item.is_user_solved" class="Button Button--centerdText Button--cost Button--iconifiedLeft"><i class="material-icons">mode_edit</i>Rozwiąż</a>

		
		<!-- Quizes (solved) -->

		<span ng-if="item.type=='quiz' && item.is_user_solved" class="event-available-seats">Rozwiązano: {{item.solve.date}} <span class="white-text" layout-margin=""> | </span> Poprawne: {{item.solve.correct_answers}} <span class="white-text" layout-margin=""> | </span> Błędne: {{item.solve.wrong_answers}}</span>

		<button ng-click="showAwardsQuiz(item)" ng-if="item.type=='quiz' && item.is_user_solved && !item.solve.choose_award && item.solve.passed_quiz" class="Button Button--centerdText Button--cost Button--sentPresent Button--iconifiedLeft"><i class="kg-icons">present</i>Wybierz nagrodę</button>
	
		<a target="_blank" ng-href="{{item.link}}" ng-if="item.type=='quiz' && item.is_user_solved" class="Button Button--centerdText Button--free Button--iconifiedLeft"><i class="material-icons">remove_red_eye</i>Zobacz odpowiedzi</a>

		<!-- Tasks  -->
		
		<p class="event-available-seats" ng-show="item.type=='task'" ng-bind-html="getHtml(item.info)"></p>
	
		<button ng-click="showAwardsTask(item)" ng-if="item.type=='task'" class="Button Button--centerdText Button--free Button--iconifiedLeft"><i class="material-icons">remove_red_eye</i>Zobacz nagrody</button>
	
		<a target="_blank" ng-href="{{item.link}}" ng-if="item.type=='task'" class="Button Button--centerdText Button--cost Button--iconifiedLeft"><i class="material-icons">person_add</i>Dołącz do zadania</a>

	<?php else: ?>

		<a target="_blank" href="<?= get_permalink(KG_Config::getPublic('extend_subscription_page_id')); ?>" class="Button Button--centerdText Button--cost Button--iconifiedLeft"><i class="material-icons">shopping_cart</i>Kup abonament</a>
		
	<?php endif; ?>