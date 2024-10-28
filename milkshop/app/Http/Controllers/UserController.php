<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Auth;
use App\FindModel;
use App\User;
use App\Area;
use App\Category;
use App\Billing;
use App\Complaints;
use Alert;
date_default_timezone_set('Asia/Karachi');
class UserController extends Controller
{   public function billingadd(Request $request,$id) {
        $this->validate($request, [
            'quantity' => 'required|numeric',
        ]);
        $house = FindModel::find($id);
        $billing = new Billing;
        $billing->quantity = $request->quantity;
        $billing->price = $house->price;
        $billing->user_id = $house->user_id;
        $billing->find_model_id = $request->id;
        $billing->total = $request->quantity*$house->price;
        $billing->save();
        Alert::success('Added!');
        return redirect()->back();
    }
    public function addquantity(Request $request,$id) {
        $house = FindModel::find($id);
        $rating = round(Auth::user()->averageRating);
         if (Auth::user()->admin == 0) {
           return view('addquantity',compact('house','rating'));
        }
        if (Auth::user()->admin == 1) {
            Alert::error('You need to login as milk man', 'Access Denied!');
           return redirect('/admin');
        }
    }
    public function billdetails(Request $request,$id) {
        $currentMonth = date("m");
        $details = DB::table('billings')
            ->where('find_model_id', '=', $id)
            ->whereMonth('created_at', $currentMonth)
            ->get();
        $house = FindModel::find($id);
        if (Auth::user()->admin == 0) {
           return view('billdetails',compact('details','id','house'));
        }
        if (Auth::user()->admin == 1) {
            Alert::error('You need to login as milk man', 'Access Denied!');
           return redirect('/admin');
        }
    }
    public function viewprofile(){
        $houses = User::find(Auth::user()->id)->finds->where('status', '=', '1');
        if (Auth::user()->admin == 0) {
           return view('home', array('user' => Auth::user()) ,compact('houses'));
        }
        if (Auth::user()->admin == 1) {
           return redirect('/admin');
        }
    }
    public function complaintsview(Request $request, $id){
        $houses = FindModel::all();
        $categories = Category::all();
        if (Auth::user()->admin == 0) {
           return view('survey',compact('categories','houses','id'));
        }
        if (Auth::user()->admin == 1) {
         Alert::error('You need to login as milk man', 'Access Denied!');
           return redirect('/admin');
        }
    }
    public function surveydelete(Request $request, $id) {
        Complaints::destroy($id);
        Alert::success('Deleted!');
        return redirect()->back();
    }
     public function surveyresult(){
        $surveys = Complaints::all();
        $houses = FindModel::all();
        $users = User::all();
        return view('surveyresult',compact('surveys','houses','users'));
    }
    public function store(Request $request, $id) {
        $this->validate($request, [
            'suggestion' => 'required|min:10',
        ]);
        $Complaints = new Complaints;
        if ($request->quality) {
        $Complaints->quality = $request->quality;
        }
        if (empty($request->quality)) {
        $Complaints->quality = "Not Satisfied";
        }
        if ($request->availibility) {
        $Complaints->availibility = $request->availibility;
        }
        if (empty($request->availibility)) {
        $Complaints->availibility = "Not Satisfied";
        }
        if ($request->quantity) {
        $Complaints->quantity = $request->quantity;
        }
        if (empty($request->quantity)) {
        $Complaints->quantity = "Not Satisfied";
        }
        if ($request->behaviour) {
        $Complaints->behaviour = $request->behaviour;
        }
        if (empty($request->behaviour)) {
        $Complaints->behaviour =  "Not Satisfied";
        }
        if ($request->service) {
        $Complaints->service = $request->service;
        }
        if (empty($request->service)) {
        $Complaints->service = "Not Satisfied";
        }
        $Complaints->description = $request->suggestion;
        $Complaints->find_model_id = $id;
        $Complaints->user_id = Auth::user()->id;
        $Complaints->save();
        Alert::message('For your valuable Feedback!', 'Thank You!');
        return redirect()->back();
    }
    public function storepoor(Request $request, $id) {
        $this->validate($request, [
            'description' => 'required|min:10',
        ]);
        $Complaints = new Complaints;
        if ($request->quality) {
        $Complaints->quality = $request->quality;
        }
        if (empty($request->quality)) {
        $Complaints->quality = "Satisfied";
        }
        if ($request->availibility) {
        $Complaints->availibility = $request->availibility;
        }
        if (empty($request->availibility)) {
        $Complaints->availibility = "Satisfied";
        }
        if ($request->quantity) {
        $Complaints->quantity = $request->quantity;
        }
        if (empty($request->quantity)) {
        $Complaints->quantity = "Satisfied";
        }
        if ($request->behaviour) {
        $Complaints->behaviour = $request->behaviour;
        }
        if (empty($request->behaviour)) {
        $Complaints->behaviour =  "Satisfied";
        }
        if ($request->service) {
        $Complaints->service = $request->service;
        }
        if (empty($request->service)) {
        $Complaints->service = "Satisfied";
        }
        $Complaints->description = $request->description;
        $Complaints->find_model_id = $id;
        $Complaints->user_id = Auth::user()->id;
        $Complaints->save();
        Alert::message('For your valuable Feedback!', 'Thank You!');
        return redirect()->back();
    }
}