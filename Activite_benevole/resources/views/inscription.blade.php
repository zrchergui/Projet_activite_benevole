<!doctype html>
<html>
    <head>
    <title>Inscription</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/inscription.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/mon_fichier_js.js') }}"></script>
       
    </head>


    <body>
        <div id="spacer" style="margin-bottom: 80px;"></div>

            <form method="POST" action="{{route('inscription.store')}}">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-secondary">
                    Attention, il manque des données. &#9785;
                    </div>  
                @endif
                <div id="SeniorPage"class="container-fluid" >
                    <img id ="imgLogoBack"src="/image/LogoBack.png" class=" rounded mx-auto d-block font-weight-normal"/>
                    <div id ="Titre">
                        <h1 id="descrptionTitre">
                            Information personnel
                        </h1>
                    </div> 
                    
                    <div id="formulaireInscription" class="container-fluid">
                               
                                <div>
                                    <h5>Civilité :*</h5>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" id="Civility" name="Civility" value="Monsieur">
                                        <label for="Civility"> Mr</label>

                                        <input type="radio" id="Civility" name="Civility" value="Madame">
                                        <label for="Civility"> Mme</label>

                                    </div>
                                    @error('Civility')
                                     <div  class="error-message ">{{ $message }}</div>
                                    @enderror

                                </div>
                                
                        <div class="form-row" >
                                <div class="col">
                                    <label for="firstName">Prénom*</label>
                                    <input type="text" id="firstName" name="firstName" class="form-control" placeholder="Prénom" value="{{ old('firstName') }}" minlength="3" required>
                                    @error('firstName')
                                    <label for="firstName"class="col error-message ">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="col">
                                    <label for="lastName">Nom*</label>
                                    <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Nom" value="{{ old('lastName') }}" minlength="3" required>
                                    @error('lastName')
                                    <label  for="lastName" class="col error-message ">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="col">
                                    <label for="birthdayDate">Date de naissance*</label>
                                    <input type="date" id="birthdayDate" name="birthdayDate" class="form-control" placeholder="Date de naissance" value="{{ old('birthdayDate') }}" required>
                                    @error('birthdayDate')
                                    <label  for="birthdayDate" class="col error-message ">{{ $message }}</label >
                                    @enderror
                                </div>
                        </div>
                        <div class="form-row" >



                        </div>
                        <div class="form-row">
                                <div class="col">
                                    <label for="adresse">Adresse*</label>
                                    <input type="text" id="adresse" name="adresse" class="form-control" placeholder="Adresse" value="{{ old('adresse') }}" required>
                                    @error('adresse')
                                    <label for="adresse"  class="col-8 error-message ">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="col form-group">
                                    <label for="codePostal">Code Postal*</label>
                                    <select class="form-control" id="codePostal" name ='codePostal' >
                                        @foreach ($CPS as $CP )
                                        <option>{{$CP['CP']}}</option>
                                        @endforeach
                                    </select>                                   
                                    @error('codePostal')
                                    <label for="codePostal"  class="col-5 error-message ">{{ $message }}</label>
                                    @enderror
                                </div>
                               <!-- <div class="col">
                                    <label for="ville">Ville</label>
                                    <input type="text" id="ville" name="ville" class="form-control"  value="{{ $CP['Ville'] }}" disabled>
                                </div>-->
                                <div class="col">
                                    <label for="telephone">Téléphone*</label>
                                    <input type="text" id="telephone" name="telephone" class="form-control" placeholder="Téléphone" value="{{ old('telephone') }}" required>                               
                                    @error('telephone')
                                    <label for="telephone"  class="col error-message ">{{ $message }}</label>
                                    @enderror
                                </div>
                        </div>
                        <div class="form-row" >

                        </div>
                        <div class="form-row">

                                <div class="col">
                                    <label for="inputEmail">Email*</label>
                                    <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email"value="{{ old('inputEmail') }}">
                                    @error('inputEmail')
                                    <label for="inputEmail"  class="col error-message ">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="inputEmailC">Email (confirmation)</label>
                                    <input type="email" id="inputEmailC" name="inputEmailC" class="form-control" placeholder="Email" oncut="return false" oncopy="return false" onpaste="return false">
                                    @error('inputEmailC')
                                    <label for="inputEmailC"  class="col error-message ">{{ $message }}</label>
                                    @enderror
                                </div>
                        </div>
                        <div class="form-row" >


                        </div>
                        <div class="form-row">
                                <div class="col-4">
                                    <label for="inputPassword">Mot de passe*</label>
                                    <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Mot de passe">
                                    @error('inputPassword')
                                    <label for="inputPassword"  class="col error-message ">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="col-4">
                                    <label for="inputPasswordC">Mot de passe (confirmation)</label>
                                    <input type="password" id="inputPasswordC" name="inputPasswordC"class="form-control" placeholder="Mot de passe" oncut="return false" oncopy="return false" onpaste="return false">
                                    @error('inputPasswordC')
                                    <label for="inputPasswordC"  class="col error-message ">{{ $message }}</label>
                                    @enderror
                                </div>
                        </div>


                        <div class="form-group">
                            <div class="form-check">
                                <input name="PermisB" class="form-check-input" type="checkbox" id="PermisB" value="possession">
                                <label class="form-check-label" for="PermisB" >
                                    Permis B
                                </label>
                             </div>
                        </div>
                        
                    </div>
                </div> 
                <div id="spacer" style="margin-bottom: 80px;"></div>
                <div id="SeniorPage"class="container-fluid" >
                    <img id ="imgLogoBack"src="/image/LogoBack.png" class=" rounded mx-auto d-block font-weight-normal"/>
                    <div id ="Titre">
                        <h1 id="descrptionTitre">
                            Vos Disponibilités*
                        </h1>
                    </div> 
                    <div id="formulaireInscription" class="container-fluid">
                         @error('jourSelectionne')
                        <div  id="div-error-message" class="col error-message ">{{ $message }}</div>
                         @enderror

                        <div class="form-row">
                                <div class="col ">
                                    <label for="jourLundi" class="lableJour"><p class="lableJourText">Lundi</p></label>
                                    <select   class="slectClass " name="jourLundi" id="jourLundi">
                                            <option selected></option>
                                            <option value="Matin" class="jourOption">Matin</option>
                                            <option value="Apres Midi" class="jourOption">Apres Midi</option>
                                            <option value="Soir" class="jourOption">Soir</option>
                                    
                                        </select>
                                </div>
                                <div class="col ">
                                    <label for="jourMardi" class="lableJour"><p class="lableJourText">Mardi</p></label>
                                    <select   class="slectClass" name="jourMardi" id="jourMardi">
                                            <option selected></option>
                                            <option value="Matin" class="jourOption">Matin</option>
                                            <option value="Apres Midi" class="jourOption">Apres Midi</option>
                                            <option value="Soir" class="jourOption">Soir</option>
                                    
                                        </select>
                                </div>
                                <div class="col ">
                                    <label for="jourMercredi" class="lableJour"><p class="lableJourText">Mercredi</p></label>
                                    <select   class="slectClass" name="jourMercredi" id="jourMercredi">
                                            <option selected></option>
                                            <option value="Matin" class="jourOption">Matin</option>
                                            <option value="Apres Midi" class="jourOption">Apres Midi</option>
                                            <option value="Soir" class="jourOption">Soir</option>
                                    
                                        </select>
                                </div>
                                <div class="col ">
                                    <label for="jourJeudi" class="lableJour"><p class="lableJourText">Jeudi</p></label>
                                    <select   class="slectClass" name="jourJeudi" id="jourJeudi">
                                            <option selected></option>
                                            <option value="Matin" class="jourOption">Matin</option>
                                            <option value="Apres Midi" class="jourOption">Apres Midi</option>
                                            <option value="Soir" class="jourOption">Soir</option>
                                    
                                        </select>
                                </div>
                                <div class="col ">
                                    <label for="jourVendredi" class="lableJour"><p class="lableJourText">Vendredi</p></label>
                                    <select   class="slectClass" name="jourVendredi" id="jourVendredi">
                                            <option selected></option>
                                            <option value="Matin" class="jourOption">Matin</option>
                                            <option value="Apres Midi" class="jourOption">Apres Midi</option>
                                            <option value="Soir" class="jourOption">Soir</option>
                                    
                                        </select>
                                </div>
                                <div class="col ">
                                    <label for="jourSamedi" class="lableJour"><p class="lableJourText">Samedi</p></label>
                                    <select   class="slectClass" name="jourSamedi" id="jourSamedi">
                                            <option selected></option>
                                            <option value="Matin" class="jourOption">Matin</option>
                                            <option value="Apres Midi" class="jourOption">Apres Midi</option>
                                            <option value="Soir" class="jourOption">Soir</option>
                                    
                                        </select>
                                </div>
                                <div class="col ">
                                    <label for="jourDimanche" class="lableJour"><p class="lableJourText">Dimanche</p></label>
                                    <select   class="slectClass" name="jourDimanche" id="jourDimanche">
                                            <option selected></option>
                                            <option value="Matin" class="jourOption">Matin</option>
                                            <option value="Apres Midi" class="jourOption">Apres Midi</option>
                                            <option value="Soir" class="jourOption">Soir</option>
                                    
                                        </select>
                                </div>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary" id ="bntSubmit">Valider</button>
                </div> 
            </form>
        </div>

        <div id="spacer" style="margin-bottom: 80px;"></div>

    </body>
</html>