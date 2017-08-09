<?php
require 'PHPMailerAutoload.php';
require 'class.phpmailer.php';

$mail = new PHPMailer();
$mailInside = new PHPMailer();

/**** Outside mail configuration****/  
$mail->IsSMTP();  
//$mail->SMTPDebug = 2; 
$mail->Host = "smtp.example.com";
$mail->SMTPAuth = true;                
$mail->SMTPSecure = "ssl";              // sets the prefix to the servier
$mail->Host = "smtp.zoho.com";        // sets Gmail as the SMTP server
$mail->Port = 465; 
 
$mail->Username = "no-reply@innovativetraders.in";  // Gmail username
$mail->Password = "innovativetraders";      // Gmail password

$mail->SetFrom ('no-reply@innovativetraders.in', 'Innovative Traders');
//$mail->AddReplyTo("contact@innovativetraders.in","Innovative Traders");
/****Ends****/

/**** Inside mail configuration****/    
$mailInside->IsSMTP(); 
//$mailInside->SMTPDebug = 2; 
$mailInside->SMTPAuth = true;               
$mailInside->SMTPSecure = "ssl";              // sets the prefix to the servier
$mailInside->Host = "smtp.zoho.com";        // sets Gmail as the SMTP server
$mailInside->Port = 465;       
$mailInside->Username = "no-reply@innovativetraders.in";  // Gmail username
$mailInside->Password = "innovativetraders";      // Gmail password

$mailInside->SetFrom ('no-reply@innovativetraders.in', 'Innovative Traders');
//$mail->AddReplyTo("contact@innovativetraders.in","Innovative Traders");
/**Ends**/

if(isset($_REQUEST["submitBtn"])){
$name=$_REQUEST["inputName"];
$subject=$_REQUEST["inputSubject"];
$email=$_REQUEST["inputEmail"];	
$content=$_REQUEST["inputContent"];
$mail->Subject = 'Innovative Traders';
$mail->ContentType = 'text/plain'; 
$mail->IsHTML(false);
$mail->Body =  'Hi '.$name."!"."\n".'Thank you, for writing to us. We will get back to you shortly.'."\n\n\n"."Team Innovative Traders"
				."\n"."Address- 24B, Noor Ali Lane, Kolkata- 700014 "."\n"."Phone- +91-8981823838"."\n"."Email- contact@innovativetraders.in";

// you may also use $mail->Body = file_get_contents('your_mail_template.html');

$mail->AddAddress ($email, $name);     
// you may also use this format $mail->AddAddress ($recipient);

if(!$mail->Send()) 
{
        $error_message = "Mailer Error: " . $mail->ErrorInfo;
		//echo $error_message;
        header('Location: error.php');
} else 
{
        $error_message = "Successfully sent!";
         $mailInside->Subject = 'New Query Received from our website: '.$subject;
		$mailInside->ContentType = 'text/plain'; 
		$mailInside->IsHTML(false);
		$mailInside->Body = 'You have a new Query!!'."\n\n"."Person Name : ".$name."\n\n"."Query is : ".$content; 
// you may also use $mail->Body = file_get_contents('your_mail_template.html');

		$mailInside->AddAddress ('contact@innovativetraders.in', 'Innovative Traders');  
		if(!$mailInside->Send()){
				$error_message = "Mailer Error: " . $mailInside->ErrorInfo;
				//echo $error_message;
				header('Location: error.php');
		}
		else{
			$error_message = "Successfully sent!";
			//echo $error_message;
			header('Location: email.php');
		}
		
}
//header('Location: email.php');
/*
$to = "somebody@example.com";
$toinside="contact@interiorradiant.com";
$subject = "Radiant Infrastructure";
$subjectInside="New Query from"+$name;
$txt = "Thank You, for writing to us. We will get back to you shortly.";
$headers = "From: no-reply@zoho.com"; 


mail($to,$subject,$txt,$headers);
mail($toinside,$subjectInside,$content,$headers);*/
}
else{

?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Innovative Traders</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/theme.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/docs.css" rel="stylesheet">
<link href="js/google-code-prettify/prettify.css" rel="stylesheet">

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->    
</head>
<body>
	
    <!--fb code -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10&appId=416279145395960";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <!--etodur e -->

    <!--header-->
    <div class="header">
        <div class="wrap">
            <div class="navbar navbar_ clearfix">
                <div class="container">
                    <div class="row">
                        <div class="span4">
                            <div class="logo"><a href="index.html"><img src="img/logo.jpg" alt="" /></a></div>                        
                        </div>
                        <div class="span8">
                            
                            <div class="clear"></div>
                            <nav id="main_menu">
                                <div class="menu_wrap">
                                    <ul class="nav sf-menu">
                                      <li><a href="index.html">Home</a></li>
                                      <li class="current"><a href="about.html">About</a></li>
                                      
                                      <li class="sub-menu"><a href="portfolio_3columns.html">Designs</a>
                                           
                                      </li>                                  
                                     
                                      <li><a href="contacts.php">Contacts</a></li>
                                    </ul>
                                </div>
                             </nav>                            
                        </div>
                    </div>                
                </div>
             </div>
        </div>    
    </div>
    
    <!--//header-->    
        
    <!--page_container-->
    <div class="page_container">
    	<div class="breadcrumb">
        	<div class="wrap">
            	<div class="container">
                    <a href="index.html">Home</a><span>/</span>Contacts
                </div>
            </div>
        </div>
    	<div class="wrap">
        	<div class="container">
                <section>
                	<div class="row">
                    	<div class="span4">
                        	<h2 class="title"><span>Contact Info</span></h2>
                            <div id="map"><iframe width="100%" height="310" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3684.7018286486223!2d88.36443171466154!3d22.55283963937999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0276fcb8114ac3%3A0x82033725951d900d!2s24%2C+Noor+Ali+Ln%2C+Beniapukur%2C+Kolkata%2C+West+Bengal+700014!5e0!3m2!1sen!2sin!4v1491431527440" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>"></iframe></div>
                            <p>Innovative Traders<br/>24B, Noor Ali Lane</p>
                            <p>Phone: +91-8981823838<br/>Email: <a href="mailto:contact@innovativetraders.in">contact@innovativetraders.in</a><br/>Web: <a href="#">www.innovativetraders.in</a></p>                           
                        </div>
                    	<div class="span8">
                        	<h2 class="title"><span>Get In Touch</span></h2>
                            <div class="contact_form">  
                            	<div id="note"></div>
                                <div id="fields">
                                    <form method="POST" action="<?php $_PHP_SELF?>" role="form">
                                        <input class="span7" type="text" name="inputName" id="inputName" value="" placeholder="Name (required)" />
                                        <input class="span7" type="text" name="inputEmail" id="inputEmail" value="" placeholder="Email (required)" />
                                        <input class="span7" type="text" name="inputSubject" id="inputSubject" value="" placeholder="Subject" />
                                        <textarea name="inputContent" id="inputContent" class="span8" placeholder="Message"></textarea>
                                        <div class="clear"></div>
                                        <input type="reset" class="btn dark_btn" value="Clear form" />
                                         <input type="submit" class="btn send_btn" value="Send" name="submitBtn" id="submitBtn" />
                                        <div class="clear"></div>
                                    </form>
                                </div>
                            </div>                   
                        </div>                	
                	</div>
                </section>
            </div>
        </div>
    </div>
    <!--//page_container-->
    
    <!--footer-->
<div class="footer_bottom">
            <div class="wrap">
                <div class="container">
                    <div class="row">
                        <div class="span5">
                            <div class="foot_logo"><a href="index.html"><img src="img/foot_logo.jpg" alt="" /></a></div>    
                            <div class="copyright">&copy; 2020 Innovative Traders. All Rights Reserved.</div>                        
                        </div>
                        
                        <div class="span7">
                            <!--deleted 
                            <div class="foot_right_block">
                                <div class="fright">
                                    <form action="#" method="post">
                                        <input class="inp_search" name="name" type="text" value="Search the Site" onfocus="if (this.value == 'Search the Site') this.value = '';" onblur="if (this.value == '') this.value = 'Search the Site';" />                                        
                                        </form>
                                </div>  -->
                                
                <div class="foot_fb">
        
            
            <div class="fb-like" data-href="https://www.facebook.com/innovativetraders563" data-width="200" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
        
                                <!-- 
                                <div class="follow_us">
                                    <ul>
                                        <li><a rel="tooltip" href="https://www.facebook.com/innovativetraders563/" title="Facebook" class="facebook">Facebook</a></li>
                                        <li><a rel="tooltip" href="#" title="Twitter" class="twitter">Twitter</a></li>
                                        <li><a rel="tooltip" href="#" title="Tumbrl" class="tumbrl">Tumbrl</a></li>
                                        <li><a rel="tooltip" href="#" title="Vimeo" class="vimeo">Vimeo</a></li>
                                        <li><a rel="tooltip" href="#" title="Delicious" class="delicious">Delicious</a>
                                    </ul>
                                </div>
                                </li> -->
                                <div class="clear"></div>
                            
                                <div class="clear"></div>
                                <div class="foot_menu">
                                    <ul>
                                        <li><a href="index.html" class="current">Home</a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="portfolio_3columns.html">Designs</a></li>
                                        <li><a href="contacts.php">Contacts</a></li>
                                    </ul>
                                </div>
                            </div>                            
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    <!--//footer-->    
    <!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-598b609fb57641e4"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
    <script type="text/javascript" src="js/camera.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/superfish.js"></script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="js/jquery.jcarousel.js"></script>
    <script type="text/javascript" src="js/jquery.tweet.js"></script>
    <script type="text/javascript" src="js/myscript.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){   
            //Slider
            $('#camera_wrap_1').camera();
            
            //Featured works & latest posts
            $('#mycarousel, #mycarousel2, #newscarousel').jcarousel();                                                  
        });     
    </script>
    <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>    
</body>
</html>
<?php
}
?>
