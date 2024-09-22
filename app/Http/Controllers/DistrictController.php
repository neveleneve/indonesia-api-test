<?php

namespace App\Http\Controllers;

use App\Helpers\JsonFormatter;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller {
    public function index() {
        $data  = District::get();
        return JsonFormatter::buildResponse(200, 'success', $data);
    }

    public function get($district_id) {
        $kecamatan = District::find($district_id);
        if ($kecamatan) {
            $data = $kecamatan;
            return JsonFormatter::buildResponse(200, 'success', $data);
        } else {
            return JsonFormatter::buildResponse(404, 'not found');
        }
    }

    public function get_villages($district_id) {
        $kecamatan = District::with('villages')
            ->find($district_id);
        if ($kecamatan) {
            $data = $kecamatan->villages;
            return JsonFormatter::buildResponse(200, 'success', $data);
        } else {
            return JsonFormatter::buildResponse(404, 'not found');
        }
    }
}
