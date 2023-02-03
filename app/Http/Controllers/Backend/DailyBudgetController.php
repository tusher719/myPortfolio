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

    // Category Store
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

    // Category Edit
    public function CategoryEdit($id){
        $category = DailyBudgetCategory::findOrFail($id);
        return view('backend.daily_budget.category_edit', compact('category'));
    } // End Method

    // Category Update
    public function CategoryUpdate(Request $request){
        $cat_id = $request->id;

        DailyBudgetCategory::findOrFail($cat_id)->update([
            'category_name' => Str::ucfirst($request->category_name),
            'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('category.budget.page')->with($notification);
    } // End Method

    // Category Function
    public function CategoryDelete($id){

        DailyBudgetCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    } // End Method

    // Mark Delete Function
    public function MarkDelete(Request $request){
        foreach ($request->mark as $mark_id){
            DailyBudgetCategory::findOrFail($mark_id)->delete();
        }

        $notification = array(
            'message' => 'Multiple Category Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }


}
