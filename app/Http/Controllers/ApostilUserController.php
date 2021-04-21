<?php


namespace App\Http\Controllers;


use App\Models\ApostilUser;

class ApostilUserController extends Controller
{
    public function createApostilUser(): \Illuminate\Http\JsonResponse
    {
        $validator = validator(request()->all(),[
//            'apply_user_type' => 'required|integer',
//            'apply_participant' => 'required|integer',
//            'doc_owner_name' => 'string|max:50|nullable',
//            'doc_owner_lastname' => 'string|max:50|nullable',
//            'doc_owner_fathername' => 'string|max:50|nullable',
//            'relationship_id' => 'integer|nullable',
//            'power_of_attorney_number' => 'integer|nullable',
//            'letter_number' => 'integer|nullable',
//            'issue_date' => 'date_format:Y-m-d|nullable',
//            'legal_user_name' => 'string|max:60|nullable',
//            'voen' => 'string|max:50|nullable',
//            'position' => 'string|nullable',
//            'doc_type_id' => 'required|integer',
//            'shv_series' => 'required|string|max:4',
//            'shv_number' => 'required|integer|digits:8',
//            'letter_name' => 'required|string|max:500',
//            'doc_presented_date' => 'required|date_format:Y-m-d',
//            'doc_presented_name' => 'required|string|max:50',
//            'doc_presented_lastname' => 'required|string|max:50',
//            'doc_presented_fathername' => 'required|string|max:50',
//            'doc_presented_birtday_date' => 'required|date_format:Y-m-d',
//            'doc_presented_reg_address' => 'required|string|max:500',
//            'doc_presented_native_id' => 'required|integer',
//            'doc_presented_tel' => 'required|integer',
//            'doc_presented_mail' => 'required|email',
//            'other_notes' => 'required|string|max:500',
        ]);


        if ($validator->fails()) {
            return response()->json(['status' => false,'errors' => $validator->errors()]);
        }
        else {
            $user = new ApostilUser();
            $user->apply_user_type = request()->get('apply_user_type');
            $user->apply_participant = request()->get('apply_participant');
            $user->doc_owner_lastname = request()->get('doc_owner_lastname');
            $user->doc_owner_fathername = request()->get('doc_owner_fathername');
            $user->doc_owner_name = request()->get('doc_owner_name');
            $user->relationship_id = request()->get('relationship_id');
            $user->power_of_attorney_number = request()->get('power_of_attorney_number');
            $user->letter_number = request()->get('letter_number');
            $user->issue_date = request()->get('issue_date');
            $user->legal_user_name = request()->get('legal_user_name');
            $user->voen = request()->get('voen');
            $user->position = request()->get('position');
            $user->doc_type_id = request()->get('doc_type_id');
            $user->shv_series = request()->get('shv_series');
            $user->shv_number = request()->get('shv_number');
            $user->doc_presented_date = request()->get('doc_presented_date');
            $user->letter_name = request()->get('letter_name');
            $user->doc_presented_name = request()->get('doc_presented_name');
            $user->doc_presented_lastname = request()->get('doc_presented_lastname');

            $user->doc_presented_fathername = request()->get('doc_presented_fathername');
            $user->doc_presented_birtday_date = request()->get('doc_presented_birtday_date');
            $user->doc_presented_reg_address = request()->get('doc_presented_reg_address');

            $user->doc_presented_native_id = request()->get('doc_presented_native_id');
            $user->doc_presented_tel = request()->get('doc_presented_tel');
            $user->doc_presented_mail = request()->get('doc_presented_mail');
            $user->other_notes = request()->get('other_notes');
            $user->save();

            return response()->json(['status' => true,'id' => $user->id]);
        }
    }
}
