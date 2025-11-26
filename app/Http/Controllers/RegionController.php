<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function getRegencies($provinceName)
    {
        $province = Province::where('name', $provinceName)->first();
        if (!$province) {
            return response()->json([]);
        }
        return response()->json($province->regencies);
    }

    public function getDistricts($regencyName)
    {
        $regency = Regency::where('name', $regencyName)->first();
        if (!$regency) {
            return response()->json([]);
        }
        return response()->json($regency->districts);
    }

    public function getVillages($districtName)
    {
        $district = District::where('name', $districtName)->first();
        if (!$district) {
            return response()->json([]);
        }
        return response()->json($district->villages);
    }
}
