@extends('aBaseAdmine')

@section('title')
Ajouter une activité
@endsection

@section('content')
<div id="spacer" style="margin-bottom: 80px;"></div>

            <form method="POST" action="{{route('aAdmineVue3actAjouter.post')}}">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-secondary">
                    Attention, il manque des données. &#9785;
                    </div>  
                @endif
                <div id="SeniorPage"class="container-fluid" >
                    <img id ="imgLogoBack"src="/image/LogoBack.png" class=" rounded mx-auto d-block font-weight-normal"/>
                    <div id ="Titre">
                        <h1 id="descrptionTitre">
                            Ajouter une activité
                        </h1>
                    </div> 
                    
                    <div id="formulaireInscription" class="container-fluid">
                               

                                
                        <div class="form-row" >
                            <div class="col">
                                <label for="HeureD">Heure de début de l'activité</label>
                                <input type="time" id="HeureD" name="HeureD" class="form-control" placeholder="Date de naissance" required>
                                @error('HeureD')
                                <label  for="birthdayDate" class="col error-message ">{{ $message }}</label >
                                @enderror
                            </div>

                            <div class="col">
                                <label for="HeureF">Heure de fin de l'activité</label>
                                <input type="time" id="HeureF" name="HeureF" class="form-control" placeholder="Date de naissance" required>
                                @error('HeureF')
                                <label  for="HeureFin" class="col error-message ">{{ $message }}</label >
                                @enderror
                            </div>
                        </div>
  
                        <div class="form-row">
                            <div class="col">
                                <label for="DateAct">Date  de l'activité</label>
                                <input type="date" id="DateAct" name="DateAct" class="form-control" placeholder="Date de fin de l'activité" required>
                                @error('DateAct')
                                <label  for="DateAct" class="col error-message ">{{ $message }}</label >
                                @enderror
                            </div>
                            <div class="col">
                                <label for="DispoBnv">Disponibilité bénévole</label>
                                <select  class="form-control"  name="DispoBnv" id="DispoBnv">                                   
                                    <option value="Matin" >Matin</option>
                                    <option value="Apres Midi" >Apres Midi</option>
                                    <option value="Soir" >Soir</option>
                            
                                </select>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="col">
                                <label for="Description">Description de l'activité</label>
                                <textarea type="text" id="Description" name="Description" class="form-control" rows="4"placeholder="Description"  required ></textarea>
                                @error('Description')
                                <label for="Description"  class="col-8 error-message ">{{ $message }}</label>
                                @enderror
                            </div>

                        </div>
                        


                       
                    </div>
                </div> 
                    <button type="submit" class="btn btn-primary" id ="bntSubmit">Valider</button>
                </div> 
            </form>
        </div>

        <div id="spacer" style="margin-bottom: 80px;"></div>
@endsection