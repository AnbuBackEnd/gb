<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Secondaryadmin;
use App\Models\Client;
use App\Models\employee;
use App\Models\userprivilege;
use App\Models\Tenurerecords;
use App\Models\investment;
use App\Models\code;
use App\Models\settings;
use Hash;
use Session;
use Auth;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function editprofile(Request $request)
    {
      
        return view('others.editprofile');
    }
    public function changesecondaryadminstatus($activestatus,$email,Request $request)
    {
        if($request->session()->exists('user_type')) 
        {
            if($request->session()->get('user_type_id') == 1)
            {
                if($activestatus == 1)
                {
                    Secondaryadmin::where('email',$email)->update(['activeStatus' => 2]);
                    return back()->with('success','Changed'); 
                }
                else
                {
                    Secondaryadmin::where('email',$email)->update(['activeStatus' => 1]);
                    return back()->with('success','Changed'); 
                }
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
    public function dashboard(Request $request)
    {
        if($request->session()->exists('user_type')) 
        {
            $secondaryadmins=Secondaryadmin::count();
            $clients=Client::count();
            $employees=employee::count();
            $investments=investment::where('approval',1)->count();
           
            $investmentsamount=investment::where('approval',1)->get();
            $r_investmentsamount=investment::where('approval',2)->count();
            $awaitinginvestments=investment::where('approval',0)->count();
           
          
            $amount=0;
            if($investmentsamount != false)
            {
                foreach($investmentsamount as $row)
                {
                    $amount=$amount+$row['invest_amount'];
                }
            }
           return view('others.dashboard',['awaiting' => $awaitinginvestments,'r_investmentsamount' => $r_investmentsamount,'investmentsamount' => $amount,'investments' => $investments,'secondaryadmins' => $secondaryadmins,'clients' => $clients,'employees' => $employees]);
        }
        else
        {
            return redirect('/login');
        }
    }
    public function addAdmin(Request $request)
    {
        if($request->session()->exists('user_type')) 
        {
            
            if($request->session()->get('user_type_id') == 1)
            {

                $admincount=code::count();
                if($admincount > 0)
                {
                    $admincode=code::all()[0]->primaryadmincode;
                    $adminnumber=code::all()[0]->primaryadmincode_value;
                }
                else
                {
                    $admincode=0;
                    $adminnumber=0;
                }
                $settingscount=settings::count();
                $settings=settings::all();
                return view('admin.add_admin',['admincode' => $admincode,'adminnumber' => $adminnumber,'settingscount' => $settingscount,'settings' => $settings]);
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
    public function editAdmin(Request $request)
    {
        if($request->session()->exists('user_type')) 
        {
            return view('admin.adminEdit');
        }
        else
        {
            return redirect('/login');
        }
        
    }
    public function changepasswordfinalpost(Request $request)
    {
        $request->validate([
            'newpassword' => 'required',
        ]);
        if($request->session()->exists('user_type')) 
        {
            if($request->session()->get('user_type_id') == 1)
            {
                User::where('email',$request->session()->get('email'))->update(['password' => $request->newpassword]);
                Session::flush();
                return redirect('/login');
            }
            else if($request->session()->get('user_type_id') == 2)
            {
                Secondaryadmin::where('email',$request->session()->get('email'))->update(['pwd' => $request->newpassword]);
                Session::flush();
                return redirect('/login');
            }
            else if($request->session()->get('user_type_id') == 3)
            {
                employee::where('email',$request->session()->get('email'))->update(['pwd' => $request->newpassword]);
                Session::flush();
                return redirect('/login');
            }
            else if($request->session()->get('user_type_id') == 4)
            {
                Client::where('email',$request->session()->get('email'))->update(['pwd' => $request->newpassword]);
                Session::flush();
                return redirect('/login');
            }
            else
            {
                return back()->with('fail','Some thing is Wrong'); 
            }
        }

    }
    public function changepasswordcheck(Request $request)
    {
        $request->validate([
            'oldpassword' => 'required',
        ]);
        if($request->session()->exists('user_type')) 
        {
            if($request->session()->get('user_type_id') == 1)
            {
                $user=User::where('password',$request->oldpassword)->count();
                if($user > 0)
                {
                    return redirect('/changepasswordfinal');
                }
                else
                {
                    return back()->with('fail','Incorrect Old Password'); 
                }

            }
            else if($request->session()->get('user_type_id') == 2)
            {
                $admin=Secondaryadmin::where('pwd',$request->oldpassword)->count();
                if($admin > 0)
                {
                    return redirect('/changepasswordfinal');
                }
                else
                {
                    return back()->with('fail','Incorrect Old Password'); 
                }
            }
            else if($request->session()->get('user_type_id') == 3)
            {
                $employee=employee::where('pwd',$request->oldpassword)->count();
                if($employee > 0)
                {
                    return redirect('/changepasswordfinal');
                }
                else
                {
                    return back()->with('fail','Incorrect Old Password'); 
                }
            }
            else if($request->session()->get('user_type_id') == 4)
            {
                $client=Client::where('pwd',$request->oldpassword)->count();
                if($client > 0)
                {
                    return redirect('/changepasswordfinal');
                }
                else
                {
                    return back()->with('fail','Incorrect Old Password'); 
                }
            }
        }
        else
        {
            return redirect('/login');
        }

    }
    public function updateAdminPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|regex:/^[a-zA-Z]+$/u',
            'gender' => 'required|integer',
            'mobile' => 'required|numeric|min:10',
            'pwd' => 'required',
        ]);
       $name=$request->name;
       $gender=$request->gender;
       $mobile=$request->mobile;
       $pwd=$request->pwd;
       $email=$request->email;
        $user=DB::table('secondaryadmins')->where('email', $email)->update(array('name' => $name,'gender' => $gender,'phone' => $mobile,'pwd' => $pwd));
        if($user)
        {
            return back()->with('success','Successfully Updated');    
        }
        else
        {
            
           return back()->with('fail','Error on update');    
        }
    }
    public function addAdminPost(Request $request)
    {
            $request->validate([
                'name' => 'required|string|regex:/^[a-zA-Z]+$/u',
                'email' => 'required|email|unique:users|unique:clients|unique:employees|unique:secondaryadmins',
                'gender' => 'required|integer',
                'mobile' => 'required|numeric|min:10',
                'pwd' => 'required',
                'date_of_joining' => 'date',
                'activeStatus' => 'required | integer'
            ]);
        $Secondaryadmin=new Secondaryadmin();
        $Secondaryadmin->admincode=$request->admincode;
        $Secondaryadmin->name=$request->name;
        $Secondaryadmin->phone=$request->mobile;
        $Secondaryadmin->email=$request->email;
        $Secondaryadmin->gender=$request->gender;
        $Secondaryadmin->date_of_joining=date('Y-m-d',strtotime($request->date_of_joining));
        $Secondaryadmin->activeStatus=$request->activeStatus;
        $Secondaryadmin->deletestatus=0;
        $Secondaryadmin->pwd=$request->pwd;
        $res=$Secondaryadmin->save();
        if(strlen($request->adminnumber) == 1)
        {
            $codefinal='PRI00000'.$request->adminnumber+1;
        }
        if(strlen($request->adminnumber) == 2)
        {
            $codefinal='PRI0000'.$request->adminnumber+1;
        }
        if(strlen($request->adminnumber) == 3)
        {
            $codefinal='PRI000'.$request->adminnumber+1;
        }
        if(strlen($request->adminnumber) == 4)
        {
            $codefinal='PRI00'.$request->adminnumber+1;
        }
        if(strlen($request->adminnumber) == 5)
        {
            $codefinal='PRI0'.$request->adminnumber+1;
        }
        if(strlen($request->adminnumber) == 6)
        {
            $codefinal='PRI'.$request->adminnumber+1;
        }
        $codevalue=$request->adminnumber+1;
        DB::table('codes')->update(['primaryadmincode_value' => $codevalue,'primaryadmincode' => $codefinal]);
        if($res) 
        {
           return back()->with('success','Successfully Registered'); 
        }
        else
        {
            return back()->with('fail','some Fields are Empty');
        }
    }
    public function adminconfirmation(Request $request)
    {
        dd($request->name);
    }
    public function viewSecondaryAdmin(Request $request)
    {
        if($request->session()->exists('user_type')) 
        {
            if($request->session()->get('user_type_id') == 1)
            {
                $data=Secondaryadmin::where('deletestatus',0)->get();
                return view('admin.viewSecondaryAdmin',['data' => $data]);
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
    public function updateadmin($email,Request $request)
    {
        if($request->session()->exists('user_type')) 
        {
            $data=Secondaryadmin::where('email',$email)->get();
             return view('admin.update_admin',['data' => $data,'email' => $email]);
        }
        else
        {
            return redirect('/login');
        }
       
    }
    public function profile(Request $request)
    {
        if($request->session()->exists('user_type')) 
        {
             return view('others.profilepage');
        }
        else
        {
            return redirect('/login');
        }
    }
    public function setprivileges(Request $request)
    {
       $secemployee=userprivilege::where('role','secondaryadmin')->where('window','employee')->get();
       $secclient=userprivilege::where('role','secondaryadmin')->where('window','client')->get();
       $empclient=userprivilege::where('role','employee')->where('window','client')->get();
       $secinvestment=userprivilege::where('role','secondaryadmin')->where('window','investmentrecords')->get();
       $empinvestment=userprivilege::where('role','employee')->where('window','investmentrecords')->get();
       $secwithdraw=userprivilege::where('role','secondaryadmin')->where('window','withdraw')->get();
       $empwithdraw=userprivilege::where('role','employee')->where('window','withdraw')->get();
       $secreports=userprivilege::where('role','secondaryadmin')->where('window','reports')->get();
       $empreports=userprivilege::where('role','employee')->where('window','reports')->get();
        return view('admin.setprivileges',['secemployee' => $secemployee,'secclient' => $secclient,'secinvestment' => $secinvestment,'secwithdraw' => $secwithdraw,'secreports' => $secreports,'empclient' => $empclient,'empinvestment' => $empinvestment,'empwithdraw' => $empwithdraw,'empreports' => $empreports]);
    }
    public function changepassword(Request $request)
    {
        return view('admin.changepassword'); 
    }
    public function changepasswordfinal(Request $request)
    {
        return view('admin.changepasswordfinal'); 
    }
    public function userprivilegepost(Request $request)
    {
        userprivilege::where('role','secondaryadmin')->where('window','employee')->update(['create' => $request->employeecreate,'edit' => $request->employeeedit,'delete' => $request->employeedelete,'view' => $request->employeeview]);
        userprivilege::where('role','secondaryadmin')->where('window','client')->update(['create' => $request->clientcreate,'edit' => $request->clientedit,'delete' => $request->clientdelete,'view' => $request->clientview]);
        userprivilege::where('role','secondaryadmin')->where('window','reports')->update(['view' => $request->reportview,'downloadable' => $request->reportdownloadable]);
        userprivilege::where('role','secondaryadmin')->where('window','withdraw')->update(['create' => $request->withdrawcreate]);
        userprivilege::where('role','secondaryadmin')->where('window','investmentrecords')->update(['create' => $request->investmentcreate,'edit' => $request->investmentedit,'delete' => $request->investmentdelete,'view' => $request->investmentview]);
        userprivilege::where('role','employee')->where('window','client')->update(['create' => $request->clientcreate1,'edit' => $request->clientedit1,'delete' => $request->clientdelete1,'view' => $request->clientview1]);
        userprivilege::where('role','employee')->where('window','reports')->update(['view' => $request->reportview1,'downloadable' => $request->reportdownloadable1]);
        userprivilege::where('role','employee')->where('window','investmentrecords')->update(['create' => $request->investmentcreate1,'edit' => $request->investmentedit1,'delete' => $request->investmentdelete1,'view' => $request->investmentview1]);
        userprivilege::where('role','employee')->where('window','withdraw')->update(['create' => $request->withdrawcreate1]);
        return back()->with('success','Privilege Successfully Setted'); 

    }
    public function deletesecondaryadmin($email,$id,Request $request)
    {
       $employee=employee::where('assignAdmin',$email)->count();
       $client=Client::where('assignAdmin',$email)->count();
       if($employee > 0 || $client > 0)
       {
        return back()->with('fail','Not Allowed to Delete'); 
       }
       else
       {
        Secondaryadmin::where('_id',$id)->update(['deletestatus' => 1]);
        return back()->with('fail','Deleted'); 
       }

    }
    
    public function withdraw($investment_id,Request $request)
    {
        $investments=investment::where('_id',$investment_id)->get();
        $tenures=Tenurerecords::where('investment_id',$investment_id)->get();
        return view('clients.withdraw',['investments' => $investments,'tenurerecords' => $tenures]);
    }

}
