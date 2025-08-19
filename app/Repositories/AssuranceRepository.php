<?php

namespace App\Repositories;

use App\Gateway\AssuranceRepositoryInterface;
use App\Models\Assurance;

class AssuranceRepository implements AssuranceRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function find($id)
    {
        // TODO: Implement find() method.
        $data =  Assurance::find($id);
        // dd($data);
        if ($data) {
            return $data;
        }
        return null;
    }

    public function findAll()
    {
        return Assurance::all();
    }

    public function create($assurance)
    {
        // dd($assurance);
        return Assurance::create($assurance);
    }

    public function update($id, $assurance)
    {
        $data = Assurance::find($id);
        if ($data){
            $data->update($assurance);
        }
        return false;
    }

    public function delete($id)
    {
        $data = Assurance::find($id);
        if ($data){
            $data->delete();
        }
        return false;
    }
}
