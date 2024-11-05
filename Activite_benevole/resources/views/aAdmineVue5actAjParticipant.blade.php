@extends('aBaseAdmine')


@section('title')
Liste des Participant

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

    <div id="ActiviteDivBnvPage5"class="container" >              
                                           
   
            <div class="container">   
                <div  class="AdmineDivBnvPage5">    
                    
                    <p>{{ $Activite['DiscrAct'] }}<br>
                        la date  {{ $Activite['DateAct'] }}<br>
                        l'heure du début {{ $Activite['HeureD'] }}<br>
                        l'heure de fin  {{ $Activite['HeureF'] }}</p>                   
                </div> 

            </div> 


        
        <div id="spacer" style="margin-bottom: 30px;"></div>
    </div> 

    


<div id="SeniorPage"class="container-fluid" >
                     
    <div  class="tableDispo">
        <table class="table table-hover table-primary">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Réponse</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($BenevoleParticipes as $BenevoleParticipe)
                    <tr>
                        <td>{{ $BenevoleParticipe['IdBnv'] }}</td>
                        <td>{{ $BenevoleParticipe['NomBnv'] }}</td>
                        <td>{{ $BenevoleParticipe['PrenomBnv'] }}</td>
                        <td>{{ $BenevoleParticipe['Etat'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
</div> 



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
                    
                    <p>{{ $Benevole[0]['IdBnv'] }}<br>
                     {{ $Benevole[0]['Civility'] }}<br>
                    Nom: {{ $Benevole[0]['NomBnv'] }}<br>
                    Prenom:{{ $Benevole[0]['PrenomBnv'] }}<br>
                    Date de naissance: {{ $Benevole[0]['Birthday'] }}<br>
                    Adresse: {{ $Benevole[0]['Rue'] }}
                     {{ $Benevole[0]['CP'] }}<br>
                    Numéro Télephone: {{ $Benevole[0]['TelBnv'] }}</p>  
                    
                    @if($Benevole[0]['PermisB']=='possession')
                        <p> Permis B </p>
                    @endif
                </div> 
            </div> 
                <div class="col">
                    <img id ="imgLogoBackActivite"src="/image/LogoBack.png" class=" rounded mx-auto d-block font-weight-normal"/> 
                </div> 
                <div  id= "divMissionReponse"class="col">   
                    <form method="POST" action="{{route('aAdmineVue5actAjParticipant.post')}}">
                        @csrf
                        <input type="hidden" name="IdAct" value="{{ $Activite['IdAct'] }}">       
                        <button type="submit" name = "IdBnv"class="btnAjouterBnv" value ="{{ $Benevole[0]['IdBnv'] }}"href="{{route('aAdmineVue5actAjParticipant.post')}}">Affecter</button>
                            
                    </form>
      
                    <form method="POST" action="{{route('aAdmineVue5actSupParticipant.post')}}">
                        @csrf
                        <input type="hidden" name="IdAct" value="{{ $Activite['IdAct'] }}"> 
                        <button  type="submit" name = "IdBnv"class="btnParticipant " value ="{{ $Benevole[0]['IdBnv'] }} " href="{{route('aAdmineVue4actParticipant.show',['IdAct'=>$Activite['IdAct']])}}">Retirer</button>
                            
                    </form>
                </div> 

            </div> 

        </div>
        <div id="spacer" style="margin-bottom: 30px;"></div>
    </div> 
@endforeach
@endforeach
@endsection

