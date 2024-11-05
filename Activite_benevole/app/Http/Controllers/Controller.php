<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(Repository $repository)
{
    $this->repository = $repository;
}

public function showAccueil()
{
return view('accueil');
}
public function showactAlimentaire()
{
return view('activiteAlimentaire');
}

public function showactScolaire()
{
return view('activiteScolaire');
}

public function showactSenior()
{
return view('activiteSenior');
}

public function showInscription()
{
       $cpOrd = $this->repository->recoveryCodesPostaux();
return view('inscription',['CPS'=>$cpOrd]);
}

public function storeInscription(Request $request)
{
    $messages = [
        'Civility.required' => "Vous devez choisir la civilité.",
        'firstName.required' => "Vous devez entrer votre prenom.",
        'firstName.min' => "Vous devez entrer un prenom minimume 3 lettres.",
        'lastName.required' => "Vous devez entrer votre nom.",
        'lastName.min' => "Vous devez entrer un nom minimume 3 lettres.",
        'birthdayDate.required' => "Vous devez entrer votre date de naissance.",
        'adresse.required' => "Vous devez entrer votre adresse.",
        'codePostal.required' => "Vous devez choisir un code Postal.",
        'telephone.required' => "Vous devez entrer votre numéro de télephone.",
        'telephone.regex' => "Vous devez entrer un numéro de 10 chiffre.",
        'inputEmail.required' => "Vous devez entrer votre email.",
        'inputEmailC.required' => "Vous devez entrer votre email.",
        'inputEmail.email' => "Vous devez entrer un email valide.",
        'inputEmailC.email' => "Vous devez entrer un email valide.",
        'inputPassword.required' => "Vous devez entrer votre mot de passe.",
        'inputPasswordC.required' => "Vous devez entrer votre mot de passe.",
        'inputEmailC.same' => "Vous devez entrer le même email.",
        'inputPasswordC.same' => "Vous devez entrer le même mot de passe.",
       'jourSelectionne.required_without_all' =>"Vous devez choisir une disponibilité."

        ];
        
    $rules = ['Civility' => ['required'],
                'firstName' => ['required', 'min:3'],
                'lastName' => ['required','min:3' ],
                'birthdayDate' => ['required', 'date'],
                'adresse' => ['required'],
                'codePostal' => ['required', 'integer', 'between:1000,99999'],
                'telephone' => ['required', 'regex:/^\d{10}$/'],
                'inputEmail' => ['required', 'email'],
                'inputEmailC' => ['required', 'email', 'same:inputEmail'],
                'inputPassword' => ['required'],
                'inputPasswordC' => ['required', 'same:inputPassword'],
                'jourLundi' => ['nullable', 'in:Matin,Apres Midi,Soir'],
                'jourMardi' => ['nullable', 'in:Matin,Apres Midi,Soir'],
                'jourMercredi' => ['nullable', 'in:Matin,Apres Midi,Soir'],
                'jourJeudi' => ['nullable', 'in:Matin,Apres Midi,Soir'],
                'jourVendredi' => ['nullable', 'in:Matin,Apres Midi,Soir'],
                'jourSamedi' => ['nullable', 'in:Matin,Apres Midi,Soir'],
                'jourDimanche' => ['nullable', 'in:Matin,Apres Midi,Soir'],
                'jourSelectionne' => ['required_without_all:jourLundi,jourMardi,jourMercredi,jourJeudi,jourVendredi,jourSamedi,jourDimanche']

            ];

    $validatedData = $request->validate($rules,$messages);
    try{
       
        
        if ($this->repository->emailExists($validatedData['inputEmail']))
            return redirect()->route('inscription.show')->withErrors("Vous êtes déjà inscrit.");

   $dataBnevole=
    [ 
        "NomBnv"=>$validatedData['lastName'],
        "PrenomBnv"=>$validatedData['firstName'],
        "Rue"=>$validatedData['adresse'],
        "TelBnv"=>$validatedData['telephone'],
        "CP"=>intval($validatedData['codePostal']),
        "Civility"=>$validatedData['Civility'],
        "Birthday"=>$validatedData['birthdayDate'],
        "PermisB"=>$request['PermisB']
    ];

    $idLastBnv=$this->repository->insertBenevole($dataBnevole);

    $dataIdentifiant=
    [
       "MailBnv"=>$validatedData['inputEmail'],
        "MotDP"=>Hash::make($validatedData['inputPassword']),
        "IdBnv"=>$idLastBnv
    ];
    $this->repository->insertIdentifiants($dataIdentifiant);

    $this->repository->addDisponibilite('Lundi',$validatedData['jourLundi'],$idLastBnv);
    $this->repository->addDisponibilite('Mardi',$validatedData['jourMardi'],$idLastBnv);
    $this->repository->addDisponibilite('Mercredi',$validatedData['jourMercredi'],$idLastBnv);
    $this->repository->addDisponibilite('Jeudi',$validatedData['jourJeudi'],$idLastBnv);
    $this->repository->addDisponibilite('Vendredi',$validatedData['jourVendredi'],$idLastBnv);
    $this->repository->addDisponibilite('Samedi',$validatedData['jourSamedi'],$idLastBnv);
    $this->repository->addDisponibilite('Dimanche',$validatedData['jourDimanche'],$idLastBnv);


    $this->repository->addFormInscription();
    }catch (Exception $exception) { 
    return redirect()->route('inscription.show')->withErrors("no: " . $exception->getMessage()); /*"no: " . $exception->getMessage();*/
  }
return redirect()->route('loginPage.show');
}

public function showloginPage()
{
return view('loginPage');
}

public function login(Request $request, Repository $repository)
{
    $rules = [
        'email' => ['required', 'email'],/**, 'exists:Identifiants,MailBnv' */
        'password' => ['required']
    ];
    $messages = [
        'email.required' => 'Vous devez saisir un e-mail.',
        'email.email' => 'Vous devez saisir un e-mail valide.',
        /*'email.exists' => "Cet utilisateur n'existe pas.",*/
        'password.required' => "Vous devez saisir un mot de passe.",
    ];
    $validatedData = $request->validate($rules, $messages);
    
    try {

        $user = $repository->getUser($validatedData['email'], $validatedData['password']);
        $request->session()->put('user',$user);
        return redirect()->route('EspaceBnv.show');
        

    } catch (Exception $e) {

        try{

            $user = $repository->getAdmine($validatedData['email'], $validatedData['password']);
            $request->session()->put('user',$user);
            return redirect()->route('aAdmineVue1.show');
            

        }catch(Exception $e){

            return redirect()->back()->withInput()->withErrors( "Impossible de vous authentifier.");
        }
        
    }
    
}
public function logout(Request $request) {
    $request->session()->forget('user');
    return redirect()->route('loginPage.show');
    
}

    public function showEspaceBnv(Request $request, Repository $repository)
    {
        $hasKey = $request->session()->has('user');

        if (!$hasKey){
                return redirect()->route('loginPage.show');
        }

        $getKey = $request->session()->get('user');
        $bnv=$repository->getUBnv($getKey['id']);
 
        return view('EspaceBnv',[
            'Nom' => $bnv[0]['NomBnv'],
            'Prenom' => $bnv[0]['PrenomBnv'],
            'Civilit' => $bnv[0]['Civility'],
            'Birthday' => $bnv[0]['Birthday'],
            'Rue' => $bnv[0]['Rue'],
            'CP' => $bnv[0]['CP'],
            'TelBnv' => $bnv[0]['TelBnv']
        ]);
    }  

    public function showEspaceBnvDispo(Request $request, Repository $repository)
    {
        $hasKey = $request->session()->has('user');

        if (!$hasKey){
            return redirect()->route('loginPage.show');
        }

        $getKey = $request->session()->get('user');
        $bnv=$repository->getUBnv($getKey['id']);

        $infoDispo= $repository->getDispo($getKey['id']);
        
        return view('EspaceBnv-Dispo',[
            'Nom' => $bnv[0]['NomBnv'],
            'Prenom' => $bnv[0]['PrenomBnv'],
            'Civilit' => $bnv[0]['Civility'],
            'Birthday' => $bnv[0]['Birthday'],
            'Rue' => $bnv[0]['Rue'],
            'CP' => $bnv[0]['CP'],
            'TelBnv' => $bnv[0]['TelBnv'],
            'dispos' =>  $infoDispo
        ]);
    } 

    public function showEspaceBnvActivite(Request $request, Repository $repository)
    {
        $hasKey = $request->session()->has('user');


        if (!$hasKey){
            return redirect()->route('loginPage.show');
        }

        $getKey = $request->session()->get('user');
        $bnv=$repository->getUBnv($getKey['id']);
        $infoActivite=$repository->getActivite($getKey['id']);
        
        return view('EspaceBnv-Activite',[
            'Nom' => $bnv[0]['NomBnv'],
            'Prenom' => $bnv[0]['PrenomBnv'],
            'Civilit' => $bnv[0]['Civility'],
            'Birthday' => $bnv[0]['Birthday'],
            'Rue' => $bnv[0]['Rue'],
            'CP' => $bnv[0]['CP'],
            'TelBnv' => $bnv[0]['TelBnv'],
            'Activites' =>  $infoActivite
        ]);
    } 




    public function storeEspaceBnvDispo(Request $request, Repository $repository)
{

    
    $getKey = $request->session()->get('user');


    $messages = [
       'jourSelectionne.required_without_all' =>"Vous devez choisir une disponibilité."
        ];
 
    $rules = [
                'jourLundiMatin' => ['nullable', 'in:Disponible,Indisponible'],
                'jourLundiApresMidi' => ['nullable', 'in:Disponible,Indisponible'],
                'jourLundiSoir' => ['nullable', 'in:Disponible,Indisponible'],

                'jourMardiMatin' => ['nullable', 'in:Disponible,Indisponible'],
                'jourMardiApresMidi' => ['nullable', 'in:Disponible,Indisponible'],
                'jourMardiSoir' => ['nullable', 'in:Disponible,Indisponible'],

                'jourMercrediMatin' => ['nullable', 'in:Disponible,Indisponible'],
                'jourMercrediApresMidi' => ['nullable', 'in:Disponible,Indisponible'],
                'jourMercrediSoir' => ['nullable', 'in:Disponible,Indisponible'],

                'jourJeudiMatin' => ['nullable', 'in:Disponible,Indisponible'],
                'jourJeudiApresMidi' => ['nullable', 'in:Disponible,Indisponible'],
                'jourJeudiSoir' => ['nullable', 'in:Disponible,Indisponible'],

                'jourVendrediMatin' => ['nullable', 'in:Disponible,Indisponible'],
                'jourVendrediApresMidi' => ['nullable', 'in:Disponible,Indisponible'],
                'jourVendrediSoir' => ['nullable', 'in:Disponible,Indisponible'],

                'jourSamediMatin' => ['nullable', 'in:Disponible,Indisponible'],
                'jourSamediApresMidi' => ['nullable', 'in:Disponible,Indisponible'],
                'jourSamediSoir' => ['nullable', 'in:Disponible,Indisponible'],

                'jourDimancheMatin' => ['nullable', 'in:Disponible,Indisponible'],
                'jourDimancheApresMidi' => ['nullable', 'in:Disponible,Indisponible'],
                'jourDimancheSoir' => ['nullable', 'in:Disponible,Indisponible'],

                'jourSelectionne' => ['required_without_all:jourLundiMatin,jourLundiApresMidi,jourLundiSoir,jourMardiMatin,jourMardiApresMidi,jourMardiSoir,jourMercrediMatin,jourMercrediApresMidi,jourMercrediSoir,jourJeudiMatin,jourJeudiApresMidi,jourJeudiSoir,jourVendrediMatin,jourVendrediApresMidi,jourVendrediSoir,jourSamediMatin,jourSamediApresMidi,jourSamediSoir,jourDimancheMatin,jourDimancheApresMidi,jourDimancheSoir']
            ];
    

    $validatedData = $request->validate($rules,$messages);
   /*dd($validatedData);*/
    try{
       
        if ($validatedData['jourLundiMatin']=='Disponible')
                $repository->addDisponibilite('Lundi','Matin',$getKey["id"]);
        if ($validatedData['jourLundiApresMidi']=='Disponible')
                $repository->addDisponibilite('Lundi','Apres Midi',$getKey["id"]);
        if ($validatedData['jourLundiSoir']=='Disponible')
                $repository->addDisponibilite('Lundi','Soir',$getKey["id"]);

        if ($validatedData['jourLundiMatin']=='Indisponible')
              $repository->deleteDisponibilite('Lundi','Matin',$getKey["id"]);
        if ($validatedData['jourLundiApresMidi']=='Indisponible')
                $repository->deleteDisponibilite('Lundi','Apres Midi',$getKey["id"]);
        if ($validatedData['jourLundiSoir']=='Indisponible')
                $repository->deleteDisponibilite('Lundi','Soir',intval($getKey["id"]));

        if ($validatedData['jourMardiMatin']=='Disponible')
                $repository->addDisponibilite('Mardi','Matin',$getKey["id"]);
        if ($validatedData['jourMardiApresMidi']=='Disponible')
                $repository->addDisponibilite('Mardi','Apres Midi',$getKey["id"]);
        if ($validatedData['jourMardiSoir']=='Disponible')
                $repository->addDisponibilite('Mardi','Soir',$getKey["id"]);

        if ($validatedData['jourMardiMatin']=='Indisponible')
                $repository->deleteDisponibilite('Mardi','Matin',$getKey["id"]);
        if ($validatedData['jourMardiApresMidi']=='Indisponible')
                $repository->deleteDisponibilite('Mardi','Apres Midi',$getKey["id"]);
        if ($validatedData['jourMardiSoir']=='Indisponible')
                $repository->deleteDisponibilite('Mardi','Soir',intval($getKey["id"]));

        if ($validatedData['jourMercrediMatin']=='Disponible')
                $repository->addDisponibilite('Mercredi','Matin',$getKey["id"]);
        if ($validatedData['jourMercrediApresMidi']=='Disponible')
                $repository->addDisponibilite('Mercredi','Apres Midi',$getKey["id"]);
        if ($validatedData['jourMercrediSoir']=='Disponible')
                $repository->addDisponibilite('Mercredi','Soir',$getKey["id"]);

        if ($validatedData['jourMercrediMatin']=='Indisponible')
                $repository->deleteDisponibilite('Mercredi','Matin',$getKey["id"]);
        if ($validatedData['jourMercrediApresMidi']=='Indisponible')
                $repository->deleteDisponibilite('Mercredi','Apres Midi',$getKey["id"]);
        if ($validatedData['jourMercrediSoir']=='Indisponible')
                $repository->deleteDisponibilite('Mercredi','Soir',intval($getKey["id"]));

        if ($validatedData['jourJeudiMatin']=='Disponible')
                $repository->addDisponibilite('Jeudi','Matin',$getKey["id"]);
        if ($validatedData['jourJeudiApresMidi']=='Disponible')
                $repository->addDisponibilite('Jeudi','Apres Midi',$getKey["id"]);
        if ($validatedData['jourJeudiSoir']=='Disponible')
                $repository->addDisponibilite('Jeudi','Soir',$getKey["id"]);

        if ($validatedData['jourJeudiMatin']=='Indisponible')
                $repository->deleteDisponibilite('Jeudi','Matin',$getKey["id"]);
        if ($validatedData['jourJeudiApresMidi']=='Indisponible')
                $repository->deleteDisponibilite('Jeudi','Apres Midi',$getKey["id"]);
        if ($validatedData['jourJeudiSoir']=='Indisponible')
                $repository->deleteDisponibilite('Jeudi','Soir',intval($getKey["id"]));

        if ($validatedData['jourVendrediMatin']=='Disponible')
                $repository->addDisponibilite('Vendredi','Matin',$getKey["id"]);
        if ($validatedData['jourVendrediApresMidi']=='Disponible')
                $repository->addDisponibilite('Vendredi','Apres Midi',$getKey["id"]);
        if ($validatedData['jourVendrediSoir']=='Disponible')
                $repository->addDisponibilite('Vendredi','Soir',$getKey["id"]);

        if ($validatedData['jourVendrediMatin']=='Indisponible')
                $repository->deleteDisponibilite('Vendredi','Matin',$getKey["id"]);
        if ($validatedData['jourVendrediApresMidi']=='Indisponible')
                $repository->deleteDisponibilite('Vendredi','Apres Midi',$getKey["id"]);
        if ($validatedData['jourVendrediSoir']=='Indisponible')
                $repository->deleteDisponibilite('Vendredi','Soir',intval($getKey["id"]));

        if ($validatedData['jourSamediMatin']=='Disponible')
                $repository->addDisponibilite('Samedi','Matin',$getKey["id"]);
        if ($validatedData['jourSamediApresMidi']=='Disponible')
                $repository->addDisponibilite('Samedi','Apres Midi',$getKey["id"]);
        if ($validatedData['jourSamediSoir']=='Disponible')
                $repository->addDisponibilite('Samedi','Soir',$getKey["id"]);

        if ($validatedData['jourSamediMatin']=='Indisponible')
                $repository->deleteDisponibilite('Samedi','Matin',$getKey["id"]);
        if ($validatedData['jourSamediApresMidi']=='Indisponible')
                $repository->deleteDisponibilite('Samedi','Apres Midi',$getKey["id"]);
        if ($validatedData['jourSamediSoir']=='Indisponible')
                $repository->deleteDisponibilite('Samedi','Soir',intval($getKey["id"]));

        if ($validatedData['jourDimancheMatin']=='Disponible')
                $repository->addDisponibilite('Dimanche','Matin',$getKey["id"]);
        if ($validatedData['jourDimancheApresMidi']=='Disponible')
                $repository->addDisponibilite('Dimanche','Apres Midi',$getKey["id"]);
        if ($validatedData['jourDimancheSoir']=='Disponible')
                $repository->addDisponibilite('Dimanche','Soir',$getKey["id"]);

        if ($validatedData['jourDimancheMatin']=='Indisponible')
                $repository->deleteDisponibilite('Dimanche','Matin',$getKey["id"]);
        if ($validatedData['jourDimancheApresMidi']=='Indisponible')
                $repository->deleteDisponibilite('Dimanche','Apres Midi',$getKey["id"]);
        if ($validatedData['jourDimancheSoir']=='Indisponible')
                $repository->deleteDisponibilite('Dimanche','Soir',intval($getKey["id"]));



    $repository->addFormInscription();
    }catch (Exception $exception) { 
    return redirect()->route('EspaceBnv-Dispo.show')->withErrors("La disponibilité est déjà entrée. Veuillez sélectionner une autre disponibilité"); /*"no: " . $exception->getMessage();*/
  }
return redirect()->route('EspaceBnv-Dispo.show');
}


public function responseParticipation(Request $request, Repository $repository){

        $getKey = $request->session()->get('user');
        $idAct = $request->input('idAct');
        $etat = $request->input('Accepter'); 
        $etat2 = $request->input('Refuser');
        if ($etat=="Accepter")
              $repository->updateParticipation($getKey['id'], $idAct,$etat);
        else 
              $repository->updateParticipation($getKey['id'], $idAct,$etat2);
 return redirect()->route('EspaceBnv-Activite.show');

}

/*Admine*/
public function showEspaceAdmineFirst (Request $request, Repository $repository){
        $hasKey = $request->session()->has('user');
        

        if (!$hasKey){
            return redirect()->route('logout');
        }

        $getKey = $request->session()->get('user');
        return view('aAdmineVue1',['email'=>$getKey['email']]);
    }

    public function showEspaceAdmineBenevole (Request $request, Repository $repository){
        $hasKey = $request->session()->has('user');
        

        if (!$hasKey){
            return redirect()->route('logout');
        }

        $getKey = $request->session()->get('user');

        $benevoles=$repository->recoveryBenevole();
    
        return view('aAdmineVue2b',['email'=>$getKey['email'],'Benevoles'=>$benevoles]);
    }
    public function showEspaceAdmineActivite (Request $request, Repository $repository){
        $hasKey = $request->session()->has('user');
        

        if (!$hasKey){
            return redirect()->route('logout');
        }

        $getKey = $request->session()->get('user');

        $activites=$repository->recoveryActivite();
    
        return view('aAdmineVue3act',['email'=>$getKey['email'],'Activites'=>$activites]);
    }
    public function showEspaceAdmineAjouterActivite (Request $request){
        $hasKey = $request->session()->has('user');
        

        if (!$hasKey){
            return redirect()->route('logout');
        }

        $getKey = $request->session()->get('user');

        
    
        return view('aAdmineVue3actAjouter',['email'=>$getKey['email'] ]);
    }
    public function StoreActivite(Request $request)
    {
     
        $messages = [
            'HeureD.required' => "Vous devez entrer l'heure du début de l'activité.",
            'HeureF.required' => "Vous devez entrer l'heure de la fin de l'activité.",
            'Description.required' => "Vous devez entrer la description de l'activité.",
            'DateAct.required' => "Vous devez entrer la date de l'activité.",
            'DispoBnv.required' => "Vous devez choisir une disponibilité."
    
            ];

        $rules = ['HeureD' => ['required'],
                    'HeureF' => ['required'],
                    'DateAct' => ['required', 'date'],
                    'Description' => ['required'],
                    'DispoBnv' => ['required', 'in:Matin,Apres Midi,Soir']                        
                ];
    
        $validatedData = $request->validate($rules,$messages);
        try{
           
    
       $dataActivite=
        [ 
            "HeureD"=>$validatedData['HeureD'],
            "HeureF"=>$validatedData['HeureF'],
            "DateAct"=>$validatedData['DateAct'],
            "DiscrAct"=>$validatedData['Description'],
            "DispoBnv"=>$validatedData['DispoBnv']
        ];
    
        $this->repository->insertActivite($dataActivite);      
        $this->repository->addFormInscription();

        }catch (Exception $exception) { 
        return redirect()->route('aAdmineVue3actAjouter.show')->withErrors("L'activité n'a pas pu être ajoutée."); /*"no: " . $exception->getMessage();*/
      }
    return redirect()->route('aAdmineVue3act.show');
    }
   
    public function showParticipant (Request $request, Repository $repository,$IdAct){
        $hasKey = $request->session()->has('user');
        

        if (!$hasKey){
            return redirect()->route('logout');
        }

        $getKey = $request->session()->get('user');

        $activites=$repository->recoveryOneActivite($IdAct);
        $Benevoledata=$repository->getParticipants($IdAct);
        

    
        return view('aAdmineVue4actParticipant',['email'=>$getKey['email'],'Activites'=>$activites,'Benevoles'=>$Benevoledata]);
    }
    public function showAjParticipant (Request $request, Repository $repository,$IdAct){
        $hasKey = $request->session()->has('user');
        

        if (!$hasKey){
            return redirect()->route('logout');
        }

        $getKey = $request->session()->get('user');

        $activites=$repository->recoveryOneActivite($IdAct);
        $BenevoleParticipe=$repository->getParticipants($IdAct);
        $Benevoledata=$repository->getParticipantsDispo($IdAct);  
    
        return view('aAdmineVue5actAjParticipant',['email'=>$getKey['email'],'Activites'=>$activites,'Benevoles'=>$Benevoledata,'BenevoleParticipes'=>$BenevoleParticipe]);
    }

    public function ajouterParticipant(Request $request, Repository $repository){
        $hasKey = $request->session()->has('user');
        

        if (!$hasKey){
            return redirect()->route('logout');
        }
        try{    
                $IdAct = $request->input('IdAct');
                $IdBnv = $request->input('IdBnv');
                $data=[
                        'IdBnv' => $IdBnv,
                        'IdAct' => $IdAct,];
        
                $repository->insertParticipe($data);
                $repository->addFormInscription();
        }catch (Exception $exception) { 
                return redirect()->route('aAdmineVue5actAjParticipant.show', ['IdAct' => $IdAct])->withErrors("Le bénévole est déjà entré. Veuillez sélectionner un autre bénévole"); /*"no: " . $exception->getMessage();*/
              }


        return redirect()->route('aAdmineVue5actAjParticipant.show', ['IdAct' => $IdAct]);

    }


    public function supprimerParticipant(Request $request, Repository $repository){
        $hasKey = $request->session()->has('user');
        

        if (!$hasKey){
            return redirect()->route('logout');
        }
        try{    
                $IdAct = $request->input('IdAct');
                $IdBnv = intval($request->input('IdBnv'));
             
        
                $repository->deleteParticipantion($IdAct,$IdBnv);
                $repository->addFormInscription();
        }catch (Exception $exception) { 
                return redirect()->route('aAdmineVue3actAjouter.show')->withErrors("no: " . $exception->getMessage()); /*"no: " . $exception->getMessage();*/
              }


        return redirect()->route('aAdmineVue5actAjParticipant.show', ['IdAct' => $IdAct]);

    }
}
