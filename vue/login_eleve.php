<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Connexion - SchoolNow</title>
    <style>
        body {
             background-color: #ECB807 !important;
         }
        .text-title{
            color: #1D809F !important;
        }
        .alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }
    </style>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
<?php
if (isset($_SESSION['erreur_co'])){
    ?>
    <br>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <strong>Attention !</strong> L'e-mail ou le mot de passe saisi est incorrect.
    </div>
<?php
    unset($_SESSION['erreur_co']);
}
?>
<br><br><br>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">

					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4 text-title">Connexion | Élève</h1>
							<form action="../src/traitement/co_eleve.php" method="POST" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">Adresse mail</label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										Adresse mail invalide
									</div>
								</div>

								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Mot de passe</label>
									</div>
									<input id="password" type="password" class="form-control" name="mot_de_passe" required>
								    <div class="invalid-feedback">
								    	Mot de passe requis
							    	</div>
								</div>

								<div class="d-flex align-items-center">
							<!--<div class="form-check">
										<input type="checkbox" name="remember" id="remember" class="form-check-input">
										<label for="remember" class="form-check-label">Se rappeler de moi</label>
									</div>-->
									<button type="submit" class="btn btn-primary ms-auto">
										Connexion
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Voulez-vous retourner à l'accueil ? <a href="../index.php" class="text-dark">Cliquez-ici.</a>
							</div>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy; 2021 &mdash; SchoolNow
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/login.js"></script>
</body>
</html>
