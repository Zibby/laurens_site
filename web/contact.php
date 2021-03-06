<?php
#https://www.youtube.com/watch?v=zGNH_lbpmm8
  define('SITE_KEY', '6LdnMaYUAAAAAIlkYz3Ow02QsxVdMOd5qJt8zUfQ');
  define('SECRET_KEY', '6LdnMaYUAAAAAKfqPIAjf7Dm_r5tqLi0i36qQWbP');

  function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
  }
  function getCaptcha($SecretKey){
      $Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$SecretKey}");
      $Return = json_decode($Response);
      return $Return;
  }
  $Return = getCaptcha($_POST['g-recaptcha-response']);
  //var_dump($Return);
  if($Return->success == true && $Return->score > 0.5){
      console_log("Succes!");
  }else{
      console_log("You are a Robot!!");
  }

?>

<!doctype html>
<html class="no-js" lang="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/LB-styling.css">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,700&display=swap" rel="stylesheet">
  <script src="js/vendor/modernizr-2.8.3.min.js"></script>
  <script src='https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY;?>'></script>
  <script>
    grecaptcha.ready(function() {
    grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'contact'})
    .then(function(token) {
        console.log(token);
        document.getElementById('g-recaptcha-response').value=token;
    });
    });
  </script>

</head>
<body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->

            <!-- Add your site or application content here -->
            <div class="container">
              <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand d-block d-md-none" href="#">Lauren Bowler</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                  <div class="navbar-nav">
                    <a class="navbar-brand d-none d-md-block" href="#">Lauren Bowler</a>
                    <a class="nav-item nav-link" href="#">About</a>
                    <a class="nav-item nav-link" href="#">Portfolio</a>
                    <a class="nav-item nav-link active" href="#">Contact <span class="sr-only">(current)</span></a>
                  </div>
                </div>
              </nav>

              <div class="row">
                <div class="col-12">
                  <h1>Contact Me</h1>
                </div>
                <div class="col-12 col-lg-6 offset-lg-3">
                  <p class="mb-3">
                    Thank you for visiting my site. If you'd like to get in touch, please fill in the form provided and I will get back to you as soon as possible.
                  </p>
                  <form action="https://emailed.zibbytechnology.ddns.net/email" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="to_address" value="zibby@zibby.technology">
                    <input type="hidden" name="redirect" value="https://lauren.zibbytechnology.ddns.net/contact.html">
                    <div class="form-group">
                      <label for="input-email">Your email address</label>
                      <input type="email" class="form-control" id="input-email" placeholder="name@example.com" required="" name="client">
                    </div>
                    <div class="form-group">
                      <label for="input-text">Your Message</label>
                      <textarea class="form-control" id="input-text" rows="3" required="" name="message" style="margin-top: 0px; margin-bottom: 0px; height: 79px;"></textarea>
                    </div>
                    <div class="form-group">
                      <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" />
                      <button type="submit" class="btn btn-submit">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
            <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
            <script src="js/plugins.js"></script>
            <script src="js/main.js"></script>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

            <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
            <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
              function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
            </script>
          </body>
          </html>