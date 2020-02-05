<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rule;
use App\Models\Cause;
use App\Models\Disease;
use App\Traits\JsonResponse;

class DiagnoseController extends Controller
{
    use JsonResponse;

    public function process(Request $request)
    {
        try {

            $arrChoosen = [];
            $causeArr = [];
            foreach($request->causes_id as $cause)
            {
                $checkProperty = Rule::where('cause_id', $cause)->first();
                $causeData = Cause::find($cause);

                array_push($causeArr, $causeData->name);
                array_push($arrChoosen, $checkProperty ? $checkProperty->disease->id : null);
            }

            foreach($arrChoosen as $key => $value)
            {
                if(empty($value) || $value === "")
                unset($arrChoosen[$key]);
            }
            
            if($arrChoosen)
            {
                $result = array_count_values($arrChoosen);
                arsort($result);

                foreach($result as $an => $result)
                {
                    $modusValue = $an; 
                    break;
                }

                $getDisease = Disease::find($modusValue);

                return $this->success('success', [
                    "nama_penyakit" => $getDisease->name,
                    "solusi" => $getDisease->solutions,
                    "gejala" => $causeArr
                ]);
            } else {

                return response()->json(['success' => false, 'message' => 'Maaf kami tidak bisa menentukan hasil nya, silakan coba lagi'], 400);
            }


        }
        catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }
}
