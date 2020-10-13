<?php

namespace App\Http\Controllers\Admin;

use App\Budget;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBudgetRequest;
use App\Http\Requests\StoreBudgetRequest;
use App\Http\Requests\UpdateBudgetRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BudgetController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('budget_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $budgets = Budget::all();

        return view('admin.budgets.index', compact('budgets'));
    }

    public function create()
    {
        abort_if(Gate::denies('budget_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.budgets.create');
    }

    public function store(StoreBudgetRequest $request)
    {
        $budget = Budget::create($request->all());

        if ($request->input('file', false)) {
            $budget->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $budget->id]);
        }

        return redirect()->route('admin.budgets.index');
    }

    public function edit(Budget $budget)
    {
        abort_if(Gate::denies('budget_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.budgets.edit', compact('budget'));
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

        return redirect()->route('admin.budgets.index');
    }

    public function show(Budget $budget)
    {
        abort_if(Gate::denies('budget_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.budgets.show', compact('budget'));
    }

    public function destroy(Budget $budget)
    {
        abort_if(Gate::denies('budget_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $budget->delete();

        return back();
    }

    public function massDestroy(MassDestroyBudgetRequest $request)
    {
        Budget::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('budget_create') && Gate::denies('budget_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Budget();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
