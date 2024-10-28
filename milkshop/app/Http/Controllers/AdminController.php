<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use App\FindModel;
use App\User;
use App\Area;
use App\Billing;
use App\Complaints;
use App\Recieved;
use Alert;
date_default_timezone_set('Asia/Karachi');
class AdminController extends Controller
{
   public function panel() {
   		$billings = Billing::all();
   		$avgprice = FindModel::avg('price');
   		$users = User::all();
   		$houses = FindModel::with('area','user')->get();
   		$housesnumber = FindModel::where('status','=','1')->count();
   		$usersnumber = User::where('admin','=','0')->count();
   		$currentMonth = date('m');
   		$currentYear = date('Y');
		$data = DB::table("billings")
			->select(DB::raw('sum(total) as total_sales'))
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->get();
        foreach ($data as $sales) {
        	$sum = $sales->total_sales;
        }
        $data = DB::table("billings")
			->select(DB::raw('sum(quantity) as total_sales'))
			 ->whereMonth('created_at', $currentMonth)
			 ->whereYear('created_at', $currentYear)
            ->get();
        foreach ($data as $sales) {
        	$quantitythismonth = $sales->total_sales;
        }
		return view('adminpanel',compact('billings','sum','houses','housesnumber','users','avgprice','quantitythismonth'));
	}
	public function usersview() {
		$users = User::all();		
		$areas = Area::all();
		return view('users',compact('users','areas'));
	}
	public function userview(Request $request,$id) {
		$user = User::find($id);
		$rating = round($user->averageRating);
		$users = User::all();
		$houses = User::find($id)->finds->where('status', '=', '1');
		return view('user',compact('user','houses','users','rating'));
	}
	public function userdelete(Request $request,$id) {
		$billings = User::find($id)->billings;
		foreach ($billings as $billing) {
			$billing->forceDelete();
		}
		$ratings = User::find($id)->ratings;
		foreach ($ratings as $rating) {
			$rating->forceDelete();
		}
		$complaints = User::find($id)->complaints;
		foreach ($complaints as $complaint) {
			$complaint->forceDelete();
		}
		$recieveds = User::find($id)->recieveds;
		foreach ($recieveds as $recieved) {
			$recieved->forceDelete();
		}
		$houses = User::find($id)->finds;
		foreach ($houses as $house) {
			$house->forceDelete();
		}
		User::destroy($id);
		Alert::success('Deleted!');
		flash('Selected Person has been deleted', 'danger');
		return redirect()->back();
	}
	public function useredit(Request $request, $id) {
			$user = User::find($id);
			$areas = Area::all();
			return view('edituser', compact('areas','user'));
		}
	public function usereditstore(Request $request, $id){
    	// Handle the user upload of avatar
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'required|max:255',
             'address' => 'required|max:255',
        ]);
        $user = User::find($id);
    	if (!empty($request->file('avatar'))) {
			$imagesizedata = filesize($request->file('avatar'));
			if ($imagesizedata > 2000000) {
			Alert::info('Upload Image less than 2 MB.', 'Image Too Large!');
			return redirect()->back();
			}
			if ($imagesizedata < 2000000) {
			$file = $request->file('avatar')->store('public/avatars');
			Image::make($file)->fit(500)->save(public_path($file));
			$user->avatar = $file;
			Alert::success('Image Successfully Uploaded!');
			}
		}
    	if(!empty($request->password)){
    		$this->validate($request, [
            'password' => 'required|min:6|confirmed'
        ]);
    		$user->password = bcrypt($request->password);
    	}
        if(!empty($request->username)){
            $this->validate($request, [
            'username' => 'required|max:255|unique:users,username',
        ]);
             $user->username = $request->username;
        }
        if(!empty($request->email)){
            $this->validate($request, [
            'email' => 'required|email|max:255|unique:users',
        ]);
             $user->email = $request->email;
        }
        if($request->admincheck == 1){
            $user->admin = 1;
        }
        if (empty($request->admincheck)) {
        	$user->admin = 0;
        }
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->area_id = $request->area;
            $user->phone = $request->phone;
            $user->phone1 = $request->phone1;
            $user->idcard = $request->idcard;
            $user->address = $request->address;
            $user->save();
        flash('Selected person has been edited', 'success');
    	return redirect()->back();
    }
	public function addauser() {
    	$areas = Area::all();
    	$users = User::all();
		return view('adduser',compact('areas','users'));
	}
	public function register(Request $request) {
		$this->validate($request, [
			'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'first_name' => 'required|max:15',
            'last_name' => 'required|max:15',
            'username' => 'required|min:5|max:12|unique:users,username',
			'phone' => 'required',
			'address' => 'required',
		]);
		$user = new User;
			if (!empty($request->file('avatar'))) {
			$imagesizedata = filesize($request->file('avatar'));
			if ($imagesizedata > 2000000) {
			Alert::info('Upload Image less than 2 MB.', 'Image Too Large!');
			return redirect()->back();
			}
			if ($imagesizedata < 2000000) {
			$file = $request->file('avatar')->store('public/avatars');
			Image::make($file)->fit(500)->save(public_path($file));
			$user->avatar = $file;
			Alert::success('Image Successfully Uploaded!');
			}
		}
	if($request->admin == 1){
            $user->admin = 1;
        }
        if (empty($request->admin)) {
        	$user->admin = 0;
        }
		$user->first_name = $request->first_name;
		$user->last_name = $request->last_name;
		$user->phone = $request->phone;
		$user->email = $request->email;
		$user->username = $request->username;
		$user->area_id = $request->area;
		$user->phone1 = $request->phone1;
		$user->idcard = $request->idcard;
		$user->address = $request->address;
		$user->password = bcrypt($request->password);

		$user->save();
		flash('New Person has been added', 'success');
		return redirect('users');
}
	public function housesview() {
   		$houses = DB::table('find_models')
            ->where('status', '=', '1')
            ->get();
		$areas = Area::all();
		$users = User::all();
		return view('houses',compact('houses','areas','users'));
	}
	public function housescategory(Request $request, $id) {
   		$houses = DB::table('find_models')
            ->where('status', '=', '1')
             ->whereIn('area_id', [$id])
            ->get();
		$areas = Area::all();
		$users = User::all();
		return view('housesbycategory',compact('houses','areas','users','id'));
	}
	public function inactivehouses() {
		$houses = DB::table('find_models')
            ->where('status', '=', '0')
            ->get();
		$areas = Area::all();
		$users = User::all();
		return view('inactive',compact('houses','areas','users'));
	}
	public function billingadd(Request $request,$id) {
		$currentdate= date("d-m-y");
		$house = FindModel::find($id);
		$this->validate($request, [
			'quantity' => 'required',
		]);
		$billing = new Billing;
		$billing->quantity = $request->quantity;
		$billing->price = $house->price;
		$billing->user_id = $house->user_id;
		$billing->find_model_id = $request->id;
		$billing->total = $request->quantity*$house->price;
		$billing->save();
		flash('Bill added!', 'success');
		return redirect()->back();
	}
	public function billingdelete(Request $request,$id) {
		Billing::destroy($id);
		flash('Selected Bill Deleted!', 'danger');
		return redirect()->back();
	}
	public function billingupdate(Request $request,$id) {
		$this->validate($request, [
			'quantity' => 'required',
		]);
		$billing = Billing::find($id);
		$billing->quantity = $request->quantity;
		$billing->total = $request->quantity*$billing->price;
		$billing->save();
		flash('Selected Bill Edited!', 'success');
		return redirect()->back();
	}
	public function houseview(Request $request,$id) {
		$house = FindModel::find($id);
		$currentdate =date('Y-m');	
		return view('houseview',compact('house','currentdate'));
	}

	public function housedelete(Request $request,$id) {
		$billings = FindModel::find($id)->billings;
		foreach ($billings as $billing) {
			$billing->forceDelete();
		}
		$complaints = FindModel::find($id)->complaints;
		foreach ($complaints as $complaint) {
			$complaint->forceDelete();
		}
		$recieveds = FindModel::find($id)->recieveds;
		foreach ($recieveds as $recieved) {
			$recieved->forceDelete();
		}
		FindModel::destroy($id);
		Alert::success('Deleted!');
		flash('Selected House has been deleted.', 'danger');
		return redirect()->back();
	}
	public function houseaddview() {
    	$areas = Area::all();
    	$users = User::all();
		return view('addhouse',compact('areas','users'));
	}
	public function store(Request $request) {
		$this->validate($request, [
			'firstname' => 'required',
			'lastname' => 'required',
			'phone' => 'required',
			'address' => 'required',
			'price' => 'required',
		]);
		$house = new FindModel;
		if (!empty($request->file('photo'))) {
			$imagesizedata = filesize($request->file('photo'));
			if ($imagesizedata > 2000000) {
			Alert::info('Upload Image less than 2 MB.', 'Image Too Large!');
			return redirect()->back();
			}
			if ($imagesizedata < 2000000) {
			$file = $request->file('photo')->store('public/houses');
			Image::make($file)->fit(960,540)->save(public_path($file));
			$find->photo = $file;
			Alert::success('Image Successfully Uploaded!');
			}
		}
		$house->firstname = $request->firstname;
		$house->lastname = $request->lastname;
		$house->phone = $request->phone;
		$house->status = 1;
		$house->area_id = $request->area;
		$house->price = $request->price;
		$house->phone1 = $request->phone1;
		$house->idcard = $request->idcard;
		$house->address = $request->address;
		$house->user_id = $request->user;
		$house->assign = $request->user;
		$house->save();
		flash('New House has been added.', 'success');
		return redirect('houses');
}
	public function houseeditview(Request $request, $id) {
			$house = FindModel::find($id);
			$areas = Area::all();
			$users = User::all();
			return view('edithouse', compact('house','areas','users'));
		}
		public function houseupdate(Request $request, $id) {
		$this->validate($request, [
			'firstname' => 'required',
			'lastname' => 'required',
			'phone' => 'required',
			'address' => 'required',
			'price' => 'required',
		]);
		$find = FindModel::find($id);
		if (!empty($request->file('photo'))) {
			$imagesizedata = filesize($request->file('photo'));
			if ($imagesizedata > 2000000) {
			Alert::info('Upload Image less than 2 MB.', 'Image Too Large!');
			return redirect()->back();
			}
			if ($imagesizedata < 2000000) {
			$file = $request->file('photo')->store('public/houses');
			Image::make($file)->fit(960,540)->save(public_path($file));
			$find->photo = $file;
			Alert::success('Image Successfully Uploaded!');
			}
		}
		if($request->status == 1){
            $find->status = 1;
        }
        if (empty($request->status)) {
        	$find->status = 0;
        }
		$find->firstname = $request->firstname;
		$find->lastname = $request->lastname;
		$find->phone = $request->phone;
		$find->phone1 = $request->phone1;
		$find->idcard = $request->idcard;
		$find->price = $request->price;
		$find->address = $request->address;
		$find->area_id = $request->area;
		$find->user_id = $request->user;
		$find->assign = $request->user;
		$find->save();
		flash('Selected House has been edited.', 'success');
		return redirect()->back();

	}

}
