<?php

namespace App\Http\Controllers;

use App\Helpers\JsonFormatter;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller {
    public function index() {
        $data  = Province::get();
        return JsonFormatter::buildResponse(200, 'success', $data);
    }

    public function get($province_id) {
        $provinsi = Province::find($province_id);
        if ($provinsi) {
            $data = $provinsi;
            return JsonFormatter::buildResponse(200, 'success', $data);
        } else {
            return JsonFormatter::buildResponse(404, 'not found');
        }
    }

    public function get_regencies($province_id) {
        $provinsi = Province::with('regencies')
            ->find($province_id);
        if ($provinsi) {
            $data = $provinsi->regencies;
            return JsonFormatter::buildResponse(200, 'success', $data);
        } else {
            return JsonFormatter::buildResponse(404, 'not found');
        }
    }
}
