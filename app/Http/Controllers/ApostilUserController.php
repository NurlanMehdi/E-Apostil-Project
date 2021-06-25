<?php


namespace App\Http\Controllers;


use App\Models\ApostilUser;

class ApostilUserController extends Controller
{
    public function createApostilUser(): \Illuminate\Http\JsonResponse
    {
        $validator = validator(request()->all(),[
        ]);

        if (request()->get('status') == 1){
            if (request()->get('apply_participant') == 2){
                $validator = validator(request()->all(),[
                    'apply_user_type' => 'required|integer|numeric|min:1',
                    'apply_participant' => 'required|integer|numeric|min:1',
                    'doc_type_id' => 'required|integer|numeric|min:1',
                    'shv_series' => 'nullable|string|max:4',
                    'shv_number' => 'required|integer|digits:8',
                    'letter_name' => 'required|string|max:500',
                    'doc_presented_date' => 'required|date_format:d.m.Y',
                    'doc_presented_name' => 'required|string|max:50',
                    'doc_presented_lastname' => 'required|string|max:50',
                    'doc_presented_fathername' => 'required|string|max:50',
                    'doc_presented_birtday_date' => 'required|date_format:d.m.Y',
                    'doc_presented_reg_address' => 'required|string|max:500',
                    'doc_presented_native' => 'required|string|max:100',
                    'doc_presented_tel' => 'nullable|integer',
                    'doc_presented_mail' => 'nullable|email',
                    'gender' => 'required|integer|numeric|min:1|max:10',
                    'doc_owner_name' => 'required|string',
                    'doc_owner_lastname' => 'required|string',
                    'doc_owner_fathername' => 'required|string',
                    'relationship_id' => 'required',
                ]);
            }elseif (request()->get('apply_participant') == 3){
                $validator = validator(request()->all(),[
                    'apply_user_type' => 'required|integer|numeric|min:1',
                    'apply_participant' => 'required|integer|numeric|min:1',
                    'doc_type_id' => 'required|integer|numeric|min:1',
                    'shv_series' => 'nullable|string|max:4',
                    'shv_number' => 'required|integer|digits:8',
                    'letter_name' => 'required|string|max:500',
                    'doc_presented_date' => 'required|date_format:d.m.Y',
                    'doc_presented_name' => 'required|string|max:50',
                    'doc_presented_lastname' => 'required|string|max:50',
                    'doc_presented_fathername' => 'required|string|max:50',
                    'doc_presented_birtday_date' => 'required|date_format:d.m.Y',
                    'doc_presented_reg_address' => 'required|string|max:500',
                    'doc_presented_native' => 'required|string|max:100',
                    'doc_presented_tel' => 'nullable|integer',
                    'doc_presented_mail' => 'nullable|email',
                    'gender' => 'required|integer|numeric|min:1|max:10',
                    'doc_owner_name' => 'required|string',
                    'doc_owner_lastname' => 'required|string',
                    'doc_owner_fathername' => 'required|string',
                    'power_of_attorney_number' => 'required|string',
                    'issue_date' => 'required|date_format:d.m.Y',
                ]);
            }elseif (request()->get('apply_participant') == 4){
                $validator = validator(request()->all(),[
                    'apply_user_type' => 'required|integer|numeric|min:1',
                    'apply_participant' => 'required|integer|numeric|min:1',
                    'doc_type_id' => 'required|integer|numeric|min:1',
                    'shv_series' => 'nullable|string|max:4',
                    'shv_number' => 'required|integer|digits:8',
                    'letter_name' => 'required|string|max:500',
                    'doc_presented_date' => 'required|date_format:d.m.Y',
                    'doc_presented_name' => 'required|string|max:50',
                    'doc_presented_lastname' => 'required|string|max:50',
                    'doc_presented_fathername' => 'required|string|max:50',
                    'doc_presented_birtday_date' => 'required|date_format:d.m.Y',
                    'doc_presented_reg_address' => 'required|string|max:500',
                    'doc_presented_native' => 'required|string|max:100',
                    'doc_presented_tel' => 'nullable|integer',
                    'doc_presented_mail' => 'nullable|email',
                    'gender' => 'required|integer|numeric|min:1|max:10',
                    'doc_owner_name' => 'required|string',
                    'doc_owner_lastname' => 'required|string',
                    'doc_owner_fathername' => 'required|string',
                ]);
            }elseif (request()->get('apply_participant') == 5){
                $validator = validator(request()->all(),[
                    'apply_user_type' => 'required|integer|numeric|min:1',
                    'apply_participant' => 'required|integer|numeric|min:1',
                    'doc_type_id' => 'required|integer|numeric|min:1',
                    'shv_series' => 'nullable|string|max:4',
                    'shv_number' => 'required|integer|digits:8',
                    'letter_name' => 'required|string|max:500',
                    'doc_presented_date' => 'required|date_format:d.m.Y',
                    'doc_presented_name' => 'required|string|max:50',
                    'doc_presented_lastname' => 'required|string|max:50',
                    'doc_presented_fathername' => 'required|string|max:50',
                    'doc_presented_birtday_date' => 'required|date_format:d.m.Y',
                    'doc_presented_reg_address' => 'required|string|max:500',
                    'doc_presented_native' => 'required|string|max:100',
                    'doc_presented_tel' => 'nullable|integer',
                    'doc_presented_mail' => 'nullable|email',
                    'gender' => 'required|integer|numeric|min:1|max:10',
                    'legal_user_name' => 'required|string',
                    'voen' => 'required|string',
                    'position' => 'required|string',
                ]);
            }elseif (request()->get('apply_participant') == 6){
                $validator = validator(request()->all(),[
                    'apply_user_type' => 'required|integer|numeric|min:1',
                    'apply_participant' => 'required|integer|numeric|min:1',
                    'doc_type_id' => 'required|integer|numeric|min:1',
                    'shv_series' => 'nullable|string|max:4',
                    'shv_number' => 'required|integer|digits:8',
                    'letter_name' => 'required|string|max:500',
                    'doc_presented_date' => 'required|date_format:d.m.Y',
                    'doc_presented_name' => 'required|string|max:50',
                    'doc_presented_lastname' => 'required|string|max:50',
                    'doc_presented_fathername' => 'required|string|max:50',
                    'doc_presented_birtday_date' => 'required|date_format:d.m.Y',
                    'doc_presented_reg_address' => 'required|string|max:500',
                    'doc_presented_native' => 'required|string|max:100',
                    'doc_presented_tel' => 'nullable|integer',
                    'doc_presented_mail' => 'nullable|email',
                    'gender' => 'required|integer|numeric|min:1|max:10',
                    'legal_user_name' => 'required|string',
                    'voen' => 'required|string',
                    'power_of_attorney_number' => 'required|string',
                    'issue_date' => 'required|date_format:d.m.Y',
                ]);
            }elseif (request()->get('apply_participant') == 7){
                $validator = validator(request()->all(),[
                    'apply_user_type' => 'required|integer|numeric|min:1',
                    'apply_participant' => 'required|integer|numeric|min:1',
                    'doc_type_id' => 'required|integer|numeric|min:1',
                    'shv_series' => 'nullable|string|max:4',
                    'shv_number' => 'required|integer|digits:8',
                    'letter_name' => 'required|string|max:500',
                    'doc_presented_date' => 'required|date_format:d.m.Y',
                    'doc_presented_name' => 'required|string|max:50',
                    'doc_presented_lastname' => 'required|string|max:50',
                    'doc_presented_fathername' => 'required|string|max:50',
                    'doc_presented_birtday_date' => 'required|date_format:d.m.Y',
                    'doc_presented_reg_address' => 'required|string|max:500',
                    'doc_presented_native' => 'required|string|max:100',
                    'doc_presented_tel' => 'nullable|integer',
                    'doc_presented_mail' => 'nullable|email',
                    'gender' => 'required|integer|numeric|min:1|max:10',
                    'legal_user_name' => 'required|string',
                    'voen' => 'required|string',
                    'letter_number' => 'required|string',
                    'issue_date' => 'required|date_format:d.m.Y',
                ]);
            }elseif (request()->get('apply_participant') == 8){
                $validator = validator(request()->all(),[
                    'apply_user_type' => 'required|integer|numeric|min:1',
                    'apply_participant' => 'required|integer|numeric|min:1',
                    'doc_type_id' => 'required|integer|numeric|min:1',
                    'shv_series' => 'nullable|string|max:4',
                    'shv_number' => 'required|integer|digits:8',
                    'letter_name' => 'required|string|max:500',
                    'doc_presented_date' => 'required|date_format:d.m.Y',
                    'doc_presented_name' => 'required|string|max:50',
                    'doc_presented_lastname' => 'required|string|max:50',
                    'doc_presented_fathername' => 'required|string|max:50',
                    'doc_presented_birtday_date' => 'required|date_format:d.m.Y',
                    'doc_presented_reg_address' => 'required|string|max:500',
                    'doc_presented_native' => 'required|string|max:100',
                    'doc_presented_tel' => 'nullable|integer',
                    'doc_presented_mail' => 'nullable|email',
                    'gender' => 'required|integer|numeric|min:1|max:10',
                    'letter_number' => 'required|string',
                    'name_of_state_body' => 'required|string',
                    'issue_date' => 'required|date_format:d.m.Y',
                ]);
            }elseif (request()->get('apply_participant') == 9){
                $validator = validator(request()->all(),[
                    'apply_user_type' => 'required|integer|numeric|min:1',
                    'apply_participant' => 'required|integer|numeric|min:1',
                    'doc_type_id' => 'required|integer|numeric|min:1',
                    'shv_series' => 'nullable|string|max:4',
                    'shv_number' => 'required|integer|digits:8',
                    'letter_name' => 'required|string|max:500',
                    'doc_presented_date' => 'required|date_format:d.m.Y',
                    'doc_presented_name' => 'required|string|max:50',
                    'doc_presented_lastname' => 'required|string|max:50',
                    'doc_presented_fathername' => 'required|string|max:50',
                    'doc_presented_birtday_date' => 'required|date_format:d.m.Y',
                    'doc_presented_reg_address' => 'required|string|max:500',
                    'doc_presented_native' => 'required|string|max:100',
                    'doc_presented_tel' => 'nullable|integer',
                    'doc_presented_mail' => 'nullable|email',
                    'gender' => 'required|integer|numeric|min:1|max:10',
                    'name_of_state_body' => 'required|string',
                    'position' => 'required|string',
                ]);
            }else {
                $validator = validator(request()->all(),[
                    'apply_user_type' => 'required|integer|numeric|min:1',
                    'apply_participant' => 'required|integer|numeric|min:1',
                    'doc_owner_name' => 'string|max:50|nullable',
                    'doc_owner_lastname' => 'string|max:50|nullable',
                    'doc_owner_fathername' => 'string|max:50|nullable',
                    'relationship_id' => 'integer|nullable',
                    'power_of_attorney_number' => 'integer|nullable',
                    'letter_number' => 'nullable',
                    'issue_date' => 'date_format:d.m.Y|nullable',
                    'legal_user_name' => 'string|max:60|nullable',
                    'voen' => 'string|max:50|nullable',
                    'position' => 'string|nullable',
                    'name_of_state_body' => 'string|nullable',
                    'doc_type_id' => 'required|integer|numeric|min:1',
                    'shv_series' => 'nullable|string|max:4',
                    'shv_number' => 'required|integer|digits:8',
                    'letter_name' => 'required|string|max:500',
                    'doc_presented_date' => 'required|date_format:d.m.Y',
                    'doc_presented_name' => 'required|string|max:50',
                    'doc_presented_lastname' => 'required|string|max:50',
                    'doc_presented_fathername' => 'required|string|max:50',
                    'doc_presented_birtday_date' => 'required|date_format:d.m.Y',
                    'doc_presented_reg_address' => 'required|string|max:500',
                    'doc_presented_native' => 'required|string|max:100',
                    'doc_presented_tel' => 'nullable|integer',
                    'doc_presented_mail' => 'nullable|email',
                    'gender' => 'required|integer|numeric|min:1|max:10',
                ]);
            }
        }else{
            $validator = validator(request()->all(),[
                'apply_user_type' => 'nullable|integer',
                'apply_participant' => 'nullable|integer',
                'doc_owner_name' => 'string|max:50|nullable',
                'doc_owner_lastname' => 'string|max:50|nullable',
                'doc_owner_fathername' => 'string|max:50|nullable',
                'relationship_id' => 'integer|nullable',
                'power_of_attorney_number' => 'integer|nullable',
                'letter_number' => 'string|nullable',
                'issue_date' => 'date_format:d.m.Y|nullable',
                'legal_user_name' => 'string|max:60|nullable',
                'voen' => 'string|max:50|nullable',
                'position' => 'string|nullable',
                'name_of_state_body' => 'string|nullable',
                'doc_type_id' => 'nullable|integer',
                'shv_series' => 'nullable|string|max:4',
                'shv_number' => 'nullable|integer|digits:8',
                'letter_name' => 'nullable|string|max:500',
                'doc_presented_date' => 'nullable|date_format:d.m.Y',
                'doc_presented_name' => 'nullable|string|max:50',
                'doc_presented_lastname' => 'nullable|string|max:50',
                'doc_presented_fathername' => 'nullable|string|max:50',
                'doc_presented_birtday_date' => 'nullable|date_format:d.m.Y',
                'doc_presented_reg_address' => 'nullable|string|max:500',
                'doc_presented_native' => 'nullable|string|max:100',
                'doc_presented_tel' => 'nullable|integer',
                'doc_presented_mail' => 'nullable|email',
                'gender' => 'nullable|string|max:10',
            ]);
        }

        if ($validator->fails()) {
            return response()->json(['status' => false,'errors' =>$validator->errors()]);
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
            $user->issue_date = date('Y.m.d',strtotime(request()->get('issue_date')));
            $user->legal_user_name = request()->get('legal_user_name');
            $user->voen = request()->get('voen');
            $user->position = request()->get('position');
            $user->name_of_state_body = request()->get('name_of_state_body');
            $user->doc_type_id = request()->get('doc_type_id');
            $user->shv_series = request()->get('shv_series');
            $user->shv_number = request()->get('shv_number');
            $user->doc_presented_date = date('Y-m-d', strtotime(request()->get('doc_presented_date')));
            $user->letter_name = request()->get('letter_name');
            $user->doc_presented_name = request()->get('doc_presented_name');
            $user->doc_presented_lastname = request()->get('doc_presented_lastname');
            $user->doc_presented_fathername = request()->get('doc_presented_fathername');
            $user->doc_presented_birtday_date = date('Y.m.d', strtotime(request()->get('doc_presented_birtday_date')));
            $user->doc_presented_reg_address = request()->get('doc_presented_reg_address');
            $user->doc_presented_native = request()->get('doc_presented_native');
            $user->doc_presented_tel = request()->get('doc_presented_tel');
            $user->doc_presented_mail = request()->get('doc_presented_mail');
            $user->gender = request()->get('gender');
            $user->save();

            return response()->json(['status' => true,'id' => $user->id]);
        }
    }
}
