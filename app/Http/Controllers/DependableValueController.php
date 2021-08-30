<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\Union;
use App\Models\Upazila;
use Illuminate\Http\Request;

class DependableValueController extends Controller
{


    public function findDivisionName()
    {
        $data = Division::select('division_name', 'id')->get();
        return response()->json($data); //then sent this data to ajax success
    }
    public function findDistrictName(Request $request)
    {

        $id = preg_replace('/[^a-z\d ]/i', '', $request->id);

        if (is_numeric($id) && $id != '')
            $data = District::select('district_name', 'id')->where('division_name_id',  $request->id)->get();
        else
            $data = '';

        return response()->json($data); //then sent this data to ajax success
    }

    public function findUpazilaName(Request $request)
    {
        $id = preg_replace('/[^a-z\d ]/i', '', $request->id);

        if (is_numeric($id) && $id != '')
            $data = Upazila::select('upazila_name', 'id')->where('district_id', $request->id)->take(100)->get();
        else
            $data = '';
        return response()->json($data); //then sent this data to ajax success
    }

    public function findUnionName(Request $request)
    {
        $id = preg_replace('/[^a-z\d ]/i', '', $request->id);

        if (is_numeric($id) && $id != '')

            $data = Union::select('union_name', 'id')->where('upazila_id', $request->id)->take(100)->get();
        else
            $data = '';

        return response()->json($data); //then sent this data to ajax success
    }
}
