<?php

namespace App\Services;

use App\Models\PersInfo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PersInfoService
{
    public function getPersInfos()
    {
        return PersInfo::query()
        ->get();
    }

    public function getPersInfoById($id)
    {
        $model = PersInfo::query()
            ->where("id", $id)
            ->first();
        if ($model === null){
            throw new NotFoundHttpException('Товар не найден.');

        }
        return $model;
    }

    public function create(array $data)
    {
        return PersInfo::create($data);
    }

    public function update(int $id, array $data): PersInfo
    {
        $persInfo = $this->getPersInfoById($id);
        $persInfo->update($data);
        return $persInfo;
    }

    public function delete(int $id): bool
    {
        $persInfo = $this->getPersInfoById($id);
        return $persInfo->delete();
    }
}