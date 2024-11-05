@extends('BaseEspaceBnv')

@section('title')
Accueil Bénévole
@endsection

@section('content')
<div id="Together"class="container " >

    <img id ="imgLogoBack"src="/image/LogoBack.png" class=" rounded mx-auto d-block font-weight-normal"/>
    
    <div id ="descrptionA">
        <h1 id="descrptionTitre">
            Information Personnelle 
        </h1>
    
        <p class="descriptionText" > 
       
        </p>
        <ul class="descriptionText " >
            <li> {{$Civilit}} </li>
            <li>Nom : {{ $Nom }}</li>
            <li>Prénom: {{ $Prenom }}</li>
            <li>Date de naissance:  {{$Birthday }}</li>
            <li>Adresse: {{ $Rue }}  {{$CP }}</li>
            <li>Téléphone: {{ $TelBnv }} </li>
            
        </ul>
    </div>    
</div>
@endsection