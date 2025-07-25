<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\DistrictRepositoryInterface;
use App\Repositories\Interfaces\WardRepositoryInterface;

class LocationController extends Controller
{
    protected $districtRepository;
    protected $wardRepository;

    public function __construct(
        DistrictRepositoryInterface $districtRepository,
        WardRepositoryInterface $wardRepository
        ) {
        $this->districtRepository = $districtRepository;
        $this->wardRepository = $wardRepository;
    }

    public function getDistrict(Request $request){
        $provinceCode = $request->input('province_code');
        $districts = $this->districtRepository->getDistrictsByProvinceCode($provinceCode);

        return response()->json($districts);
    }

    public function getWard(Request $request){
        $districtCode = $request->input('district_code');
        $wards = $this->wardRepository->findWardByDistrictCode($districtCode);

        return response()->json($wards);
    }
}
