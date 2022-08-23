<?php

namespace App\Http\Controllers\Drh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StageController extends Controller
{

    public function index($param)
    {
        if ($param == 'newRequest') {
            $listeStage = DB::table('nstages')->where('visibilite', true)->where('invitation', false)
                ->orderBy('id', 'desc')->select('id', 'intitule', 'datedebut', 'datefin')->get();
            $title = 'Nouvelles demandes';
        } elseif ($param == 'requestBeingProcessed') {
            $listeStage = DB::table('nstages')->where('visibilite', true)->where('invitation', true)
                ->where('approbation', false)->orderBy('id', 'desc')->select('id', 'intitule', 'datedebut', 'datefin')->get();
            $title = 'Demandes en cours de traitement';
        } else {
            $listeStage = DB::table('nstages')->where('visibilite', true)->where('approbation', true)
                ->orderBy('id', 'desc')->select('id', 'intitule', 'datedebut', 'datefin')->get();
            $title = 'Demandes acceptées';
        }

        return view('drh.listeStage', compact(['listeStage', 'title']));
    }

    public function show($id)
    {
        $showRequest = DB::table('nstages')->find($id);
        $showUser = DB::table('users')->find($showRequest->id_user);

        if ($showRequest->id_agent != null) {
            $showEmploye = DB::table('agents')->find($showRequest->id_agent);
            $showService = DB::table('services')->find($showEmploye->id_service);

            return view('drh.detailStage', compact(['showRequest', 'showUser', 'showEmploye', 'showService']));
        }

        return view('drh.detailStage', compact(['showRequest', 'showUser']));
    }

    public function destroy($id)
    {
        DB::table('nstages')->whereId($id)->update([
            'visibilite' => false,
        ]);

        $showRequest = DB::table('nstages')->select('invitation', 'approbation')->find($id);


        if ($showRequest->invitation == false) {
            $param = 'newRequest';
        } elseif ($showRequest->invitation == true && $showRequest->approbation == false) {
            $param = 'requestBeingProcessed';
        } else {
            $param = 'requestApproved';
        }



        return redirect()->route('DRHlistestage', $param)->with('success', 'Demande supprimée avec succès!');
    }
}
