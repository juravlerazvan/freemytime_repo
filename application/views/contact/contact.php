<br><br><br>
<section id="content">
    <article class="col1 pad_left1">
        <h2><?php echo $page_title ?></h2>
        <form id="contactForm">
            <div>
                <span id="sending_status"></span>
                <div  class="wrapper">
                    <input type="text" class="input" name="name" id="name">
                    Name:<br />
                </div>
                <div  class="wrapper">
                    <input type="text" class="input" name="email" id="email">
                    E-mail:<br />
                </div>
                <div  class="wrapper">
                    <div class="bg2"><textarea name="textarea" cols="1" rows="1" name="message" id="message"></textarea></div>
                    Message:<br />
                </div>

                <br/>
                <a href="#" class="button" onClick="sendMessage()" id="sendButton">Send</a>
                <a href="#" class="button_low" id="resetButton" type="reset">Reset</a>
            </div>
        </form>
    </article>
    <article class="col2 pad_left2">
        <h2>Contact details</h2>
        <div class="box1">
            <div class="inner">
                <div class="pad">
                    <div class="wrapper">
                        <p class="cols color1"><strong>Location</strong>:&nbsp;Romania, Bucharest, Soseaua Stefan cel Mare</p>
                        <p class="cols color1"><strong>E-mail</strong>:&nbsp;contact@freemytime.ro</p>
                        <p class="cols color1"><strong>Phone</strong>:&nbsp;+(40) 766 246 593</p>
                        <p class="cols color1">We socialize on:&nbsp;
                            <a href="http://www.facebook.com/pages/FreeMyTime/165170090211530" target="_blank" style="text-decoration: none;"><img src="<?php echo base_url() . 'application/assets/images/facebook.png' ?>" alt="Find us on Facebook" border="0"></a>
                            &nbsp;
                            <a href="http://twitter.com/freemytime_ro" target="_blank" style="text-decoration: none;"><img src="<?php echo base_url() . 'application/assets/images/twitter.png' ?>" alt="Follow us on Twitter" border="0"></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </article>

</section>