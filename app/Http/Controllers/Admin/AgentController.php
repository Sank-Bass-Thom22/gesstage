<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Agent;
use App\Models\Admin\Service;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allAgent = Agent::where('visibilite', true)->select('id', 'prenom', 'nom')->get();

        return view('admin.listeAgent', compact('allAgent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listeService = Service::where('visibilite', true)->select('id', 'servicename')->get();

        return view('admin.agentForm', compact('listeService'));
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
            'prenom' => ['required', 'string', 'max:50'],
            'nom' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'tel' => ['required', 'string', 'max:16'],
            'fonction' => ['required', 'string', 'max:255'],
            'id_service' => ['required', 'integer'],
        ]);

        Agent::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'email' => $request->email,
            'tel' => $request->tel,
            'fonction' => $request->fonction,
            'id_service' => $request->id_service,
        ]);

        return redirect()->route('agentform')->with('success', 'Agent enregistré avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $agent = Agent::findOrFail($id);
         $service = Service::select('servicename', 'visibilite')->findOrFail($agent->id_service);

        return view('admin.detailAgent', compact(['agent', 'service']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent = Agent::findOrFail($id);
        $listeService = Service::where('visibilite', true)->select('id', 'servicename')->get();

        return view('admin.editAgentForm', compact(['agent', 'listeService']));
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
        $request->validate([
            'prenom' => ['required', 'string', 'max:50'],
            'nom' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'tel' => ['required', 'string', 'max:16'],
            'fonction' => ['required', 'string', 'max:255'],
            'id_service' => ['required', 'integer'],
        ]);

        Agent::whereId($id)->update([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'email' => $request->email,
            'tel' => $request->tel,
            'fonction' => $request->fonction,
            'id_service' => $request->id_service,
        ]);

        return redirect()->route('editagentform', $id)->with('success', 'Agent modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Agent::whereId($id)->update([
            'visibilite' => false,
        ]);

        return redirect()->route('listeagent')->with('success', 'Agent supprimé avec succès!');
    }
}
