<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Models\VPS;
use App\Models\Plan;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CalculationController extends Controller
{

    public function calc(Request $request)
    {
        $user = $request->estimation;
        $webapp = $request->webapp;

        $request->validate([
            'estimation' => 'required',
            'webapp' => 'required'
        ]);

        if ($webapp == "static") {
            $pagesize = 2; 
            $disks = 2;
            $memory = 0;
            $clicks = 4;
            $load = 1;
        }elseif ($webapp == "dynamic") {
            $pagesize = 4;
            $disks = 7;
            $memory = 8;
            $clicks = 2;
            $load = 2;
        }elseif ($webapp == "ecommerce") {
            $pagesize = 4;
            $disks = 10;
            $memory = 16;
            $clicks = 1;
            $load = 2;
        }
        
        $bandwidth = (($user * $pagesize * ($clicks / 60)) / 1000) * 30;
        $storage = (((($user * $disks) / 85) * 100) / 1000);
        $transfer = $bandwidth/1000;
        $vcpu = ceil((($user / 60 / $clicks) * $load));

        $plan = Plan::join('vps','vps.id', '=', 'plans.vps_id')
            ->select(['plans.*', 'vps.logo'])
            ->where('storage', '>=', $storage)
            ->where('vcpu', '>=', $vcpu)
            ->where('memory', '>=', $memory)
            ->orderBy('price', 'asc');
            
        
        $lists = $plan->paginate(12);
        $listCount = $plan->count();

        return Inertia::render('Result', ['lists' => $lists, 'listCount'=> $listCount, 'bandwidth' => $bandwidth, 'estimation' => $user, 'webapp' => $webapp, 'storage' => $storage, 'vcpu' => $vcpu]);
    }
    

}
