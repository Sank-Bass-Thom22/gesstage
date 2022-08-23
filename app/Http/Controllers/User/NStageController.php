<?php

namespace App\Http\Controllers\User;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Agent;
use App\Models\Admin\Service;
use App\Models\User\Nstage;

class NStageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::user()->id;
        $allStage = Nstage::where('id_user', $id_user)->select('id', 'intitule', 'datedebut', 'datefin')->get();

        return view('user.listeStage', compact('allStage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($form)
    {
        return view($form);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'intitule' => ['required', 'string', 'max:255'],
            'datedebut' => ['required', 'date'],
            'datefin' => ['required', 'date'],
            'curriculumvitae' => ['required', 'file', 'mimes:pdf'],
            'motivation' => ['required', 'file', 'mimes:pdf'],
        ]);

        $curriculumvitae = $request->curriculumvitae->store('Curriculum-vitae');
        $motivation = $request->motivation->store('Lettre-de-motivation');
        $id_user = Auth::user()->id;

        Nstage::create([
            'intitule' => $request->intitule,
            'datedebut' => $request->datedebut,
            'datefin' => $request->datefin,
            'curriculumvitae' => $curriculumvitae,
            'motivation' => $motivation,
            'id_user' => $id_user,
        ]);

        return redirect()->route('nstageform', 'user.nStageForm')->with('success', 'Demande enregistrée avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailStage = Nstage::find($id);
        if ($detailStage->id_agent == null) {
            return view('user.detailStage', compact('detailStage'));
        }
        $detailAgent = Agent::find($detailStage->id_agent);
        $detailService = Service::find($detailAgent->id_service);

        return view('user.detailStage', compact(['detailStage', 'detailAgent', 'detailService']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $field)
    {
        $stage = Nstage::select('id', $field)->findOrFail($id);

        return view('user.editStageForm', compact(['stage', 'field']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Nstage::whereId($id)->update([
            'visibilite' => false,
        ]);

        return;
    }
}
