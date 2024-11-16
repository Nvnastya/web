<?php

namespace App\Http\Controllers;
use App\Models\PersInfo;

use Illuminate\Http\Request;

class PersInfoController extends Controller
{
    public function list()
    {
        return PersInfo::query()
            ->get();
    }

    public function info($id)
    {
        return PersInfo::query()
            ->where("id", $id)
            ->first();
    }
}
