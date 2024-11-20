<?php

namespace App\Http\Controllers;
use App\Models\PersInfo;

use App\Services\PersInfoService;
use Illuminate\Http\Request;

class PersInfoController extends Controller
{
    public function list(PersInfoService $service)
    {
        return $service->getPersInfos();
    }

    public function info($id, PersInfoService $service)
    {
        return $service->getPersInfoById($id);
    }

    public function create(Request $request, PersInfoService $service)
    {
        $fields = $request->validate([
            'user_id' => 'required|exists:users,id',
            'FIO' => 'required|string|min:5|max:255',
            'phone' => 'required|string|min:10|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        return $service->create($fields);
    }

    public function update(Request $request, $id, PersInfoService $service)
    {
        $fields = $request->validate([
            'user_id' => 'sometimes|integer|exists:users,id',
            'FIO' => 'sometimes|string|min:3|max:255',
            'phone' => 'sometimes|string|regex:/^\+?[0-9]{10,15}$/',
            'address' => 'sometimes|string|max:500',
        ]);

        return $service->update($id, $fields);
    }

    public function delete($id, PersInfoService $service)
    {
        $service->delete($id);
        return response()->json(['message' => 'Персональная информация удалена']);
    }
}

