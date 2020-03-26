<form action="#" method="post" id="click-submit">
	<div class="signup <?php if ($where=='header') echo 'hide';?>">
	    <span class="close" id="click-close"><img src="../assets/images/icon-close.svg"></span>
	    <label>Interested in receiving more content like this from LiveRamp?</label>
	    <div class="inputfield">
	        <span>Email Address</span>
	        <input type="text" class="text email" name="email">
	        <span id="valid-email">Must be a valid email address</span>
	        <input type="submit" name="submit" value="Submit">
	    </div>
	</div>
</form>
<div class="thankyou hide">
    <label>Thank you! </label>
	<p class="click-close-thankyou">Now back to the long page.</p>
    <span class="close click-close-thankyou"><img src="../assets/images/icon-close.svg"></span>
</div> 

