@extends('aBaseAdmine')

@section('title')
Accueil 
@endsection

@section('content')
<div id="Together"class="container " >

    <img id ="imgLogoBackAcc"src="/image/LogoBack.png" class=" rounded mx-auto d-block font-weight-normal"/>
    
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
<div id="spacer" style="margin-bottom: 140px;"></div>
@endsection