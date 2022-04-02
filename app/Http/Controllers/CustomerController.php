<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function show($id)
    {
        $customer = Customer::where('id', $id)->with('address')->get()->first();

        if ($customer != null) {
            return view('customer')->with('customer', $customer);
        } else
            return "Customer not found";
    }

    public function filter(Request $request)
    {
        $filters = [
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'isBlocked' => $request->get('isBlocked')
        ];

        if ($filters['isBlocked'] == "null" || $filters['isBlocked'] == null) {
            $customersToShow = Customer::where('phone', 'like', "%{$filters['phone']}%")
                ->where('email', 'like', "%{$filters['email']}%")
                ->where(DB::raw("concat(\"firstName\", ' ',\"lastName\")"), 'like', "%{$filters['name']}%")
                ->paginate(10);
        } else {
            $isBlockedBool = $filters['isBlocked'] == "true";

            $customersToShow = Customer::where('phone', 'like', "%{$filters['phone']}%")
                ->where('email', 'like', "%{$filters['email']}%")
                ->where('blocked', $isBlockedBool)
                ->where(DB::raw("concat(\"firstName\", ' ',\"lastName\")"), 'like', "%{$filters['name']}%")
                ->paginate(10);
        }

        $customersToShow->appends($request->except('page'));

        return view('customers')->with('customers', $customersToShow);
    }
}
