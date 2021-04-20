<?php


namespace App\Http\Controllers;


use App\Models\ApostilUser;

class ApostilUserController extends Controller
{
    public function createApostilUser(): \Illuminate\Http\JsonResponse
    {
        $validator = validator(request()->all(),[

        ]);


        if ($validator->fails()) {
            return response()->json(['status' => false,'errors' => $validator->errors()]);
        }
        else {
            $user = new ApostilUser();
            $user->apply_user_type = request()->get('apply_user_type');
            $user->apply_participant = request()->get('apply_participant');
            $user->doc_owner_lastname = request()->get('doc_owner_lastname');
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
