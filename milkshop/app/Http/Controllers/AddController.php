<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Codedge\Fpdf\Fpdf\FPDF;
use willvincent\Rateable\Rating;
use App\FindModel;
use App\User;
use App\Billing;
use App\Complaints;
use App\Category;
use App\Area;
use App\Recieved;
use Alert;
date_default_timezone_set('Asia/Karachi');
class AddController extends Controller
{		public function rating(Request $request, $id) {
			if(!empty($request->rated)) {
			$post = User::find($id);
    		$rating = new Rating;
			$rating->rating = $request->rated;
			$rating->user_id = $id;
			$post->ratings()->save($rating);

		}	
		Alert::message('For your valuable feedback', 'ThankYou!');
			return redirect()->back();
	}
	public function userassign(Request $request, $id) {

			if(!empty($request->table_records)) {
    		foreach($request->table_records as $check) {
            $users = DB::table('find_models')
                    ->whereIn('id', [$check])
                    ->update(['user_id' => $request->user]);
								}
			Alert::message('Selected House assigned.', 'Assigned!');
		}	
					return redirect()->back();
	}
	public function paidupdate(Request $request) {
			$date = date('d-m-y');
			if(!empty($request->table_records)) {
    		foreach($request->table_records as $check) {
            $recieve = DB::table('billings')
                    ->whereIn('id', [$check])
                    ->update(['recieved' => $date]);
								}
		}	flash('Payment for selected bill updated as Paid', 'info');
					return redirect()->back();
	}
			public function recieved(Request $request, $id) {
			$currentMonth = date("m-Y",strtotime($request->hello));
			$currentYear = date("Y-m",strtotime($request->hello));
			$date = date('d-m-y');		
		$data = DB::table("billings")
			 ->where('find_model_id', $id)
			 ->whereNull('recieved')
			->whereMonth('created_at', $currentMonth)
			->whereYear('created_at', $currentYear)
			->get();
			$avgprice = DB::table("billings")
			->where('find_model_id', '=', $id)
			->whereNull('recieved')
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->select(DB::raw('avg(price) as total_sales'))
            ->get();
           foreach ($avgprice as $sales) {
        	$average = $sales->total_sales;
        }

        	$data = DB::table("billings")
			->where('find_model_id', '=', $id)
			->whereNull('recieved')
			->whereMonth('created_at', $currentMonth)
			->whereYear('created_at', $currentYear)
			->select(DB::raw('sum(total) as total_sales'))
            ->get();
        foreach ($data as $sales) {
        	$sum = $sales->total_sales;
        }
        	$data = DB::table("billings")
        	->where('find_model_id', '=', $id)
        	->whereNull('recieved')
        	->whereMonth('created_at', $currentMonth)
        	->whereYear('created_at', $currentYear)
			->select(DB::raw('sum(quantity) as total_sales'))
            ->get();
        foreach ($data as $sales) {
        	$quantitymonth = $sales->total_sales;
        }
        	if ($sum) {
        	$house = FindModel::find($id);
        	$recieved = new Recieved;
			$recieved->date = $currentYear;
			$recieved->quantity = $quantitymonth;
			$recieved->averageprice = $average;
			$recieved->total = $sum;
			$recieved->find_model_id = $id;
			$recieved->user_id = $house->user_id;
			$recieved->save();
        	}
        	if (empty($sum)) {
        		flash('There is no bill to calculate for selected month.', 'info');
        		}	
        	return redirect()->back();	
			}
		public function recievedadd(Request $request, $id) {
			$this->validate($request, [
			'recievedamount' => 'required',
		]);
			$recieved = Recieved::find($id);
			$recieved->recievedamount = $request->recievedamount;
			$recieved->save();
			flash('Recieved amount added!', 'success');
			return redirect()->back();
			}
		public function recievedstatus(Request $request, $id,$dategot,$where) {
			$currentMonth = date("m-Y",strtotime($dategot));
			$currentYear = date("Y-m",strtotime($dategot));
			$date = date('d-m-y');		
			$data = DB::table("billings")
			 ->where('find_model_id', $id)
			->whereMonth('created_at', $currentMonth)
			->whereNull('recieved')
			->whereYear('created_at', $currentYear)
			->update(['recieved' => $date]);
			$hey = DB::table("recieveds")
			 ->whereIn('id', [$where])
			 ->update(['status' => $date]);
			 flash('Payment for selected month has been updated as Paid.', 'success');
			return redirect()->back();					
			}
		public function billprint(Request $request, $id,$dategot) {
            $currentMonth = date("m-Y",strtotime($dategot));
            $currentYear = date("Y-m",strtotime($dategot));
            $printDate = date("M-Y",strtotime($dategot));
            $date = date('d-m-y');      
            $details = DB::table("billings")
             ->where('find_model_id', $id)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->get();
        $recieved = DB::table("billings")
			->where('find_model_id', '=', $id)
			->whereMonth('created_at', $currentMonth)
			->whereYear('created_at', $currentYear)
			->whereNull('recieved')
			->select(DB::raw('sum(total) as total_sales'))
            ->get();
        foreach ($recieved as $sales) {
        	$payable = $sales->total_sales;
        }
        $house =FindModel::find($id);
         $pdf = new FPDF();
         $pdf->AddPage();
		 $pdf->SetLineWidth(.3);
         $pdf->SetFont('Courier', 'B', 18);
         $pdf->Image("/Applications/MAMP/htdocs/milkshop/storage/app/public/site_logo.png",10,8,33);
         $pdf->Cell(0,10,"Monthly Bill ",0,"","C");
         $pdf->Ln();
         $pdf->Ln();
         $pdf->SetFont('Arial','B',12);
         $pdf->cell(38,8,"Quantity",1,"","C");
         $pdf->cell(38,8,"Price per Liter",1,"","C");
         $pdf->cell(38,8,"Total",1,"","C");
         $pdf->cell(38,8,"Status",1,"","C");
         $pdf->cell(38,8,"Date",1,"","C");
         $pdf->Ln();
         $pdf->SetFont('Arial','', 10);
         foreach ($details as $key => $detail) {
         $pdf->cell(38,6,$detail->quantity.' Liter' ,1,"","C");
         $pdf->cell(38,6,$detail->price.' Rs',1,"","C");
         $pdf->cell(38,6,$detail->total.' Rs',1,"","C");
         if ($detail->recieved == NULL) {
         	$pdf->cell(38,6,"Unpaid",1,"","C");
         }
         if ($detail->recieved !== NULL) {
         	$pdf->cell(38,6,"Paid",1,"","C");
         }
         $pdf->cell(38,6,$detail->created_at,1,"","C");
         $pdf->Ln();
          }
         $pdf->Ln();
         $pdf->SetFont('Arial','',12);
         $pdf->Cell(0,6,"Date: ".$printDate,0,"","L");
         $pdf->Ln();
         $pdf->Cell(0,6,$house->firstname." ".$house->lastname,0,"","L");
         $pdf->Ln();
         $pdf->Cell(0,6,$house->address,0,"","L");
         $pdf->Ln();
         $pdf->SetFont('Arial','B', 12);
          $pdf->Cell(0,7,"Total Payable: ".$payable." Rs",0,"","L");
         

         $pdf->Output();
            return redirect()->back();                  
            }
		public function recieveddelete(Request $request, $id) {
			Recieved::destroy($id);
			flash('Calculated Payment Deleted!', 'danger');
			return redirect()->back();
		}
		 public function housedetails(Request $request, $id) {
		 	$currentdate =date('Y-m');	
			$house = FindModel::find($id);
			return view('housedetails', compact('house','currentdate'));
		}
		public function bymonth(Request $request, $id) {
			$print = $request->datefilter;
			$currentMonth = date("m-Y",strtotime($request->datefilter));
			$currentYear = date("Y-m",strtotime($request->datefilter));
			$data = DB::table("billings")
        	->where('find_model_id', '=', $id)
        	->whereMonth('created_at', $currentMonth)
        	->whereYear('created_at', $currentYear)
			->select(DB::raw('sum(total) as total_sales'))
            ->get();
        foreach ($data as $sales) {
        	$sales = $sales->total_sales;
        }
        $quantity = DB::table("billings")
        	->where('find_model_id', '=', $id)
        	->whereMonth('created_at', $currentMonth)
        	->whereYear('created_at', $currentYear)
       		->whereNull('recieved')
			->select(DB::raw('sum(total) as total_sales'))
            ->get();
         $helllo = DB::table("billings")
        	->where('find_model_id', '=', $id)
        	->whereMonth('created_at', $currentMonth)
        	->whereYear('created_at', $currentYear)
			->select(DB::raw('sum(quantity) as total_sales'))
            ->get();
			$house = DB::table("billings")
			 ->where('find_model_id', $id)
			->whereMonth('created_at', $currentMonth)
			->whereYear('created_at', $currentYear)
			->get();
			if (empty($sales)) {
				flash('No Records Found!', 'info');
				return redirect()->back();
			}
			if (!empty($sales)) {
			$houses = FindModel::find($id);
			return view('housedate', compact('house','houses','currentMonth','sales','quantity','helllo','print'));
			}
		}
  public function category() {
			$categories = Category::all();
			return view('category', compact('categories'));
		}
	public function categoryadd(Request $request) {
		$this->validate($request, [
			'category' => 'required',
		]);
		$category = new Category;
		$category->name = $request->category;
		$category->save();
		return redirect()->back();
	}
	public function categoryedit(Request $request, $id) {
			$category = Category::find($id);
			return view('categoryedit', compact('category'));
		}
	public function categorydelete(Request $request, $id) {
			Category::destroy($id);
			return redirect()->back();
		}
		public function categoryupdate(Request $request, $id) {
		$this->validate($request, [
			'category' => 'required',
		]);
		$category = Category::find($id);
		$category->name = $request->category;
		$category->save();
		return redirect('/category');
	}



	public function area() {
			$areas = Area::all();
			return view('area', compact('areas'));
		}
	public function areaadd(Request $request) {
		$this->validate($request, [
			'area' => 'required',
		]);
		$area = new Area;
		$area->name = $request->area;
		$area->save();
		flash('New Area has been Added!','success');
		return redirect()->back();
	}
	public function areadelete(Request $request, $id) {
			Area::destroy($id);
			flash('Selected Area has been deleted', 'danger');
			return redirect()->back();
		}
		public function areaupdate(Request $request, $id) {
		$this->validate($request, [
			'area' => 'required',
		]);
		$area = Area::find($id);
		$area->name = $request->area;
		$area->save();
		flash('Selected Area has been Edited!','success');
		return redirect('/area');
	}
}
