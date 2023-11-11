<?php

namespace App\Http\Services;

use Exception;
use Carbon\Carbon;
use App\Models\Coupon;
use Illuminate\Http\Request;

class ApplyCouponService
{

    public function apply(Request $request)
    {

        $coupon = Coupon::where('code', $request->code)->first();
        // cek time

        if ($coupon == null || $coupon->status == 'inactive' || $this->cekStartDate($coupon) == false || $this->cekExprireDate($coupon) == false) {
            return response()->json([
                'status' => false,
                'message' => 'Kupon Tidak Valid!'
            ]);
        }
        return response()->json(
            [
                'status' => true,
                'message' => "Berhasil"
            ]
        );
    }

    public function cekStartDate(Coupon $coupon): bool
    {
        if ($coupon->start_date != null) {
            $startDate = Carbon::createFromFormat('Y-m-d H:i:s', $coupon->start_date);
            if (Carbon::now()->lt($startDate)) {
                return false;
            }
        }
        return true;
    }

    public function cekExprireDate($coupon)
    {
        if ($coupon->expiration_date != '') {
            $expireDate = Carbon::createFromFormat('Y-m-d H:i:s', $coupon->expiration_date);

            if (Carbon::now()->gt($expireDate)) {
                return false;
            }
        }
        return true;
    }
}
