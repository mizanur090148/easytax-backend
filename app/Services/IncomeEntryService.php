<?php

namespace App\Services;

use App\Models\IncomeEntry;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class IncomeEntryService
{
    public function getAll()
    {
        return IncomeEntry::all();
    }

    public function store(array $data)
    {
        try {
            return IncomeEntry::create($data);
        } catch (ModelNotFoundException $e) {
            throw new \Exception('IncomeEntry not found', 404);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function show($userId)
    {
        return IncomeEntry::where('user_id', $userId)->first();
    }

    public function update($id, $data)
    {
        try {
            $incomeEntry = IncomeEntry::find($id);
            if ($incomeEntry) {
                $incomeEntry->update($data);
            }
            return $incomeEntry;
        } catch (ModelNotFoundException $e) {
            throw new \Exception('IncomeEntry not found', 404);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {
            $incomeEntry = IncomeEntry::findOrFail($id);
            $incomeEntry->delete();
            DB::commit();
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            throw new \Exception('IncomeEntry not found', 404);
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception('An error occurred while deleting', 500);
        }
    }

}
