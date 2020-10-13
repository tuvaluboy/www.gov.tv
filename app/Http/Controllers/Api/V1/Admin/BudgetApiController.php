<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Budget;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBudgetRequest;
use App\Http\Requests\UpdateBudgetRequest;
use App\Http\Resources\Admin\BudgetResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BudgetApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('budget_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BudgetResource(Budget::all());
    }

    public function store(StoreBudgetRequest $request)
    {
        $budget = Budget::create($request->all());

        if ($request->input('file', false)) {
            $budget->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
        }

        return (new BudgetResource($budget))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Budget $budget)
    {
        abort_if(Gate::denies('budget_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BudgetResource($budget);
    }

    public function update(UpdateBudgetRequest $request, Budget $budget)
    {
        $budget->update($request->all());

        if ($request->input('file', false)) {
            if (!$budget->file || $request->input('file') !== $budget->file->file_name) {
                if ($budget->file) {
                    $budget->file->delete();
                }

                $budget->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
            }
        } elseif ($budget->file) {
            $budget->file->delete();
        }

        return (new BudgetResource($budget))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Budget $budget)
    {
        abort_if(Gate::denies('budget_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $budget->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
