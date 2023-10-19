<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PurchasePlan;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    //--profile
    public function profile(Request $request)
    {
        $accessor = $request->session()->get('accessor');
        $subscriber = Subscriber::where('token', $accessor)->first();
        if (Subscriber::where('token', $accessor)->count() > 0) {
            $logIn = 1;
        } else {
            $logIn = 0;
        }
        return view('frontend.pages.profile', compact('subscriber', 'logIn'));
    }
    //---profile_update
    public function profile_update(Request $request, $id)
    {
        $subscriber = Subscriber::where('id', $id)->first();
        $subscriber->update([
            'name' => $request->username
        ]);
        if ($request->hasFile('imageupload')) {
            if($subscriber->image){
                File::delete($subscriber->image);
            }
            $image = $request->file('imageupload')->getClientOriginalExtension();
            $imageName = uniqid().'.'.$image;
            $imagePath = 'assets/frontend/images/uploads/user/'.$imageName;
            $request->file('imageupload')->move(public_path('assets/frontend/images/uploads/user'), $imageName);
            $subscriber->update([
                'image' => $imagePath
            ]);
        }
        return redirect()->back()->with('update', 'Your Profile Has Been Updated!');
    }
}
