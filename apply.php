<!DOCTYPE html>
<html>
    
    
    <?
        //VARIOUS INITIALIZAIONS
        $yourURL = "http://www.uvm.edu/~swreinha/cs008/assignment5.1/apply.php";
        $yourURL2 = "https://www.uvm.edu/~swreinha/cs008/assignment5.1/apply.php";
        $first = 'Ted';
        $middle = 'Margaret';
        $last = 'Chips';
        $email = "tedchips@veridiandynamics.com";
        $education = "High School";
        $area = "Test Subject";
        $internal = false;

        $agree = false;
        
        $vals = array();
        

        //ERROR INITIALIZATIONS
        //VARIOUS CHECKS
        $emailERROR = false;
        $nameERROR = false;
        $agreeError = false;

        include ("validation_functions.php"); 
        $errorMsg = array();

        if (isset($_POST["btnSubmit"])){
            $fromPage = getenv("http_referer");
            if(!($fromPage = $yourURL || $fromPage = $yourURL2)){
            die("<p>Sorry you cannot access this page. Security breach detected and reported</p>");
            }

            $first = htmlentities($_POST["txtFirst"],ENT_QUOTES,"UTF-8");
               if(empty($first) || empty($middle) || empty($last)){
               $errorMsg[]="Please enter a complete name. Enter a tilde (~) if not applicable.";
               $nameERROR=true;
           }


           $email = htmlentities($_POST["txtEmail"],ENT_QUOTES,"UTF-8");
               if(empty($email)){
               $errorMsg[]="Please enter your email.";
               $emailERROR=true;
           }else{
               $valid = verifyEmail ($email);
               if (!$valid){
                   $errorMsg[]="Please enter a proper email.";
                   $emailERROR=true;
               }
           }

           $education = htmlentities($_POST["lstEducation"],ENT_QUOTES,"UTF-8");

           $internal = isset($_POST["chkInternal"]);
           if($internal){
               $message .= 'Internal = true';
           }
           $agree  = isset($_POST["chkAgree"]);
           if($agree){
               $message .= 'Sell soul = true';
           }else{
               $errorMsg[]='Please agree to our terms and conditions.';
               $agreeError=true;
           }

           $area = htmlentities($_POST["radArea"],ENT_QUOTES,"UTF-8");
           if (!$errorMsg){
               
//               chmod($fp,077);
               
               $message  = '<h2>Thank you for your soul.</h2>';
               $message.='<p>';

               foreach ($_POST as $key => $value){
                   if ($key != 'Submit'){
                   $camelCase = preg_split('/(?=[A-Z])/',substr($key,3));
                   
                   foreach ($camelCase as $one){
                       $message .= $one . " ";
                   }
                   $message .= " = " . $value .'<br/>';
                   $vals[]=$value;
                   }
                   
               }
               $message .= '</p>';
               $fp = fopen('Book2.csv', 'r');
                fputcsv($fp, $vals);
                fclose($fp);
           }
        }
    ?>
    
    
    
    <?php include 'head.php'; ?>
    <body id="apply">
        <?php include 'header.php'; ?>
        <?php include 'nav.php'; ?>
        <h1><i>Apply</i> for a Job</h1>
        <article class="card" id="form">
            <section>
            <h2>Work with us.</h2>
            <p><i>When it comes to a career, we know you have many choices.</i>
                <br/><br/>
                Or perhaps none at all. Either way, why not explore the 
                opportunities waiting for you at one of the largest, most 
                innovative companies in the world?
                <br/><br/>
                <i>At Veridian Dynamics, we have our tentacles in everything.</i> 
                <br/><br/>
                That's right. Tentacles. Because our biomedical division is 
                experimenting with using actual tentacles as a fun, efficient 
                replacement for boring human fingers. It works.
                <br/><br/>
                <i>Or maybe you'd like to enter the glamorous world of 
                professional test subjects.</i> 
                <br/><br/>
                It's true! You can actually get paid just to try new drugs,
                many of which have no* unintended side effects. It's like
                getting free money, just to live in your college dorm again.
                <br/><br/>
                <i>Whether it's industrial products, consumer goods, 
                biomedical, food products, defense technology, or more: we have
                a place for you.</i>
                <br/><br/>
                We're working hard to make the world a better place. At least
                the parts we care about. Sorry Denmark. You know why we're mad.
                <br/><br/>
                <i>Come join the Veridian Dynamics family!</i>
                
            </p>
            </section>
            <section>
                <? 
            // FORM CONFIRMATION
            if (isset($_POST["btnSubmit"]) AND empty($errorMsg)){  // closing of if marked with: end body submit
                echo $message;
                include_once('mailMessage.php');
                $mailed = sendMail($email, $message);
                print "<h2>Your application is ";

                if (!$mailed) {
                    echo "not ";
                }

                echo "being processed.</h2>";

                print "<p>A copy of this message has ";
                if (!$mailed) {
                    echo "not ";
                }
                print "been sent to:";
                print "<br/>" . $email . "</p>";
            } else {
                if($errorMsg){
                    print '<div id="errors">';
                    echo "<ol>\n";
                foreach($errorMsg as $err){
                    echo "<li>" . $err . "</li>\n";
                }
                echo "</ol>\n";
                print '</div>';
                }
            
            //form gets displayed
         ?>
                <h2 class='rightH'>Apply now.</h2>
                <form action="apply.php" 
                    method="post"
                    id="frmRegister">
                  
                  <label for="txtFirst">First Name:</label>
                  <input type="text" id="txtFirst" name="txtFirst" value="<?php echo $first; ?>" tabindex="100"
                         maxlength="35" onfocus="this.select();" placeholder="What is your first name?" style="max-width: 200px;" >
                  <br/>
                  <label for="txtMiddle">Middle Name:</label>
                  <input type="text" id="txtMiddle" name="txtMiddle" value="<?php echo $middle; ?>" tabindex="200"
                         maxlength="35" onfocus="this.select();" placeholder="What is your middle name?" style="max-width: 200px;" >
                  <br/>
                  <label for="txtLast">Last Name:</label>
                  <input type="text" id="txtLast" name="txtLast" value="<?php echo $last; ?>" tabindex="300"
                         maxlength="35" onfocus="this.select();" placeholder="What is your last name?" style="max-width: 200px;" >
                  <br/><br/>
                    
                    
                  <label for="txtEmail">Email:</label>
                  <input type="text" id="txtEmail" name="txtEmail" value="<?php echo $email; ?>" tabindex="400"
                         maxlength="35" onfocus="this.select();" placeholder="Enter a valid email address" style="width: 250px;" >
                  <br/><br/>
                  
                  <label for="lstEducation">Education:</label>
                      <select id="lstEducation" name="lstEducation" tabindex="500" size="1" style='width: 253px;'>
                          <option value="< Highschool" <?php if($education=="< Highschool") echo ' selected="selected" ';?>>less than High School</option>
                              <option value="Highschool" <?php if($education=="Highschool") echo ' selected="selected" ';?>>High School</option>
                              <option value="Some College" <?php if($education=="Some College") echo ' selected="selected" ';?>>Some College</option>
                              <option value="Associate's" <?php if($education=="Associate's") echo ' selected="selected" ';?>>Associate's</option>
                              <option value="Bachelor's" <?php if($education=="Bachelor's") echo ' selected="selected" ';?>>Bachelor's</option>
                              <option value="Master's" <?php if($education=="Master's") echo ' selected="selected" ';?>>Master's</option>
                              <option value="Ph. D." <?php if($education=="Ph. D.") echo ' selected="selected" ';?>>Ph. D.</option>
                      </select>
                  
                  <br/><br/>

                  <label>Internal promotion request.<input type="checkbox" id="chkInternal" name="chkInternal" value="internal" tabindex="600" 
                                      <?php if($internal) echo ' checked="checked" ';?>></label>
                  
                  <br/><br/>
                  
                  <fieldset class="radio" style='text-align:center;'>
                      <legend>What area are you applying for?</legend>
                      <label><input type="radio" id="radTestSubject" name="radArea" value="Test Subject" tabindex="700" 
                                      <?php if($area=="Test Subject") echo ' checked="checked" ';?>>Test Subject</label>
                      
                      <label><input type="radio" id="radScience" name="radArea" value="Science" tabindex="701" 
                                      <?php if($area=="Science") echo ' checked="checked" ';?>>Science</label>
                      
                      <label><input type="radio" id="radHumanResources" name="radArea" value="Human Resources" tabindex="702" 
                                      <?php if($area=="Human Resources") echo ' checked="checked" ';?>>Human Resources</label>
                      
                      <label><input type="radio" id="radAccounting" name="radArea" value="Accounting" tabindex="703" 
                                      <?php if($area=="Accounting") echo ' checked="checked" ';?>>Accounting</label>
                      
                      <label><input type="radio" id="radLeadership" name="radArea" value="Leadership" tabindex="704" 
                                      <?php if($area=="Leadership") echo ' checked="checked" ';?>>Leadership</label>
                      
                      <label><input type="radio" id="radOther" name="radArea" value="Other" tabindex="705" 
                                      <?php if($area=="Other") echo ' checked="checked" ';?>>Other</label>


                  </fieldset>
                  <br/>
                  <label>I agree to the Terms and Conditions.<input type="checkbox" id="chkAgree" name="chkAgree" value="Agree" tabindex="800" 
                                      <?php if($agree) echo ' checked="checked" ';?>></label>
                  <br/>
                      <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" tabindex="991" class="button">
                      <input type="reset" id="butReset" name="butReset" value="Reset" tabindex="993" class="button" onclick="reSetForm()" >
                  </form>
                <p class="small"><i>Terms and Conditions</i>
                <br/>
                As an act of good faith, you agree to supply your soul to 
                Veridian Dynamics. You acknowledge that, despite the ultimate 
                decision of Veridian Dynamics in regards to your application,
                your soul cannot be returned to you. 
                </p>
                <? } ?>
            </section>
            <!--</section>-->
        </article>
        <?php include 'footer.php'; ?>
    </body>
</html>
