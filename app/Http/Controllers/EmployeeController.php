<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Secondaryadmin;
use App\Models\code;
use App\Models\settings;
use App\Models\Client;
use Hash;
use session;
use Illuminate\Support\Facades\DB;
class EmployeeController extends Controller
{
    public function changestatusemployee($email,$changestatus,Request $request)
    {
        
        if($changestatus == 1)
        {
            $status=2;
        }
        else
        {
            $status=1;
        }
        Employee::where('email',$email)->update(['activeStatus' => $status]);
        return redirect('/viewEmployees');
    }
    public function addEmployee(Request $request)
    {
        if($request->session()->exists('user_type')) 
        {
            if($request->session()->get('user_type_id') == 1 || $request->session()->get('user_type_id') == 2)
            {
                $employeecount=code::count();
                if($employeecount > 0)
                {
                    $employeecode=code::all()[0]->employeecode;
                    $employeenumber=code::all()[0]->employeecode_value;
                }
                else
                {
                    $employeecode=0;
                    $employeenumber=0;
                }
                $data=Secondaryadmin::all();
                $settingscount=settings::count();
                $settings=settings::all();
                return view('employees.add_employees',['data' => $data,'employeecode' => $employeecode,'employeenumber' => $employeenumber,'settingscount' => $settingscount,'settings' => $settings]);
            }
            else
            {
                return redirect('/login');
            }
        }
        else
        {
            return redirect('/login');
        }
        
        
    }
    public function addEmployeePost(Request $request)
    {
        if($request->session()->get('user_type_id') == 1)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users|unique:clients|unique:employees|unique:secondaryadmins',
                'gender' => 'required',
                'mobile' => 'required|string|min:10',
                'pwd' => 'required',
                'date_of_joining' => 'date',
                'activeStatus' => 'required | integer',
                'assignAdmin' => 'required'
            ]);
        }
        else
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'gender' => 'required',
                'mobile' => 'required|string|min:10',
                'pwd' => 'required',
                'date_of_joining' => 'date',
                'activeStatus' => 'required | integer',
            ]);
        }
           
        $employee=new Employee();
        $employee->employeecode=$request->employeecode;
        $employee->name=$request->name;
        $employee->pwd=$request->pwd;
        $employee->phone=$request->mobile;
        $employee->email=$request->email;
        $employee->gender=$request->gender;
        $employee->date_of_joining=date('Y-m-d',strtotime($request->date_of_joining));
        $employee->activeStatus=$request->activeStatus;
        if($request->session()->get('user_type_id') == 1)
        {
            $employee->assignAdmin=$request->assignAdmin;
        }
        else
        {
            $employee->assignAdmin=$request->session()->get('email');
        }
        
        $employee->usertypeid=$request->session()->get('user_type_id');
        $employee->enteredid=$request->session()->get('loginId');
        $employee->enteredmailid=$request->session()->get('email');
        $res=$employee->save();
       
         if(strlen($request->employeenumber) == 1)
         {
             $codefinal='EMP00000'.$request->employeenumber+1;
         }
         if(strlen($request->employeenumber) == 2)
         {
             $codefinal='EMP0000'.$request->employeenumber+1;
         }
         if(strlen($request->employeenumber) == 3)
         {
             $codefinal='EMP000'.$request->employeenumber+1;
         }
         if(strlen($request->employeenumber) == 4)
         {
             $codefinal='EMP00'.$request->employeenumber+1;
         }
         if(strlen($request->employeenumber) == 5)
         {
             $codefinal='EMP0'.$request->employeenumber+1;
         }
         if(strlen($request->employeenumber) == 6)
         {
             $codefinal='EMP'.$request->employeenumber+1;
         }
    
         $codevalue=$request->employeenumber+1;
         DB::table('codes')->update(['employeecode_value' => $codevalue,'employeecode' => $codefinal]); 
        if($res) 
        {
           return back()->with('success','Successfully Registered'); 
        }
        else
        {
            return back()->with('fail','some Fields are Empty');
        }
    }
    public function viewEmployees(Request $request)
    {
        if($request->session()->exists('user_type')) 
        {
            if($request->session()->get('user_type_id') == 1)
            {
                $datacount=Employee::count();
                $data=Employee::all();
            }
            else
            {
                $datacount=Employee::where('assignAdmin',$request->session()->get('email'))->count();
                $data=Employee::where('assignAdmin',$request->session()->get('email'))->get();
            }
        }
        else
        {
            return redirect('/login');
        }
       
        return view('Employees.viewEmployees',['data' => $data,'datacount' => $datacount]);
    }
    public function updateemployee($email,Request $request)
    {
        if($request->session()->exists('user_type')) 
        {
            if($request->session()->get('user_type_id') == 1)
            {
                $admins=Secondaryadmin::all();
                $counting=Employee::where('email',$email)->count();
                $data=Employee::where('email',$email)->get();
                if($counting > 0)
                {
                    return view('Employees.update_employee',['data' => $data,'email' => $email,'admins' => $admins]);
                }
                else
                {
                    return redirect('/viewEmployees');
                }
                
            }
            else if($request->session()->get('user_type_id') == 2)
            {
                $admins=Secondaryadmin::all();
                $counting=Employee::where('email',$email)->where('assignAdmin',$request->session()->get('email'))->count();
                $data=Employee::where('email',$email)->where('assignAdmin',$request->session()->get('email'))->get();
                if($counting > 0)
                {
                    return view('Employees.update_employee',['data' => $data,'email' => $email,'admins' => $admins]);
                }
                else
                {
                    return redirect('/viewEmployees');
                }
            }
        }
        else
        {
            return redirect('/login');
        }
        
    }
    public function updateEmployeePost(Request $request)
    {
        if($request->session()->exists('user_type')) 
        {
            if($request->session()->get('user_type_id') == 1)
            {
                
                $request->validate([
                    'name' => 'required',
                    'gender' => 'required',
                    'mobile' => 'required|string|min:10',
                    'pwd' => 'required',
                    'assignAdmin' => 'required'
                ]);
            }
            else
            {
                $request->validate([
                    'name' => 'required',
                    'gender' => 'required',
                    'mobile' => 'required|string|min:10',
                    'pwd' => 'required',
                ]);
            }
        }
        
       $name=$request->name;
       $gender=$request->gender;
       $mobile=$request->mobile;
       $pwd=$request->pwd;
      
       $activeStatus=$request->activeStatus;
       if($request->session()->get('user_type_id') == 1)
       {
        $assignAdmin=$request->assignAdmin;
       }
       else
       {
        $assignAdmin=$request->session()->get('email');
       }
       
       $email=$request->email;
        $user=DB::table('employees')->where('email', $email)->update(array('name' => $name,'gender' => $gender,'phone' => $mobile,'password' => $pwd,'assignAdmin' => $assignAdmin)); 
      
        if($user)
        {
            return back()->with('success','Successfully Updated');    
        }
        else
        {
            
           return back()->with('fail','Error on update');    
        }
       
    }
    public function deleteemployee($email,$id,Request $request)
    {
       $client=Client::where('assignAdmin',$id)->count();
       if($client > 0 )
       {
        return back()->with('fail','Not Allowed to Delete'); 
       }
       else
       {
        Employee::where('email',$email)->delete();
        return back()->with('fail','Deleted'); 
       }

    }
}
