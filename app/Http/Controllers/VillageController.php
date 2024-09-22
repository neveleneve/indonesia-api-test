<?php

namespace App\Http\Controllers;

use App\Helpers\JsonFormatter;
use App\Models\Village;
use Illuminate\Http\Request;

class VillageController extends Controller {
    public function index() {
        $data  = Village::get();
        return JsonFormatter::buildResponse(200, 'success', $data);
    }

    public function get($village_id) {
        $kelurahan = Village::find($village_id);
        if ($kelurahan) {
            $data = $kelurahan;
            return JsonFormatter::buildResponse(200, 'success', $data);
        } else {
            return JsonFormatter::buildResponse(404, 'not found');
        }
    }
}
