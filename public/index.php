<?php
    require_once '../vendor/autoload.php';
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: *");


    use App\core\Controller;


    if (isset($_REQUEST) && !empty($_REQUEST)) {
      
       $start = new Controller($_REQUEST);
       echo $start->run();

    }

    $url = substr($_SERVER["REQUEST_URI"], -7);
    if($url == "public/") {
      ?>

      
      <!DOCTYPE html>
         <html>
         <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width,initial-scale=1.0">

         <title>santri</title>

         <link rel="stylesheet" href="static/css/w3.css">
         <link rel="stylesheet" href="static/css/santri.css">
         <link rel="stylesheet" href="static/css/toastr.css">
         <link rel="stylesheet" href="static/css-awesome/brands.css">
         <link rel="stylesheet" href="static/css-awesome/fontawesome.css">
         <link rel="stylesheet" href="static/css-awesome/regular.css">
         <link rel="stylesheet" href="static/css-awesome/solid.css">
         <link rel="stylesheet" href="static/css-awesome/svg-with-js.css">
         <link rel="stylesheet" href="static/css-awesome/v4-shims.css">
         

         <style>
            #login {
            max-width: 95%;
            margin: auto;
            width: 380px;
            margin-top: 5%;
            }

            #logo-cliente {
            max-width: 100%;
            margin: auto;
            width: 700px;    
            }

            #logo-santri {
            max-width: 50%;
            margin: auto;
            width: 380px;    
            }

            #loginReturn {
            color: red;
            }

      
    </style>

  </head>
  <body>
    <script src="static/js/jquery.js"></script>

    <div  id="login">
      <img id="logo-cliente" class="w3-margin-top" src="static/imagens/logo_cliente.jpg"/>
      <input id="loginValue" value="" class="w3-input w3-border w3-margin-top" type="text" placeholder="Usuário">
      <input id="passwordValue" value="" class="w3-input w3-border w3-margin-top" type="password" placeholder="Senha">
      <div id="loginReturn">
        
      </div>
      <button onclick="loginApi()" class="w3-button w3-theme w3-margin-top  w3-block">Logar</button>
      
      <a  target="_blank" href="https://www.santri.com.br/">
        <img id="logo-santri" class="w3-right w3-margin-top" src="static/imagens/logo_santri.svg"/>
      </a>
    </div>
    
    
    <script  type="text/javascript" src="static/js/service.js"></script>
  </body>
</html>

<?php
    }

    ?>

