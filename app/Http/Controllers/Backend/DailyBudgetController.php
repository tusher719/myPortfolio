<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DailyBudgetCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DailyBudgetController extends Controller
{
    //
    public function BudgetView(){
        $category = DailyBudgetCategory::orderBy('category_name')->get();
        return view("backend.daily_budget.category", compact('category'));
    }

    public function CategoryStore(Request $request) {
        $request->validate([
            'category_name' => 'required',

        ],[
            'category_name.required' => 'Input Blog Category Name',
        ]);

        DailyBudgetCategory::insert([
            'category_name' => Str::ucfirst($request->category_name),
            'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Category Insert Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method
}
