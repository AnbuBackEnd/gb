<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Secondaryadmin;
use App\Models\Client;
use App\Models\employee;
use App\Models\investment;
use App\Models\settings;
use Hash;
use Session;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    
    public function savesettings(Request $request)
    {
        $request->validate([
            'investamountlimit' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'investmentdateallowed' => 'required|numeric',
            'dateofjoiningallowed' => 'required|numeric',
            'tenureperiodlimit' => 'required|numeric',
            'maturityperiod' => 'required|numeric',
            'interestratelimit' => 'required|numeric',
            'directorname' => 'required'
        ]);
        $settingscount=settings::count();
        if($settingscount == 0)
        {
            $settings=new settings();
            $settings->invest_amount_limit=$request->investamountlimit;
            $settings->investmentdateallowed=$request->investmentdateallowed;
            $settings->dateofjoiningallowed=$request->dateofjoiningallowed;
            $settings->tenureperiodlimit=$request->tenureperiodlimit;
            $settings->maturityperiod=$request->maturityperiod;
            $settings->interestratelimit=$request->interestratelimit;
            $settings->directorname=$request->directorname;
            $settings->lastupdated=date('d-m-Y H:i:s');
            $settings->save();
            return back()->with('success','Successfully Saved..');
        }
        else
        {
            DB::table('settings')->update(['invest_amount_limit' => $request->investamountlimit,'investmentdateallowed' => $request->investmentdateallowed,'dateofjoiningallowed' => $request->dateofjoiningallowed,'tenureperiodlimit' => $request->tenureperiodlimit,'maturityperiod' => $request->maturityperiod,'interestratelimit' => $request->interestratelimit,'lastupdated' => date('d-m-Y H:i:s'),'directorname' => $request->directorname]);
            return back()->with('success','Successfully Saved..');
        }

    }
    public function settingswindow(Request $request)
    {
        $settingscount=settings::count();
        $settings=settings::all();
        return view('others.settings',['settingscount' => $settingscount,'settings' => $settings]);
    }
    public function forgetpassword()
    {
        return view('authendication.forgetpassword');
    }
    public function registration()
    {
        return view('authendication.registration');
    }
    public function login()
    {
        return view('authendication.login');
    }
    public function adminlist(Request $request)
    {
        $user=Secondaryadmin::all();
        echo json_encode($user);
    }
    public function employeelist($email,Request $request)
    {
        $user=Employee::where('assignAdmin',$email)->get();
        echo json_encode($user);
    }
    public function recreatepasswordpost(Request $request)
    {
        $request->validate([
            'newpassword' => 'required',
            'reenterpassword' => 'required|same:newpassword'
        ]);
        $email=$request->email;
        $password=$request->newpassword;
        $secadmincheck=Secondaryadmin::where('email',$request->email)->count();
        $employeecheck=employee::where('email',$request->email)->count();
        $clientscheck=Client::where('email',$request->email)->count();
        if($secadmincheck > 0)
        {
            Secondaryadmin::where('email',$request->email)->update(['pwd' => $password,'forgetpassword' => 0]);
            return redirect('/passwordcreated');
            //return view('authendication.passwordcreated');
        }
        else if($employeecheck > 0)
        {
            employee::where('email',$request->email)->update(['pwd' => $password,'forgetpassword' => 0]);
            return redirect('/passwordcreated');
        }
        else if($clientscheck > 0)
        {
            Client::where('email',$request->email)->update(['pwd' => $password,'forgetpassword' => 0]);
            return redirect('/passwordcreated');
        }
        else
        {
            return back()->with('fail','Account Not Found..');
        }
    }   
    public function passwordcreated(Request $request)
    {
        return view('authendication.passwordcreated');
    }
    public function otpverify(Request $request)
    {
        $request->validate([
            'otpcode' => 'required|numeric',
        ]);
        $email=$request->email;
        $otpcode=$request->otpcode;
        $secadmincheck=Secondaryadmin::where('email',$request->email)->where('otp',intval($request->otpcode))->count();
        $employeecheck=employee::where('email',$request->email)->where('otp',intval($request->otpcode))->count();
        $clientscheck=Client::where('email',$email)->where('otp',intval($otpcode))->count();
        if($secadmincheck > 0)
        {
            return redirect('/recreatepassword/'.$email);
            //return view('authendication.recreatepassword',['email' => $email]);
        }
        else if($employeecheck > 0)
        {
            return redirect('/recreatepassword/'.$email);
            //return view('authendication.recreatepassword',['email' => $email]);
        }
        else if($clientscheck > 0)
        {
            return redirect('/recreatepassword/'.$email);
          //  return view('authendication.recreatepassword',['email' => $email]);
        }
        else
        {
            return back()->with('fail','Account Not Found..');
        }
    }
    public function recreatepassword($email,Request $request)
    {
        return view('authendication.recreatepassword',['email' => $email]);
    }
    public function forgetpassword_request(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $otp=rand(100000, 999999);
        $secadmincheck=Secondaryadmin::where('email',$request->email)->count();
        $employeecheck=employee::where('email',$request->email)->count();
        $clientscheck=Client::where('email',$request->email)->count();
        if($secadmincheck > 0)
        {
            Secondaryadmin::where('email',$request->email)->update(['otp' => $otp,'forgetpassword' => 1]);
            return redirect('/otpconfirmation/'.$request->email);
          //  return view('authendication.otpconfirmation',['email' => $request->email]);
        }
        else if($employeecheck > 0)
        {
            employee::where('email',$request->email)->update(['otp' => $otp,'forgetpassword' => 1]);
            return redirect('/otpconfirmation/'.$request->email);
            //return view('authendication.otpconfirmation',['email' => $request->email]);
        }
        else if($clientscheck > 0)
        {
            Client::where('email',$request->email)->update(['otp' => $otp,'forgetpassword' => 1]);
            return redirect('/otpconfirmation/'.$request->email);
            //return view('authendication.otpconfirmation',['email' => $request->email]);
        }
        else
        {
            return back()->with('fail','Account Not Found..');
        }
       
    }
    public function otpconfirmation($email,Request $request)
    {
        return view('authendication.otpconfirmation',['email' => $email]);
    }
    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users|unique:clients|unique:employees|unique:secondaryadmins',
            'password' => 'required',
            'mobile' => 'required',
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->phone=$request->mobile;
        $user->email=$request->email;
        $user->user_type='admin';
        $user->password=$request->password;
        $res=$user->save();
        if($res)
        {
            return back()->with('success','Successfully Registered'); 
        }
        else
        {
            return back()->with('fail','some Fields are Empty');
        }
    }
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $superadmin=User::where('email', '=', $request->email)->where('password',$request->password)->count();
        $admin=Secondaryadmin::where('email', '=', $request->email)->where('pwd',$request->password)->where('activeStatus','1')->count();
        $employee=employee::where('email', '=', $request->email)->where('activeStatus','1')->count();
        $client=Client::where('email', '=', $request->email)->count();
        if($superadmin > 0)
        {
            $user=User::where('email',$request->email)->get();
                $request->session()->put('loginId',$user[0]->id);
                $request->session()->put('name',$user[0]->name);
                $request->session()->put('user_type','Super Admin');
                $request->session()->put('user_type_id',1);
                $request->session()->put('email',$user[0]->email);
                $request->session()->put('phone',$user[0]->phone);
                $request->session()->put('address',$user[0]->address);
                return redirect()->route('Dashboard');
        }
        else if($admin > 0)
        {
                $adminuser=Secondaryadmin::where('email','=',$request->email)->get();
                $request->session()->put('loginId',$adminuser[0]->id);
                $request->session()->put('user_type','Admin');
                $request->session()->put('user_type_id',2);
                $request->session()->put('name',$adminuser[0]->name);
                $request->session()->put('email',$adminuser[0]->email);
                $request->session()->put('phone',$adminuser[0]->phone);
                $request->session()->put('date_of_joining',$adminuser[0]->date_of_joining);
                $request->session()->put('activeStatus',$adminuser[0]->activeStatus);
                return redirect()->route('addEmployee');
        }
        else if($employee > 0)
        {
           
                $employeeuser=employee::where('email','=',$request->email)->where('pwd',$request->password)->get();
                $request->session()->put('loginId',$employeeuser[0]->id);
                $request->session()->put('user_type','Employee');
                $request->session()->put('user_type_id',3);
                $request->session()->put('name',$employeeuser[0]->name);
                $request->session()->put('email',$employeeuser[0]->email);
                $request->session()->put('phone',$employeeuser[0]->phone);
                $request->session()->put('gender',$employeeuser[0]->gender);
                $request->session()->put('date_of_joining',$employeeuser[0]->date_of_joining);
                $request->session()->put('activeStatus',$employeeuser[0]->activeStatus);
                $request->session()->put('assignAdmin',$employeeuser[0]->assignAdmin);

               return redirect()->route('addClients');
        }
        else if($client > 0)
        {
                $clientuser=Client::where('email','=',$request->email)->get();
                $request->session()->put('loginId',$clientuser[0]->id);
                $request->session()->put('user_type','Client');
                $request->session()->put('user_type_id',4);
                $request->session()->put('name',$clientuser[0]->client_name);
                $request->session()->put('address',$clientuser[0]->client_address);
                $request->session()->put('email',$clientuser[0]->email);
                $request->session()->put('gender',$clientuser[0]->gender);
                $request->session()->put('activeStatus',$clientuser[0]->activeStatus);
                $request->session()->put('assignAdmin',$clientuser[0]->assignAdmin);
                return redirect()->route('addEmployee');
        }
        else
        {
                 return back()->with('fail','Email Not Occured..');
        }

    }
    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }
    public function approvallist(Request $request)
    {
        $approvallist=investment::where('approval',intval(0))->where('admin_email_id',$request->session()->get('email'))->get();
        $approvallistcount=investment::where('approval',0)->where('admin_email_id',$request->session()->get('email'))->count();
        return view('clients.approvallist',['approvallist' => $approvallist, 'approvallistcount'=> $approvallistcount]);

    }
    public function viewapprovalrecord($email,$investid,Request $request)
    {
        $client=Client::where('email',$email)->get();
        $investmentrecords=investment::where('_id',$investid)->get();
        if($investmentrecords)
        {
            if($investmentrecords[0]->usertypeid == 1)
            {
                $role='Super Admin';
                $name=User::where('email',$investmentrecords[0]->enteredmailid)->get()[0]['name'];
            }
            else if($investmentrecords[0]->usertypeid == 2)
            {
                $role = 'Admin';
                $name=Secondaryadmin::where('email',$investmentrecords[0]->enteredmailid)->get()[0]['name'];
            }
            else if($investmentrecords[0]->usertypeid == 3)
            {
                $role = 'Employee';
                $name=employee::where('email',$investmentrecords[0]->enteredmailid)->get()[0]['name'];
            }
            
        }
        else
        {
            $role = 'NIL';
            $name='NIL';
        }

        return view('clients.viewapprovalrecord',['investmentrecords' => $investmentrecords,'email' => $email,'clients' => $client,'investid' => $investid,'role' => $role,'name' => $name]);
    }

    public function deleteallfunction(Request $request)
    {
        $client=new Client();
        $client->delete();
        //investment::delete();

    }
    public function validemail($email,Request $request)
    {
        $data=array();
        $user=User::where('email',$email)->count();
        $client=Client::where('email',$email)->count();
        $employee=Employee::where('email',$email)->count(); 
        $secondaryadmins=Secondaryadmin::where('email',$email)->count();
        if($user == 0  && $client == 0 && $employee == 0 && $secondaryadmins == 0)
        {
            $status == 1;
        }
        else
        {
            $status=0;
        }
        echo json_encode($data[0]=$status);
    }
   
}
