<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portal;

class PortalController extends Controller
{
    public function switch(Request $request)
    {
        $key = $request->input('portal_key');
        $portal = Portal::where('key', $key)->first();
        if ($portal) {
            session(['portal_key' => $portal->key]);
            session()->flash('ok', "Portal set to: {$portal->name}");
        }
        return back();
    }
}
