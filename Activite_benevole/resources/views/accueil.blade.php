@extends('baseAccueil')

@section('title')
Accueil Bénévole
@endsection

@section('content')
<div id="Together"class="container " >

    <img id ="imgLogoBack"src="/image/LogoBack.png" class=" rounded mx-auto d-block font-weight-normal"/>
    
    <div id ="descrptionA">
        <h1 id="descrptionTitre">
            Together  
        </h1>
    
        <p class="descriptionText" >
        
            Être bénévole, c’est défendre une cause et découvrir de nouveaux horizons. C’est aussi partager ses compétences et en acquérir de nouvelles. Ensemble nous avons la capacité de faire changer les choses et d’apporter des solutions. Rejoignez-nous pour 
        </p>

        <ul class="descriptionText " style="list-style-position: inside;">
            <li>Aide Aux séniors</li>
            <li>Entraide scolaire amicale</li>
            <li>Distribution alimentaire</li>
        </ul>
    </div>    
</div>

<div id="spacer" style="margin-bottom: 80px;"></div>


<div id="Together"class="container " >
    <img id ="imgLogoBack"src="/image/LogoBack.png" class=" rounded mx-auto d-block font-weight-normal"/>
    <img id ="imgSenior"src="/image/senior.png" class=" rounded mx-auto d-block font-weight-normal"/> 

    <div id ="divTitreAct">
        <h1 id="descrptionTitre">
            Aide aux séniors
        </h1>
    </div> 

    <div id ="descrption">
        <h1 id="descrptionTitre">
            Pour aider qui ?
        </h1>
        
        <p class="descriptionTextS" >
            Une personne âgée est par définition un homme ou une femme dont l’âge est avancé. D’après l’OMS, on est considéré comme « âgé » à l‘âge de 60 ans. Ces individus ont généralement des problèmes physiques ou psychologiques plus ou moins avancés au fil de l’âge.
        </p>
        <a class="leLien p-2 text-primary" href="/activiteSenior">Lire la suite</a>
    </div>    
</div>

<div id="spacer" style="margin-bottom: 80px;"></div>


<div id="Together"class="container " >
    <img id ="imgLogoBack"src="/image/LogoBack.png" class=" rounded mx-auto d-block font-weight-normal"/>
    <img id ="imgScolaire"src="/image/Scolaire.jpg" class=" rounded mx-auto d-block font-weight-normal"/> 

    <div id ="divTitreAct">
        <h1 id="descrptionTitre">
            Entraide Scolaire Amicale
        </h1>
    </div> 

        <div id ="descrption">

            <h1 id="descrptionTitre">
                Pour aider qui ?

            </h1>
        
            <p class="descriptionTextS" >
                Tous les élèves n’ont pas les mêmes chances de réussir à l’école. Pour certains, un coup de pouce est indispensable pour l’aide aux devoirs et l’accompagnement scolaire, notamment pour celles et ceux qui sont issus de quartiers défavorisés et de famille en difficulté.
            </p>
            <a class="leLien p-2 text-primary" href="/activiteScolaire">Lire la suite</a>
    </div>    
    
</div>  

<div id="spacer" style="margin-bottom: 80px;"></div>


<div id="Together"class="container " >
    <img id ="imgLogoBack"src="/image/LogoBack.png" class=" rounded mx-auto d-block font-weight-normal"/>
    <img id ="imgAlimentaire"src="/image/alimentaire.png" class=" rounded mx-auto d-block font-weight-normal"/> 

    <div id ="divTitreAct">
        <h1 id="descrptionTitre">
            Distribution alimentaire
        </h1>
    </div> 

    <div id ="descrption">
        <h1 id="descrptionTitre">
            Pour aider qui ?
        </h1>
        
        <p class="descriptionTextS" >
            L’aide alimentaire permet à de nombreuses personnes et familles avec de très faibles revenus d’obtenir un repas d’urgence, des tickets ou des chèques alimentaires afin de se nourrir, mais également d’acheter des ressources de première nécessité (hygiène, couches pour bébé…).
        </p>
        <a class="leLien p-2 text-primary" href="/activiteAlimentaire">Lire la suite</a>
    </div>
</div>  
<div id="spacer" style="margin-bottom: 80px;"></div>
@endsection