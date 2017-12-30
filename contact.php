<?php
    if(!empty($_POST['name']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['reason']) && !empty($_POST['message'])){
        $name = strip_tags($_POST['name']);
        $username = strip_tags($_POST['username']);
        $email = strip_tags($_POST['email']);
        $reason = strip_tags($_POST['reason']);
        $message = strip_tags($_POST['message']);

        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        $headers = 'From: minecraft@technobuffalo.com' . "\r\n" .
   'X-Mailer: PHP/' . phpversion();

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ $error = "Email is invalid!";}
        else{
            if(mail("minecraft@technobuffalo.com", "Contact Us: " . $reason, 
trim("This message was automatically generated via the TechnoBuffalo Minecraft website at http://minecraft.technobuffalo.com/contact.php

Username: $username

Name: $name

Contact Email: $email

Subject: $reason

Message: $message"), $headers)){
                $success = true;
            }

        }
    }
    else if((isset($_POST['name']) || isset($_POST['username']) || isset($_POST['email']) || isset($_POST['reason']) || isset($_POST['message'])) && (empty($_POST['name']) || empty($_POST['username']) || empty($_POST['email']) || empty($_POST['reason']) || empty($_POST['message']))){
        $error = "Please fill out all fields!";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>TechnoBuffalo Minecraft</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Styles -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/compiled/bootstrap-overrides.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/theme.css" />
    
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />

    <link rel="stylesheet" href="css/compiled/contact.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/lib/animate.css" media="screen, projection" />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
     <div class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.html" class="navbar-brand"><img src="img/tb.png" style="width: 259px;height: 34px;"></a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse" role="navigation">
                <ul class="nav navbar-nav navbar-right" style="padding-top:10px;">
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="about-us.html">ABOUT US</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">SERVERS<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="hub.html">Hub</a></li>
                            <li><a href="survival.html">Survival</a></li>
                            <li><a href="creative.html">Creative</a></li>
                        </ul>
                    </li>
					<li><a href="/mdl">MAPS</a></li>
                    <!--<li><a href="http://minecraft.technobuffalo.com:8123">MAP</a></li>
                    <li><a href="http://minecraft.technobuffalo.com:7777/GlobalShop">ECONOMY</a></li>
                    <li><a href="http://minecraft.technobuffalo.com/bans">BANS</a></li>-->
                    <li class="active"><a href="contact.php">CONTACT US</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div id="contact">
        <div class="container">
            <div class="section_header">
                <h3>Send Us A Note!</h3>
            </div>
            <div class="row contact">
                <p>
                    What you think is important to us, and we've got you covered 110%. Our team will review your message and reply back as soon as possible.</p>
                <?php if(isset($error)){ ?><div class="alert alert-danger"><?php  echo $error; ?></div> <?php }
                else if(isset($success)){ ?><div class="alert alert-success">Email has been sent!</div><?php } ?>
                <form action="" method="post">
                    <div class="row form">
                        <div class="col-sm-6 row-col">
                            <div class="box">
                                <input class="name form-control" name="name" type="text" placeholder="Name">
                                <input class="name form-control" name="username" type="text" placeholder="Minecraft Username">
                                <input class="mail form-control" name="email" type="text" placeholder="Email">
                                <select class="form-control" name="reason">
                                    <option name="Ban Appeal">Ban Appeal</option>
                                    <option name="General Inquiry">General Inquiry</option>
                                    <option name="Plugin Request">Plugin Request</option>
                                    <option name="Staff Application">Staff Application</option>
                                    <option name="Server Error">Server Error</option>
                                    <option name="Suggestion">Suggestion</option>
                                    <option name="Website Bug">Website Bug</option>
                                    <option name="Other">Other - Specify</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <textarea name="message" style="resize:none;" placeholder="Type a message here..." class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row submit">
                        <div class="col-md-3 right">
                            <br/>
                            <input type="submit" value="Send your message">
                        </div>
                    </div>
                </form>
            </div>
        </div>

<!-- starts footer -->
    <footer id="footer">
        <div class="container">
            <div class="row info">
                <div class="col-sm-6 residence">
                    <ul>
                        <li>TechnoBuffalo LLC.</li>
                        <li>Irvine, CA, USA</li>
                    </ul>
                </div>
                <div class="col-sm-5 touch">
                    <ul>
                        <li><strong><u>Contact</u></strong></li></br>
                        <li><a href="contact.php">Click Here to Send Us A Note</a></li>
                    </ul>
                </div>
            </div>
            <div class="row credits">
                <div class="col-md-12">
                    <div class="row social">
                        <div class="col-md-12">
                            <a href="https://www.facebook.com/TechnoBuffaloMinecraftServer" class="facebook">
                                <span class="socialicons ico1"></span>
                                <span class="socialicons_h ico1h"></span>
                            </a>
                            <a href="https://twitter.com/TechnoBuffalo" class="twitter">
                                <span class="socialicons ico2"></span>
                                <span class="socialicons_h ico2h"></span>
                            </a>
                            <a href="http://plus.google.com/+TechnoBuffalo" class="gplus">
                                <span class="socialicons ico3"></span>
                                <span class="socialicons_h ico3h"></span>
                            </a>
                            <a href="http://pinterest.com/technobuffalo/" class="pinterest">
                                <span class="socialicons ico5"></span>
                                <span class="socialicons_h ico5h"></span>
                            </a>
                            <a href="https://www.facebook.com/TechnoBuffalo" class="facebook">
                                <span class="socialicons ico1"></span>
                                <span class="socialicons_h ico1h"></span>
                            </a>
                            </a>
                        </div>
                    </div>
                    <div class="row copyright">
                        <div class="col-md-12">
                            © 2015 TechnoBuffalo. All rights reserved.
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </footer>

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>
</body>
</html>