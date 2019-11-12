<div class="wrapper" id="panel-00-header">
    <div class="container header" style="position: relative;">
        <div class="logo"><img src="assets/images/logo-liveramp.svg"></div>
        <div class="nav">
            <ul class="click-menu">
                <li><a href="#" data-link-to="panel-02-thatswhy">Why<span> integration matters</span></a></li>
                <li><a href="#" data-link-to="panel-05-integrate-techstack">How<span> it works</span></a></li>
                <li><a href="#" data-link-to="panel-10-five-important-outcomes">What<span> integration achieves</span></a></li>
                <li><a href="#" data-link-to="panel-12-blue-people-based-marketing" class="green" >What<span> comes</span> next?</a></a></li>
            </ul>
        </div>
    </div>
    <?php $where = 'header';?>
    <form action="#" method="post" class="click-submit">
    <div class="signup <?php if ($where=='header') echo 'hide';?>">
        <span class="close" id="click-close"><img src="assets/images/icon-close.svg"></span>
        <label>Interested in receiving more content like this from LiveRamp?</label>
        <div class="inputfield">
            <span>Email Address</span>
            <input type="text" class="text my-email" name="email">
            <span id="valid-email">Must be a valid email address</span>
            <input type="submit" name="submit" value="Submit">
        </div>
    </div>
</form>
<div class="thankyou hide">
    <label>Thank you! </label>
    <p class="click-close-thankyou">Now back to the long page.</p>
    <span class="close click-close-thankyou"><img src="assets/images/icon-close.svg"></span>
</div>

</div>
