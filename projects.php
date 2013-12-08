<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body id="projects">
        <?php include 'header.php'; ?>
        <?php include 'nav.php'; ?>
        <h1>See our <i>Projects</i></h1>
        <!--<p>Veridian Dynamics is a company built on money, and people.</p>-->
        <article class="card">
            <section>
            <h2>Innovation</h2>
            <p><i>Every day, something we make makes your life better.</i>
                <br/><br/>
                Usually.
                <br/><br/>
                <i>What do we make?</i> 
                <br/><br/>
                Power, we make that. Technology, we make that too. Cows. Well
                no, we don't make that. Although, we have made a sheep. We make medicine,
                food, all sorts of things. </p>
            </section>
            <section>
                <h2 class="rightH">Recent Projects</h2>
                <? 
                $file = fopen("Book1.csv", "r");
                while(!feof($file)){
                    $data = fgetcsv($file);
                    if (is_array($data)){
                        echo '<p><i>'.$data[0].'</i></p><ul>';
                        foreach($data as $entry){
                            if($entry != $data[0])
                            echo '<li>'.$entry.'</li>';
                        }
                        echo '<li>and more...</li></ul>';                        
                    }
                }
                ?>

            </section>
            <!--</section>-->
        </article>
        <?php include 'footer.php'; ?>
    </body>
</html>
