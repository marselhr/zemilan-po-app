<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderDataController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data['orders'] = Auth::user()->orders;

        $content = view('profile.tab_content.order-data', compact('data'))->render();

        return response()->json([
            'status' => true,
            'content' => $content,
            'message' => 'Data berhasil diperoleh',
        ]);
    }
}
