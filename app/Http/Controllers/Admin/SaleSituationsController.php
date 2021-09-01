<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySaleSituationRequest;
use App\Http\Requests\StoreSaleSituationRequest;
use App\Http\Requests\UpdateSaleSituationRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SaleSituationsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sale_situation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.saleSituations.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sale_situation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.saleSituations.create');
    }

    public function store(StoreSaleSituationRequest $request)
    {
        $saleSituation = SaleSituation::create($request->all());

        return redirect()->route('admin.sale-situations.index');
    }

    public function edit(SaleSituation $saleSituation)
    {
        abort_if(Gate::denies('sale_situation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.saleSituations.edit', compact('saleSituation'));
    }

    public function update(UpdateSaleSituationRequest $request, SaleSituation $saleSituation)
    {
        $saleSituation->update($request->all());

        return redirect()->route('admin.sale-situations.index');
    }

    public function show(SaleSituation $saleSituation)
    {
        abort_if(Gate::denies('sale_situation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.saleSituations.show', compact('saleSituation'));
    }

    public function destroy(SaleSituation $saleSituation)
    {
        abort_if(Gate::denies('sale_situation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $saleSituation->delete();

        return back();
    }

    public function massDestroy(MassDestroySaleSituationRequest $request)
    {
        SaleSituation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
