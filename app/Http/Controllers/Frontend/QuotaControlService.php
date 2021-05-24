<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Vol;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuotaControlService extends Controller
{
    public function __construct()
    {
    }

    public function control($user, $count)
    {
        $categoryQuota = config('quota.emp_categories')[$user->emp_category];
        $functionQuota = config('quota.emp_fonctions')[$user->emp_function];

        $userQuota = $categoryQuota['quota'] + $functionQuota['quota']; // 2

        if ($user->conjoint) {
            $userQuota = $userQuota + 2;
        }

        $userQuota = $userQuota + (count($user->children) * 2);


        if ($userQuota < $count) {
            return false;
        }

        return true;
    }

    /**
     * Normalement la liste des vols est fournie par une API (webservice) de Tunisair.
     * Pour le moment on utilise cette fonction.
     */
    public function search(Request $request)
    {

        $vols = Vol::where('escale_depart', $request->from)
            ->whereDate('date_vol', '>=', $request->departure_date)
            ->get();

        $request->session()->put('ticketCount', $request->tickets_count);

        return view('frontend.tickets.index')->with('flights', $vols);
    }
}