<?php 	/* Template Name: Pojedyńcze zadanie */ 

	global $post;
	$data = KG_get_data_for_single_task($post->ID, 1);
	KG_Get::get('KG_Task_Item', $post->ID)->join( get_current_user_id() );

	if(Angular::wrap())
		return; 

	the_post();
	Angular::params([
		'application' => 'Task',
	]);

	Angular::init('data', $data);

?>

<body class="Layout-body" ng-controller="TaskCtrl">
    <?php get_header(); ?>
    <div class="Layout-content">
        <main class="Layout-main Scrollable">
            <div class="Scrollable-wrapper">
            	<div class="Scrollable-scrolled" scroll-top>
					<div class="task-ended" ng-if="task.status == 'closed'" ng-cloak>
						<span class="container">Zadanie zostało zakończone. Nadal jednak możesz zapoznać się z odpowiedziami.</span>
					</div>
					<div class="task-question" ng-cloak>
						<div class="container" layout="row">
							<div layout="column" class="task-questionOp" flex="15">
								<img class="PresentSelector-selectedUserAvatar align-center"  ng-class="'user-color-'+task.user.type" src="{{task.user.avatar}}"/>
								<p class="PresentSelector-selectedUserName text-center" ng-bind="task.user.name"></p>
							</div>
							<div layout="column" flex>
								<div class="task-questionDate">
									<span ng-bind="task.date"></span>
									<span title="{{task.type_tooltip}}" data-tooltip ng-bind="(task.status=='active')?' Aktywne':' Zakończone'" ng-class="(task.status=='active')? 'green-text':'red-text'"></span>
									<!-- <span ng-bind="(task.type=='private')?', Zamknięte':((task.status=='active')?', Otwarte':'')"></span>		 -->
								</div>
							
								<div class="task-questionMessage task-questionMessage--won" flex>
									<div ng-bind-html="question()" class="task-questionContent"></div>
								</div>

								<div layout="row" layout-align="end end">
									<a layout="colum" ng-click="showAwards()" class="Button Button--free">Przejrzyj nagrody</a>
									<a layout="colum" scroll-bottom=".task-answer" class="Button Button--cost" ng-if="canAddResponse()">Dodaj swoją odpowiedź</a>
								</div>
							</div>
						</div>
					</div>
					<div class="task-anwsers container" flex-auto flex layout="column" ng-if="showAnswers()" ng-cloak>
						
						<div layout="row" layout-align="end end" ng-cloak>
							<a ng-if="current_page != 1" ng-click="first()" class="Button Task-navigateButton task-paginationLink"><i class="kg-icons">navigate_first</i></a>
							<a ng-if="current_page != 1" ng-click="prev()" class="Button Task-navigateButton task-paginationLink"><i class="material-icons">navigate_before</i></a>
							<a ng-if="pages > 1" ng-repeat="page in pagination track by $index" ng-bind="page.number" ng-click="choose(page.number)" ng-class="{'task-paginationLinkCurrent': page.isCurrent}" class="Button Task-navigateButton task-paginationLink task-paginationLink--{{page.weight}}"></a>
							<a ng-if="current_page != pages" ng-click="next()" class="Button Task-navigateButton task-paginationLink"><i class="material-icons">navigate_next</i></a>
							<a ng-if="current_page != pages" ng-click="last()" class="Button Task-navigateButton task-paginationLink"><i class="kg-icons">navigate_last</i></a>
						</div>

						<div flex layout="column" ng-repeat="response in responses" ng-cloak>
							<div layout="column" id="task-anwsers" class="task-response" data-tooltiped>
								<div class="task-responseAwardInfo right" layout="row" layout-align="end end" ng-if="response.is_user_choose_award">
									Dzięki tej odpowiedzi zdobył:<a href="{{response.prize.link}}" target="_blank" class="task-prizeGottenName" ng-bind="response.prize.name_with_subtype"></a>
								</div>
								<div layout="row">
									<div layout="column" class="task-questionFg task-responseUser" ng-class="{'task-responseUser--notWon': !response.is_get_prize}">
										<img class="PresentSelector-selectedUserAvatar align-centerxw"  ng-class="'user-color-'+response.user.type" src="{{response.user.avatar}}"/>
									</div>
									<div class="task-questionMessage" ng-class="{'task-questionMessage--won': response.is_get_prize}" flex>
										<div class="task-questionHeader task-responseHeader" layout="row">
											<span ng-bind="response.date+'  '" class="task-responseTime"></span>
											<span ng-bind="response.user.name" class="task-responseUserName"></span>
											<div flex class="task-responseHeaderFiller">napisał(a):</div>
											<a ng-if="response.show_message_icon" ng-click="messageTo(response.user)" class="cursor-pointer response-headerMessageTo" title="Wyślij wiadomośc" data-tooltip  data-placement="top" layout="row" layout-align="center center" >
												<i class=" material-icons">email</i>
											</a>
											<a ng-if="response.show_present_icon" ng-click="presentTo(response.user)" class="cursor-pointer resource_icon task-sendPresentTo" title="Wręcz prezent" data-tooltip  data-placement="top" ng-class="response.is_get_prize?'present-white':'present-hover'"></a>
											
											<div layout="row" layout-align="center center" 
												 class="resource_heart cursor-pointer response-like" 
												 ng-click="like(response)"
												 title="Oznacz jako prawidłowa" 
												 data-tooltip 
												 data-placement="top"
												 ng-if="response.can_like"
												 >
												<i class="material-icons">favorite</i>
												<span class="task-likesCounter center cursor-pointer" ng-bind="response.likes"></span>
											</div>

											<div layout="row" layout-align="center center" 
												 class="resource_heart response-like"
												 ng-class="{'liked' : response.is_user_liked}"
												 data-placement="top"
												 ng-if="!response.can_like"
												 >
												 <i class="material-icons">favorite</i>
												<span class="task-likesCounter center" ng-bind="response.likes"></span>
											</div>

										</div>
										<div ng-bind-html="content(response.content)" class="task-questionContent"></div>
									</div>
								</div>
							</div>
						</div>

						<div layout="row" layout-align="end end" ng-cloak>
							<a ng-if="current_page != 1" ng-click="first()" class="Button Task-navigateButton task-paginationLink"><i class="kg-icons">navigate_first</i></a>
							<a ng-if="current_page != 1" ng-click="prev()" class="Button Task-navigateButton task-paginationLink"><i class="material-icons">navigate_before</i></a>
							<a ng-if="pages > 1" ng-repeat="page in pagination track by $index" ng-bind="page.number" ng-click="choose(page.number)" ng-class="{'task-paginationLinkCurrent': page.isCurrent}" class="Button Task-navigateButton task-paginationLink task-paginationLink--{{page.weight}}"></a>
							<a ng-if="current_page != pages" ng-click="next()" class="Button Task-navigateButton task-paginationLink"><i class="material-icons">navigate_next</i></a>
							<a ng-if="current_page != pages" ng-click="last()" class="Button Task-navigateButton task-paginationLink"><i class="kg-icons">navigate_last</i></a>
						</div>
						
					</div>

					<div class="task-answer" ng-cloak>		
						<div class="container" layout="column" ng-class="{'task-answer--blocked':(task.status == 'closed')}" id="task-answer"> 		
							<div class="task-answerMessgaeWrapper">
								<textarea class="task-anserrMessage" placeholder="Wpisz odpowiedź..." ng-model="message" ng-disabled="!canAddResponse()"></textarea>						
							</div>
							<button layout="colum" ng-click="sendResponse()" class="Button Button--free Conversation-button" ng-disabled="!canAddResponse()">Dodaj swoją odpowiedź</button>
						</div>
					</div>
				</div>
	        </div>
        </main>
    </div>
</body>
