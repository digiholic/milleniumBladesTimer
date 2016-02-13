<html>
	<header>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"></link>
		<link rel="stylesheet" type="text/css" href="css/style.css"></link>
		
		<script type="text/javascript" src="js/jquery-2.2.0.min.js"></script>
		<script type="text/javascript" src="js/typed.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/howler.js"></script>
	</header>

	<body>
		<div id="clock">
			<span id="countdown" class="timer">7:00</span>
			<button id="pause-play-button" class="glyphicon glyphicon-play" />
		</div>
		
		<center><div id="info-box">
			<div id="step-1">
				<ul>Complete these steps, then begin the first timer!
					
					<li>Give each player 30 Millenium Dollars.</li>
					<li>Deal each player 6 cards from the top of the store deck, face-down.</li>
					<li>Place the top 9 cards of the store deck into the store area, face-down.</li>
					<li>Discard all Metagame cards still in play. Reveal the Elemental Metagame card.</li>
				</ul>
			</div>
			<div id="step-2" style="display:none">
				<ul>Complete these steps, then begin the second timer!
					
					<li>Give each player 6 more cards from the top of the store deck, face-down.</li>
					<li>Reveal the Type Metagame card.</li>
				</ul>
			</div>
			<div id="step-3" style="display:none">
				<p>This is the last opportunity to sell cards to the Aftermarket! If you have any cards you still want to sell, do it now! After everyone is ready, begin the final deckbuilding phase!</p>
			</div>
			<div id="step-4" style="display:none">
				<p>Deckbuilding is over, and the tournament begins!<br/>
				You can optionally give players an additional 3-minute grace period to finish deck construction. Otherwise, move on to the tournament!</p>
			</div>
		</div></center>
	</body>

	<footer>

		<script>
			
		var testSound = new Howl({
			urls:['audio/test.mp3'],
			loop: true
		});
			
		var current_phase = 1;
		var Clock = {
		  totalSeconds: 20,

		  start: function () {
			var self = this;
			testSound.play();
				
			this.interval = setInterval(function () {
				var minutes = Math.floor(self.totalSeconds / 60);
				var remainingSeconds = (self.totalSeconds % 60);
			  
				
				if (remainingSeconds < 10) {
					remainingSeconds = "0" + remainingSeconds; 
				}
				
				if (self.totalSeconds == 0) {
					self.pause();
					$('#pause-play-button').removeClass('glyphicon-pause');
					$('#pause-play-button').addClass('glyphicon-play');
					endTimer();
					document.getElementById('countdown').innerHTML = "Buzz Buzz";
				} else {
					self.totalSeconds--;
				}
				
				document.getElementById('countdown').innerHTML = minutes + ":" +    remainingSeconds;
			}, 1000);
		  },

		  pause: function () {
			testSound.pause();
			clearInterval(this.interval);
			delete this.interval;
		  },

		  resume: function () {
			if (!this.interval) this.start();
		  }
		};
		
		function endTimer() {
			testSound.stop();
			$('#step-'+current_phase.toString()).hide();
			current_phase = (current_phase % 4) + 1;
			Clock.totalSeconds = 420;
			$('#step-'+current_phase.toString()).show();
		}
		/*
		$("#typed").typed({
            // strings: ["Typed.js is a <strong>jQuery</strong> plugin.", "It <em>types</em> out sentences.", "And then deletes them.", "Try it out!"],
            stringsElement: $('#typed-strings'),
            typeSpeed: 10,
            contentType: 'html',
            showCursor: false,
            resetCallback: function() { newTyped(); }
        });
		
		function newTyped(){ }
		*/
		
		$(document).ready(function(){
			$('#pause-play-button').click(function(){
				if ($(this).hasClass('glyphicon-pause')){
					Clock.pause();
				} else {
					Clock.resume();
				}
				$(this).toggleClass('glyphicon-pause');
				$(this).toggleClass('glyphicon-play');
			});
			
			/*$('#info-box').click(function(){
				$('#typed').typed('stops');
				$('#typed').html($('#typed-strings').html())
				
			});*/
		});
		</script>
	</footer>
</html>
