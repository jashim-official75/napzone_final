<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function show(Request $request)
    {
        $notification = Support::where('contacted', 0)->orderByDesc('created_at')->take(3)->get();
        $supports = Support::orderByDesc('created_at')->paginate(10);
        return view('backend.pages.support.support',  compact('supports', 'notification'));
    }

    public function makeMark(Request $request, $supportId)
    {
        $marked = Support::where('id', $supportId)->update(['contacted' => 1]);
        if ($marked) {
            return redirect()->back()->with('success', 'You have marked as conatcted.');
        }
        return redirect()->back()->with('error', 'Error to mark as contacted.');
    }

    public function unread(Request $request)
    {
        $notification = Support::where('contacted', 0)->orderByDesc('created_at')->take(3)->get();
        $supports = Support::where('contacted', 0)->orderByDesc('created_at')->paginate(10);
        return view('backend.pages.support.support',  compact('supports', 'notification'));
    }
}
