<!doctype html>
<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="css/app.css">
 
    </head>


    <body>
        <nav id ="navtop"class="navbar navbar-expand-sm #0d6efd  border-bottom shadow-sm p-3 px-md-4 mb-3 fixed-top  ">
                <div class="container-fluid align-items-center d-flex flex-column flex-md-row">
                    <img id ="imgLogo"src="/image/Logo.png" class="my-0 mr-md-auto font-weight-normal"/>

                    <a class="btnDevBnv rounded-circle "href="{{route('inscription.show')}}">Devenir Benévole</a>
                    <a class="btnEspBnv rounded-circle" href="{{route('loginPage.show')}}">Espace Benévole</a>
                    
            
                </div>
        </nav>
        <div  style="margin-top:160px">
            @yield('content')
        </div>

        <nav id ="navBot"class="navbar navbar-expand-sm #0d6efd  ">
            <div class="container-fluid align-items-center d-flex flex-column flex-md-row">
                <img id ="imgLogo"src="/image/Logo.png" class="my-0 mr-md-auto font-weight-normal"/>
                
                <div class="d-flex align-items-end flex-column bd-highlight mr-md-auto ">
                    <a href="https://www.facebook.com/"><img id ="imgLogoFb"src="/image/Resaux.png" class="my-0 mr-md-auto font-weight-normal"/></a>
                </div>
                <div class="d-flex align-items-end flex-column bd-highlight mb-3">
                        <a class="p-0 text-dark" href="/accueil">à propos de nous </a>
                        <a class="p-0 text-dark" href="#">Together@gmail.com </a>
                        <a class="p-0 text-dark" href="#" >0777777777 </a>
                </div>
             </div>                               
        </nav>

        
    </body>
</html>

 