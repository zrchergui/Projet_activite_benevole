@extends('aBaseAdmine')

@section('title')
Liste des activités
@endsection

@section('content')
<div id="spacer" style="margin-bottom: 80px;"></div>
<div class="container-fluid">
    <h1 id="descrptionTitre">
        Liste des activités
    </h1>
</div>  

<div id="divAjouterMis" >   
    <form >
                   
        <a type="submit" name = "Accepter"id="btnAjouterMis" value="Accepter" href="{{route('aAdmineVue3actAjouter.show')}}"> Ajouter une activité</a>
            
    </form>
</div>


<div id="spacer" style="margin-bottom: 40px;"></div>  
@foreach ($Activites as $Activite)

    <div id="ActiviteDivBnvPage"class="container-fluid" >              
        <div class="form-row">                                   
   
            <div class="col">   
                <div  class="AdmineDivBnv">    
                    
                    <p>{{ $Activite['DiscrAct'] }}<br>
                        la date  {{ $Activite['DateAct'] }}<br>
                        l'heure du début {{ $Activite['HeureD'] }}<br>
                        l'heure de fin  {{ $Activite['HeureF'] }}</p>                   
                </div> 

            </div> 
            <div class="col-9">
                <img id ="imgLogoBackActivite"src="/image/LogoBack.png" class=" rounded mx-auto d-block font-weight-normal"/> 
            </div> 
            <div  id= "divMissionReponse"class="col">   
                <form >
                                
                    <a type="submit" name = "Accepter"class="btnAjouterBnv" href="{{route('aAdmineVue5actAjParticipant.show',['IdAct'=>$Activite['IdAct']])}}">Ajouter des bénévole</a>
                        
                </form>
  
                <form >
                                
                    <a type="submit" name = "Accepter"class="btnParticipant "  href="{{route('aAdmineVue4actParticipant.show',['IdAct'=>$Activite['IdAct']])}}">Participant</a>
                        
                </form>
            </div> 
        </div>
        <div id="spacer" style="margin-bottom: 30px;"></div>
    </div> 
@endforeach
@endsection