<div class="hamburger-up" id="hamburger-container">
	<div id="hamburger">
		<i>
			<span class="lines line1"></span>
			<span class="lines line2"></span>
			<span class="lines line3"></span>
		</i>
	</div>
	<a href="/" title="Главная" id="logo-clothing" style="color:#000;">
		Clothing Shop
	</a>
</div>

<!-- Popup window -->
<div id="overlay"></div>
<div id="popup-callback">
	<div id="aim-for-message"></div>
	<form id="clothingshopContactForm" action="#" method="post" class="callback-form" data-url="">
		<label for="name">Ваше имя и номер телефона:</label>
		<input id="name" name="name" type="text" placeholder="Имя" required="required" />
		<input id="number" name="number" type="tel" value="+380" placeholder="Номер телефона" required="required" />
		<input type="submit" value="Отправить" style="cursor:pointer;">
		<a href="#" title="" id="close-popup-form-btn">Закрыть</a>
	</form>
</div>

<!-- Header -->
<header>
	<a href="/" title="Главная" class="header-logo">Clothing Shop</a>

	<!-- Header search form -->
	<form role="search" method="get" id="searchform" class="header-search" action="">
		<input type="search" value="" name="s" placeholder="Искать"/>
		<input type="submit" id="searchsubmit" style="display:none;" />
	</form>

	<a href="#" title="Перезвоните мне" id="header-callback" class="nav-and-header-btns">Перезвоните мне</a>
</header>

<nav id="nav-menu" class="top-nav">
	<ul>
		<a href="/" title="Главная" class="nav-logo">Clothing</a>
		<li class="nav-search">
			<form role="search" method="get" id="searchform" class="header-search" action="">
				<input type="search" value="" name="s" placeholder="Искать"/>
				<input type="submit" id="searchsubmit" style="display:none;" />
			</form>
		</li>
		<li><a href="/">Главная</a></li>
		<li><a href="/item">Мужская</a></li>
		<li><a href="/item">Женская</a></li>

		<a href="#" title="Перезвоните мне" class="nav-and-header-btns" id="nav-callback">
			Перезвоните мне
		</a>
		<a href="#" title="Закрыть" id="close-nav-menu" class="close-top-nav">
			закрыть
		</a>
	</ul>
</nav>