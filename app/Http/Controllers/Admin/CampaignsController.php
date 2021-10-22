<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCampaignRequest;
use App\Http\Requests\StoreCampaignRequest;
use App\Http\Requests\UpdateCampaignRequest;
use App\Models\Campaign;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CampaignsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('campaign_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaigns = $this->getValues(Campaign::with(['customer_id', 'product_id'])->get());

        return view('admin.campaigns.index', compact('campaigns'));
    }

    private function getValues($collection) {
        foreach ($collection as $key => $value) {
            $value->customer = Customer::find($value->customer_id);
            $value->product = Product::find($value->product_id);
        }
        return $collection;
    }

    public function create()
    {
        abort_if(Gate::denies('campaign_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customer_ids = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product_ids = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.campaigns.create', compact('customer_ids', 'product_ids'));
    }

    public function store(StoreCampaignRequest $request)
    {
        $campaign = Campaign::create($request->all());

        return redirect()->route('admin.campaigns.index');
    }

    public function edit(Campaign $campaign)
    {
        abort_if(Gate::denies('campaign_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customer_ids = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product_ids = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $this->getValues([$campaign->load('customer_id', 'product_id')]);

        return view('admin.campaigns.edit', compact('customer_ids', 'product_ids', 'campaign'));
    }

    public function update(UpdateCampaignRequest $request, Campaign $campaign)
    {
        $campaign->update($request->all());

        return redirect()->route('admin.campaigns.index');
    }

    public function show(Campaign $campaign)
    {
        abort_if(Gate::denies('campaign_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->getValues([$campaign->load('customer_id', 'product_id')]);

        return view('admin.campaigns.show', compact('campaign'));
    }

    public function destroy(Campaign $campaign)
    {
        abort_if(Gate::denies('campaign_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaign->delete();

        return back();
    }

    public function massDestroy(MassDestroyCampaignRequest $request)
    {
        Campaign::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
