<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attendence;
use App\Models\Employee;
use Dotenv\Validator;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{

    public function EmployeeAttendenceList(){

        $allData = Attendence::select('date')->groupBy('date')->orderBy('date','desc')->get();
        return view('backend.attendance.view_employee_attend',compact('allData'));

    } // End Method

    public function AddEmployeeAttendence(){

        $employees = Employee::all();
        return view('backend.attendance.add_employee_attend',compact('employees'));

    }// End Method



    public function EmployeeAttendStore(Request $request){

        $request->validate([
            'date' => 'required|unique:attendences'
        ],[
            'date.required' => 'The date has already been taken. Select Another Date',
            ]);

        $total_employee_id = count($request->employee_id);

        for ($i=0; $i < $total_employee_id ; $i++){

            $attend_status = 'attend_status'.$i;
            $attend = new Attendence();
            $attend->employee_id = $request->employee_id[$i];
            $attend->date = date('Y-m-d',strtotime($request->date));
            $attend->attend_status = $request->$attend_status;
            $attend->save();
        }
        $notification = array(
            'message' => 'Data Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('employee.attend.list')->with($notification);
    }//end method

    public function EmployeeAttendEdit($date){

        $employees =Employee::all();
        $dateWiseData = Attendence::where('date',$date)->get();

        return view('backend.attendance.edit_employee_attend',compact('dateWiseData','employees'));

    }///end method


    public function EmployeeAttendView($date){

        $dateWiseData = Attendence::where('date',$date)->get();

        return view('backend.attendance.date_wise_attend',compact('dateWiseData'));

    }///end method


    public function EmployeeAttendUpdate(Request $request){

        $total_employee_id = count($request->employee_id);

        Attendence::where('date',date('Y-m-d',strtotime($request->date)))->delete();

        for ($i=0; $i < $total_employee_id ; $i++){

            $attend_status = 'attend_status'.$i;
            $attend = new Attendence();
            $attend->employee_id = $request->employee_id[$i];
            $attend->date = date('Y-m-d',strtotime($request->date));
            $attend->attend_status = $request->$attend_status;
            $attend->save();
        }
        $notification = array(
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('employee.attend.list')->with($notification);
    }//end method

    public function EmployeeAttendDelete($date){

        Attendence::where('date',$date)->delete();

        $notification = array(
            'message' => 'Data Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('employee.attend.list')->with($notification);
    }//end method

}
