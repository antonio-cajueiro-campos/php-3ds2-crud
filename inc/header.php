<?php include_once 'php/main.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="<?= CREATORS; ?>">
    <meta name="copyright" content="<?= CREATORS; ?>">
    <meta name="format-detection" content="telephone=no">
    <meta name="e-mail" content="<?= WEB_EMAIL; ?>">
    <meta name="keywords" content="<?= $page_keywords; ?>">
    <meta name="description" content="<?= $page_desc; ?>">
    <meta name="Abstract" content="<?= $page_abstract; ?>">
    <meta name="google-site-verification" content="<?= GOOGLE_VERIFY; ?>">
    <link rel="canonical" href="<?= WEB_URL; ?>">
	<link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<title><?= $page_name." - ".WEB_TITLE; ?></title>
</head>
<body>
<div class="wrapper">
	<header class="header">
		<div class="container c-header">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="index.php"><?=WEB_TITLE?></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<?= $navList ?>
					</ul>
					<!-- <form class="form-inline my-2 my-lg-0">
						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					</form> -->
				</div>
			</nav>
		</div>
	</header>
	<div class="container c-content">
	