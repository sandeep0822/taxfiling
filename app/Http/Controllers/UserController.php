<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\bank_details;
use App\Models\basic_info;
use App\Models\contact_details;
use App\Models\Documents;
use App\Models\income_details;
use App\Models\message;
use App\Models\Referral;
use App\Models\replymsg;
use App\Models\residency_details;
use App\Models\spouse_details;
use App\Models\UploadFiles;
use App\Models\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('users.list');
    }
    public function tax_filing()
    {
        return view('users.tax_filing');
    }
    public function spuosedoc()
    {
        return view('users.spuosedoc');
    }
    public function bankdetails()
    {
        return view('users.bankdetails');
    }
    public function incomeinf()
    {
        $documents = Documents::orderBy('created_at', 'desc')->first();
        if (is_null($documents)) {
            return view('users.incomeinf', ['documents' => '']);
        } else {
            return view('users.incomeinf', ['documents' => $documents]);
        }
    }

    public function taxsummary()
    {
        return view('users.taxsummary');
    }
    public function Referrals()
    {
        return view('users.Referrals');
    }
    public function Messages()
    {
        return view('users.Messages');
    }
    public function Settings()
    {
        return view('users.Settings');
    }
    public function basic_info(Request $request)
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
        // basic info form submit
        if (Auth::user()->basic_info) {
            $basic_info = basic_info::find(Auth::user()->basic_info->id);
        } else {
            $basic_info = new basic_info;
        }
        $basic_info->user_id = Auth::user()->id;
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
        $activity_log->Message = Auth::user()->username . " Just Updated Basic Info";
        $activity_log->save();
        //contact details.
        if (Auth::user()->contact_details) {
            $contact_details = contact_details::find(Auth::user()->contact_details->id);
        } else {
            $contact_details = new contact_details;
        }
        $contact_details->address = implode(',', $request->address);
        $contact_details->user_id = Auth::user()->id;
        $contact_details->contact = $request->Phone;
        $contact_details->timezone = $request->time_zone;
        $contact_details->save();

        // activity log
        $activity_log = new ActivityLog;
        $activity_log->Message = Auth::user()->username . " Just Updated Contact Details";
        $activity_log->save();
        //residency details
        for ($i = 0; $i < 2; $i++) {
            if (count(Auth::user()->residency_details) > 0) {
                $residency_details = residency_details::find(Auth::user()->residency_details[$i]->id);
            } else {
                $residency_details = new residency_details;
            }
            $residency_details->user_id = Auth::user()->id;
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
        $activity_log->Message = Auth::user()->username . " Just Updated Residential Details";
        $activity_log->save();
        return redirect('/tax_filing/incomeinf')->with('success', 'Details Saved Successfully');
    }
    public function bank_details(Request $request)
    {
        $validated = $request->validate([
            'bank_name' => 'required',
            'Routing_number' => 'required',
            'Bank_Account_Number' => 'required',
            'Bank_Account_Type' => 'required',
            'ip_pin' => 'required',
        ]);
        if (Auth::user()->bank_details) {
            $bank_details = bank_details::find(Auth::user()->bank_details->id);
        } else {
            $bank_details = new bank_details;
        }
        $bank_details->user_id = Auth::user()->id;
        $bank_details->bank_name = $request->bank_name;
        $bank_details->routing_number = $request->Routing_number;
        $bank_details->bank_acc_number = $request->Bank_Account_Number;
        $bank_details->bank_acc_type = $request->Bank_Account_Type;
        $bank_details->ip_pin = $request->ip_pin;
        $bank_details->save();
        // activity log
        $activity_log = new ActivityLog;
        $activity_log->Message = Auth::user()->username . " Just Updated Bank Details";
        $activity_log->save();
        return redirect('/tax_filing')->with('success', 'Details Saved Successfully');
    }

    public function delete_upload_files($id)
    {
        $upload_files = UploadFiles::find($id);
        if (File::exists(public_path('uploads/' . $upload_files->us_other_doc))) {
            unlink(public_path('uploads/' . $upload_files->us_other_doc));
        }
        if (File::exists(public_path('uploads/' . $upload_files->ind_other_doc))) {
            unlink(public_path('uploads/' . $upload_files->ind_other_doc));
        }
        if (File::exists(public_path('uploads/' . $upload_files->upload_file))) {
            unlink(public_path('uploads/' . $upload_files->upload_file));
        }
        UploadFiles::destroy($id);
        // activity log
        $activity_log = new ActivityLog;
        $activity_log->Message = Auth::user()->username . " Just Deleted Uploaded Files";
        $activity_log->save();
        return back();
    }
    public function upload_doc(Request $request)
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

        // dd($request);
        $reqnames = ['first_upload', 'second_upload', 'third_upload', 'fourth_upload', 'fifth_upload', 'sixth_upload', 'seventh_upload', 'eighth_upload', 'ninth_upload', 'tenth_upload', 'eleventh_upload', 'twielve_upload', 'thirteen_upload', 'fourteen_upload', 'fifteen_upload', 'sixteen_upload', 'seventeen_upload', 'eighteen_upload', 'ninteen_upload', 'twenty_upload'];
        $dbnames = ['First', 'Second', 'Third', 'Fourth', 'Fifth', 'Sixth', 'Seventh', 'Eighth', 'Ninth', 'Tenth', 'Eleventh', 'Twelfth', 'Thirteenth', 'Fourteenth', 'Fifteenth', 'Sixteenth', 'Seventeenth', 'Eighteenth', 'Nineteenth', 'Twentieth'];
        if (Auth::user()->income_doc) {
            $income_details = income_details::find(Auth::user()->income_doc->id);
        } else {
            $income_details = new income_details;
        }
        $income_details->user_id = Auth::user()->id;
        for ($i = 0; $i < count($reqnames); $i++) {
            $reqeachname = $reqnames[$i];
            if ($request->hasFile($reqeachname)) {
                $storename = [];
                $files = $request->file($reqeachname);
                $a = 0;
                foreach ($files as $file) {
                    $fileName = time() + $a . rand(0, 99) . '.' . $file->extension();
                    $file->move(public_path('income_doc'), $fileName);
                    $storename[] = $fileName;
                    $a++;
                }
                $storenameimplode = implode(',', $storename);
                $b = $dbnames[$i];
                $income_details->$b = $storenameimplode;
            }
        }
        $income_details->save();
        // activity log
        $activity_log = new ActivityLog;
        $activity_log->Message = Auth::user()->username . " Just Updated Income Doc Details";
        $activity_log->save();
        return redirect('/tax_filing/spuosedoc')->with('success', 'Data Saved Successfully');
    }
    public function delete_income_doc($id)
    {
        $income_details = income_details::find($id);
        $dbnames = ['First', 'Second', 'Third', 'Fourth', 'Fifth', 'Sixth', 'Seventh', 'Eighth', 'Ninth', 'Tenth', 'Eleventh', 'Twelfth', 'Thirteenth', 'Fourteenth', 'Fifteenth', 'Sixteenth', 'Seventeenth', 'Eighteenth', 'Nineteenth', 'Twentieth'];
        for ($i = 0; $i < count($dbnames); $i++) {
            $b = $dbnames[$i];
            if ($income_details->$b) {
                if (File::exists(public_path('income_doc/' . $income_details->$b))) {
                    unlink(public_path('income_doc/' . $income_details->$b));
                }
            }
        }
        income_details::destroy($id);
        // activity log
        $activity_log = new ActivityLog;
        $activity_log->Message = Auth::user()->username . " Just Deleted Income Doc Details";
        $activity_log->save();
        return back()->with('success', 'Data Reset! Fill agin');
    }
    public function upload_spouse_doc(Request $request)
    {
        $request->validate([
            'first_upload' => 'mimes:pdf',
            'second_upload' => 'mimes:pdf',
            'third_upload' => 'mimes:pdf',
        ]);
        $reqnames = ['first_upload', 'second_upload', 'third_upload'];
        $dbnames = ['First', 'Second', 'Third'];
        if (Auth::user()->spouse_doc) {
            $spouse_details = spouse_details::find(Auth::user()->spouse_doc->id);
        } else {
            $spouse_details = new spouse_details;
        }
        $spouse_details->user_id = Auth::user()->id;
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
        $activity_log->Message = Auth::user()->username . " Just Updated Spouse Doc Details";
        $activity_log->save();
        return redirect('/tax_filing/bankdetails')->with('success', 'Data Saved Successfully');
    }
    public function delete_spouse_doc($id)
    {
        $spouse_details = spouse_details::find($id);
        $dbnames = ['First', 'Second', 'Third'];
        for ($i = 0; $i < count($dbnames); $i++) {
            $b = $dbnames[$i];
            if ($spouse_details->$b) {
                if (File::exists(public_path('spouse_doc/' . $spouse_details->$b))) {
                    unlink(public_path('spouse_doc/' . $spouse_details->$b));
                }
            }
        }
        spouse_details::destroy($id);
        // activity log
        $activity_log = new ActivityLog;
        $activity_log->Message = Auth::user()->username . " Just Deleted Spouse Doc Details";
        $activity_log->save();
        return back()->with('success', 'Data Reset! Fill agin');
    }
    public function delete_one_income_doc($name, $dbname)
    {
        $income_details = income_details::where('user_id', Auth::user()->id)->where($dbname, $name)->first();
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
    public function delete_one_spouse_doc($name, $dbname)
    {
        $spouse_details = spouse_details::where('user_id', Auth::user()->id)->where($dbname, $name)->first();
        if (File::exists(public_path('spouse_doc/' . $spouse_details->$dbname))) {
            unlink(public_path('spouse_doc/' . $spouse_details->$dbname));
        }
        $spouse_details->$dbname = null;
        $spouse_details->save();
        // activity log
        $activity_log = new ActivityLog;
        $activity_log->Message = Auth::user()->username . " Just Deleted One of the Spouse Doc Details";
        $activity_log->save();
        return back()->with('success', 'Deleted File Successfully');
    }
    public function addreferrals(Request $request)
    {
        $firstname = array_filter($request->first_name);
        $lastname = array_filter($request->last_name);
        $email = array_filter($request->Email);
        $phone1 = array_filter($request->phone1);
        $phone2 = array_filter($request->phone2);
        if (count($firstname) == count($phone1)) {
            for ($i = 0; $i < count($firstname); $i++) {
                $referrals = new Referral;
                $referrals->user_id = Auth::user()->id;
                $referrals->first_name = $request->first_name[$i];
                if ($request->last_name[$i]) {
                    $referrals->last_name = $request->last_name[$i];
                }
                if ($request->Email[$i]) {
                    $referrals->email = $request->Email[$i];
                }
                $referrals->phone = $request->phone1[$i];
                if ($request->phone2[$i]) {
                    $referrals->alternative = $request->phone2[$i];
                }
                $referrals->save();
            }
            // activity log
            $activity_log = new ActivityLog;
            $activity_log->Message = Auth::user()->username . " Just Added Some Refferals";
            $activity_log->save();
            return back()->with('success', 'Data Saved Successfully');
        } else {
            return back()->with('error', 'Please Fill Mandatory Fields');
        }
    }
    public function myrefferals()
    {
        return view('users.myrefferals');
    }
    public function inbox()
    {
        $msgs = message::where('to_id', Auth::user()->id)->get();
        $replymsgs = replymsg::where('to_id', Auth::user()->id)->get();
        return view('users.inbox', ['msgs' => $msgs, 'replymsgs' => $replymsgs]);
    }
    public function sent()
    {
        return view('users.sent');
    }
    public function compose()
    {
        return view('users.compose');
    }
    public function compose_post(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);
        $compose = new message;
        $compose->user_id = Auth::user()->id;
        $compose->subject = $request->subject;
        $compose->message = $request->message;
        $compose->save();
        // activity log
        $activity_log = new ActivityLog;
        $activity_log->Message = Auth::user()->username . " Just Sent Message to Admin";
        $activity_log->save();
        return back()->with('success', 'Mail Sent Successfully');
    }
    public function edit_profile()
    {
        return view('users.editprofile');
    }
    public function edit_profile_post(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        // activity log
        $activity_log = new ActivityLog;
        $activity_log->Message = Auth::user()->username . " Just Updated Profile Details";
        $activity_log->save();
        return back()->with('success', 'Data Updated Successfully');
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);
        $user = User::find(Auth::user()->id);
        if (Hash::check($request->old_password, $user->password)) {
            //
            $user->password = Hash::make($request->new_password);
            $user->save();
            // activity log
            $activity_log = new ActivityLog;
            $activity_log->Message = Auth::user()->username . " Just Updated Password";
            $activity_log->save();
            return back()->with('success', 'Password Updated Successfully');
        } else {
            return back()->with('error', 'Old Password incorrect');
        }

    }

}
