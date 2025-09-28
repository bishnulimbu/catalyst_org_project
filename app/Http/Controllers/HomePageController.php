<?php

namespace App\Http\Controllers;

use App\Models\CesDetail;
use App\Models\Hero;
use App\Models\Member;
use App\Models\Objective;
use App\Models\Scope;
use App\Models\ContactDetail;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
        $hero= Hero::first();
        $objectives= Objective::all();
        $scopes= Scope::all();
        $detail= CesDetail::first();
        $contactDetails = ContactDetail::first();
        return view('welcome',compact('members','hero','objectives','scopes','detail','contactDetails'));
    }
    
    public function edit(){
        // return view('admin.pages.edit',[
        //     'hero'=>Hero::all(),
        //     'objectives'=>Objective::first(),
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
