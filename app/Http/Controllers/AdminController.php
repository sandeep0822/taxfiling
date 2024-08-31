<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\bank_details;
use App\Models\basic_info;
use App\Models\contact_details;
use App\Models\income_details;
use App\Models\message;
use App\Models\Referral;
use App\Models\replymsg;
use App\Models\residency_details;
use App\Models\spouse_details;
//use Auth;
use App\Models\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \Yajra\DataTables\Facades\DataTables;
use App\Models\Documents;

class AdminController extends Controller
{
    //
    public function reply(Request $request, $id)
    {
        $request->validate([
            'message' => 'required',
        ]);
        $msg = message::find($id);
        $reply = new replymsg;
        $reply->user_id = Auth::user()->id;
        $reply->to_id = $msg->user_id;
        $reply->messages_id = $id;
        $reply->message = $request->message;
        $reply->save();
        // activity log
        $activity_log = new ActivityLog;
        $activity_log->Message = Auth::user()->username . " Just Replied to " . User::find($msg->user_id)->username;
        $activity_log->save();
        return back();
    }
    public function messages()
    {
        $msg = message::where('to_id', null)->get();
        $users = User::select('username', 'id')->where('role', 3)->get();
        return view('admin.messages', ['msgs' => $msg, 'users' => $users]);
    }
    public function view_messages($id)
    {
        $message = message::find($id);
        $replymsgs = replymsg::where('messages_id', $id)->get();
        return view('admin.viewmessage', ['msg' => $message, 'replymsgs' => $replymsgs]);
    }
    public function view_user($id)
    {
        $user = User::find($id);
        $income_details = income_details::where('user_id', $id)->first();
        $spouse_details = spouse_details::where('user_id', $id)->first();
        $bank_details = bank_details::where('user_id', $id)->first();
        $basic_info = basic_info::where('user_id', $id)->first();
        $contact_details = contact_details::where('user_id', $id)->first();
        $residency_details = residency_details::where('user_id', $id)->get();
        return view('admin.view_user', ['user' => $user, 'income_details' => $income_details, 'spouse_details' => $spouse_details, 'bank_details' => $bank_details, 'basic_info' => $basic_info, 'contact_details' => $contact_details, 'residency_details' => $residency_details]);
    }
    public function edit_user($id)
    {
        $user = User::find($id);
        $income_details = income_details::where('user_id', $id)->first();
        $spouse_details = spouse_details::where('user_id', $id)->first();
        $bank_details = bank_details::where('user_id', $id)->first();
        $basic_info = basic_info::where('user_id', $id)->first();
        $contact_details = contact_details::where('user_id', $id)->first();
        $residency_details = residency_details::where('user_id', $id)->get();
        return view('admin.edit', ['user' => $user, 'income_doc' => $income_details, 'spouse_doc' => $spouse_details, 'bank_details' => $bank_details, 'basic_info' => $basic_info, 'contact_details' => $contact_details, 'residency_details' => $residency_details]);
    }
    public function tax_payer_edit(Request $request, $id)
    {
        $validated = $request->validate([
            'marital_status' => 'required',
            'name' => 'required',
            'SSN' => 'required',
            'Occupation' => 'required',
            'Date_of_Birth' => 'required',
            'First_Date_of_Entry_in_US' => 'required',
            'Citizenship' => 'required',
            'type_of_visa' => 'required',
            'address' => 'required',
            'Phone' => 'required',
            'time_zone' => 'required',
        ]);
        $basic_info = basic_info::where('user_id', $id)->first();
        $contact_details = contact_details::where('user_id', $id)->first();
        // basic info form submit
        if ($basic_info) {
            $basic_info = basic_info::find($basic_info->id);
        } else {
            $basic_info = new basic_info;
        }
        $basic_info->user_id = $id;
        $basic_info->marital_status = $request->marital_status;
        $basic_info->full_name = implode(' ', $request->name);
        $basic_info->ssn = $request->SSN;
        $basic_info->occupation = $request->Occupation;
        $basic_info->dob = $request->Date_of_Birth;
        $basic_info->first_date = $request->First_Date_of_Entry_in_US;
        $basic_info->citizenship = $request->Citizenship;
        $basic_info->visa_type = $request->type_of_visa;
        $basic_info->save();
        // activity log
        $activity_log = new ActivityLog;
        $activity_log->Message = Auth::user()->username . " Just Updated Basic Info of " . User::find($id)->username;
        $activity_log->save();
        //contact details.
        if ($contact_details) {
            $contact_details = contact_details::find($contact_details->id);
        } else {
            $contact_details = new contact_details;
        }
        $contact_details->address = implode(',', $request->address);
        $contact_details->user_id = $id;
        $contact_details->contact = $request->Phone;
        $contact_details->timezone = $request->time_zone;
        $contact_details->save();
        // activity log
        $activity_log = new ActivityLog;
        $activity_log->Message = Auth::user()->username . " Just Updated Contact Details of " . User::find($id)->username;
        $activity_log->save();
        //residency details
        for ($i = 0; $i < 2; $i++) {
            $residency_details = residency_details::where('user_id', $id)->get();
            if (count(residency_details::where('user_id', $id)->get()) > 0) {
                $residency_details = residency_details::find($residency_details[$i]->id);
            } else {
                $residency_details = new residency_details;
            }
            $residency_details->user_id = $id;
            $residency_details->SR_2022 = $request->residence_states_2022[$i];
            $residency_details->POS_Start_2022 = $request->startdate_2022[$i];
            $residency_details->POS_End_2022 = $request->enddate_2022[$i];
            $residency_details->SR_2021 = $request->residence_states_2021[$i];
            $residency_details->POS_Start_2021 = $request->startdate_2021[$i];
            $residency_details->POS_End_2021 = $request->enddate_2021[$i];
            $residency_details->SR_2020 = $request->residence_states_2020[$i];
            $residency_details->POS_Start_2020 = $request->startdate_2020[$i];
            $residency_details->POS_End_2020 = $request->enddate_2020[$i];
            $residency_details->save();
        }
        // activity log
        $activity_log = new ActivityLog;
        $activity_log->Message = Auth::user()->username . " Just Updated Residential Details of " . User::find($id)->username;
        $activity_log->save();
        return back()->with('success', 'Details Saved Successfully');
    }
    public function income_edit(Request $request, $id)
    {
        $request->validate([
            'first_upload' => 'array|max:5',
            'first_upload.*' => 'mimes:pdf',
            'second_upload' => 'array|max:5',
            'second_upload.*' => 'mimes:pdf',
            'third_upload' => 'array|max:5',
            'third_upload.*' => 'mimes:pdf',
            'fourth_upload' => 'array|max:5',
            'fourth_upload.*' => 'mimes:pdf',
            'fifth_upload' => 'array|max:5',
            'fifth_upload.*' => 'mimes:pdf',
            'sixth_upload' => 'array|max:5',
            'sixth_upload.*' => 'mimes:pdf',
            'seventh_upload' => 'array|max:5',
            'seventh_upload.*' => 'mimes:pdf',
            'eighth_upload' => 'array|max:5',
            'eighth_upload.*' => 'mimes:pdf',
            'ninth_upload' => 'array|max:5',
            'ninth_upload.*' => 'mimes:pdf',
            'tenth_upload' => 'array|max:5',
            'tenth_upload.*' => 'mimes:pdf',
            'eleventh_upload' => 'array|max:5',
            'eleventh_upload.*' => 'mimes:pdf',
            'twielve_upload' => 'array|max:5',
            'twielve_upload.*' => 'mimes:pdf',
            'thirteen_upload' => 'array|max:5',
            'thirteen_upload.*' => 'mimes:pdf',
            'fourteen_upload' => 'array|max:5',
            'fourteen_upload.*' => 'mimes:pdf',
            'fifteen_upload' => 'array|max:5',
            'fifteen_upload.*' => 'mimes:pdf',
            'sixteen_upload' => 'array|max:5',
            'sixteen_upload.*' => 'mimes:pdf',
            'seventeen_upload' => 'array|max:5',
            'seventeen_upload.*' => 'mimes:pdf',
            'eighteen_upload' => 'array|max:5',
            'eighteen_upload.*' => 'mimes:pdf',
            'ninteen_upload' => 'array|max:5',
            'ninteen_upload.*' => 'mimes:pdf',
            'twenty_upload' => 'array|max:5',
            'twenty_upload.*' => 'mimes:pdf',
        ]);
        $reqnames = ['first_upload', 'second_upload', 'third_upload', 'fourth_upload', 'fifth_upload', 'sixth_upload', 'seventh_upload', 'eighth_upload', 'ninth_upload', 'tenth_upload', 'eleventh_upload', 'twielve_upload', 'thirteen_upload', 'fourteen_upload', 'fifteen_upload', 'sixteen_upload', 'seventeen_upload', 'eighteen_upload', 'ninteen_upload', 'twenty_upload'];
        $dbnames = ['First', 'Second', 'Third', 'Fourth', 'Fifth', 'Sixth', 'Seventh', 'Eighth', 'Ninth', 'Tenth', 'Eleventh', 'Twelfth', 'Thirteenth', 'Fourteenth', 'Fifteenth', 'Sixteenth', 'Seventeenth', 'Eighteenth', 'Nineteenth', 'Twentieth'];
        $income_doc = income_details::where('user_id', $id)->first();
        if ($income_doc) {
            $income_details = income_details::find($income_doc->id);
        } else {
            $income_details = new income_details;
        }
        $income_details->user_id = $id;
        for ($i = 0; $i < count($reqnames); $i++) {
            $reqeachname = $reqnames[$i];
            if ($request->hasFile($reqeachname)) {
                $storename = [];
                $files = $request->file($reqeachname);
                foreach ($files as $file) {
                    $fileName = time() + $i . rand(0, 99) . '.' . $file->extension();
                    $file->move(public_path('income_doc'), $fileName);
                    $storename[] = $fileName;
                }
                $storenameimplode = implode(',', $storename);
                $b = $dbnames[$i];
                $income_details->$b = $storenameimplode;
            }
        }
        $income_details->save();
        // activity log
        $activity_log = new ActivityLog;
        $activity_log->Message = Auth::user()->username . " Just Updated Income Details of " . User::find($id)->username;
        $activity_log->save();
        return back()->with('success', 'Data Saved Successfully');
    }
    public function spouse_edit(Request $request, $id)
    {
        $request->validate([
            'first_upload' => 'mimes:pdf',
            'second_upload' => 'mimes:pdf',
            'third_upload' => 'mimes:pdf',
        ]);
        $reqnames = ['first_upload', 'second_upload', 'third_upload'];
        $dbnames = ['First', 'Second', 'Third'];
        $spouse_doc = spouse_details::where('user_id', $id)->first();
        if ($spouse_doc) {
            $spouse_details = spouse_details::find($spouse_doc->id);
        } else {
            $spouse_details = new spouse_details;
        }
        $spouse_details->user_id = $id;
        for ($i = 0; $i < count($reqnames); $i++) {
            $a = $reqnames[$i];
            if ($request->hasFile($a)) {
                $fileName = time() + $i . '.' . $request->$a->extension();
                $request->$a->move(public_path('spouse_doc'), $fileName);
                $b = $dbnames[$i];
                $spouse_details->$b = $fileName;
            }
        }
        $spouse_details->save();
        // activity log
        $activity_log = new ActivityLog;
        $activity_log->Message = Auth::user()->username . " Just Updated Spouse Details of " . User::find($id)->username;
        $activity_log->save();
        return back()->with('success', 'Data Saved Successfully');
    }
    public function bank_edit(Request $request, $id)
    {
        $validated = $request->validate([
            'bank_name' => 'required',
            'Routing_number' => 'required',
            'Bank_Account_Number' => 'required',
            'Bank_Account_Type' => 'required',
            'ip_pin' => 'required',
        ]);
        $bank_details = bank_details::where('user_id', $id)->first();
        if ($bank_details) {
            $bank_details = bank_details::find($bank_details->id);
        } else {
            $bank_details = new bank_details;
        }
        $bank_details->user_id = $id;
        $bank_details->bank_name = $request->bank_name;
        $bank_details->routing_number = $request->Routing_number;
        $bank_details->bank_acc_number = $request->Bank_Account_Number;
        $bank_details->bank_acc_type = $request->Bank_Account_Type;
        $bank_details->ip_pin = $request->ip_pin;
        $bank_details->save();
        // activity log
        $activity_log = new ActivityLog;
        $activity_log->Message = Auth::user()->username . " Just Updated Bank Details of " . User::find($id)->username;
        $activity_log->save();
        return back()->with('success', 'Details Saved Successfully');
    }
    public function index()
    {
        return "success";
    }
    public function dashboard()
    {
        $users = User::where('role', 3)->get();
        $Active_users = User::where('role', 3)->where('is_active', true)->get();
        $Inactive_users = User::where('role', 3)->where('is_active', false)->get();

        return view('admin.dashboard', ['users' => $users, 'Active_users' => $Active_users, "Inactive_users" => $Inactive_users]);
    }
    public function TotalRegistrations()
    {
        $users = User::where('role', 3)->get();
        return view('admin.TotalRegistrations', ['users' => $users]);
    }
    public function ActiveClients()
    {
        $users = User::where('role', 3)->where('is_active', true)->get();
        return view('admin.ActiveClients', ['users' => $users]);
    }
    public function InactiveClients()
    {
        $users = User::where('role', 3)->where('is_active', false)->get();
        return view('admin.InactiveClients', ['users' => $users]);
    }
    public function Referrals()
    {
        $referrals = Referral::all();
        return view('admin.Referrals', ['Referrals' => $referrals]);
    }
    public function ActivityLog()
    {
        $activity = ActivityLog::all();
        return view('admin.ActivityLog', ['activity' => $activity]);
    }
    public function activeclients_ajax(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('role', 3)->where('is_active', true)->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('postion', function ($row) {
                    if (basic_info::where('user_id', $row->id)->first() && basic_info::where('user_id', $row->id)->first() && residency_details::where('user_id', $row->id)->first()) {
                        return 'Documents Pending';
                    } else if (income_details::where('user_id', $row->id)->first()) {
                        return 'Bank Details Pending';
                    } elseif (bank_details::where('user_id', $row->id)->first()) {
                        return 'Payment Pending';
                    } else {
                        return 'Tax Payer Pending';
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a class="btn btn-info p-1 ml-1" href="/view_user/' . $row->id . '"><i
                    class="fas fa-eye"></i></a>';
                    if(Auth::user()->role == '1') {
                    $btn .= '<a class="btn btn-success p-1 ml-1" href="/edit_user/' . $row->id . '"><i
                    class="fas fa-edit"></i></a>';
                    $btn .= '<a class="btn btn-warning p-1 ml-1" href="#"><i
                    class="fas fa-credit-card"></i></a>';
                    $btn .= '<a class="btn btn-danger p-1 ml-1" href="/delete_user/' . $row->id . '"><i
                    class="fas fa-trash"></i></a>';
                    $btn .= '<a class="btn btn-dark p-1 ml-1" href="/admin/generatePassword/' . $row->id . '"><i
                    class="fas fa-key"></i></a>';
                    }
                    $allbtns = "$btn";
                    return $allbtns;
                })
                ->rawColumns(['action', 'postion'])
                ->make(true);
        }
    }
    public function inactiveclients_ajax(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('role', 3)->where('is_active', false)->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $trashbtn = '<a class="btn btn-danger p-1" href="/view_user/' . $row->id . '"><i
                    class="fas fa-trash"></i></a>';
                    $allbtns = "$trashbtn";
                    return $allbtns;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function totalregistrations_ajax(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('role', 3)->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('active', function ($row) {
                    if ($row->is_active) {
                        return '<span class="badge badge-success">Active</span>';
                    } else {
                        return '<span class="badge badge-danger">Inactive</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $trashbtn = '<a class="btn btn-danger p-1" href="/delete_user/' . $row->id . '"><i
                    class="fas fa-trash"></i></a>';
                    $allbtns = "$trashbtn";
                    return $allbtns;
                })
                ->rawColumns(['action', 'active'])
                ->make(true);
        }
    }
    public function messages_ajax(Request $request)
    {
        if ($request->ajax()) {
            $data = ActivityLog::all();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('message', function ($row) {
                    $explode = explode(' ', $row->Message);
                    $viewbtn = "<b>" . array_shift($explode) . "</b> " . implode(' ', $explode);
                    return $viewbtn;
                })
                ->rawColumns(['message'])
                ->make(true);
        }
    }
    public function compose(Request $request)
    {
        $request->validate([
            'userid' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $message = new message;
        $message->user_id = Auth::user()->id;
        $message->to_id = User::where('username', $request->userid)->first()->id;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();
        // activity log
        $activity_log = new ActivityLog;
        $activity_log->Message = Auth::user()->username . " Just Sent Mail to " . User::where('username', $request->userid)->first()->username;
        $activity_log->save();
        return back()->with('success', 'Mail Sent Successfully');
    }
    public function delete_user($id)
    {
        $income_dbnames = ['First', 'Second', 'Third', 'Fourth', 'Fifth', 'Sixth', 'Seventh', 'Eighth', 'Ninth', 'Tenth', 'Eleventh', 'Twelfth', 'Thirteenth', 'Fourteenth', 'Fifteenth', 'Sixteenth', 'Seventeenth', 'Eighteenth', 'Nineteenth', 'Twentieth'];
        $spouse_dbnames = ['First', 'Second', 'Third'];

        $user = User::find($id);
        bank_details::where('user_id', $user->id)->delete();
        basic_info::where('user_id', $user->id)->delete();
        contact_details::where('user_id', $user->id)->delete();
        $income = income_details::where('user_id', $user->id)->first();
        if ($income) {
            foreach ($income_dbnames as $income_db) {
                if ($income->$income_db) {
                    foreach (explode(',', $income->$income_db) as $filename) {
                        if ($filename && File::exists(public_path('income_doc/' . $filename))) {
                            unlink(public_path('income_doc/' . $filename));
                        }
                    }
                }
            }
        }
        $spouse = spouse_details::where('user_id', $user->id)->first();
        if ($spouse) {
            foreach ($spouse_dbnames as $spouse_db) {
                foreach (explode(',', $spouse->$spouse_db) as $filename) {
                    if ($filename && File::exists(public_path('spouse_doc/' . $filename))) {
                        unlink(public_path('spouse_doc/' . $filename));
                    }
                }
            }
        }
        message::where('user_id', $user->id)->delete();
        Referral::where('user_id', $user->id)->delete();
        replymsg::where('user_id', $user->id)->delete();
        residency_details::where('user_id', $user->id)->delete();
        $activity_log = new ActivityLog;
        $activity_log->Message = Auth::user()->username . " Just Sent Mail to " . $user->username;
        $activity_log->save();
        User::find($id)->delete();
        return back()->with('success', 'Deleted User Successfully');
    }
    public function delete_one_spouse_doc($name, $dbname)
    {
        $spouse_details = spouse_details::where($dbname, $name)->first();
        if (File::exists(public_path('spouse_doc/' . $spouse_details->$dbname))) {
            unlink(public_path('spouse_doc/' . $spouse_details->$dbname));
        }
        $spouse_details->$dbname = null;
        $spouse_details->save();
        // activity log
        $activity_log = new ActivityLog;
        $activity_log->Message = Auth::user()->username . " Just Deleted One of the Spouse Doc Details of " . User::find($spouse_details->user_id)->username;
        $activity_log->save();
        return back()->with('success', 'Deleted File Successfully');
    }
    public function delete_one_income_doc($name, $dbname)
    {
        $income_details = income_details::where($dbname, $name)->first();
        $names = explode(',', $name);
        foreach ($names as $named) {
            if (File::exists(public_path('income_doc/' . $named))) {
                unlink(public_path('income_doc/' . $named));
            }
        }
        $income_details->$dbname = null;
        $income_details->save();
        // activity log
        $activity_log = new ActivityLog;
        $activity_log->Message = Auth::user()->username . " Just Deleted One of the Income Doc Details";
        $activity_log->save();
        return back()->with('success', 'Deleted File Successfully');
    }
    public function users()
    {
        $users = User::where('role', 2)->get();
        return view('admin.users', ['users' => $users]);
    }
    public function totalusers_ajax(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('role', 2)->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('active', function ($row) {
                    if ($row->is_active) {
                        return '<span class="badge badge-success">Active</span>';
                    } else {
                        return '<span class="badge badge-danger">Inactive</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $trashbtn = '<a class="btn btn-danger p-1" href="/delete_user/' . $row->id . '"><i
                    class="fas fa-trash sm"></i></a> | <a class="btn btn-success p-1" href="/admin/edit/' . $row->id . '"><i
                    class="fas fa-edit sm"></i></a>';
                    $allbtns = "$trashbtn";
                    return $allbtns;
                })
                ->rawColumns(['action', 'active'])
                ->make(true);
        }
    }
    public function user()
    {
        return view('admin.user');
    }
    public function user_create(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'phone' => 'required|numeric|digits:10',
        ]);
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->save();
        if ($request->role == '3') {
            return redirect('/admin/TotalRegistrations');
        } else {
            return redirect('/admin/users');
        }
    }
    public function user_edit($id)
    {
        $user = User::find($id);
        return view('admin.user_edit', ['user' => $user]);
    }
    public function user_update(Request $request)
    {
        $validated = $request->validate([
            'role' => 'required',
            'phone' => 'required|numeric|digits:10',
        ]);
        $user = user::where('id', $request->id)->first();
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->save();
        return redirect('/admin/users');
    }

    public function documents() {
        $documents = Documents::all();
        return view('admin.documents', ['documents' => $documents]);
    }
    public function document() {
        return view('admin.document');
    }
    public function upload_documents(Request $request) {
        $request->validate([
            'us_tax' => 'mimes:pdf',
            'indian_tax' => 'mimes:pdf'
        ]);
        $reqnames = ['us_tax', 'indian_tax'];
        $dbnames = ['us_tax', 'indian_tax'];

        $documents = new Documents;
        
        for ($i = 0; $i < count($reqnames); $i++) {
            $a = $reqnames[$i];
            if ($request->hasFile($a)) {
                $fileName = time() + $i . '.' . $request->$a->extension();
                $request->$a->move(public_path('documents'), $fileName);
                $b = $dbnames[$i];
                $documents->$b = $fileName;
            }
        }
        $documents->save();
        return redirect('/admin/documents')->with('success', 'Data Saved Successfully');
    }
    public function delete_documents($id) {
        
        $documents = Documents::find($id);
        Documents::where('id', $documents->id)->delete();
        unlink(public_path('documents/' . $documents->us_tax));
        unlink(public_path('documents/' . $documents->indian_tax));
        return redirect('/admin/documents')->with('success', 'Data deleted Successfully');
    }
    public function generatePassword($id) {
        $user = User::find($id);
        return view('admin.generatePassword', ['user' => $user]);
    }
    public function update_password(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required',
        ]);
        $user = user::where('id', $request->id)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/admin/ActiveClients')->with('success', 'Password updated Successfully');
    }
}
