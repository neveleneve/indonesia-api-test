<?php

namespace App\Http\Controllers;

use App\Helpers\JsonFormatter;
use App\Models\Regency;
use Illuminate\Http\Request;

class RegencyController extends Controller {
    public function index() {
        $data  = Regency::get();
        return JsonFormatter::buildResponse(200, 'success', $data);
    }

    public function get($regency_id) {
        $kotakab = Regency::find($regency_id);
        if ($kotakab) {
            $data = $kotakab;
            return JsonFormatter::buildResponse(200, 'success', $data);
        } else {
            return JsonFormatter::buildResponse(404, 'not found');
        }
    }

    public function get_districts($regency_id) {
        $kotakab = Regency::find($regency_id);
        if ($kotakab) {
            $data = $kotakab->districts;
            return JsonFormatter::buildResponse(200, 'success', $data);
        } else {
            return JsonFormatter::buildResponse(404, 'not found');
        }
    }
}
