<?php /* Template Name: Home */  ?>
<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Knowledge Garden - jedyna społeczność profesjonalistów</title>

	<meta http-equiv="cache-control" content="max-age=0" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
	<meta http-equiv="pragma" content="no-cache" />

	<link rel="Shortcut icon" href="<?=get_template_directory_uri(); ?>/assets/favicon.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/home.css">
</head>
<body>
	<div id="skrollr-body">
		<div class="progress progressbar transparent">
			<div class="indeterminate"></div>
		</div>
		<section class="Landing" data-0p="transform: translate3d(0px, 0%, 0px);" data-100p="transform: translate3d(0px, 80%, 0px);" data-200p="transform: translate3d(0px, 100%, 0px);">
			<video muted autoplay loop poster="<?=the_asset_uri('home_video_placeholder.jpg');?>" class="Landing-video">
				<source src="<?= the_asset_uri('home_video.webm'); ?>" type="video/webm">
			</video>
			<div class="Landing-mask"></div>

			<header class="Landing-header">
				<a class="Landing-logo">
					<img src="<?=the_asset_uri('logo-cocpit.png')?>">
					<h1>Knowledge Garden</h1>
				</a>

				<nav class="Landing-nav">
					<a class="Landing-navButton" href="<?= get_permalink(KG_Config::getPublic('register_page_id'))?>"><i class="material-icons">person_add</i>Zarejestruj</a>
					<a class="Landing-navButton" href="<?= get_permalink(KG_Config::getPublic('login_page_id'))?>"><i class="kg-icons">latch</i>Zaloguj</a>
					<a class="Landing-navButton" href="#pricing" data-menu-duration="500"><i class="material-icons">card_membership</i>Pakiety</a>
				</nav>
			</header>

			<div class="Landing-content">
				<div class="Landing-banner">
					<h2 class="Landing-bannerSlogan"><mark class="Landing-bannerMark">Wejdź</mark> do ogrodu wiedzy</h2>
					<h3 class="Landing-bannerAddtional">Dołącz do jedynej w swoim rodzaju społeczności profesjonalistów</h3>
					<a class="Landing-register" href="<?= get_permalink(KG_Config::getPublic('register_page_id'))?>">Zarejestruj się<i class="material-icons">person_add</i></a>
				</div>
				<div class="Landing-rest">
					<a class="Landing-play" target="_blank" href="https://www.youtube.com/watch?v=GdlM7kWmySI">Obejrzyj video<i class="material-icons">play_circle_outline</i></a>
					<div class="Landing-mouse">
						<i class="material-icons">mouse</i>
						<span>Scroll Down</span>
					</div>
				</div>
			</div>
		</section>

		<section class="Info">
			<div class="Info-columns">
				<div class="Info-column">
					<?= the_svg_asset('group'); ?>
					<h5 class="Info-title">Społeczność</h5>
					<p class="Info-description">Skupiamy wokół siebie grupę niezwykłych osób - otwartych na innych profesjonalistów, dla których rozwój to coś więcej niż wspinaczka po szczeblach kariery.</p>
				</div>
				<div class="Info-column">
					<?= the_svg_asset('earth'); ?>
					<h5 class="Info-title">Wiedza</h5>
					<p class="Info-description">Wybieramy i selekcjonujemy dostępną wiedzę biznesową, a następnie przekazujemy ją naszym uczestnikom w przyjaznej, zwięzłej formie. Jednocześnie staramy się inspirować i aktywnie wspieramy w procesie rozwoju.</p>
				</div>
				<div class="Info-column">
					<?= the_svg_asset('chat'); ?>
					<h5 class="Info-title">Spotkania</h5>
					<p class="Info-description">Doceniamy cyfrową rzeczywistość, ale nic nie zastąpi spotkania twarzą w twarz i uścisku dłoni. Organizujemy trzy rodzaje spotkań, które z jednej strony pobudzają intelektulanie, z drugiej - dają możlwiość integracji w grupie ciekawych ludzi.</p>
				</div>
				<div class="Info-column">
					<?= the_svg_asset('gps'); ?>
					<h5 class="Info-title">Wyzwania</h5>
					<p class="Info-description">Wierzymy, że nasza społecznosc i dedykowana jej platforma to nie miejsce dla każdego, a dla tych którzy stale poszukują czegoś więcej. Nie boją się wyzwań. Dlatego pobudzamy twórczo i intelektulanie różnorodnymi zadaniami, a aktywność i głów wiedzy - nagradzamy.</p>
				</div>
				<div class="Info-column">
					<?= the_svg_asset('monitor'); ?>
					<h5 class="Info-title">Platforma</h5>
					<p class="Info-description">Technologia jest po naszej stronie. Społeczność otrzymuje od nas dostęp do intyuicyjnych narzędzi nabywania zasobów, networkingu, podejmowania wyzwań i wsparcia w procesie rozwoju. To wszystko zamykamy w motywującym systemie punktów: wiedza jest na wyciągnięcie ręki, a wysiłek się opłaca</p>
				</div>
			</div>
		</section>

		<section class="About" data-100p="transform: translate3d(0px, -60%, 0px);" data-200p="transform: translate3d(0px, 0%, 0px);">
			<div class="About-container">
				<p class="About-paragraph"><mark class="About-paragraphMark">Knowledge Garden</mark> to nowatorska platforma społecznościowo-rozwojowa, której fundament stanowi najwyższej jakości wiedza biznesowa, możliwość budowania relacji i wsparcie w rozwoju intelektualnym.</p>
				<p class="About-paragraph">Jesteśmy społecznością skupiającą ekspertów z dziedziny marketingu i zarządzania, absolwentów prestiżowych programów <mark class="About-paragraphMark">The Chartered Institute of Marketing</mark> oraz tych, którzy na co dzień poszukują czegoś więcej – <mark class="About-paragraphMark">prawdziwej wartości dodanej.</mark></p>
				<div class="About-logo">
					<img src="<?=the_asset_uri('logo-cocpit.png')?>">
					<span>questus</span>
				</div>
			</div>
		</section>

		<section class="Pepole">
			<h3 class="Pepole-header">Wyjątkowi ludzie, którzy tworzą wyjątkową społeczność</h3>
			<div class="Pepole-list">
				<div class="Person">
					<img src="<?=the_asset_uri('grzegorz.png')?>">
					<h5>Prof. <mark>Grzegorz Kołodko</mark></h5>
				</div>
				<div class="Person">
					<img src="<?=the_asset_uri('andrzej.png')?>">
					<h5>Prof. <mark>Andrzej Blikle</mark></h5>
				</div>
				<div class="Person">
					<img src="<?=the_asset_uri('lech.png')?>">
					<h5><mark>Lech C. Król</mark></h5>
				</div>
				<div class="Person">
					<img src="<?=the_asset_uri('julia.png')?>">
					<h5><mark>Julia Izmałkowa</mark></h5>
				</div>
			</div>
		</section>

		<section class="Examples">
			<h3 class="Examples-header">Sprawdź autorskie zasoby, których nie znajdziesz nigdzie indziej.</h3>
			<div class="Examples-list">
				<div class="Example">
					<i class="Example-tag kg-icons">88</i>
					<div class="Example-content">
						<h5 class="Example-type">Knowledge to Inspire</h5>
						<p class="Example-typeDescription">
							<mark>Knowledge to Inspire</mark> to kilkustronicowe wprowadzenie do tematu, które może zachęcić Cię do jego dalszego zgłębiania. Zainspirowanie się zajmie Ci nie więcej czasu niż wypicie jednej kawy.
						</p>
						<div class="Example-example">
							<h5 class="Example-title">Plemiona 2.0 S. Godin</h5>
							<p class="Example-description">Plemię 2.0 to niewielka grupa ludzi, których łączy idea, lider oraz wspólny cel, i która może stanowić większą wartość niż tysiąc losowych klientów. Poznaj koncepcję zaproponowaną przez filozofa marketingu Setha Godina, która pozwala budować marki tak silne, jak Apple czy Amazon.</p>
						</div>
						<a class="Example-download" href="<?=KG_Config::getPublic('sample_inspire');?>">
							<span>Pobierz</span>
							<i class="material-icons">file_download</i>
						</a>
					</div>
				</div>				
				<div class="Example">
					<i class="Example-tag kg-icons">89</i>
					<div class="Example-content">
						<h5 class="Example-type">Knowledge to Share</h5>
						<p class="Example-typeDescription">
							<mark>Knowledge to Share</mark> to gotowa do użycia prezentacja, w której zawarliśmy praktyczną wiedzę i podpowiadamy Ci w jaki sposób przekazać ją innym. 
						</p>
						<div class="Example-example">
							<h5 class="Example-title">Metoda Disneya B. Capodagli, L. Jackson</h5>
							<p class="Example-description">Walt Disney zbudował jedną z najbardziej rozpoznawalnych marek na świecie według filozofii opartej na czterech filarach. W jaki sposób z niej zapożyczyć dla osiągnięcia przewagi pod względem pracy zespołowej, twórczości i innowacji?</p>
						</div>
						<a class="Example-download" href="<?=KG_Config::getPublic('sample_share');?>">
							<span>Pobierz</span>
							<i class="material-icons">file_download</i>
						</a>
					</div>
				</div>				
				<div class="Example">
					<i class="Example-tag kg-icons">90</i>
					<div class="Example-content">
						<h5 class="Example-type">Knowledge to Master</h5>
						<p class="Example-typeDescription">
							<mark>Knowledge to Master</mark> to résumé tego, co najbardziej wartościowe w danej publikacji książkowej; pozwoli Ci zagłębić się w prezentowane zagadnienia, zastępując właściwą lekturę lub stanowiąc dla niej formę przyjemnego preludium.
						</p>
						<div class="Example-example">
							<h5 class="Example-title">Mądrość Tłumu J. Surowiecki</h5>
							<p class="Example-description">Elitarna grupa ekspertów nie zawsze musi mieć monopol na wiedzę. Zjawisko mądrości tłumu dowodzi, że jeśli skierujemy swoje pytanie do dużej grupy ludzi, to będzie ona znała właściwą odpowiedź.</p>
						</div>
						<a class="Example-download" href="<?=KG_Config::getPublic('sample_master');?>">
							<span>Pobierz</span>
							<i class="material-icons">file_download</i>
						</a>
					</div>
				</div>				
				<div class="Example">
					<i class="Example-tag kg-icons">102</i>
					<div class="Example-content">
						<h5 class="Example-type">Knowledge to Listen</h5>
						<p class="Example-typeDescription">
							<mark>Knowledge to Listen</mark> to Knowledge to Master, ale w wersji audio. Jeżeli nie masz czasu na czytanie, bądź umiejętnie łączysz bieganie czy jazdę autem z pogłębianiem wiedzy nabywaniem nowej wiedzy, będzie to znakomita forma rozwoju.
						</p>
						<div class="Example-example">
							<h5 class="Example-title">Metoda Disneya B. Capodagli, L. Jackson</h5>
							<p class="Example-description">Walt Disney zbudował jedną z najbardziej rozpoznawalnych marek na świecie według filozofii opartej na czterech filarach. W jaki sposób z niej zapożyczyć dla osiągnięcia przewagi pod względem pracy zespołowej, twórczości i innowacji?</p>
						</div>
						<a class="Example-download" href="<?=KG_Config::getPublic('sample_listen');?>">
							<span>Pobierz</span>
							<i class="material-icons">file_download</i>
						</a>
					</div>
				</div>			
			</div>
		</section>

		<section id="pricing" class="Pricing" data-100p-top="transform: translate3d(0px, -80%, 0px);" data-top="transform: translate3d(0px, 0%, 0px);">
			<h3 class="Pricing-header">Pakiety</h3>
			<div class="Pricings">
				<div class="Pricing-table">
					<div class="Pricing-price Pricing-order-2">
						<h4 class="Pricing-name Pricing-name--normal">Kwartalny</h4>
						<span class="Pricing-value">250 zł /<mark class="Pricing-time">3m-ce</mark></span>
					</div>
					<div class="Pricing-spacer"></div>
					<div class="Pricing-price Pricing-order-6">
						<h4 class="Pricing-name Pricing-name--premium">Premium</h4>
						<span class="Pricing-value">1800 zł /<mark class="Pricing-time">rok</mark></span>
					</div>
					<div class="Pricing-resources Pricing-order-1">
						<h4 class="Pricing-name Pricing-price--both Pricing-name--normal">Dowolny</h4>
						<div class="Pricing-resourcesContainer">
						<h5 class="Pricing-resourcesHeader">Dostęp do portalu i materiałów z kategorii:</h5>
						<div class="Pricing-resourcesList">
							<div class="Pricing-resource">
								<i class="Pricing-resourceIcon kg-icons">93</i>
								<span class="Pricing-resourceName">Artykuły</span>
							</div>
							<div class="Pricing-resource">
								<i class="Pricing-resourceIcon kg-icons">94</i>
								<span class="Pricing-resourceName">Ksiązki</span>
							</div>
							<div class="Pricing-resource">
								<i class="Pricing-resourceIcon kg-icons">95</i>
								<span class="Pricing-resourceName">Raporty</span>
							</div>
							<div class="Pricing-resource">
								<i class="Pricing-resourceIcon kg-icons">96</i>
								<span class="Pricing-resourceName">Video</span>
							</div>
							<div class="Pricing-resource">
								<i class="Pricing-resourceIcon kg-icons">97</i>
								<span class="Pricing-resourceName">Case Studies</span>
							</div>
							<div class="Pricing-resource">
								<i class="Pricing-resourceIcon kg-icons">98</i>
								<span class="Pricing-resourceName">Wydarzenia</span>
							</div>
							<div class="Pricing-resource">
								<i class="Pricing-resourceIcon kg-icons">100</i>
								<span class="Pricing-resourceName">Quizy</span>
							</div>
							<div class="Pricing-resource">
								<i class="Pricing-resourceIcon kg-icons">101</i>
								<span class="Pricing-resourceName">Zadania</span>
							</div>
						</div>
						</div>
					</div>
					<div class="Pricing-description Pricing-order-3">
						<p class="Pricing-descriptionText">
							<mark class="Pricing-descriptionBigNumber">10</mark> zasobów do wyboru z kategorii
							<mark class="Pricing-descriptionMark">Knowledge to Share</mark> i <mark class="Pricing-descriptionMark">Knowledge to Master</mark>
							oraz
							<mark class="Pricing-descriptionBigNumber">12</mark> zasobów <mark class="Pricing-descriptionMark">Knowledge to Share</mark>
							i <mark class="Pricing-descriptionMark">Knowledge to Master</mark>,
							które ukażą się w trakcie trwania
							abonamentu
						</p>
					</div>
					<div class="Pricing-spacer"></div>
					<div class="Pricing-description Pricing-order-7">
						<p class="Pricing-descriptionText">
							<mark class="Pricing-descriptionBigNumber">60</mark> zasobów z kategorii <mark class="Pricing-descriptionMark">Knowledge to Share</mark>, <mark class="Pricing-descriptionMark">Knowledge to Listen</mark> i <mark class="Pricing-descriptionMark">Knowledge to Master</mark>
							oraz
							<mark class="Pricing-descriptionBigNumber">48</mark> zasobów <mark class="Pricing-descriptionMark">Knowledge to Share</mark>
							i <mark class="Pricing-descriptionMark">Knowledge to Master</mark>, które ukażą się w trakcie
							trwania abonamentu
						</p>
					</div>
					<div class="Pricing-description Pricing-description--centered Pricing-order-none">
						<svg x="0" y="0" height="100%" width="100%" preserveAspectRatio="none">
							<line x1="15%" y1="85%" x2="85%" y2="15%" style="stroke:rgba(0,0,0,0.36);stroke-width:1"></line>/
						</svg>
					</div>
					<div class="Pricing-spacer"></div>
					<div class="Pricing-description Pricing-description--centered Pricing-order-8">
						<ul class="Pricing-descriptionList">
							<li>4 ksiązki drukowane</li>
							<li>Ekskluzywne spotkanie inspiracyjne</li>
						</ul>
					</div>
					<div class="Pricing-footer Pricing-order-5">
						<a class="Pricing-footerButton Pricing-footerButton--normal" href="<?= get_permalink(KG_Config::getPublic('register_page_id'))?>">Dołącz</a>
					</div>
					<div class="Pricing-footer Pricing-order-9">
						<a class="Pricing-footerButton Pricing-footerButton--premium" href="<?= get_permalink(KG_Config::getPublic('register_page_id'))?>">Dołącz</a>
					</div>
				</div>
				<div class="Pricing-personal">
					<div class="Pricing-personalPrice">
						<span>Spersonalizowany</span>
					</div>
					<div class="Pricing-personalDescription">
						<p class="Pricing-personalDescriptionText">Możesz wykupić abonament dopasowany do Twoich potrzeb.</p>
						<p class="Pricing-personalDescriptionText">Skontakuj się z nami, by omówić szczegóły <a href="#mail" class="Pricing-personalDescriptionEmail">(kg@questus.pl)</a></p>
						<a class="Pricing-footerButton Pricing-footerButton--personal" href="#contact-form" data-menu-duration="200"><i class="material-icons">email</i></a>
					</div>
				</div>
			</div>
		</section>

		<footer class="Footer">
			<div class="Footer-main">
				<div class="Footer-info">
					<div class="Footer-infoTop">
						<div class="Footer-links">
							<a class="Footer-link" href="#howto">Jak to działa</a>
							<a target="_blank" class="Footer-link" href="<?= get_permalink(KG_Config::getPublic('faq_page_id'))?>">FAQ</a>
							<a target="_blank" class="Footer-link" href="<?=KG_Config::getPublic('terms_pdf_link');?>">Regulamin</a>
						</div>
						<a class="Footer-bigLink" href="#">			
							<?= the_svg_asset('logo-raw') ?>
						</a>
					</div>
					<div class="Footer-infoBottom">
						<div class="Footer-data">
							<span class="Footer-link Footer-dataName">questus</span>
							<span class="Footer-link">ul. Organizacji WiN 83/7</span>
							<span class="Footer-link" >91-811 Łódź</span>
							<a class="Footer-link" href="tel:48426620007">42 662 00 07</a>
							<a class="Footer-link" href="http://questus.pl">www.questus.pl</a>
							<a class="Footer-link" href="mailto:kg@questus.pl">kg@questus.pl</a>
						</div>	
						<div class="Footer-social">
							<a target="_blank" href="https://pl-pl.facebook.com/questuspolska" class="kg-icons Footer-socialLink">facebook</a>
							<a target="_blank"href="https://www.youtube.com/user/questusPolska" class="kg-icons Footer-socialLink">youtube</a>
							<a target="_blank" href="https://pl.linkedin.com/company/questus" class="kg-icons Footer-socialLink">linkedin</a>
						</div>			
					</div>
				</div>
				<form class="Footer-contact" action="/slim/api/contact" method="POST" id="contact-form">
					<div class="Footer-contactFormError">
						<p class="Footer-contactFormErrorMessage" id="contact-form-error"></p>
					</div>
					<h4 class="Footer-contactLabel">Masz pytanie? Napisz do nas:</h4>
					<div class="Footer-contactInput">
						<input type="text" name="name">
						<label set-active-input for="name">Imię</label>
					</div>
					<div class="Footer-contactInput">
						<input type="email" name="email">
						<label set-active-input for="email">E-mail</label>
					</div>
					<div class="Footer-contactInput">
						<textarea name="message"></textarea>
						<label set-active-input for="message">Wiadomość</label>
					</div>
					<button class="Footer-contactButton">Wyślij</button>
				</form>
			</div>
			<div class="Footer-corpos">
				<a class="Footer-corpo" target="_blank" href="http://questus.pl">
					<img src="<?=get_asset_uri('logo-questus.png')?>">
				</a>
				<div class="Footer-makers" >
					<span>made by: </span>
					<a class="Footer-makersLogo Footer-corpo" target="_blank" href="http://kodafive.com"><?= the_svg_asset('logo') ?></a>
				</div>
			</div>
			<p class="Footer-copyright">Knowledge Garden by <mark class="Footer-copyrightMark">questus ©</mark>2015. Wszelkie prawa zastrzeżone.</p>
		</footer>
	</div>

	<?php get_template_part('how-to'); ?>

	<!-- build:js({app,.modules,bower_components}) js/home.js -->
	<script src="jquery/dist/jquery.js"></script>	
	<script src="skrollr/dist/skrollr.min.js"></script>
	<script src="bootstrap/js/carousel.js"></script>
	<script src="skrollr-menu/dist/skrollr.menu.min.js"></script>
	<script src="js/Modules/HowTo.js"></script>
	<script src="js/Apps/Home.js"></script>

	<!-- endbuild -->
</body>
</html>