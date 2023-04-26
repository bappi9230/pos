<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{

    public function AllEmployee(){

        $employee = Employee::latest()->get();
        return view('backend.employee.all_employee',compact('employee'));
    }

    public function AddEmployee(){
        return view('backend.employee.add_employee');
    } // End Method

    public function StoreEmployee(Request $request){

         $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|unique:employees|max:200',
            'phone' => 'required|max:200',
            'address' => 'required|max:400',
            'salary' => 'required|max:200',
            'vacation' => 'required|max:200',
             'experience' => 'required',
             'image' => 'required',
        ]);

        $image = $request->file('image');
        $image_rename = hexdec(uniqid('', false)) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/employee/' . $image_rename);
        $image_url = 'upload/employee/' . $image_rename;

        Employee::insert([

            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'experience' => $request->experience,
            'salary' => $request->salary,
            'vacation' => $request->vacation,
            'city' => $request->city,
            'image' => $image_url,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Employee Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.employee')->with($notification);
    } // End Method



    public function EditEmployee($id){

        $employee = Employee::findOrFail($id);
        return view('backend.employee.edit_employee',compact('employee'));

    } // End Method


    public function UpdateEmployee(Request $request){

        $employee_id = $request->id;
        $employee_data = Employee::findOrFail($employee_id);
        $old_image = $employee_data->image;
        if ($request->file('image')) {
            $image = $request->file('image');
            unlink($old_image);
            $image_rename = hexdec(uniqid('', false)) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/employee/' . $image_rename);
            $image_url = 'upload/employee/' . $image_rename;

            Employee::findOrFail($employee_id)->update([

                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'experience' => $request->experience,
                'salary' => $request->salary,
                'vacation' => $request->vacation,
                'city' => $request->city,
                'image' => $image_url,
                'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Employee Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.employee')->with($notification);

        } else{

            Employee::findOrFail($employee_id)->update([

                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'experience' => $request->experience,
                'salary' => $request->salary,
                'vacation' => $request->vacation,
                'city' => $request->city,
                'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Employee Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.employee')->with($notification);

        } // End else Condition


    } // End Method

    public function DeleteEmployee($id){
        $employee_img = Employee::findOrFail($id);
        $img = $employee_img->image;
        unlink($img);

        Employee::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Employee Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method
}
