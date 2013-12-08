<footer>
    <div>
            <section id="left">
                <h3>Social</h3>
                <ul>
                    <li><a href="https://twitter.com/share" class="fa fa-twitter fa-2x"></a></li>
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fparse.com" class="fa fa-facebook fa-2x"></a></li>
                    
                    <?php 
                    $gplusmsg = "https://plus.google.com/share?url=";
                    $gplusmsg .= "Veridian_Dynamics-". $_SERVER["PHP_SELF"]; 
                    ?>
                    <li><a href="<? echo $gplusmsg ?>" class="fa fa-google-plus fa-2x"></a></li>
                    <li><a href="https://linkedin.com/" class="fa fa-linkedin fa-2x"></a></li>
                    <li><a href="https://pinterest.com/" class="fa fa-pinterest fa-2x"></a></li>
                    <li><a href="https://tumblr.com/" class="fa fa-tumblr fa-2x"></a></li>
                </ul>
             </section>
             <section id="right">
                <h3>Disclaimer</h3>
                <p>Here at Veridian Dynamics, we care about <i>you.</i> That's
                    why, by visiting this site, you agree to suspend all of your
                    rights. Because we <i>care</i>. 
                    <br/><br/>
                    Veridian retains rights to all content generated while user browses site.
                </p> 
             </section>
    </div>
</footer>