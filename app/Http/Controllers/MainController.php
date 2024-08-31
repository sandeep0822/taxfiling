<?php

namespace App\Http\Controllers;

use App\Mail\verify_email;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    //
    public function send_mail($id){
        $user=User::find($id);
        Mail::to($user->email)->send(new verify_email($id,$user->username));
        return back()->with('success','Verification mail sent to user');
    }
    public function verify_mail($id){
        $user=User::find($id);
        $user->is_active = true;
        $user->save();
        return "Email Verified! Close this window and Login to your account";
    }
    public function index(){
        return view('main.index');
    }
    public function about_us(){
        return view('main.about_us');
    }
    public function individual_taxes(){
        return view('main.individual-taxes');
    }
    public function business_taxes(){
        return view('main.business-taxes');
    }
    public function indian_tax_filing(){
        return view('main.indian-taxfiling');
    }
    public function data_security(){
        return view('main.data_security');
    }
    public function refund_status(){
        return view('main.refund_status');
    }
    public function contact_us(){
        return view('main.contact_us');
    }
    public function view_all_services(){
        return view('main.view-all-services');
    }

    public function refer_friend(){
        return view('main.refered-friend');
    }
    public function Perfect_tax_planning_stratagies_for_high_tax_refunds(){
        return view('main.Perfect-tax-planning-stratagies-for-high-tax-refunds');
    }
    public function free_filing_of_tax_returns(){
        return view('main.free-filing-of-tax-returns');
    }
    public function genuine_high_refunds_tax_estimate(){
        return view('main.genuine-high-refunds-tax-estimate');
    }
    public function numerous_tax_consultations(){
        return view('main.numerous-tax-consultations');
    }
    public function guaranteed_accurate_tax_returns(){
        return view('main.guaranteed-accurate-tax-returns');
    }
    public function tax_planing_for_current_year_and_next_year(){
        return view('main.tax-planing-for-current-year-and-next-year');
    }
    public function evalution_of_tax_returns(){
        return view('main.evalution-of-tax-returns');
    }
    public function ITIN_application(){
        return view('main.ITIN-application');
    }
    public function FBAR_and_FATCA(){
        return view('main.FBAR-and-FATCA');
    }
    public function seeking_extension_of_time_to_file_tax_returns(){
        return view('main.seeking-extension-of-time-to-file-tax-returns');
    }
    public function full_support_for_audits_notices(){
        return view('main.full-support-for-audits-notices');
    }
    public function refund_support_for_withheld_of_FICA(){
        return view('main.refund-support-for-withheld-of-FICA');
    }
    public function tax_with_holding(){
        return view('main.tax-with-holding');
    }
    public function customer_support(){
        return view('main.customer-support');
    }
    public function guaranteed_genuine_high_tax_returns(){
        return view('main.guaranteed-genuine-high-tax-returns');
    }
    public function confidentiality_data_security(){
        return view('main.confidentiality-data-security');
    }
    public function tax_return_storage_facility(){
        return view('main.tax-return-storage-facility');
    }
    public function data_protection_on_tax_return(){
        return view('main.data-protection-on-tax-return');
    }
    public function full_satisfaction_gurantee(){
        return view('main.full-satisfaction-gurantee');
    }
    public function Accuracy_guarantee(){
        return view('main.Accuracy-guarantee');
    }
    public function audit_support_for_new_clients_on_previous_tax(){
        return view('main.audit-support-for-new-clients-on-previous-tax');
    }
    public function privacy_guarantee(){
        return view('main.privacy_guarantee');
    }
    
    public function business_tax_filing(){
        return view('main.business-tax-filing');
    }
    public function business_incorporation(){
        return view('main.business-incorporation');
    }
    public function audit_support_for_irs(){
        return view('main.audit-supports-for-irs');
    }
    public function state_audit(){
        return view('main.state-audit');
    }

    public function terms_conditions(){
        return view('main.terms_conditions');
    }
    public function individualTaxes(){
        return view('main.individualTaxes');
    }
    public function auditSupport(){
        return view('main.auditSupport');
    }
    public function stateAudit(){
        return view('main.stateAudit');
    }
    public function refundStatus(){
        return view('main.refundStatus');
    }
    public function businessTax(){
        return view('main.businessTax');
    }
    public function indianTaxFiling(){
        return view('main.indianTaxFiling');
    }
}


