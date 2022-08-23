<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allService = Service::where('visibilite', true)->select('id', 'servicename')->get();
        return view('admin.listeService', compact('allService'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.serviceForm');
    }

    /**.
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'servicename' => ['required', 'string', 'max:255'],
        ]);

        Service::create([
            'servicename' => $request->servicename,
        ]);

        return redirect()->route('serviceform')->with('success', 'Service ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $singleService = Service::findOrFail($id);
        return view('admin.editServiceForm', compact('singleService'));
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
            'servicename' => ['required', 'string', 'max:255'],
        ]);

        Service::whereId($id)->update([
            'servicename' => $request->servicename,
        ]);

        return redirect()->route('editserviceform', $id)->with('success', 'Service modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::whereId($id)->update([
            'visibilite' => false,
        ]);

        return redirect()->route('listeservice')->with('success', 'Service supprimé avec succès!');
    }
}
