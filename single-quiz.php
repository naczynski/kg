<?php
	
	global $post;
	$quiz_item = KG_Get::get('KG_Quiz_Item', $post->ID)->get_serialized_fields_for(get_current_user_id());
	
	if(Angular::wrap())
		return; 

	the_post();
	Angular::params([
		'application' => 'Quiz',
	]);

	Angular::init('quiz', $quiz_item);
?>

<body class="Layout-body" ng-controller="QuizCtrl">
	<?php get_header(); ?>
	<div class="Layout-content">
		<main class="Layout-main Scrollable">
			<div class="Scrollable-wrapper">
				<div class="Scrollable-scrolled">
					<div class="container" flex layout-align="center center" layout="column" ng-switch="is_user_solved">

						<div ng-show="!started && !quiz.is_user_solved" class="Quiz-question" ng-cloak>
							<div class="Quiz-decoration">
								<div class="Quiz-decoratonIcon">
									<div class="resource_icon question"></div>
								</div>
								<p class="Quiz-counter">Pytań {{quiz.number_questions}}</p>
							</div>
							<button class="Quiz-next" ng-click="nextQuestion()">
								<i class="material-icons">navigate_next</i>
							</button>
							<div class="Quiz-main">
								<h6 class="Quiz-title" ng-bind="quiz.name"></h6>
								<div class="Quiz-content">
									<div class="Quiz-questionContent Quiz-begin">By otrzymać nagrodę, musisz udzielić poprawnej odpowiedzi na przynajmniej {{numberOfPositiveQuestionsRequiredToPassTest()}} {{getAnswersText(numberOfPositiveQuestionsRequiredToPassTest())}}. Powodzenia!</div>
								</div>
							</div>
						</div>

						<div ng-show="!quiz.is_user_solved && started" class="Quiz-question" ng-cloak>
							<div class="Quiz-decoration">
								<div class="Quiz-decoratonIcon">
									<div class="resource_icon question"></div>
								</div>
								<p class="Quiz-counter">Pytanie {{question_index+1}}/{{quiz.number_questions}}</p>
							</div>
							<button class="Quiz-next" ng-disabled="quiz_active.selected == null" ng-click="nextQuestion()">
								<i class="material-icons">navigate_next</i>
							</button>
							<div class="Quiz-main">
								<h6 class="Quiz-title" ng-bind="quiz.name"></h6>
								<div class="Quiz-content">
									<div class="Quiz-questionContent" ng-bind-html="questionHtml(quiz_active)"></div>
									<div class="Quiz-buttons">
										<div class="Quiz-buttonWrapper cursor-pointer">
											<a class="Quiz-button" ng-class="{'Quiz-button--selected': quiz_active.selected=='a'}" ng-click="quiz_active.selected='a'">
												<div class="Quiz-buttonLabel">A.</div>
												<div class="Quiz-buttonValue" ng-bind="quiz_active.a"></div>
											</a>
										</div>
										<div class="Quiz-buttonWrapper cursor-pointer">
											<a class="Quiz-button" ng-class="{'Quiz-button--selected': quiz_active.selected=='b'}" ng-click="quiz_active.selected='b'">
												<div class="Quiz-buttonLabel">B.</div>
												<div class="Quiz-buttonValue" ng-bind="quiz_active.b"></div>
											</a>
										</div>
										<div class="Quiz-buttonWrapper cursor-pointer">
											<a class="Quiz-button" ng-class="{'Quiz-button--selected': quiz_active.selected=='c'}" ng-click="quiz_active.selected='c'">
												<div class="Quiz-buttonLabel">C.</div>
												<div class="Quiz-buttonValue" ng-bind="quiz_active.c"></div>
											</a>
										</div>
										<div class="Quiz-buttonWrapper cursor-pointer">
											<a class="Quiz-button" ng-class="{'Quiz-button--selected': quiz_active.selected=='d'}" ng-click="quiz_active.selected='d'">
												<div class="Quiz-buttonLabel">D.</div>
												<div class="Quiz-buttonValue" ng-bind="quiz_active.d"></div>
											</a>
										</div>
									</div>
								</div>
								<div class="Quiz-progress">
									<div class="Quiz-progressBar" style="width:{{getProgressBarWidth()}}%;"></div>
								</div>
							</div>
						</div>

						<div ng-show="quiz.is_user_solved" class="Quiz-summary" ng-cloak>
							<div class="Quiz-header">
								<div class="Quiz-result">
									<div class="Quiz-resultBackground" ng-class="quiz.solve.passed_quiz ? 'Quiz-resultBackground--passed' : 'Quiz-resultBackground--failed'" style="height:{{resultValue}}%"></div>
									<span class="Quiz-resultValue" ng-bind="resultValue+'%'"></span>
								</div>
								<div class="Quiz-headerMain">
									<h6 class="Quiz-headerTitle" ng-bind="quiz.name"></h6>
									<div ng-switch="quiz.solve.passed_quiz">
										<div ng-switch-when="true" class="Quiz-resultInfoPassed">
											<h6 class="Quiz-resultInfoHeader" ng-show="!quiz.solve.choose_award">Gratulacje!</h6>
											<h6 class="Quiz-resultInfoHeader" ng-show="quiz.solve.choose_award">Gratulujemy!</h6>
											
											<div layout="column" layout-aling="center center" ng-show="!quiz.solve.choose_award">
												<p class="Quiz-resultInfoMessage">Zaliczyłeś quiz, 
												wybierz jeden z zasobów, które dla Ciebie przygotowaliśmy.</p>
												<button ng-click="selectPrice()" class="Button Button--free Button--iconifiedLeft Quiz-selectResoruce Button--sentPresent"><i class="kg-icons">present</i>Wybierz nagrodę</button>
											</div>
											<div layout="column" layout-aling="center center" ng-show="quiz.solve.choose_award">
												<p flex class="Quiz-resultInfoMessage"> 
													Udało Ci się poprawnie rozwiązać quiz. By pobrać wybraną nagrodę, przejdź do zakładki Zasoby -> Moje zasoby.
												</p>
												<a href="/moje-zasoby/#?relation=quiz" class="Button Button--free Button--iconifiedLeft Quiz-selectResoruce"><i class="material-icons">remove_red_eye</i>Moje zasoby</a>
											</div>
										</div>
										<div ng-switch-when="false" class="Quiz-resultInfoFailed">
											<h6 class="Quiz-resultInfoHeader">Niestety,</h6>
											<p class="Quiz-resultInfoMessage">nie udało Ci się osiągnać wymaganej liczby poprawnych odpowiedzi. Zobacz, gdzie popełniłeś błąd.</p>
										</div>
									</div>
								</div>
							</div>

							<div class="Quiz-question" ng-repeat="question in quiz.solve.questions_with_user_answers">
								<div class="Quiz-decoration">
									<div class="Quiz-decoratonIcon">
										<div class="resource_icon question"></div>
									</div>
									<p class="Quiz-counter">Pytanie {{$index+1}}/{{quiz.number_questions}}</p>
								</div>
								<div class="Quiz-main">
									<div class="Quiz-content">
										<div class="Quiz-questionContent" ng-bind-html="questionHtml(question)"></div>
										<div class="Quiz-buttons">
											<div class="Quiz-buttonWrapper">
												<a class="Quiz-button Quiz-button--disabled Quiz-button-check" ng-class="{'Quiz-button--selected': question.user_answer=='a','Quiz-button--correct': question.correct_answer=='a'}" disabled>
													<div class="Quiz-buttonLabel">A.</div>
													<div class="Quiz-buttonValue" ng-bind="question.a"></div>
												</a>
											</div>
											<div class="Quiz-buttonWrapper">
												<a class="Quiz-button Quiz-button--disabled Quiz-button-check" ng-class="{'Quiz-button--selected': question.user_answer=='b','Quiz-button--correct': question.correct_answer=='b'}" disabled>
													<div class="Quiz-buttonLabel">B.</div>
													<div class="Quiz-buttonValue" ng-bind="question.b"></div>
												</a>
											</div>
											<div class="Quiz-buttonWrapper">
												<a class="Quiz-button Quiz-button--disabled Quiz-button-check" ng-class="{'Quiz-button--selected': question.user_answer=='c','Quiz-button--correct': question.correct_answer=='c'}" disabled>
													<div class="Quiz-buttonLabel">C.</div>
													<div class="Quiz-buttonValue" ng-bind="question.c"></div>
												</a>
											</div>
											<div class="Quiz-buttonWrapper">
												<a class="Quiz-button Quiz-button--disabled Quiz-button-check" ng-class="{'Quiz-button--selected': question.user_answer=='d','Quiz-button--correct': question.correct_answer=='d'}" disabled>
													<div class="Quiz-buttonLabel">D.</div>
													<div class="Quiz-buttonValue" ng-bind="question.d"></div>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
</body>