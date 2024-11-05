@extends('baseAccueil')

@section('title')
Entraide Scolaire Amicale
@endsection

@section('content')
<div id="SeniorPage"class="container-fluid" >
    <img id ="imgLogoBack"src="/image/LogoBack.png" class=" rounded mx-auto d-block font-weight-normal"/>
    <img id ="imgHappySenior"src="/image/kidsLearning.jpg" class=" rounded mx-auto d-block font-weight-normal"/> 

    <div id ="divTitreAct">
        <h1 id="descrptionTitre">
        Entraide Scolaire Amicale

        </h1>
    </div> 

    <div id ="descrptionPageSenior">
        <h1 id="descrptionTitre">
            Pour aider qui ?
        </h1>
        
        <p class="descriptionTextS" >
                Tous les élèves n’ont pas les mêmes chances de réussir à l’école. Pour certains, un coup de pouce est indispensable pour l’aide aux devoirs et l’accompagnement scolaire, notamment pour celles et ceux qui sont issus de quartiers défavorisés et de famille en difficulté.
        </p>
        
    </div>    

    <div id ="descrptionMission">
        <h1 id="descrptionTitreMission">
            Notre Mission
        </h1>
        

            <ol class="descriptionTextMission" >
            
                <li>Accompagner l’enfant dans son parcours scolaire</li>
                <ul> 
                    <li> Lui redonner confiance et envie d’apprendre</li>
                    <li> L’aider à revoir les bases et à acquérir une méthode de travail</li>
                    <li> Lui permettre d’être acteur de son orientation</li>
                </ul>
                <li>  Ouvrir l’enfant au monde qui l’entoure et élargir le champ des possibles</li>
                <ul> 
                        <li> Par des échanges et des sorties individuelles ou collectives, le sensibiliser à la culture, à la citoyenneté, à l’actualité et au monde de l’entreprise</li>
                        <li> Lui faire découvrir les lieux ressources de son quartier et les activités proposées</li>
                </ul>
                <li>  Aider les parents à s’impliquer dans la scolarité de leur enfant et faciliter les relations parents-école</li>
                <ul> 
                        <li> Grâce à l’intervention au domicile, échanger avec les parents en fin de séance</li>
                        <li> Rencontrer les enseignants avec les parents et l’enfant pour accompagner au mieux l’enfant</li>
                        <li> Permettre aux parents d’échanger entre eux lors de temps type café des parents</li>
                </ul>
            </ol>
    </div>    
</div>

<div id="spacer" style="margin-bottom: 80px;"></div>
@endsection