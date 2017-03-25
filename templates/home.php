<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1"
		/>
		<title>Encyclo</title>
		<!-- <link rel="stylesheet" href="css/reset.css"> -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<!-- HEADER -->
		<header class="container">

			<!-- TITLE -->
			<h1 id="page-title">
				<span>Web'</span>
				<span>Dev'</span>
				<span>Pedia</span>
			</h1>

			<!-- SEARCH -->
			<div class="input-group search-form">
				<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
				<input type="text" class="form-control" placeholder="Concept (POO, Ajax...), outil (Git, Composer...), techno (jQuery...) etc." aria-describedby="basic-addon1">
			</div>
		</header>

		<!-- MAIN -->
		<main class="container">
			<h2 class="post-title">Programmation orientée objets</h2>
			<div class="post-core">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
			</div>
			<h3 class="post-tags">
				<a>test</a>
				<a>bilude</a>
				<a>machi-chose-de-truc</a>
			</h3>
		</main>

		<!-- ADD-FORM -->
		<section id="add-block">
			<div id="add-cross"></div>
			<form id="add-form" method="post">
				<input type="text" name="title" placeholder="Titre">
				<textarea name="definition" placeholder="Définition"></textarea>
				<input type="password" name="password" placeholder="Mot de passe">
				<button type="submit" name="sent">OK !</button>
			</form>
		</section>

		<!-- SOIT en DL local -->
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/app.js"></script>
	</body>
</html>
