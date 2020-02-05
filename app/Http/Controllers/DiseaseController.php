<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disease;
use App\Traits\JsonResponse;
use App\Helpers\Crud;

class DiseaseController extends Controller
{
    use JsonResponse;

    public function __construct(Disease $table)
    {
        $this->table = $table;
    }

    public function index()
    {
        $diseases = $this->table->get();

        return $this->responseWithCondition($diseases, 'success','failed');
    }

    public function store(Request $request)
    {
        $store = Crud::save($this->table, $request->all());

        return $this->responseWithCondition($store, 'success','failed');
    }

    public function update(Request $request)
    {
        $store = Crud::update($this->table, $request->except('id'),'id',$request->id);
        
        return $this->responseWithCondition($store, 'success','failed');
    }

    public function delete(Request $request)
    {
        $delete = Crud::deleteOne($this->table, 'id',$request->id);

        return $this->responseWithCondition($delete, 'success','failed');
    }
}
