<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  require 'php/obliczenia.php';
  require 'php/db.php';

  $abc=obliczenia();
  $a=$abc['a']; 
  $b=$abc['b']; 
  $c=$abc['c'];
  $error=$abc['e'];
  save($abc);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Php calculator logging requests into database.</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      .img-responsive {
        margin-bottom: 10px;
      }
      .show-grid {
        margin-bottom: 15px;
      }
      .show-grid [class^="col-"] {
        padding-top: 10px;
        padding-bottom: 10px;
        background-color: #eee;
        border: 1px solid #ddd;
        background-color: rgba(170, 141, 207, 0.5);;
        border: 1px solid rgba(86,61,124,.2);
      }
    </style>
  </head>
  <body>

    <form method="POST">
        <div class="container">
            <h1>Wybierz dwie liczby i wykonaj na nich działanie!</h1>
             <div class="row">
               <div class="col-md-4 col-sm-6 col-xs-12">
                 <!-- <div class="form-group has-success has-feedback"> -->
                 <div class="form-group has-feedback">
                   <label class="control-label" for="inputSuccess2">Liczba 1</label>
                   <input type="text" class="form-control" id="inputSuccess2" value='<?php echo $a; ?>' name="a">
                   <!-- <span class="glyphicon glyphicon-ok form-control-feedback"></span> -->
                 </div>
               </div>
               <div class="col-md-4 col-sm-6 col-xs-12">
                 <div class="form-group has-feedback">
                   <label class="control-label" for="inputWarning2">Liczba 2</label>
                   <input type="text" class="form-control" id="inputWarning2" value='<?php echo $b; ?>' name="b">
                 </div>
               </div>
               <div class="col-md-4 col-sm-12 col-xs-12">
                 <div class="form-group has-feedback">
                   <label class="control-label" for="inputError2">Wynik</label>
                   <input type="text" class="form-control" id="inputError2" disabled value='<?php echo $c; ?>'>
                 </div>               
               </div>
           </div>
          </div>

         <div class="container">
                <h1 class="text-center">Przyciaski</h1>
                             <!-- <div class="row"> -->
                   <!-- <div class="col-md-4 col-sm-6 col-xs-12"> -->
                  <p class="text-center">
                    <input class="btn btn-lg btn-primary" type="submit" value='Suma' name="sum">
                    <input class="btn btn-lg" type="submit" value='Różnica' name="diff">
                  </p>
        </div>
    </form>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>