<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCouponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::OrderBy('updated_at')->get();
        return view('admin.pages.manajemen-kupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCouponRequest $request)
    {
        try {
            $new_coupon = Coupon::create($request->validated());
            alert('Berhasil', 'Kupon Telah Ditambahkan', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coupon = Coupon::where('id', $id)->first();

        return response()->json([
            'data' => $coupon
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $coupon)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        //
    }

    public function updateStatus(Request $request)
    {
        try {
            DB::beginTransaction();

            if ($request->mode == 'false') {
                DB::table('coupons')->where('id', '=', $request->id)->update(['status' => 'inactive']);
            } else {
                DB::table('coupons')->where('id', '=', $request->id)->update(['status' => 'active']);
            }
            DB::commit();
            return response()->json([
                'message' => 'Status Kupon Berhasil Diubah',
                'status' => true
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }
}
