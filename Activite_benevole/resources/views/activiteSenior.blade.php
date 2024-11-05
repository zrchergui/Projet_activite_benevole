@extends('baseAccueil')

@section('title')
Aide aux séniors
@endsection

@section('content')
<div id="SeniorPage"class="container-fluid" >
    <img id ="imgLogoBack"src="/image/LogoBack.png" class=" rounded mx-auto d-block font-weight-normal"/>
    <img id ="imgHappySenior"src="/image/HappySenior.jpg" class=" rounded mx-auto d-block font-weight-normal"/> 

    <div id ="divTitreAct">
        <h1 id="descrptionTitre">
            Aide aux séniors
        </h1>
    </div> 

    <div id ="descrptionPageSenior">
        <h1 id="descrptionTitre">
            Pour aider qui ?
        </h1>
        
        <p class="descriptionTextS" >
            Une personne âgée est par définition un homme ou une femme dont l’âge est avancé. D’après l’OMS, on est considéré comme « âgé » à l‘âge de 60 ans. Ces individus ont généralement des problèmes physiques ou psychologiques plus ou moins avancés au fil de l’âge.
        </p>
        
    </div>    

    <div id ="descrptionMission">
        <h1 id="descrptionTitreMission">
            Notre Mission
        </h1>
        
        <p class="descriptionTextMission" >
            Votre rôle est de tenir compagnie aux personnes âgées, d’apporter votre sourire et votre bonne humeur pour passer de bons moments, tout en étant à leur écoute afin d’apprendre d’eux. vous n’êtes pas un professionnel de l’aide à la personne, vous n’aurez donc pas d’aide à la toilette ou de soins à apporter aux personnes âgées. Vous ne faites pas “à la place de” mais “avec” votre sénior qui veut rester autonome.

        </p>
            <ul class="descriptionTextMission" >Exemple des tâches.
               <li> Accompagner une personne dans la réalisation des taches quotidienne.</li>
               <li>  Aller faire les courses ensemble.</li>
               <li> Effectuer les tâches administratives.</li>
               <li> Préparer des repas simples.</li>
               <li> Accompagner une personne dans ses sorties en toute sécurité.</li>
            </ul>
    </div>    
</div>

<div id="spacer" style="margin-bottom: 80px;"></div>
@endsection