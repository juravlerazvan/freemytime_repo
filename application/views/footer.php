<br/><br/>
</div>
</div>
</div> 
<div class="body3">
    <div class="body4">
        <div class="main">
            <section id="content2">
                <article class="col3 pad_left1">
                    <h3>How does it works ?</h3>
                    <!-- <figure class="pad_bot1"><img src="#" alt=""></figure> -->
                    <p class="pad_bot2">You can find someone to do anything for you on <b>FreeMyTime</b>. Moving your lawn or cooking your dinner are examples of chores you can post. </p>
                    <a href="<?php echo base_url() . 'index.php/about' ?>">Read more about how it works</a>
                </article>
                <article class="col3 pad_left2">
                    <h3>What is FreeMyTime ?</h3>
                    <!-- <figure class="pad_bot1"><img src="#" alt=""></figure> -->
                    <p class="pad_bot2"><b>FreeMyTime</b> allows you to post a chore that needs doing like, say, walking the dog and then individuals or businesses in your area will bid on your proposal. </p>
                    <a href="<?php echo base_url() . 'index.php/about' ?>">Find out more about FreeMyTime</a>
                </article>
                <article class="col3 pad_left2">
                    <h3>How can I make money ?</h3>
                    <!-- <figure class="pad_bot1"><img src="#" alt=""></figure> -->
                    <p class="pad_bot2">People post their tasks on <b>FreeMyTime</b>. All you have to do is bid on a task. If an employer accepts your bid, you do the task and then get paid! </p>	
                    <a href="<?php echo base_url() . 'index.php/browse-tasks' ?>">Learn more about how can you get paid </a>
                </article>
            </section>
        </div>
    </div>
</div>
<div class="main">			
    <!--footer -->

    <footer>
        &copy;<?php echo date("Y"); ?>&nbsp;<a href="http://www.freemytime.org" target="_blank">FreeMyTime.org</a>
        &nbsp;&nbsp;
        <!-- BEGIN Attracta | Site 705230 | Badge 1 -->
        <script type="text/javascript" src="http://cdn.attracta.com/badge/js/705230/core.js"></script><a href="http://cdn.attracta.com/badge/verify/705230.html"><img alt="Increase your website traffic with Attracta.com" style="border:0px ;" src="http://cdn.attracta.com/badge/img/705230/1.png"></a>
        <!-- END Attracta -->
        &nbsp;&nbsp;
<!--        <a href="http://www.zyma.com/index.php?aff_id=15043"> <img src="https://www.zyma.com/images/30879.gif" alt="Hosted by Zyma - Professional & Affordable Web Hosting" border="0"> </a>
        -->
    </footer>
    <!--footer end-->
</div>
<script type="text/javascript" src="<?php echo base_url() . 'application/assets/' ?>js/jquery-1.7.1.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url() . 'application/assets/' ?>js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo base_url() . 'application/assets/' ?>js/cufon-replace.js"></script>  
<script type="text/javascript" src="<?php echo base_url() . 'application/assets/' ?>js/Myriad_Pro_italic_400.font.js"></script>
<script type="text/javascript" src="<?php echo base_url() . 'application/assets/' ?>js/Myriad_Pro_400.font.js"></script>
<script type="text/javascript" src="<?php echo base_url() . 'application/assets/' ?>js/Myriad_Pro_italic_700.font.js"></script>
<script type="text/javascript" src="<?php echo base_url() . 'application/assets/' ?>js/core.js"></script>
<script type="text/javascript" src="<?php echo base_url() . 'application/assets/' ?>js/validation-utils.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="http://info.template-help.com/files/ie6_warning/ie6_script_other.js"></script>
<script type="text/javascript" src="<?php echo base_url() . 'application/assets/'; ?>js/html5.js"></script>
<![endif]--> 
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-29608723-2']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>
<script type="text/javascript"> Cufon.now(); </script>
<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        var str = document.URL;
        var re = new RegExp("browse-tasks", "g");
        if(re.test(str)) {
            getTasksTable();
        }        
    });
</script>
</body>
</html>