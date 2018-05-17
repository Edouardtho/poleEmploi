<?php
	// Lancement de la session
	if(!isset($_SESSION)){
		session_start();
	}
?>

<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="shortcut icon" type="image/png" href="favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">

	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="./js/jquery-2.1.0.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/blocs.min.js"></script><link href='http://fonts.googleapis.com/css?family=Domine&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <script src='./js/jqBootstrapValidation.js'></script>
	<script src='./js/formHandler.js'></script>
    <title></title>
</head>
<body>
<!-- Main container -->
<div class="page-container">

<!-- Navigation Bloc -->
<div class="bloc bg-center bgc-white l-bloc" id="nav-bloc">
	<div class="container">
		<nav class="navbar row">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php"><img src="img/header-logo-pole-emploi-mono-full.png" alt="logo" /></a>
				<button id="nav-toggle" type="button" class="ui-navbar-toggle navbar-toggle" data-toggle="collapse" data-target=".navbar-1">
					<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse navbar-1">
				<ul class="site-navigation nav navbar-nav">
					<li>
						<a href="index.php">Bienvenue à l&rsquo;agence de BOIELDIEU !</a>
					</li>
					<?php
						if(isset($_SESSION['user'])){
							echo "<li><a href='deconnexion.php'>Deconnexion</a></li>";
						}
					?>
				</ul>
			</div>
		</nav>
	</div>
</div>
<!-- Navigation Bloc END -->

<!-- Modal FirstTime -->
<div id="firstTimeModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Première fois parmis nous ?</h4>
      </div>
      <div class="modal-body">
        <form id="firstTimeForm" novalidate>
			<div class="form-group">
				<label>
					Nom
				</label>
				<input id="name" class="form-control" type="text" required />
			</div>
			<div class="form-group">
				<label>
					Prénom
				</label>
				<input id="firstname" class="form-control" type="text" required />
			</div>
			<div class="form-group">
				<label>
					Date de naissance
				</label>
				<input id="birthday" class="form-control" type="text" required />
			</div>
			<div class="form-group">
				<label>
					N° de sécurité sociale
				</label>
				<input id="secuNumber" class="form-control" type="text" required />
			</div>
			<div class="form-group">
				<label>
					Email
				</label>
				<input id="email" class="form-control" type="email" required />
			</div>
			<div class="form-group">
				<label>
					Mot de passe
				</label>
				<input id="password" class="form-control" type="password" required />
			</div>
			<div class="form-group">
				<label>
					Confirmation du mot de passe
				</label>
				<input id="secondPassword" class="form-control" type="password" required />
			</div>
			<div class="form-group">
				<label>
					Expériences passées
				</label><textarea id="message" class="form-control" rows="4" cols="50" required></textarea>
			</div>
			<button class="bloc-button btn btn-d btn-lg btn-block" type="submit">
				S'inscrire chez Pôle Emploi
			</button>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal FirstTime END -->

<!-- Modal Connection -->
<div id="connectionModal" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Connection à mon espace</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
	        <div class="col-md-12">
	        	<h3>Reconnaissance faciale</h3>
		  		<p>	La connexion à votre compte s'effectue par reconnaissance faciale.<br>
		  			Mettez-vous devant la caméra
		  		</p>

		  		<div class="bloc-button btn btn-d btn-lg btn-block" onclick="showWebcam()">
		  			Me connecter
		  		</div>

		  		<br>
	        	<div style="clear:both"></div>
			    <div class="col hide">
			        <video></video>
			    </div>
			    <div id="webcam" class="col-md-12 hide">
			        <canvas width="600" height="400"></canvas>
			    </div>

	        </div>
	        <div class="col-md-12">
		        <h3>Connexion classique</h3>
		        <p>Si vous rencontrez des difficultés avec la reconnaissance faciale, connectez-vous a l'aide de vos identifiants Pôle Emploi.</p>
		        <form id="connectionForm" novalidate>
					<div class="form-group">
						<label>
							Email
						</label>
						<input id="emailModal" class="form-control" type="email" required />
					</div>
					<div class="form-group">
						<label>
							Mot de passe
						</label>
						<input id="passwordModal" class="form-control" type="password" required />
					</div>
					<button class="bloc-button btn btn-d btn-lg btn-block" type="submit">
						Se connecter à mon compte
					</button>
				</form>
	        </div>
	    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal connection END -->

<!-- bloc-1 -->
<div class="bloc l-bloc bgc-st.-patricks-blue" id="bloc-1">
	<div class="container bloc-md">
		<div class="row voffset">
			<div class="col-sm-3">
				<a href="index.php" class="btn  btn-d btn-xl btn-block">Je m'actualise</a>
			</div>
			<!-- <div class="col-sm-3">
				<a href="index.php" class="btn  btn-d  btn-block btn-xl">Je cherche</a>
			</div> -->
			<div class="col-sm-6">
				<a href="index.php" class="btn  btn-xl btn-block btn-anti-flash-blue">Emploi Store</a>
			</div>
			<div class="col-sm-3">
				<div class="btn-group btn-block">
					<a href="#" class="btn dropdown-toggle  btn-d btn-xl btn-block" data-toggle="dropdown" aria-expanded="false">J'accède<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="index.php" class="a-btn a-block">Mes CV</a>
						</li>
						<li>
							<a href="index.php" class="a-btn a-block">Ma formation</a>
						</li>
						<li>
							<a href="index.php" class="a-btn a-block">Ma situation</a>
						</li>
						<li>
							<a href="index.php" class="a-btn a-block">Mes demandes</a>
						</li>
						<li>
							<a href="index.php" class="a-btn a-block">Mes attestations</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-1 END -->

<!-- bloc-2 -->
<div class="bloc bgc-st.-patricks-blue bg-videoblocks-business-people-walking-and-talking-in-the-hallway-businessmen-have-conversation-in-the-office-use-desktop-computer-corporate-office-with-many-busy-workers-shot-on-red-epic-w-8k-helium-cinema-camera-rmk0bahdz-thumbnail-full01 d-bloc" id="bloc-2">
	<div class="container bloc-lg">
		<div class="row">
			<?php
				if(!isset($_SESSION['user'])){
					echo "
						<div class='col-sm-6'>
							<a href='' data-toggle='modal' data-target='#firstTimeModal' class='btn  btn-d btn-xl btn-block'>Première fois ?</a>
						</div>
						<div class='col-sm-6'>
							<a href='' data-toggle='modal' data-target='#connectionModal' class='btn  btn-d btn-xl btn-block'>Je me connecte !</a>
						</div>
					";
				}else{
					echo "<div class='col-sm-12'><a href='deconnexion.php' class='btn btn-d btn-xl btn-block'>Je me déconnecte !</a></div>";
				}
			?>
			<!-- <div class="col-sm-6">
				<a href="" data-toggle="modal" data-target="#myModal" class="btn  btn-d btn-xl btn-block">Première fois ?</a>
				<a href="mp-oublié.php" class="btn  btn-d btn-xl btn-block">Mot de passe oublié ?</a>
			</div>
			<div class="col-sm-6">
				<a href="identification-mdp.php" class="btn  btn-d  btn-block btn-xl">Connexion classique</a>
				<a href="connexion.php" class="btn  btn-d btn-xl btn-block">Je me connecte !</a>
			</div> -->

		</div>
	</div>
</div>
<!-- bloc-2 END -->

<!-- Footer - bloc-15 -->
<div class="bloc b-divider bgc-white-2 l-bloc" id="bloc-15">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<h4 class="mg-md">
					Erwan GAUTIER
				</h4>
			</div>
			<div class="col-sm-3">
				<h4 class="mg-md">
					Jérémy COURTOIS
				</h4>
			</div>
			<div class="col-sm-3">
				<h4 class="mg-md">
					Valentin CABARET
				</h4>
			</div>
			<div class="col-sm-3">
				<h4 class="mg-md">
					Edouard THOMAS
				</h4>
			</div>
		</div>
	</div>
</div>
<!-- Footer - bloc-15 END -->
</div>
<!-- Main container END -->

</body>

<!-- Google Analytics -->

<!-- Google Analytics END -->

<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function() {
    // Global variables
    var video = document.querySelector('video');
    var audio, audioType;
    var canvas = document.querySelector('canvas');
    var context = canvas.getContext('2d');
    // Custom video filters
    var iFilter = 0;
    var filters = [
        'grayscale',
        'sepia',
        'blur',
        'brightness',
        'contrast',
        'hue-rotate',
        'hue-rotate2',
        'hue-rotate3',
        'saturate',
        'invert',
        'none'
    ];
    // Get the video stream from the camera with getUserMedia
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia ||
    navigator.mozGetUserMedia || navigator.msGetUserMedia;
    window.URL = window.URL || window.webkitURL || window.mozURL || window.msURL;
    if (navigator.getUserMedia) {
        // Evoke getUserMedia function
        navigator.getUserMedia({video: true, audio: true}, onSuccessCallback, onErrorCallback);
        function onSuccessCallback(stream) {
			// Use the stream from the camera as the source of the video element
            video.src = window.URL.createObjectURL(stream) || stream;
            // Autoplay
            video.play();
            // HTML5 Audio
            audio = new Audio();
            audioType = getAudioType(audio);
            if (audioType) {
                audio.src = 'polaroid.' + audioType;
                audio.play();
            }
        }
        // Display an error
        function onErrorCallback(e) {
            var expl = 'An error occurred: [Reason: ' + e.code + ']';
            console.error(expl);
            alert(expl);
            return;
        }
    } else {
        document.querySelector('.container').style.visibility = 'hidden';
        document.querySelector('.warning').style.visibility = 'visible';
        return;
    }
    // Draw the video stream at the canvas object
    function drawVideoAtCanvas(obj, context) {
        window.setInterval(function() {
            context.drawImage(obj, 0, 0);
        }, 60);
    }
    // The canPlayType() function doesn’t return true or false. In recognition of how complex
    // formats are, the function returns a string: 'probably', 'maybe' or an empty string.
    function getAudioType(element) {
        if (element.canPlayType) {
            if (element.canPlayType('audio/mp4; codecs="mp4a.40.5"') !== '') {
                return('aac');
            } else if (element.canPlayType('audio/ogg; codecs="vorbis"') !== '') {
                return("ogg");
            }
        }
        return false;
    }
    // Add event listener for our video's Play function in order to produce video at the canvas
    video.addEventListener('play', function() {
        drawVideoAtCanvas(this, context);
    }, false);
    // Add event listener for our Button (to switch video filters)
    document.querySelector('button').addEventListener('click', function() {
        video.className = '';
        canvas.className = '';
        var effect = filters[iFilter++ % filters.length]; // Loop through the filters.
        if (effect) {
            video.classList.add(effect);
            canvas.classList.add(effect);
            document.querySelector('.container h3').innerHTML = 'Current filter is: ' + effect;
        }
    }, false);
}, false);

	function showWebcam(){
		$("#webcam").removeClass('hide');
	}

</script>

</html>
