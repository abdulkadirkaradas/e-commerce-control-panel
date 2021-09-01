<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySaleSituationRequest;
use App\Http\Requests\StoreSaleSituationRequest;
use App\Http\Requests\UpdateSaleSituationRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class SaleSituationsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sale_situation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.saleSituations.index');
    }
}
