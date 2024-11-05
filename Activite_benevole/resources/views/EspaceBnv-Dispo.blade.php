@extends('BaseEspaceBnv')

@section('title')
Bénévole Disponibilités
@endsection

@section('content')

        

        <form method="POST" action="{{route('EspaceBnv-Dispo.store')}}">
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


            <div id="SeniorPage"class="container-fluid" >
                    
                    <div >
                        <h1 id="descrptionTitre">
                            Vos Disponibilités
                        </h1>
                    </div> 
                    <div  class="tableDispo">
                        <table class="table table-hover table-primary">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Jour</th>
                                    <th>Partie du jour</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dispos as $dispo)
                                    <tr>
                                        <td>{{ $dispo['Jour'] }}</td>
                                        <td>{{ $dispo['PartieduJour'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
            </div> 


            <div id="spacer" style="margin-bottom: 80px;"></div>



            <div id="SeniorPage"class="container-fluid" >
                <img id ="imgLogoBack"src="/image/LogoBack.png" class=" rounded mx-auto d-block font-weight-normal"/>
                <div id ="Titre">
                    <h1 id="descrptionTitre">
                        Ajouter ou supprimer une disponibilité
                    </h1>
                </div> 
                <div id="formulaireInscription" class="container-fluid">
                     @error('jourSelectionne')
                    <div  id="div-error-message" class="col error-message ">{{ $message }}</div>
                     @enderror

                    <div class="form-row">
                            <div class="col ">
                                <div class="form-group">
                                    <label for="jourLundi" class="lableJour"><p class="lableJourText">Jour</p></label>
                                    <div   class="slectClass " name="jourLundi" id="jourLundi">
                                     Matin
                                    </div>
                                    <div   class="slectClass " name="jourLundi" id="jourLundi">
                                        Apres Midi
                                    </div>                                    
                                    <div   class="slectClass " name="jourLundi" id="jourLundi">
                                        Soir
                                    </div>
                                
                                </div>
                            </div>
                            <div class="col ">
                                <div class="form-group">
                                    <label for="jourLundi" class="lableJour"><p class="lableJourText">Lundi</p></label>
                                    <select   class="slectClass " name="jourLundiMatin" id="jourLundi">
                                        <option selected></option>
                                        <option value="Disponible" class="jourOption">Disponible</option>
                                        <option value="Indisponible" class="jourOption">Indisponible</option>                                    
                                    </select>
                                    
                                    <select   class="slectClass " name="jourLundiApresMidi" id="jourLundi">
                                        <option selected></option>
                                        <option value="Disponible" class="jourOption">Disponible</option>
                                        <option value="Indisponible" class="jourOption">Indisponible</option>                                   
                                    </select>
                                   
                                    <select   class="slectClass " name="jourLundiSoir" id="jourLundi">
                                        <option selected></option>
                                        <option value="Disponible" class="jourOption">Disponible</option>   
                                        <option value="Indisponible" class="jourOption">Indisponible</option>
                                    
                                    </select>
                                </div>


                            </div>
                            <div class="col ">
                                <label for="jourMardi" class="lableJour"><p class="lableJourText">Mardi</p></label>
                                <select   class="slectClass" name="jourMardiMatin" id="jourMardi">
                                    <option selected></option>
                                    <option value="Disponible" class="jourOption">Disponible</option>   
                                    <option value="Indisponible" class="jourOption">Indisponible</option>                              
                                </select>
                                
                                <select   class="slectClass" name="jourMardiApresMidi" id="jourMardi">
                                    <option selected></option>
                                    <option value="Disponible" class="jourOption">Disponible</option>   
                                    <option value="Indisponible" class="jourOption">Indisponible</option>                                
                                </select>
                               
                                <select   class="slectClass" name="jourMardiSoir" id="jourMardi">
                                    <option selected></option>
                                    <option value="Disponible" class="jourOption">Disponible</option>   
                                    <option value="Indisponible" class="jourOption">Indisponible</option>
                                
                                </select>
                            </div>
                            <div class="col ">
                                <label for="jourMercredi" class="lableJour"><p class="lableJourText">Mercredi</p></label>
                                <select   class="slectClass" name="jourMercrediMatin" id="jourMercredi">
                                    <option selected></option>
                                    <option value="Disponible" class="jourOption">Disponible</option>   
                                    <option value="Indisponible" class="jourOption">Indisponible</option>                                
                                </select>
                                
                                <select   class="slectClass" name="jourMercrediApresMidi" id="jourMercredi">
                                    <option selected></option>
                                    <option value="Disponible" class="jourOption">Disponible</option>   
                                    <option value="Indisponible" class="jourOption">Indisponible</option>                               
                                </select>
                               
                                <select   class="slectClass" name="jourMercrediSoir" id="jourMercredi">
                                    <option selected></option>
                                    <option value="Disponible" class="jourOption">Disponible</option>   
                                    <option value="Indisponible" class="jourOption">Indisponible</option>
                                
                                </select>
                            </div>
                            <div class="col ">
                                <label for="jourJeudi" class="lableJour"><p class="lableJourText">Jeudi</p></label>
                                <select   class="slectClass" name="jourJeudiMatin" id="jourJeudi">
                                    <option selected></option>
                                    <option value="Disponible" class="jourOption">Disponible</option>   
                                    <option value="Indisponible" class="jourOption">Indisponible</option>                               
                                </select>
                                
                                <select   class="slectClass" name="jourJeudiApresMidi" id="jourJeudi">
                                    <option selected></option>
                                    <option value="Disponible" class="jourOption">Disponible</option>   
                                    <option value="Indisponible" class="jourOption">Indisponible</option>                            
                                </select>
                               
                                <select   class="slectClass" name="jourJeudiSoir" id="jourJeudi">
                                    <option selected></option>
                                    <option value="Disponible" class="jourOption">Disponible</option>   
                                    <option value="Indisponible" class="jourOption">Indisponible</option>
                                
                                </select>
                            </div>
                            <div class="col ">
                                <label for="jourVendredi" class="lableJour"><p class="lableJourText">Vendredi</p></label>
                                <select   class="slectClass" name="jourVendrediMatin" id="jourVendredi">
                                    <option selected></option>
                                    <option value="Disponible" class="jourOption">Disponible</option>   
                                    <option value="Indisponible" class="jourOption">Indisponible</option>                              
                                </select>
                                
                                <select   class="slectClass" name="jourVendrediApresMidi" id="jourVendredi">
                                    <option selected></option>
                                    <option value="Disponible" class="jourOption">Disponible</option>   
                                    <option value="Indisponible" class="jourOption">Indisponible</option>                                
                                </select>
                               
                                <select   class="slectClass" name="jourVendrediSoir" id="jourVendredi">
                                    <option selected></option>
                                    <option value="Disponible" class="jourOption">Disponible</option>   
                                    <option value="Indisponible" class="jourOption">Indisponible</option>
                                </select>
                            </div>
                            <div class="col ">
                                <label for="jourSamedi" class="lableJour"><p class="lableJourText">Samedi</p></label>
                                <select   class="slectClass" name="jourSamediMatin" id="jourSamedi">
                                    <option selected></option>
                                    <option value="Disponible" class="jourOption">Disponible</option>   
                                    <option value="Indisponible" class="jourOption">Indisponible</option>                               
                                </select>
                                
                                <select   class="slectClass" name="jourSamediApresMidi" id="jourSamedi">
                                    <option selected></option>
                                    <option value="Disponible" class="jourOption">Disponible</option>   
                                    <option value="Indisponible" class="jourOption">Indisponible</option>                                 
                                </select>
                               
                                <select   class="slectClass" name="jourSamediSoir" id="jourSamedi">
                                    <option selected></option>
                                    <option value="Disponible" class="jourOption">Disponible</option>   
                                    <option value="Indisponible" class="jourOption">Indisponible</option>
                                
                                </select>
                            </div>
                            <div class="col ">
                                <label for="jourDimanche" class="lableJour"><p class="lableJourText">Dimanche</p></label>
                                <select   class="slectClass" name="jourDimancheMatin" id="jourDimanche">
                                    <option selected></option>
                                    <option value="Disponible" class="jourOption">Disponible</option>
                                    <option value="Indisponible" class="jourOption">Indisponible</option>                                    
                                </select>
                                
                                <select   class="slectClass" name="jourDimancheApresMidi" id="jourDimanche">
                                    <option selected></option>
                                    <option value="Disponible" class="jourOption">Disponible</option>
                                    <option value="Indisponible" class="jourOption">Indisponible</option>                                   
                                </select>
                               
                                <select   class="slectClass" name="jourDimancheSoir" id="jourDimanche">
                                    <option selected></option>
                                    <option value="Disponible" class="jourOption">Disponible</option>   
                                    <option value="Indisponible" class="jourOption">Indisponible</option>
                                
                                </select>
                            </div>
                    </div>
                    
                </div>
                <button type="submit" class="btn btn-primary" id ="bntSubmit">Valider</button>
            </div> 
        </form>
 

@endsection