<!doctype html>
<html>
    <head>
        <title>Inscription</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="css/login.css">
        
    </head>

    <body>
        <div class="form-row" >
            <div class="col">
                <img id ="imgLogoBienvenue"src="/image/welcom.png" class=" rounded mx-auto d-block font-weight-normal"/>
            </div>
            
            <div class="col">
                <form method="POST" action="{{route('loginPage.log')}}" >
                @csrf
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            Vous n'avez pas pu être authentifié &#9785;
                        </div>
                    @endif
                    <div id="spacer" style="margin-bottom: 20px;"></div> 
                    <img id ="imgLogoLogin"src="/image/Logo.png" class="my-0 mr-md-auto font-weight-normal"/>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" aria-describedby="email_feedback" class="form-control "> 
                        @error('email')
                        <div id="email_feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password"  aria-describedby="password_feedback" class="form-control ">  
                        @error('password')
                        <div id="password_feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary" id ="bntSubmit">Connecter </button>
                </form>
            </div>
        </div>
    </body>
</html>