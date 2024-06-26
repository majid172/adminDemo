<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Charge;
use App\Models\ServiceFee;
use Illuminate\Http\Request;

class ChargeController extends Controller
{

    public function serviceFee()
    {
        $pageTitle = 'Service Fee';
        $charge = ServiceFee::first();
        return view('admin.charge.index',compact('pageTitle','charge'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'fixed_charge' => 'required|numeric',
            'percentage_charge' => 'required|integer'
        ]);


        $charge = ServiceFee::first();
        $charge->fixed = $request->fixed_charge;
        $charge->is_fixed = $request->is_fixed??0;
        $charge->percent = $request->percentage_charge;
        $charge->is_percent = $request->is_percent??0;
        $charge->save();
        $notify[] = ['success','Charge updated successfully.'];
        return back()->withNotify($notify);
    }

}
