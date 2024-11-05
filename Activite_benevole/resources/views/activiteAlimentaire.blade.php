@extends('baseAccueil')

@section('title')
Distribution alimentaire
@endsection

@section('content')
<div id="SeniorPage"class="container-fluid" >
    <img id ="imgLogoBack"src="/image/LogoBack.png" class=" rounded mx-auto d-block font-weight-normal"/>
    <img id ="imgHappySenior"src="/image/foodDonation.jpg" class=" rounded mx-auto d-block font-weight-normal"/> 

    <div id ="divTitreAct">
        <h1 id="descrptionTitre">
            Distribution alimentaire
        </h1>
    </div> 

    <div id ="descrptionPageSenior">
        <h1 id="descrptionTitre">
            Pour aider qui ?
        </h1>
        
        <p class="descriptionTextS" >
         L’aide alimentaire permet à de nombreuses personnes et familles avec de très faibles revenus d’obtenir un repas d’urgence, des tickets ou des chèques alimentaires afin de se nourrir, mais également d’acheter des ressources de première nécessité (hygiène, couches pour bébé…).       
         </p>
        
    </div>    

    <div id ="descrptionMission">
        <h1 id="descrptionTitreMission">
            Notre Mission
        </h1>
        
        <p class="descriptionTextMission" >
            Plusieurs modes de distribution adaptés aux personnes accueillies, afin de répondre à ce besoin primaire, Les Restos du Cœur ont mis en place plusieurs types d’aides alimentaires.
        </p>
            <ul class="descriptionTextMission" >
               <li> La distribution de paniers-repas équilibrés, à cuisiner chez soi.</li>
               <li>  Une aide spécifique pour les bébés.</li>
               <li> Des repas chauds distribués dans la rue ou dans les centres pour ceux qui n’ont pas de toit.</li>
               


            </ul>
    </div>    
</div>

<div id="spacer" style="margin-bottom: 80px;"></div>
@endsection