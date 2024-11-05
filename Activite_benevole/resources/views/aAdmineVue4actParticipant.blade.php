@extends('aBaseAdmine')


@section('title')
Liste des activités

@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/BaseespaceBnv.css') }}">
<div id="spacer" style="margin-bottom: 80px;"></div>
<div class="container-fluid">
    <h1 id="descrptionTitre">
        Activités
    </h1>
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


        </div>
        <div id="spacer" style="margin-bottom: 30px;"></div>
    </div> 

    
@endforeach

<div id="spacer" style="margin-bottom: 80px;"></div>
<div class="container-fluid">
    <h1 id="descrptionTitre">
        Liste des bénévoles 
    </h1>
</div>  



<div id="spacer" style="margin-bottom: 40px;"></div>  
@foreach ($Benevoles as $Benevole)

    <div id="ActiviteDivBnvPage"class="container-fluid" >              
        <div class="form-row">                                   
   
            <div class="col">   
                <div  class="AdmineDivBnv">    
                    
                    <p>{{ $Benevole['IdBnv'] }}<br>
                     {{ $Benevole['Civility'] }}<br>
                    Nom: {{ $Benevole['NomBnv'] }}<br>
                    Prenom:{{ $Benevole['PrenomBnv'] }}<br>
                    Date de naissance: {{ $Benevole['Birthday'] }}<br>
                    Adresse: {{ $Benevole['Rue'] }}
                     {{ $Benevole['CP'] }}<br>
                    Numéro Télephone: {{ $Benevole['TelBnv'] }}</p>  
                    
                    @if($Benevole['PermisB']=='possession')
                        <p> Permis B </p>
                    @endif
                </div> 

            </div> 
            <div class="col ">
                <div  class="AdmineDivBnv">  
                    <p>Mission :{{ $Benevole['Etat'] }}<br></p>
                </div >  
            </div> 
        </div>
        <div id="spacer" style="margin-bottom: 30px;"></div>
    </div> 
@endforeach
@endsection

