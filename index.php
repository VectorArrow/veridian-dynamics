<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'header.php'; ?>
        <?php include 'nav.php'; ?>
        <section id='homeBody'>
        <div id='slideshow'>
            <a href="projects.php">
                <img id="one" src="image/pic1.png" alt='Food. Yum.' height='550' width='1920'>
            </a>
            <a href="apologies.php">
                <img id="two" src="image/pic2.png" alt='Diversity. Good for us.' height='550' width='1920'>
            </a>
            <!-- Picture rights owned by Tulane  Public Relations
               Photo has been cropped and resized.
               http://www.flickr.com/photos/tulanesally/4307042890/sizes/o/
               http://creativecommons.org/licenses/by/2.0/ -->
            
            <a href="about.php">
                <img id="three" src="image/pic3.png" alt='Family. Yay.' height='550' width='1920'>
            </a>
            <!-- Author: Catherine Scott
               Photo has been cropped and resized.
               http://commons.wikimedia.org/wiki/File:Happy_family_(1).jpg
               http://creativecommons.org/licenses/by-sa/2.0/deed.en
               
               By Catherine Scott (Family 3Uploaded by Yjenith) [CC-BY-SA-2.0 (http://creativecommons.org/licenses/by-sa/2.0)], via Wikimedia Commons
            --> 
            
        </div>
        </section>
        <script type="text/javascript">
            $(window).load(function() {
                $('#slideshow').orbit({
                    animation:'fade',
                    advanceSpeed: 6000,
                    pauseOnHover: true,
                    directionalNav:false,
                    startClockOnMouseOut:true
//                    bullets:true
                });
                $(".orbit-wrapper").width('100%');
             });
        </script>
        <?php include 'footer.php'; ?>
    </body>
</html>
