<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Charge;
use Illuminate\Http\Request;

class ChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function charge()
    {
        $pageTitle = 'Charge';
        $charge = Charge::first();
        return view('admin.charge.index',compact('pageTitle','charge'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'fixed_charge' => 'required|numeric',
            'percentage_charge' => 'required|integer'
        ]);
        $charge = Charge::first();
        $charge->fixed_charge = $request->fixed_charge;
        $charge->percentage_charge = $request->percentage_charge;
        $charge->save();
        $notify[] = ['success','Charge updated successfully.'];
        return back()->withNotify($notify);
    }

}
