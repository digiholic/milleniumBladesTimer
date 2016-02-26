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
		<div style="position:absolute; left:50%">
			<div id="clock-controls">
				<span class="glyphicon glyphicon-fast-backward" data-toggle="tooltip" title="Previous Phase"></span>
				<span class="glyphicon glyphicon-backward" data-toggle="tooltip" title="Restart Phase"></span>
				<span id="pause-play-button" class="glyphicon glyphicon-play" data-toggle="tooltip" title="Start/Stop timer"></span>
				<span id="pause-play-button" class="glyphicon glyphicon-fast-forward" data-toggle="tooltip" title="Next Phase"></span>
			</div>
		</div>
		
		<div id="clock">
			<span id="countdown" class="timer">7:00</span>
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
		var timerLengths = [0,420,420,360,180];
		
		
		var testSound = new Howl({
			urls:['audio/test.wav'],
			loop: true
		});
			
		var current_phase = 1;
		var Clock = {
		  totalSeconds: 420,

		  start: function () {
			var self = this;
			testSound.play();
			$('#pause-play-button').addClass('glyphicon-pause');
			$('#pause-play-button').removeClass('glyphicon-play');
			
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
				
				changeClockDisplay();
				//document.getElementById('countdown').innerHTML = minutes + ":" +    remainingSeconds;
			}, 1000);
		  },

		  pause: function () {
			testSound.pause();
			clearInterval(this.interval);
			$('#pause-play-button').addClass('glyphicon-play');
			$('#pause-play-button').removeClass('glyphicon-pause');
			delete this.interval;
		  },

		  resume: function () {
			if (!this.interval) this.start();
			$('#pause-play-button').addClass('glyphicon-pause');
			$('#pause-play-button').removeClass('glyphicon-play');
		  }
		};
		
		function endTimer() {
			testSound.stop();
			$('#step-'+current_phase.toString()).hide();
			current_phase = (current_phase % 4) + 1;
			Clock.totalSeconds = timerLengths[current_phase];
			changeClockDisplay();
			$('#step-'+current_phase.toString()).show();
		}
		
		function changeClockDisplay(){
			var minutes = Math.floor(Clock.totalSeconds / 60);
			var remainingSeconds = (Clock.totalSeconds % 60);
			
			if (remainingSeconds < 10) {
				remainingSeconds = "0" + remainingSeconds; 
			}
				
			$('#countdown').html(minutes + ":" + remainingSeconds);
		}
		$(document).ready(function(){
			$('#pause-play-button').click(function(){
				if ($(this).hasClass('glyphicon-pause')){
					Clock.pause();
				} else {
					Clock.resume();
				}
			});
			$('.glyphicon-backward').click(function(){
				Clock.pause();
				Clock.totalSeconds = timerLengths[current_phase];
				changeClockDisplay();
				
			});
			$('.glyphicon-fast-forward').click(function(){
				Clock.pause();
				endTimer();
			});
			$('.glyphicon-fast-backward').click(function(){
				Clock.pause();
				testSound.stop();
				$('#step-'+current_phase.toString()).hide();
				current_phase--;
				if (current_phase == 0){
					current_phase = 4;
				}
				Clock.totalSeconds = timerLengths[current_phase];
				changeClockDisplay();
				$('#step-'+current_phase.toString()).show();
			});
		});
		</script>
	</footer>
</html>
