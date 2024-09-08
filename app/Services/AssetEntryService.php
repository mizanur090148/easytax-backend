<?php

namespace App\Services;

use App\Models\AssetEntry;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class AssetEntryService
{
    public function getAll()
    {
        return AssetEntry::class::all();
    }
    public function create(array $data)
    {
        DB::beginTransaction();

        try {
            $assetEntry = AssetEntry::create($data);
            DB::commit();
            return $assetEntry;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update($id, array $data)
    {
        DB::beginTransaction();

        try {
            $assetEntry = AssetEntry::findOrFail($id);
            $assetEntry->update($data);
            DB::commit();
            return $assetEntry;
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            throw new \Exception('AssetEntry not found', 404);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {
            $assetEntry = AssetEntry::findOrFail($id);
            $assetEntry->delete();
            DB::commit();
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            throw new \Exception('AssetEntry not found', 404);
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception('An error occurred while deleting', 500);
        }
    }
}
