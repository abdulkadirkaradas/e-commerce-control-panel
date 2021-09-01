<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCustomerReviewRequest;
use App\Http\Requests\StoreCustomerReviewRequest;
use App\Http\Requests\UpdateCustomerReviewRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerReviewsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerReviews.index');
    }

    public function create()
    {
        abort_if(Gate::denies('customer_review_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerReviews.create');
    }

    public function store(StoreCustomerReviewRequest $request)
    {
        $customerReview = CustomerReview::create($request->all());

        return redirect()->route('admin.customer-reviews.index');
    }

    public function edit(CustomerReview $customerReview)
    {
        abort_if(Gate::denies('customer_review_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerReviews.edit', compact('customerReview'));
    }

    public function update(UpdateCustomerReviewRequest $request, CustomerReview $customerReview)
    {
        $customerReview->update($request->all());

        return redirect()->route('admin.customer-reviews.index');
    }

    public function show(CustomerReview $customerReview)
    {
        abort_if(Gate::denies('customer_review_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerReviews.show', compact('customerReview'));
    }

    public function destroy(CustomerReview $customerReview)
    {
        abort_if(Gate::denies('customer_review_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerReview->delete();

        return back();
    }

    public function massDestroy(MassDestroyCustomerReviewRequest $request)
    {
        CustomerReview::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
