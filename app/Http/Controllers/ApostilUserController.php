<?php

namespace App\Http\Controllers;

use App\Models\ApostilUser;
use Illuminate\Http\Request;

class ApostilUserController extends Controller
{
    public function createApostilUser()
    {
        $validator = validator(request()->all(),[
            'apply_user_type' => 'required|integer',
            'apply_participant' => 'required|integer',
            'doc_owner_name' => 'string|max:50|nullable',
            'doc_owner_lastname' => 'string|max:50|nullable',
            'doc_owner_fathername' => 'string|max:50|nullable',
            'relationship_id' => 'integer|nullable',
            'power_of_attorney_number' => 'integer|nullable',
            'letter_number' => 'integer|nullable',
            'issue_date' => 'date_format:Y-m-d|nullable',
            'legal_user_name' => 'string|max:20|nullable',
            'voen' => 'string|max:50|nullable',
            'position' => 'string|nullable',
            'doc_type_id' => 'required|integer',
            'shv_series' => 'required|string|max:4',
            'shv_number' => 'required|integer|digits:8',
            'letter_name' => 'required|string|max:500',
            'doc_presented_date' => 'required|date_format:Y-m-d',
            'doc_presented_name' => 'required|string|max:50',
            'doc_presented_lastname' => 'required|string|max:50',
            'doc_presented_fathername' => 'required|string|max:50',
            'doc_presented_birtday_date' => 'required|date_format:Y-m-d',
            'doc_presented_reg_address' => 'required|string|max:500',
            'doc_presented_native_id' => 'required|integer',
            'doc_presented_tel' => 'required|integer',
            'doc_presented_mail' => 'required|email',
            'other_notes' => 'required|string|max:500',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            $apostilDocumentUser = new ApostilUser();

            $apostilDocumentUser->apply_user_type=request()->get('apply_user_type');
            $apostilDocumentUser->apply_participant=request()->get('apply_participant');
            $apostilDocumentUser->doc_owner_name=request()->get('doc_owner_name');
            $apostilDocumentUser->doc_owner_lastname=request()->get('doc_owner_lastname');
            $apostilDocumentUser->doc_owner_fathername=request()->get('doc_owner_fathername');
            $apostilDocumentUser->relationship_id=request()->get('relationship_id');
            $apostilDocumentUser->power_of_attorney_number=request()->get('power_of_attorney_number');
            $apostilDocumentUser->letter_number=request()->get('letter_number');
            $apostilDocumentUser->issue_date=request()->get('issue_date');
            $apostilDocumentUser->legal_user_name=request()->get('legal_user_name');
            $apostilDocumentUser->voen=request()->get('voen');
            $apostilDocumentUser->position=request()->get('position');
            $apostilDocumentUser->doc_type_id=request()->get('doc_type_id');
            $apostilDocumentUser->shv_series=request()->get('shv_series');
            $apostilDocumentUser->shv_number=request()->get('shv_number');
            $apostilDocumentUser->letter_name=request()->get('letter_name');
            $apostilDocumentUser->doc_presented_date=request()->get('doc_presented_date');
            $apostilDocumentUser->doc_presented_name=request()->get('doc_presented_name');
            $apostilDocumentUser->doc_presented_lastname=request()->get('doc_presented_lastname');
            $apostilDocumentUser->doc_presented_fathername=request()->get('doc_presented_fathername');
            $apostilDocumentUser->doc_presented_birtday_date=request()->get('doc_presented_birtday_date');
            $apostilDocumentUser->doc_presented_reg_address=request()->get('doc_presented_reg_address');
            $apostilDocumentUser->doc_presented_native_id=request()->get('doc_presented_native_id');
            $apostilDocumentUser->doc_presented_tel=request()->get('doc_presented_tel');
            $apostilDocumentUser->doc_presented_mail=request()->get('doc_presented_mail');
            $apostilDocumentUser->other_notes=request()->get('other_notes');
            $apostilDocumentUser->save();

            $apo =  new ApostilController();
        }
    }
}
