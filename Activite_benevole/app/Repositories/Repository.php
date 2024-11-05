<?php

namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Data;
use Carbon\Carbon;

class Repository
{
    function createDatabase(): void 
{
    DB::unprepared(file_get_contents('database/build.sql'));
}

function insertCP(array $data): int
{
    return DB::table('CodesPostaux')->insertGetId($data);
}
function insertAdministration(array $data): int
{
    return DB::table('Administration')->insertGetId($data);
}
function insertActivite(array $data): int
{
    return DB::table('Activite')->insertGetId($data);
}
function insertBenevole(array $data): int
{
    return DB::table('Benevole')->insertGetId($data);
}
function insertIdentifiants(array $data): int
{
    return DB::table('Identifiants')->insertGetId($data);
}
function insertParticipe(array $data): int
{
    return DB::table('Participe')->insertGetId($data);
}
function insertDisponibilite(array $data): int
{
    return DB::table('Disponibilite')->insertGetId($data);
}
function recoveryActivite(): array
{
    $data = DB::table('Activite')->orderBy('IdAct', 'asc')->get()->toArray();

        return $data;
}
function recoveryCodesPostaux(): array
{
    $data = DB::table('CodesPostaux')->orderBy('CP', 'asc')->get()->toArray();

        return $data;
}
function recoveryBenevole(): array
{
    $data = DB::table('Benevole')->orderBy('IdBnv', 'asc')->get()->toArray();

        return $data;
}
function recoveryIdentifiants(): array
{
    $data = DB::table('Identifiants')->get()->toArray();

        return $data;
}

function recoveryParticipe(): array
{
    $data = DB::table('Participe')->get()->toArray();

        return $data;
}
function recoveryDisponibilite(): array
{
    $data = DB::table('Disponibilite')->orderBy('IdBnv', 'asc')->get()->toArray();

        return $data;
}

    public function emailExists($email):bool
    {

        $existingMails= DB::table('Identifiants')->pluck('MailBnv')->toArray();
        foreach($existingMails as $existingMail) {
            if ($existingMail == $email) {
                return true;
            }
        }
        return false;
    }
        

    function addDisponibilite(String $Journ , $partieJour, int $IdBnv):void
    {
        if ($partieJour=='Matin' || $partieJour=='Soir' || $partieJour=='Apres Midi')
        {
            $data=['Jour'=>$Journ,'PartieduJour'=>$partieJour,'IdBnv'=>$IdBnv];
            $this->insertDisponibilite($data);

        }
    }
function participeAffichage(): array
{
    $data = DB::table('Participe')->orderBy('IdBnv', 'asc')->get()
                                ->toArray();

        return $data;
}


function fillDatabase(): void 
{  
    $datas = new Data();
    $trier=collect($datas->codePostaux())->sortBy('CP')->values()->all();
    foreach($trier as $data){
        $this->insertCP($data);
    }    

    foreach($datas->administrateur() as $data){
        $this->insertAdministration($data);
    }   

    foreach($datas->activite() as $data){
        $this->insertActivite($data);
    }   
    foreach($datas->benevole() as $data){
        $this->insertBenevole($data);
    }   
    foreach($datas->disponibilite() as $data){
        $this->insertDisponibilite($data);
    }   
    /*foreach($datas->participe() as $data){
        $this->insertParticipe($data);
    } */  

    foreach($datas->identifiants() as $data){
        $this->insertIdentifiants($data);
    }  
  
}

function addFormInscription(): void 
{  
   $dataDisponibilite=$this->recoveryDisponibilite();
   $dataPrticipe=$this->recoveryParticipe();
   $dataIdentifiants=$this->recoveryIdentifiants();
   $dataBenevole=$this->recoveryBenevole();
   $datacp=$this->recoveryCodesPostaux();
   $dataActivite=$this->recoveryActivite();

   DB::table('Disponibilite')->delete();
   DB::table('Participe')->delete();
   DB::table('Identifiants')->delete();
   DB::table('Benevole')->delete();
   DB::table('CodesPostaux')->delete();
   DB::table('Activite')->delete();

   
   DB::table('Activite')->insert($dataActivite);
   DB::table('CodesPostaux')->insert($datacp);
   DB::table('Benevole')->insert($dataBenevole);
   DB::table('Identifiants')->insert($dataIdentifiants);
   DB::table('Participe')->insert($dataPrticipe);
   DB::table('Disponibilite')->insert($dataDisponibilite);

}


function getUser(string $email, string $password): array
{    
    $user = DB::table('Identifiants')->where('MailBnv', $email)->get()->toArray();
    if(count($user) > 0){
        $passwordHash = $user[0]['MotDP'];
        $ok = Hash::check($password, $passwordHash);
        if($ok){
            $userId = $user[0]['IdBnv'];
            $userEmail = $user[0]['MailBnv'];
            return ['id' => $userId, 'email' => $userEmail];
        }
        else
            throw new Exception("Utilisateur inconnu");
    }
    else
        throw new Exception("Utilisateur inconnu"); 
}

function getAdmine(string $email, string $password): array
{
    
    $user = DB::table('Administration')->where('MailAdmin', $email)->where('MdpAdmin', $password)->get()->toArray();
   
    if(count($user) > 0){

            $userId = $user[0]['IdAdmin'];
            $userEmail = $user[0]['MailAdmin'];
            return ['id' => $userId, 'email' => $userEmail];
        }
        else
            throw new Exception("Utilisateur inconnu");
    
}

function getUBnv(int $IdBnv): array
{    
   return  DB::table('Benevole')->where('IdBnv', $IdBnv)->get()->toArray();
}

public function getDispo(int $IdBnv):array
{
   
    $data = DB::table('Disponibilite')->where('IdBnv', $IdBnv)->orderBy('Jour', 'asc')->get()->toArray();

    return $data;
}

function deleteDisponibilite(String $Journ , $partieJour, int $IdBnv):void
{
    DB::table('Disponibilite')                           
    ->where('Jour', $Journ)
    ->where('PartieduJour', $partieJour)
    ->where('IdBnv', $IdBnv)
    ->delete();
}

public function getActivite(int $IdBnv):array
{
   
    $activites = DB::table('Activite')
        ->join('Participe', 'Activite.IdAct', '=', 'Participe.IdAct')
        ->where('Participe.IdBnv', $IdBnv)
        ->orderBy('Activite.DateAct', 'asc')
        ->get();
        

        foreach ($activites as $activite) {
            $etat = DB::table('Participe')
                ->where('IdBnv', $IdBnv)
                ->where('IdAct', $activite['IdAct'])
                ->value('Etat');
            $activite['Etat'] = $etat;
        }
    return $activites->toArray();
}

public function updateParticipation(int $IdBnv, int $IdAct, string $etat): void
{   
    if ($etat == "Accepter" || $etat == "Refuser") {
        DB::table('Participe')
            ->where('IdBnv', $IdBnv)
            ->where('IdAct', $IdAct)
            ->update(['Etat' => $etat]);
    } 
}
function recoveryOneActivite(int $IdAct): array
{
    $data = DB::table('Activite')->where('IdAct', $IdAct)->orderBy('IdAct', 'asc')->get()->toArray();

        return $data;
}

function getParticipants(int $idAct): array
{
    $participantsAffs = DB::table('Participe')
        ->join('Benevole', 'Participe.IdBnv', '=', 'Benevole.IdBnv')
        ->where('Participe.IdAct', '=', $idAct)
        ->select('Benevole.IdBnv', 'NomBnv', 'PrenomBnv', 'Rue', 'TelBnv','CP','DateCreationComp', 'MailBnv', 'Birthday', 'Civility', 'PermisB','Participe.Etat')
        ->get()
        ->toArray();
    
    $participantsDispos=$this->getParticipantsDispo($idAct);
    $participants=[];

    foreach($participantsAffs as $participantsAff){
        foreach($participantsDispos as $participantsDispo){
            if ($participantsAff['IdBnv']==$participantsDispo[0]['IdBnv'])
                    $participants[]= $participantsAff;

        }
            
    }

    return $participants;
}
function getParticipantsDispo(int $idAct): array
{
    $activite=$this->recoveryOneActivite($idAct);

    $date = $activite[0]['DateAct'];

    $dayOfWeek = Carbon::parse($date)->locale('fr_FR')->dayName;
    $jourSemaine = ucfirst($dayOfWeek);

    $IdBnvs=DB::table('Disponibilite')->where('Jour','=',$jourSemaine)->where('PartieduJour','=',$date = $activite[0]['DispoBnv'])->get(['IdBnv'])->toArray();
    $Benevoles=[];
    foreach($IdBnvs as $IdBnv){
        $Benevoles[]=$this->getUBnv($IdBnv['IdBnv']);
        
    }
  
    return $Benevoles ;
}

function deleteParticipantion(int $IdAct,int $IdBnv):void
{
    DB::table('Participe')                           
    ->where('IdAct', $IdAct)
    ->where('IdBnv', $IdBnv)
    ->delete();
}

}