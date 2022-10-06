<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Client;
use App\Models\Secondaryadmin;
use App\Models\investment; 
use App\Models\Tenurerecords;
use App\Models\settings;
use Hash;
use session;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
class ReportController extends Controller
{
    public function investmentrecords($investmentid=0,Request $request)
    {
            if($request->session()->exists('user_type')) 
            {
                if($request->session()->get('user_type_id') == 1)
                {
                    $investmentrecords=investment::all();
                }
                else if($request->session()->get('user_type_id') == 2)
                {
                    $investmentrecords=investment::where('admin_email_id',$request->session()->get('email'))->get();
                }
                else if($request->session()->get('user_type_id') == 3)
                {
                    $investmentrecords=investment::all();
                }

            }
           
            $investmentpar=investment::where('_id',$investmentid)->get();
            
            if($investmentpar->count() > 0)
            {
                
                $clients=Client::where('email',$investmentpar[0]->client_email_id)->get();

            }
            else 
            {
                $clients='';
            }
           
        return view('reports.investmentrecords',['investmentrecords' => $investmentrecords,'investmentid' => $investmentid,'clients' => $clients,'investmentpar' => $investmentpar]);   

    }
    public function investmentrecords_export($investmentid,Request $request)
    {
        if($request->session()->exists('user_type')) 
            {
                if($request->session()->get('user_type_id') == 1)
                {
                    $investmentrecords=investment::all();
                }
                else if($request->session()->get('user_type_id') == 2)
                {
                    $investmentrecords=investment::where('admin_email_id',$request->session()->get('email'))->get();
                }
                else if($request->session()->get('user_type_id') == 3)
                {
                    $investmentrecords=investment::all();
                }

            }
            $investmentpar=investment::where('_id',$investmentid)->get();
            
            if($investmentpar->count() > 0)
            {
                
                $clients=Client::where('email',$investmentpar[0]->client_email_id)->get();

            }
            else 
            {
                $clients='';
            }
            $pdf = Pdf::loadView('Export.investmentrecords_export', ['investmentrecords' => $investmentrecords,'investmentid' => $investmentid,'clients' => $clients,'investmentpar' => $investmentpar]);
            return $pdf->setPaper('a4')->stream();
    }
    public function getclients()
    {
        if($request->session()->exists('user_type'))
        {
            if($request->session()->get('user_type_id') == 1)
            {
                $client=Client::all();
            }
            else if($request->session()->get('user_type_id') == 2)
            {
                $client=Client::where('assignAdmin',$request->session()->get('email'))->get();
            }
            else if($request->session()->get('user_type_id') == 3)
            {
                $client=Client::Where('assignEmployee',$request->session()->get('email'))->get();
            }
        }
        echo json_encode($client);
    }
    public function client_wise_report($email=null,Request $request)
    {
        if($request->session()->exists('user_type'))
        {
            if($request->session()->get('user_type_id') == 1)
            {
                $client=Client::all();
            }
            else if($request->session()->get('user_type_id') == 2)
            {
                $client=Client::where('assignAdmin',$request->session()->get('email'))->get();
            }
            else if($request->session()->get('user_type_id') == 3)
            {
                $client=Client::Where('assignEmployee',$request->session()->get('email'))->get();
            }
        }
        if($email != 0)
        {
            $investments=investment::where('client_email_id',$email)->get();
            
            $data=Client::where('email',$email)->get();
        }
        else
        {
            $investments='';
            $data='';
          
        }
       
        return view('reports.client_wise_report',['investments' => $investments,'data' => $data,'clients' => $client,'email' => $email]);
    }
    public function client_wise_report_export($email=null,Request $request)
    {
        if($request->session()->exists('user_type'))
        {
            if($request->session()->get('user_type_id') == 1)
            {
                $client=Client::all();
            }
            else if($request->session()->get('user_type_id') == 2)
            {
                $client=Client::where('assignAdmin','alladmins')->orWhere('assignAdmin',$request->session()->get('email'))->get();
            }
            else if($request->session()->get('user_type_id') == 3)
            {
                $client=Client::Where('assignEmployee',$request->session()->get('email'))->get();
            }
        }
        if($email != 0)
        {
            $investments=investment::where('client_email_id',$email)->get();
            $data=Client::where('email',$email)->get();
        }
        else
        {
            $investments='';
            $data='';
          
        }
      

        $pdf = Pdf::loadView('Export.client_wise_report', ['investments' => $investments,'data' => $data,'clients' => $client]);
        return $pdf->setPaper('a4')->stream();
    }
    public function overallreports(Request $request)
    {
        if($request->session()->exists('user_type'))
        {
            if($request->session()->get('user_type_id') == 1)
            {
                $client=Client::all();
            }
            else if($request->session()->get('user_type_id') == 2)
            {
                $client=Client::where('assignAdmin',$request->session()->get('email'))->get();
            }
            else if($request->session()->get('user_type_id') == 3)
            {
                $client=Client::where('assignEmployee',$request->session()->get('email'))->get();
            }
        }
        return view('reports.overallreports',['clients' => $client]);
    }
    public function overallclientreports_export(Request $request)
    {
        if($request->session()->exists('user_type'))
        {
            if($request->session()->get('user_type_id') == 1)
            {
                $client=Client::all();
            }
            else if($request->session()->get('user_type_id') == 2)
            {
                $client=Client::where('assignAdmin',$request->session()->get('email'))->get();
            }
            else if($request->session()->get('user_type_id') == 3)
            {
                $client=Client::Where('assignEmployee',$request->session()->get('email'))->get();
            }
        }
        $pdf = Pdf::loadView('Export.overallclientreports_export', ['clients' => $client]);
        return $pdf->setPaper('a4')->stream();
    }
    public function employeewisereports($email=null,Request $request)
    {
        if($request->session()->exists('user_type'))
        {
            if($request->session()->get('user_type_id') == 1)
            {
                $employees=Employee::all();
            }
            else if($request->session()->get('user_type_id') == 2)
            {
                $employees=Employee::where('assignAdmin',$request->session()->get('email'))->get();
            }
         
        }
        if($email != 0)
        {
            $clients=Client::where('enteredmailid',$email)->get();
            $employeepar=Employee::where('email',$email)->get();
        }
        else
        {
            $clients='';
            $employeepar='';
        }
        
        return view('reports.employeewisereports',['employees' => $employees,'clients' => $clients,'email' => $email,'emp' => $employeepar]);
    }
    public function employeewisereports_export($email=null,Request $request)
    {
        if($request->session()->get('user_type_id') == 1)
        {
            $employees=Employee::all();
        }
        else if($request->session()->get('user_type_id') == 2)
        {
            $employees=Employee::where('assignAdmin','alladmins')->orWhere('assignAdmin',$request->session()->get('email'))->get();
        }
     
        if($email != 0)
        {
            $clients=Client::where('enteredmailid',$email)->get();
            $employeepar=Employee::where('email',$email)->get();
        }
        else
        {
            $clients='';
        }

        
        $pdf = Pdf::loadView('Export.employeewisereports_export', ['employees' => $employees,'clients' => $clients,'email' => $email,'emp' => $employeepar]);
        return $pdf->setPaper('a4')->stream();
    }
    public function userdetails(Request $request)
    {
        $employee='';
        $superadmins=User::all();
        $admin=Secondaryadmin::all();
        if($request->session()->exists('user_type'))
        {
            if($request->session()->get('user_type_id') == 1)
            {
                $clients=Client::all();
            }
            else if($request->session()->get('user_type_id') == 2)
            {
                $clients=Client::where('assignAdmin',$request->session()->get('email'))->get();
            }
            else if($request->session()->get('user_type_id') == 3)
            {
                $clients=Client::where('assignEmployee',$request->session()->get('email'))->get();
            }
        }
        if($request->session()->get('user_type_id') == 1)
        {
            $employee=Employee::all();
        }
        else if($request->session()->get('user_type_id') == 2)
        {
            $employee=Employee::where('assignAdmin',$request->session()->get('email'))->get();
        }
        
        return view('reports.userdetails',['superadmins' => $superadmins,'admin' => $admin,'clients' => $clients,'employee' => $employee]);
    }

    public function userdetails_export(Request $request)
    {
        $employee='';
        $superadmins=User::all();
        $admin=Secondaryadmin::all();
        if($request->session()->exists('user_type'))
        {
            if($request->session()->get('user_type_id') == 1)
            {
                $clients=Client::all();
            }
            else if($request->session()->get('user_type_id') == 2)
            {
                $clients=Client::where('assignAdmin',$request->session()->get('email'))->get();
            }
            else if($request->session()->get('user_type_id') == 3)
            {
                $clients=Client::where('assignEmployee',$request->session()->get('email'))->get();
            }
        }
        if($request->session()->get('user_type_id') == 1)
        {
            $employee=Employee::all();
        }
        else if($request->session()->get('user_type_id') == 2)
        {
            $employee=Employee::where('assignAdmin',$request->session()->get('email'))->get();
        }
        
        $pdf = Pdf::loadView('Export.userdetails_export', ['superadmins' => $superadmins,'admin' => $admin,'clients' => $clients,'employee' => $employee]);
        return $pdf->setPaper('a4')->stream();
    }
    public function generate_pdf()
    {
        $data=Client::all();
        // $filename='samplepdf.pdf';
        // $mpdf = new Mpdf();
        // $html=\view::make('Export.demo')->with('data',$data);
        // $html=$html->render();
        // $mpdf->writeHTML($html);
        // $mpdf->Output($filename,'I'); 
        $pdf = Pdf::loadView('Export.demo', ['data' => $data]);
        return $pdf->download('invoice.pdf');
    }
    public function viewdocument($email,$id,Request $request)
    {
        if($request->session()->exists('user_type'))
        {
            if($request->session()->get('user_type_id') == 1)
            {
                $client=Client::where('email',$email)->get();
                $investmentrecords=investment::where('client_email_id',$email)->where('_id',$id)->get();
            }
            else if($request->session()->get('user_type_id') == 2)
            {
                $client=Client::where('email',$email)->get();
                $investmentrecords=investment::where('client_email_id',$email)->where('_id',$id)->get();
            }
            else if($request->session()->get('user_type_id') == 3)
            {
                $client=Client::where('email',$email)->get();
                $investmentrecords=investment::where('client_email_id',$email)->where('_id',$id)->get();
            }
            else
            {
                return redirect('/login');
            }
           
        }
       $settings=settings::all();
        $pdf = Pdf::loadView('Export.viewdocument', ['settings' => $settings,'investmentrecords' => $investmentrecords,'clients' => $client]);
        return $pdf->setPaper('a4')->stream();
    }
}
