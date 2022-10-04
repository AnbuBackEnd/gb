<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Client;
use App\Models\investment;
use App\Models\Secondaryadmin;
use App\Models\Tenurerecords;
use App\Models\code;
use App\Models\settings;
use Hash;
use session;
use Auth;
use Illuminate\Support\Facades\DB;
class ClientController extends Controller
{
    public function addClientsInitial()
    {
        return view('clients.addClientsInitial');
    }
    public function viewrecords($id,Request $request)
    {
        $investments=investment::where('_id',$id)->get();
       
        $tenurerecords=Tenurerecords::where('investment_id',$id)->orderBy('monthcount', 'ASC')->get();
        return view('clients.viewrecords',['investments' => $investments,'tenurerecords' => $tenurerecords]);
    }
    public function addClients(Request $request)
    {
            $admins=Secondaryadmin::all();
            if($request->session()->exists('user_type'))
            {
                if($request->session()->get('user_type_id') == 1)
                {
                    $employee=employee::all();
                }
                else
                {
                    $employee=employee::where('assignAdmin',$request->session()->get('email'))->get();
                }

            }
            $clientcount=code::count();
            if($clientcount > 0)
            {
                $clientcode=code::all()[0]->clientcode;
                $clientnumber=code::all()[0]->clientcode_value;
            }
            else
            {
                $clientcode=0;
                $clientnumber=0;
            }
            
            $settingscount=settings::count();
            $settings=settings::all();
           // $employee=Employee::where('usertypeid',$request->session()->get('user_type_id'))->where('enteredmailid',$request->session()->get('email'))->get();
            return view('clients.addClients',['admins' => $admins,'employee' => $employee,'clientcode' => $clientcode,'clientnumber' => $clientnumber,'settingscount' => $settingscount,'settings' => $settings]);
    }
    public function editinvestingrecords($email,$id,Request $request)
    {
        if($request->session()->exists('user_type'))
        {
            if($request->session()->get('user_type_id') == 1)
            {
                $employee=employee::all();
            }
            else
            {
                $employee=employee::where('enteredmailid',$request->session()->get('email'))->get();
            }
        }
        $admins=Secondaryadmin::all();
        $settingscount=settings::count();
        $settings=settings::all();
        $clients=Client::where('email',$email)->get();
        $investmentrecords=investment::where('client_email_id',$email)->where('_id',$id)->get();
        return view('clients.editinvestmentrecords',['clients' => $clients,'admins' => $admins,'employee' => $employee,'settingscount' => $settingscount,'settings' => $settings,'investmentrecords' => $investmentrecords]);
    }
    public function newInvestment(Request $request)
    {
        if($request->session()->exists('user_type'))
        {
            if($request->session()->get('user_type_id') == 1)
            {
                $employee=employee::all();
            }
            else
            {
                $employee=employee::where('enteredmailid',$request->session()->get('email'))->get();
            }
        }
        $admins=Secondaryadmin::all();
        $settingscount=settings::count();
        $settings=settings::all();
        $clients=Client::where('usertypeid',$request->session()->get('user_type_id'))->where('enteredmailid',$request->session()->get('email'))->get();
        
        return view('clients.newinvest',['clients' => $clients,'admins' => $admins,'employee' => $employee,'settingscount' => $settingscount,'settings' => $settings]);
    }
    public function terminateclients($email,Request $request)
    {
        if($request->session()->exists('user_type'))
        {
            if($request->session()->get('user_type_id') == 1)
            {
                $client=Client::where('email',$email)->where('terminatestatus',1)->count();
                if($client > 0)
                {
                    Client::where('email',$email)->update(['terminatestatus' => 0]);
                }
                else
                {
                    Client::where('email',$email)->update(['terminatestatus' => 1]);
                }

                
            }
            else if($request->session()->get('user_type_id') == 2)
            {
                $client=Client::where('email',$email)->where('assignAdmin',$request->session()->get('email'))->where('terminatestatus',1)->count();
                if($client > 0)
                {
                    Client::where('email',$email)->where('assignAdmin',$request->session()->get('email'))->update(['terminatestatus' => 0]);
                }
                else
                {
                    Client::where('email',$email)->where('assignAdmin',$request->session()->get('email'))->update(['terminatestatus' => 1]);
                }
                
            }
            else if($request->session()->get('user_type_id') == 3)
            {
                $client=Client::where('email',$email)->where('assignAdmin',$request->session()->get('assignAdmin'))->where('terminatestatus',1)->count();
                if($client > 0)
                {
                    Client::where('email',$email)->where('assignAdmin',$request->session()->get('assignAdmin'))->update(['terminatestatus' => 0]);
                }
                else
                {
                    Client::where('email',$email)->where('assignAdmin',$request->session()->get('assignAdmin'))->update(['terminatestatus' => 1]);
                }
                
            }
            return redirect('/viewClients/');
        }
        else
        {
            return redirect('/login/');
        }
        
        
    }
    public function reinvest($email,$id,Request $request)
    {
        $admins=Secondaryadmin::all();
            if($request->session()->exists('user_type'))
            {
                if($request->session()->get('user_type_id') == 1)
                {
                    $employee=employee::all();
                }
                else
                {
                    $employee=employee::where('usertypeid',$request->session()->get('user_type_id'))->where('enteredmailid',$request->session()->get('email'))->get();
                }

            }
            
            $clientcount=code::count();
            if($clientcount > 0)
            {
                $clientcode=code::all()[0]->clientcode;
                $clientnumber=code::all()[0]->clientcode_value;
            }
            else
            {
                $clientcode=0;
                $clientnumber=0;
            }
            
            $settingscount=settings::count();
            $settings=settings::all();
        $clients=Client::where('email',$email)->get();
        $investment=investment::where('client_email_id',$email)->where('_id',$id)->get();
        if(date('Y-m-d',strtotime($investment[0]->maturitydate)) <= date('Y-m-d'))
        {
            return view('clients.reinvest',['email' => $email,'id' => $id,'clients' => $clients,'investment' => $investment,'admins' => $admins,'employee' => $employee,'clientcode' => $clientcode,'clientnumber' => $clientnumber,'settingscount' => $settingscount,'settings' => $settings]);
        }
        else
        {
            return redirect('/Dashboard/');
        }
        
    }
    public function reinvestment(Request $request)
    {

        $clients=Client::where('usertypeid',$request->session()->get('user_type_id'))->where('enteredmailid',$request->session()->get('email'))->get();
        return view('clients.reInvestment',['clients' => $clients]);
    }
    public function addnewinvestment($email,Request $request)
    {
     
        $clients=Client::where('email',$email)->get();
     
        return view('clients.addnewinvestment',['email' => $email,'clients' => $clients]);
    }
    public function addclientsinitialcheck(Request $request)
    {
        $request->validate([
            'emailid' => 'required|email',
        ]);
        $clients=Client::where('email',$request->emailid)->count();
        if($clients > 0)
        {
            $clients=Client::where('email',$request->emailid)->get();
            if($request->session()->exists('user_type'))
            {
                if($request->session()->get('user_type_id') == 1)
                {
                    $employee=employee::all();
                }
                else
                {
                    $employee=employee::where('usertypeid',$request->session()->get('user_type_id'))->where('enteredmailid',$request->session()->get('email'))->get();
                }
            }
            $investmentrecords=investment::where('client_email_id',$request->emailid)->get();
            return view('clients.getrecordsclients',['email' => $request->emailid,'investmentrecords' => $investmentrecords,'clients' => $clients,'employee' => $employee]);
        }
        else
        {
            // $admins=Secondaryadmin::all();
            // if($request->session()->exists('user_type'))
            // {
            //     if($request->session()->get('user_type_id') == 1)
            //     {
            //         $employee=employee::all();
            //     }
            //     else
            //     {
            //         $employee=employee::where('usertypeid',$request->session()->get('user_type_id'))->where('enteredmailid',$request->session()->get('email'))->get();
            //     }
            // }
           
            // return view('clients.addClients',['admins' => $admins,'employee' => $employee,'email' => $request->emailid]);
             return redirect('/addClients/'.$request->emailid);
        }
    }
    public function withdrawwindow($id,Request $request)
    {
        investment::where('id',$id)->update(['investmentStatus' => 'withdraw']);
        return back()->with('success','Successfully withdrawed');
    }
    public function newInvestmentPost(Request $request)
    {
        $request->validate([
            'client_name' => 'required|email',
            'investdate' => 'required|date',
            'investamount' => 'required',
            'lockperiod' => 'required|integer',
            'returns' => 'required',
            'tenure' => 'required',
            'interestrate' => 'required',
            'returndate' => 'required',
        ]);
        $investmentRecords=new investment();
        $investmentRecords->client_email_id=$request->client_name;
        $investmentRecords->admin_email_id=$request->assignAdmin;
        $investmentRecords->tenure=$request->tenure;
        $investmentRecords->invest_amount=$request->investamount;
        $investmentRecords->returns=$request->returns;
        $investmentRecords->locked_period=$request->lockperiod;
        $investmentRecords->invest_date=date('Y-m-d',strtotime($request->investdate));
        $investmentRecords->returndate=date('Y-m-d',strtotime($request->returndate));
        $investmentRecords->interestrate=$request->interestrate;
        $investmentRecords->enteredmailid=$request->session()->get('email');
        $investmentRecords->enteredid=$request->session()->get('loginId');
        $investmentRecords->usertypeid=$request->session()->get('user_type_id');
        $resu=$investmentRecords->save();
        $investment_id=$investmentRecords->id;
        $investamount=$request->investamount;
        $interestrate=$request->interestrate;
        $returnamount=$investamount;
        for($i=0;$i<$request->tenure;$i++)
        {
            if($i==0)
            {
                $investdate=date('Y-m-d',strtotime($request->investdate));
            }
            else
            {
                $investdate=date('Y-m-d', strtotime($investdate. ' + 30 days'));
            }
            $Tenurerecords=new Tenurerecords();
            $Tenurerecords->investdate=date('Y-m-d',strtotime($investdate));
            $Tenurerecords->returnamount=($returnamount+(($returnamount/100)*$interestrate));
            $Tenurerecords->investment_id=$investment_id;
            $Tenurerecords->client_email_id=$request->email;
            $Tenurerecords->admin_email_id=$request->assignAdmin;
            $Tenurerecords->monthcount=$i+1;
            $Tenurerecords->save();
            $returnamount=$returnamount+(($returnamount/100)*$interestrate);

        }
        investment::where('id',$investment_id)->update(['returns'=> $returnamount]);
        if($resu) 
        {
           return back()->with('success','Successfully Registered'); 
        }
        else
        {
            return back()->with('fail','some Fields are Empty');
        }
    }
    public function reinvestmentPost(Request $request)
    {
        $request->validate([
            'client_name' => 'required|email',
            'investdate' => 'required|date',
            'investamount' => 'required',
            'lockperiod' => 'required|integer',
            'returns' => 'required',
            'tenure' => 'required',
        ]);
       $investmentRecords=new investment();
       $investmentRecords->client_email_id=$request->client_name;
       $investmentRecords->invest_date=date('Y-m-d',strtotime($request->investdate));
       $investmentRecords->invest_amount=$request->investamount;
       $investmentRecords->locked_period=$request->lockperiod;
       $investmentRecords->returns=$request->returns;
       $investmentRecords->tenure=$request->tenure;
       $investmentRecords->enteredmailid=$request->session()->get('email');
        $investmentRecords->enteredid=$request->session()->get('loginId');
        $investmentRecords->usertypeid=$request->session()->get('user_type_id');
       $res=$investmentRecords->save();
       if($res)
       {
          return back()->with('success','Investment Record Added'); 
       }
       else
       {
          return back()->with('fail','some Fields are Empty');
       }
    }
    public function addClientsPost(Request $request)
    {
        if($request->session()->get('user_type_id') == 1)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users|unique:clients|unique:employees|unique:secondaryadmins',
                'gender' => 'required',
                'mobile' => 'required|string|min:10',
                'investdate' => 'required | date',
                'interestrate' => 'required | integer',
                'investamount' => 'required',
                'tenure' => 'required | integer',
                'activeStatus' => 'required | integer',
                'assignAdmin' => 'required|string',
                'assignEmployee' => 'required|string',
            ]);
           
        }
        else if($request->session()->get('user_type_id') == 2)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:clients',
                'gender' => 'required',
                'mobile' => 'required|string|min:10',
                'investdate' => 'required | date',
                'interestrate' => 'required | integer',
                'investamount' => 'required',
                'tenure' => 'required | integer',
                'activeStatus' => 'required | integer',
                'assignEmployee' => 'required|string',
            ]);
        }
       
        $settingscount=settings::count();
        if($settingscount > 0)
        {
            $settings=settings::all()[0]['maturityperiod'];

        }
        else
        {
            $settings=0;
        }
        $maturitydate=date('Y-m-d',strtotime($request->investdate));
        if($request->tenure > 0)
        { 
            for($i=0;$i<($request->tenure);$i++)
            {
                    $maturitydate = date('Y-m-d', strtotime($maturitydate. ' + 1 months'));
               
            }
        }
        $finisheddate=$maturitydate;
        for($i=0;$i<($settings);$i++)
        {
                $maturitydate = date('Y-m-d',strtotime($maturitydate. ' + 1 months'));
        }

        $client=new Client();
        $client->client_name=$request->name;
        $client->client_code=$request->clientcode;
        $client->client_address=$request->client_address;
        $client->pwd=$request->pwd;
        $client->client_phone=$request->mobile;
        $client->email=$request->email;
        $client->gender=$request->gender;
        $client->activeStatus=$request->activeStatus;
        if($request->session()->get('user_type_id') == 1)
        {
            $client->assignAdmin=$request->assignAdmin;
            $client->assignEmployee=$request->assignEmployee;
        }
        else if($request->session()->get('user_type_id') == 2)
        {
         
            $client->assignAdmin=$request->session()->get('email');
            $client->assignEmployee=$request->assignEmployee;
        }
        else if($request->session()->get('user_type_id') == 3)
        {
            $client->assignAdmin=$request->session()->get('assignAdmin');
            $client->assignEmployee=$request->session()->get('email');
        }
       
        
        $client->enteredmailid=$request->session()->get('email');
        $client->enteredid=$request->session()->get('loginId');
        $client->usertypeid=$request->session()->get('user_type_id');
        
        $res=$client->save();
        $investmentRecords=new investment();
        if($request->session()->get('user_type_id') == 1)
        {
            $investmentRecords->admin_email_id=$request->assignAdmin;
            $investmentRecords->approval=1;
            $investmentRecords->approvedby=$request->session()->get('email');
            $investmentRecords->emp_email_id=$request->assignEmployee;
        }
        else if($request->session()->get('user_type_id') == 2)
        {
            $investmentRecords->admin_email_id=$request->session()->get('email');
            $investmentRecords->approval=1;
            $investmentRecords->approvedby=$request->session()->get('email');
            $investmentRecords->emp_email_id=$request->assignEmployee;
        }
        else if($request->session()->get('user_type_id') == 3)
        {
            $investmentRecords->approval=0;
            $investmentRecords->admin_email_id=$request->session()->get('assignAdmin');
            $investmentRecords->emp_email_id=$request->session()->get('email');
        }
        $investmentRecords->client_email_id=$request->email;
        $investmentRecords->client_code=$request->clientcode;
       
        $investmentRecords->tenure=$request->tenure;
        $investmentRecords->invest_amount=$request->investamount;
        $investmentRecords->return_monthly=(($request->investamount)/100)*5;
        $investmentRecords->return_overall=((($request->investamount)/100)*5)*$request->tenure; 
        $investmentRecords->payable_amount=$request->investamount+(((($request->investamount)/100)*5)*$request->tenure); 
        $investmentRecords->locked_period=$request->tenure+$settings;
        $investmentRecords->invest_date=date('Y-m-d',strtotime($request->investdate));
        $investmentRecords->finished_date=date('Y-m-d',strtotime($finisheddate));
        $investmentRecords->maturitydate=date('Y-m-d',strtotime($maturitydate));
        $investmentRecords->interestrate=$request->interestrate;
        $investmentRecords->enteredmailid=$request->session()->get('email');
        $investmentRecords->enteredid=$request->session()->get('loginId');
        $investmentRecords->usertypeid=$request->session()->get('user_type_id');
        $resu=$investmentRecords->save();
        $investment_id=$investmentRecords->id;
        if(strlen($request->clientnumber) == 1)
        {
            $codefinal='CLI00000'.$request->clientnumber+1;
        }
        if(strlen($request->clientnumber) == 2)
        {
            $codefinal='CLI0000'.$request->clientnumber+1;
        }
        if(strlen($request->clientnumber) == 3)
        {
            $codefinal='CLI000'.$request->clientnumber+1;
        }
        if(strlen($request->clientnumber) == 4)
        {
            $codefinal='CLI00'.$request->clientnumber+1;
        }
        if(strlen($request->clientnumber) == 5)
        {
            $codefinal='CLI0'.$request->clientnumber+1;
        }
        if(strlen($request->clientnumber) == 6)
        {
            $codefinal='CLI'.$request->clientnumber+1;
        }
        $codevalue=$request->clientnumber+1;
        DB::table('codes')->update(['clientcode_value' => $codevalue,'clientcode' => $codefinal]);
        if($resu) 
        {
            return redirect('/viewlastrecord/'.$request->email.'/'.$investment_id);
          // return back()->with('success','Successfully Registered'); 
        }
        else
        {
            return back()->with('fail','some Fields are Empty');
        }
    }
    public function approvalfunction($email,$id,Request $request)
    {
        investment::where('admin_email_id',$request->session()->get('email'))->where('_id',$id)->update(['approval' => 1,'approvedby' => $request->session()->get('email')]);
        return back()->with('success','Successfully Approved');    
    }
    public function rejectfunction($email,$id,Request $request)
    {
        investment::where('admin_email_id',$request->session()->get('email'))->where('_id',$id)->update(['approval' => 2,'approvedby' => $request->session()->get('email')]);
        return back()->with('fail','Rejected');   
    }

    public function viewlastrecord($email,$investid,Request $request)
    {
        $client=Client::where('email',$email)->get();
        $investmentrecords=investment::where('_id',$investid)->get();
        return view('clients.viewlastrecord',['investmentrecords' => $investmentrecords,'email' => $email,'clients' => $client,'investid' => $investid]);
    }
    public function viewClients(Request $request)
    {
        if($request->session()->exists('user_type'))
        {
            if($request->session()->get('user_type_id') == 1)
            {
                $data=Client::all();
            }
            else if($request->session()->get('user_type_id') == 2)
            {
                $data=Client::where('assignAdmin',$request->session()->get('email'))->get();
            }
            else if($request->session()->get('user_type_id') == 3)
            {
                $data=Client::where('assignEmployee',$request->session()->get('email'))->get();
            }
            return view('Clients.viewClients',['data' => $data]);
        }
        else
        {
            return redirect('/login');
        }
       
        
    }
    public function updateclients($email,Request $request)
    {
        $admins=Secondaryadmin::all();
        $data=Client::where('email',$email)->get();
        if($request->session()->exists('user_type'))
        {
            if($request->session()->get('user_type_id') == 1)
            {
                $employee=employee::all();
            }
            else
            {
                $employee=employee::where('enteredmailid',$request->session()->get('email'))->get();
            }
        }
        return view('Clients.update_clients',['email' => $email,'admins' => $admins,'data' => $data,'employee' => $employee]);
    }
    public function viewBriefClients($email,Request $request)
    {
        $admins=Secondaryadmin::all();
        $data=Client::where('email',$email)->where('usertypeid',$request->session()->get('user_type_id'))->where('enteredmailid',$request->session()->get('email'))->get();
        $investmentRecords=investment::where('client_email_id',$email)->where('usertypeid',$request->session()->get('user_type_id'))->where('enteredmailid',$request->session()->get('email'))->get();
        return view('Clients.viewBriefClients',['email' => $email,'admins' => $admins,'data' => $data,'investmentRecords' => $investmentRecords]);
    }
    public function payclientspost(Request $request)
    {
        $request->validate([
            'paymentdate' => 'required',
        ]);
        investment::where('_id',$request->investmentid)->update(['paydate' => $request->paymentdate,'paydescription' => $request->paymentdescription,'paystatus' => 1,'investmentStatus' => 'paid']);
        return redirect('/viewClients');
    }
    public function updateClientsPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'client_phone' => 'required|string|min:10',
            'activeStatus' => 'required | integer',
            'assignAdmin' => 'required|string',
            'assignEmployee' =>'required|string',
        ]);
        $name=$request->name;
        $email=$request->email;
        $gender=$request->gender;
        $client_phone=$request->client_phone;
        $client_address=$request->client_address;
        $lockperiod=$request->lockperiod;
        $returns=$request->returns;
        $investamount=$request->investamount;
        $tenure=$request->tenure;
        $invest_date=date('Y-m-d',strtotime($request->invest_date));
        $activeStatus=$request->activeStatus;
        $assignAdmin=$request->assignAdmin;
        $assignEmployee=$request->assignEmployee;
        $user=DB::table('clients')->where('email', $email)->update(array('client_name' => $name,'client_address' => $client_address,'client_phone' => $client_phone,'gender' => $gender,'activeStatus' => $activeStatus,'assignAdmin' => $assignAdmin,'assignEmployee' => $assignEmployee)); 

        if($user)
        {
            return back()->with('success','Successfully Updated');    
        }
        else
        {
            
           return back()->with('fail','Error on update');    
        }
    }
    public function search_client()
    {
        return view('clients.searchclients');
    }
    public function processclients($email,Request $request)
    {
        $clientrecords=Client::where('email',$email)->get();
        $investmentrecords=investment::where('client_email_id',$email)->get();
        return view('clients.processclients',['email' => $email,'clientrecords' => $clientrecords,'investmentrecords' => $investmentrecords]);
    }
    public function changeclientstatus($activestatus,$email,Request $request)
    {
        if($activestatus == 1)
        {
            Client::where('email',$email)->update(['activeStatus' => 2]);
            return back()->with('success','Changed'); 
        }
        else
        {
            Client::where('email',$email)->update(['activeStatus' => 1]);
            return back()->with('success','Changed'); 
        }
    }
    public function deleteclientpersonalinfo($email,Request $request)
    {
       $investments=investment::where('client_email_id',$email)->count();
     
       if($investments > 0 )
       {
        return back()->with('fail','Not Allowed to Delete'); 
       }
       else
       {
        Client::where('email',$email)->update(['deletestatus' => 1]);
        return redirect('/viewClients/');
       }

    }
    public function editclientsdetails($email,Request $request)
    {

    }
    public function deleteinvestmentrecords($email,$id,Request $request)
    {
       $investments=investment::where('client_email_id',$email)->where('_id',$id)->count();
     
       if($investments > 0 )
       {
            investment::where('client_email_id',$email)->where('_id',$id)->update(['deletestatus' => 1]);
            return back()->with('success','Sucessfully Deleted'); 
       }
       else
       {
            return back()->with('fail','Record Not Found'); 
       }

    }
    public function payclients($email,$investmentid,Request $request)
    {
        
        $investmentcount=investment::where('client_email_id',$email)->where('_id',$investmentid)->where('maturitydate' ,'>=',date('Y-m-d'))->count();
       
        $investment=investment::where('client_email_id',$email)->where('_id',$investmentid)->where('maturitydate','>=',date('Y-m-d'))->get();
      
        $clients=Client::where('email',$email)->get();
        if($investmentcount > 0)
        {
            return view('clients.payclients',['email' => $email,'investmentid' => $investmentid,'investment' => $investment,'clients' => $clients]);    
        }   
        else
        {
            return redirect('/notallowedtopay/');
        }
        
    }
    public function notallowedtopay(Request $request)
    {
        return view('clients.notallowedtopay');
    }
    public function newinv(Request $request)
    {
        $clients=Client::all();
        return view('clients.newinv',['clients' => $clients]);
    }
   
 
}


