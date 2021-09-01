<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCustomerReviewRequest;
use App\Http\Requests\StoreCustomerReviewRequest;
use App\Http\Requests\UpdateCustomerReviewRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class CustomerReviewsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerReviews.index');
    }
}
