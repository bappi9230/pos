<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
   public function AddExpense(){

     return view('backend.expense.add_expense');

   } //end method

   public function StoreExpense(Request $request){

       Expense::insert([
           'details' => $request->details,
           'amount' => $request->amount,
           'month' => $request->month,
           'year' => $request->year,
           'date' => $request->date,
           'created_at' => Carbon::now(),
       ]);

       $notification = array(
           'message' => 'Expense Inserted Successfully',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);

   } //end method

    public function DailyExpense(){

       $date = date('d-m-Y');
       $today_expense = Expense::where('date',$date)->get();
        $today_total_expense = Expense::where('date',$date)->sum('amount');
       return view('backend.expense.today_expense',compact('today_expense','today_total_expense'));
    }//end method

    public function EditExpense($id){

       $expense = Expense::findOrFail($id);
       return view('backend.expense.edit_expense',compact('expense'));

    } //end method


    public function UpdateExpense(Request $request){

       $expense_id =$request->id;
       Expense::findOrFail($expense_id)->update([
           'details' => $request->details,
           'amount' => $request->amount,
           'month' => $request->month,
           'year' => $request->year,
           'date' => $request->date,
           'created_at' => Carbon::now(),
       ]);
        $notification = array(
            'message' => 'Expense Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('daily.expense')->with($notification);

    } //end method


    public function MonthlyExpense(){

       $month = date('F');
       $monthly_expense = Expense::where('month',$month)->get();
       $total_monthly_expense = Expense::where('month',$month)->sum('amount');
       return view('backend.expense.monthly_expense',compact('monthly_expense','total_monthly_expense'));

    } //end method


    public function YearlyExpense(){

        $yearly = date('Y');
        $yearly_expense = Expense::where('year',$yearly)->get();
        $total_yearly_expense = Expense::where('year',$yearly)->sum('amount');
        return view('backend.expense.yearly_expense',compact('yearly_expense','total_yearly_expense'));
    }//end method

}
