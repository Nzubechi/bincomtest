<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PollingUnitController extends Controller
{
    public function loadAllPollingUnits(){
        $data['pollingunits'] = DB::table('polling_unit')->get();
        return view('pollingunits', $data);
    }

    public function getPollingUnitByID($id){
        $data['pollingunit'] = DB::table('polling_unit')->where('uniqueid', '=', $id)->first();
        $data['pollingunitresult'] = DB::table('announced_pu_results')->where('polling_unit_uniqueid', '=', $id)->get();
        return view('pollingunit', $data);
    }

    public function getVoteSumByLga(){
        $data['lgas'] = DB::table('lga')->get();
        $data['selectedlga'] = DB::table('lga')->first();
        return view('lgavotesum', $data);
    }

    public function getVotesForLGA(Request $request){
        $data['lgas'] = DB::table('lga')->get();
        $lga = $request->lga;
        $data['selectedlga'] = DB::table('lga')->where('uniqueid', '=', $lga)->first();
        $pollingunitsinlga = DB::table('polling_unit')->where('lga_id', '=', $lga)->get();
        $data['votesforlga'] = [];
        foreach ($pollingunitsinlga as $pu) {
            $lgaresult = DB::table('announced_pu_results')->where('polling_unit_uniqueid', '=', $pu->uniqueid)->get();
            foreach ($lgaresult as $result) {
                array_push($data['votesforlga'], $result);           
            }
        }
        // dd($data, $lga);
        return view('lgavotesum', $data);
    }

    public function PollingUnitResult($id){
        $data['pollingunit'] = DB::table('polling_unit')->where('uniqueid', '=', $id)->first();
        $data['parties'] = DB::table('party')->get();
        return view('storeresult', $data);
    }

    public function storePollingUnitResult(Request $request, $id){
        $inputdata = [];
        $parties = DB::table('party')->get();
        foreach ($parties as $party) {
           $arr = ['polling_unit_uniqueid' => $id,
           'party_abbreviation' => mb_substr($party->partyname, 0, 3),
           'party_score' => $request->input($party->partyname.'score'),
           'entered_by_user' => $request->input('agent'),
           'date_entered' => date('Y-m-d H:i:s'),
           'user_ip_address' => $request->getClientIp()
        ];
        array_push($inputdata, $arr); 
        }

        DB::table('announced_pu_results')->insert($inputdata);
        return back()->with('success', 'Result Uploaded Successfully');
    }
}
