<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Services\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    /**
     * @var CustomerService
     */
    private $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response|\Illuminate\Contracts\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $filters = $request->only('country_code', 'phone_state');

            $data = count($filters) ?
                $this->customerService->handleFilters($filters) :
                Customer::all();

            return Datatables::of($data)
                ->addColumn('phone_state', 'customers.phoneState')
                ->rawColumns(['phone_state'])
                ->make(true);
        }
        return view('customers.index');
    }
}
