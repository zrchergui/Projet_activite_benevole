@extends('BaseEspaceBnv')

@section('title')
Bénévole Activités
@endsection

@section('content')
<div id="spacer" style="margin-bottom: 80px;"></div>
<div class="container-fluid">
    <h1 id="descrptionTitre">
        Vos Activités
    </h1>
</div>  



<div id="spacer" style="margin-bottom: 40px;"></div>  
@foreach ($Activites as $Activite)
@if($Activite['Etat']==null)
    <div id="ActiviteDivBnvPage"class="container-fluid" >              
        <div class="form-row">                                   

                <div class="col ">    
                    <div  id="ActiviteDivBnv">    
                        
                        <p>{{ $Activite['DiscrAct'] }}<br>
                        la date  {{ $Activite['DateAct'] }}<br>
                        l'heure du début {{ $Activite['HeureD'] }}<br>
                        l'heure de fin  {{ $Activite['HeureF'] }}</p>                    
                    </div> 
                </div>
                <div class="col ">
                    <img id ="imgLogoBackActivite"src="/image/LogoBack.png" class=" rounded mx-auto d-block font-weight-normal"/> 
                </div>
                <div  class="col">   
                    <form method="POST" action ="{{route('responseParticipation.post')}}">
                        @csrf
                        <input type="hidden" name="idAct" value="{{ $Activite['IdAct'] }}">
                        <button type="submit" name = "Accepter"class="btnDispoBnvAccepter rounded-circle" value="Accepter">Accepter</button>
                        <button type="submit" name = "Refuser" class="btnDispoBnvRefuser rounded-circle" value="Refuser">Refuser</button>
                    </form>
                </div> 
   
            
        </div>
    </div>
    <div id="spacer" style="margin-bottom: 30px;"></div> 
@else
<div id="ActiviteDivBnvPage"class="container-fluid" >              
    <div class="form-row">                                   

        <div class="col ">
            <div  id="ActiviteDivBnv">    
                
                <p>{{ $Activite['DiscrAct'] }}<br>
                la date  {{ $Activite['DateAct'] }}<br>
                l'heure du début {{ $Activite['HeureD'] }}<br>
                l'heure de fin  {{ $Activite['HeureF'] }} </p>                
            </div> 
        </div> 
        <div class="col ">
            <img id ="imgLogoBackActivite"src="/image/LogoBack.png" class=" rounded mx-auto d-block font-weight-normal"/>     
        </div> 
        @if( $Activite['Etat']== "Accepter")
            <div  id= "divMissionReponse"class="col">   
                    <label>Mission </label>            
                    <button type="submit" name = "Accepter"class="btndivMissionReponse " >Acceptée</button>                    
            </div> 
        @else
            <div  id= "divMissionReponse"class="col">   
                <label>Mission </label>            
                <button type="submit" name = "Accepter"class="btndivMissionReponseRefus" >Refusée</button>                    
            </div> 
        @endif
    </div>
</div> 
    
<div id="spacer" style="margin-bottom: 30px;"></div> 

@endif
@endforeach  
<div id="spacer" style="margin-bottom: 300px;"></div> 

      

@endsection