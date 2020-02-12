<?php

namespace App\Http\Controllers;

use App\Tender;
use App\Http\Resources\Tender as TenderResource;
use Illuminate\Http\Request;

class TendersController extends Controller
{
    public function index()
    {
        return TenderResource::collection(Tender::paginate(10));
    }

    public function store()
    {
        $tender = Tender::create($this->validateData());

        return (new TenderResource($tender))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Tender $tender)
    {
        return new TenderResource($tender);
    }

    public function update(Tender $tender)
    {
        $tender->update($this->validateData());

        return (new TenderResource($tender))
            ->response()
            ->setStatusCode(200);
    }

    public function destroy(Tender $tender)
    {
        $tender->delete();

        return response([], 204);
    }

    private function validateData()
    {
        return request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
    }
}
