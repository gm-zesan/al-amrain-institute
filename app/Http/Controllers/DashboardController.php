<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
class DashboardController extends Controller
{
    public function index(){
        $donation_fund_count = 1;
        $donation_count = 1;
        $team_member_count = 1;
        return view('admin.home.index', compact('donation_fund_count', 'donation_count', 'team_member_count'));
    }

    public function cacheClear(){
        Artisan::call('optimize:clear');
        Artisan::call('view:clear');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');

        return back()->with('success', 'Cache Cleared Successfully');
    }
    
    public function settings()
    {
        return view('admin.home.settings');
    }

    public function changePassword()
    {
        return view('profile.change-password');
    }
    public function myProfile()
    {
        return view('profile.my-profile');
    }

    
}
