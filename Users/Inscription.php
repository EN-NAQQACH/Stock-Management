<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--boxixons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../Users/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body id="body-pd">



    <div class="login-form">
        <form action="" method="post">
            <div class="text-center">
                <a href="https://easly-informatique.business.site/" aria-label="Space">
                    <img class="mb-3" id="image" src="../Users/LOGO.png" alt="Logo" width="110" height="110">
                </a>
              </div>
            <div style="text-align: center;margin-bottom: 20px;">
                <h3 class="">Inscription</h3>
            </div>
         
            <div class="js-form-message mb-3">
                <div class="js-focus-state input-group form">
                  <div class="input-group-prepend form__prepend">
                    <span class="input-group-text form__text">
                      <i class="fa fa-user form__text-inner"></i>
                    </span>
                  </div>
                  <input type="email" class="form-control form__input" name="email" placeholder="Email" aria-label="Email" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success" >
                </div>
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>                    
                    </div>
                    <input type="password" class="form-control" name="password" placeholder="mot de passe">				
                </div>
                <span class="help-block"></span>
            </div> 
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>                    
                    </div>
                    <input type="password" class="form-control" name="password" placeholder="Répéter le mot de passe">				
                </div>
                <span class="help-block"></span>
            </div>        
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary login-btn btn-block">Inscription</button>
            </div>
            
            <div class="text-center mb-3">
                <p class="text-muted">Vous avez déjà un compte?<a href="Connexion.php"> Connexion</a></p>
            </div>
              <p class="small text-center text-muted mb-0">Tous droits réservés. © Espace. 2023 soengsouy.com.</p>
        </form>
    </div>
    


</body>
</html>