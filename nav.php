<nav><ol>
        <?php
if(basename($_SERVER['PHP_SELF'])=="index.php"){

    print '<li class="activePage">Home</li>';

} else {

    print '<li><a href="index.php">Home</a></li>';
}

if(basename($_SERVER['PHP_SELF'])=="about.php"){

    print '<li class="activePage">About</li>';

} else {

    print '<li><a href="about.php">About</a></li>';
}
if(basename($_SERVER['PHP_SELF'])=="jabberwocky.php"){

    print '<li class="activePage">Jabberwocky</li>';

} else {

    print '<li><a href="jabberwocky.php">Jabberwocky</a></li>';
}
if(basename($_SERVER['PHP_SELF'])=="projects.php"){

    print '<li class="activePage">Projects</li>';

} else {

    print '<li><a href="projects.php">Projects</a></li>';
}
if(basename($_SERVER['PHP_SELF'])=="apply.php"){

    print '<li class="activePage">Apply</li>';

} else {

    print '<li><a href="apply.php">Apply</a></li>';
}
if(basename($_SERVER['PHP_SELF'])=="apologies.php"){

    print '<li class="activePage">Apologies</li>';

}else {

    print '<li><a href="apologies.php">Apologies</a></li>';
}
?>
        
    </ol></nav>
