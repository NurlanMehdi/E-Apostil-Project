<?php

namespace App\Http\Controllers;

use App\Models\AllSelectBox;
use App\Models\ApostilDocument;
use App\Models\ImzalayanShexs;
use App\Models\ApostilUser;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Maatwebsite\Excel\Facades\Excel;

class ApostilController extends Controller
{
    public function addApostil($id)
    {
        $imzalayanShexs = ImzalayanShexs::all()->where('is_deleted','=','0');
        $apostilUser = null;
        $senedinTipi = AllSelectBox::where('key','senedin_tipi')->get();
        $qohumluqDerecesi = AllSelectBox::where('key','qohumluq_derecesi')->get();
        $apostilDocument = [];
        if ($id !== "new"){
            $apostilDocument = ApostilDocument::where('id',$id)->first();
            $apostilDocument['apostil_signing_user_name'] = ImzalayanShexs::select('name')->where('id',$apostilDocument->apostil_signing_user_id)->first();
            $apostilUser = ApostilUser::leftJoin('all_select_boxes', 'apostil_users.apply_participant', '=', 'all_select_boxes.id')->where('apostil_users.id',$apostilDocument->apostil_user_id)->select( 'apostil_users.*' ,'all_select_boxes.name','all_select_boxes.string_id')->first();
            if ($apostilUser != NULL){
                $apostilUser['apostil_doc_type_name'] = AllSelectBox::select('name')->where('id',$apostilUser->doc_type_id)->first();
                $apostilUser['apostil_doc_type_key'] = AllSelectBox::select('string_id')->where('id',$apostilUser->doc_type_id)->first();
            }

        }

        return view('layouts.addApostil',['imzalayanShexs'=>$imzalayanShexs,'senedinTipi'=>$senedinTipi,'qohumluqDerecesi'=>$qohumluqDerecesi,'documentId'=>$id,'apostilDocumentInfo'=>$apostilDocument,'apostilUser'=>$apostilUser]);
    }

    public function excelReader($folder,$name) {
        $rows = Excel::toArray(new ExcelController,public_path($folder."/".$name));
        $country = [];
        foreach ($rows[0] as $val){
            array_push($country,$val[0]);
        }
        return response()->json(['data'=>$country]);
    }

    public function getParticipantUserTypes($id)
    {
        $userTypes = AllSelectBox::where(['key'=>'ishtirakchinin_novu','novu'=>$id])->get();

        return response()->json(['data'=>$userTypes]);
    }

    public function getApostilDocuments($data = null)
    {
        $data = json_decode($data, true);

        $apostilDocuments = [];

        if (isset($data['page'])){
            $currentPage = $data['page'];
        }else{
            $currentPage = 1;
        }

        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });

        if (isset($data['search']) && $data['search'] == true){
            $apostilDocuments = ApostilDocument::leftJoin('apostil_users', 'apostil_users.id', '=', 'apostil_documents.apostil_user_id')->where('is_deleted',0);

            if($data['firstApostilDate'] != ''){
                $apostilDocuments = $apostilDocuments->where('apostil_date', '>=', date('Y-m-d',strtotime($data['firstApostilDate'])));
            }
            if($data['lastApostilDate'] != ''){
                $apostilDocuments = $apostilDocuments->where('apostil_date', '<=', date('Y-m-d',strtotime($data['lastApostilDate'])));
            }
            if ($data['status'] != '-' && $data['status'] != ''){
                $apostilDocuments = $apostilDocuments->where('status', 'LIKE', '%'.$data['status'].'%');
            }
            if ($data['imzalayanShexs'] > 0 && is_numeric($data['imzalayanShexs'])){
                $apostilDocuments = $apostilDocuments->where('apostil_signing_user_id',$data['imzalayanShexs']);
            }
            if ($data['apostilNumber'] != ''){
                $apostilDocuments = $apostilDocuments->where('apostil_number', 'LIKE', '%'.$data['apostilNumber'].'%');
            }
            if ($data['shortNote'] != ''){
                $apostilDocuments = $apostilDocuments->where('rs_short_note', 'LIKE', '%'.$data['shortNote'].'%');
            }
            if ($data['shortNote'] != ''){
                $apostilDocuments = $apostilDocuments->where('rs_short_note', 'LIKE', '%'.$data['shortNote'].'%');
            }
            if ($data['vetendashligi'] > 0 && is_numeric($data['vetendashligi'])){
                $apostilDocuments = $apostilDocuments->where('apostil_users.doc_presented_native',$data['vetendashligi']);
            }
            if ($data['legalUserName'] != ''){
                $apostilDocuments = $apostilDocuments->where('legal_user_name', 'LIKE', '%'.$data['legalUserName'].'%');
            }
            if ($data['apostilCreated'] != ''){
                $apostilDocuments = $apostilDocuments->where('apostil_created', 'LIKE', '%'.$data['apostilCreated'].'%');
            }
            if ($data['legalUserName'] != ''){
                $apostilDocuments = $apostilDocuments->where('legal_user_name', 'LIKE', '%'.$data['legalUserName'].'%');
            }
            if ($data['docOwnerName'] != ''){
                $apostilDocuments = $apostilDocuments->where('apostil_users.doc_owner_name', 'LIKE', '%'.$data['docOwnerName'].'%');
            }
            if ($data['docOwnerFathername'] != ''){
                $apostilDocuments = $apostilDocuments->where('apostil_users.doc_owner_fathername', 'LIKE', '%'.$data['docOwnerFathername'].'%');
            }
            if ($data['docOwnerLastname'] != ''){
                $apostilDocuments = $apostilDocuments->where('apostil_users.doc_owner_lastname', 'LIKE', '%'.$data['docOwnerLastname'].'%');
            }
            if ($data['presentedByOwnerName'] != ''){
                $apostilDocuments = $apostilDocuments->where('apostil_users.doc_presented_name', 'LIKE', '%'.$data['presentedByOwnerName'].'%');
            }
            if ($data['presentedByOwnerLastname'] != ''){
                $apostilDocuments = $apostilDocuments->where('apostil_users.doc_presented_lastname', 'LIKE', '%'.$data['presentedByOwnerLastname'].'%');
            }
            if ($data['presentedByOwnerFathername'] != ''){
                $apostilDocuments = $apostilDocuments->where('apostil_users.doc_presented_fathername', 'LIKE', '%'.$data['presentedByOwnerFathername'].'%');
            }
            if ($data['voen'] != ''){
                $apostilDocuments = $apostilDocuments->where('apostil_users.voen', 'LIKE', '%'.$data['voen'].'%');
            }
            if ($data['gender'] != '-' && $data['gender'] != ''){
                $apostilDocuments = $apostilDocuments->where('apostil_users.gender', 'LIKE', '%'.$data['gender'].'%');
            }
            $apostilDocuments = $apostilDocuments->select('apostil_documents.id', 'apostil_users.*' ,'apostil_documents.*');

            $apostilDocuments = $apostilDocuments->orderBy('apostil_documents.id', 'DESC')->paginate($data['sort']);
        }elseif (isset($data) && !isset($data['key'])) {

            $apostilDocuments = ApostilDocument::whereIn('id', $data)->orderBy('id', 'DESC')->paginate(100);
        }elseif (isset($data) && isset($data['key'])) {
            $orderBy = 'DESC';
            if ($data['key'] == 'order-date') {
                $orderBy = $data['orderBy'];

                $apostilDocuments = ApostilDocument::where('is_deleted', 0)
                    ->orderBy('apostil_date', $orderBy)
                    ->paginate(100);
            }elseif ($data['key'] == 'status'){
                $orderBy = $data['orderBy'];

                $apostilDocuments = ApostilDocument::where('is_deleted',0)
                    ->orderBy('status', $orderBy)
                    ->paginate(100);
            }else{
                $apostilDocuments = ApostilDocument::where('is_deleted',0)
                    ->orderBy('id', 'ASC')
                    ->paginate(100);
            }

        }else{
            $apostilDocuments = ApostilDocument::where('is_deleted',0)
                ->orderBy('id', 'DESC')
                ->paginate($data['sort']);
        }



        return response()->json(['data'=>$apostilDocuments]);
    }

    public function deleteApostil($id)
    {
        $id = json_decode($id, true);

        $apostilDocuments = ApostilDocument::whereIn('id', $id)->update(['is_deleted' => 1]);

        return response()->json(['data'=>$apostilDocuments]);
    }

    public function dashboard()
    {
        $imzalayanShexs = ImzalayanShexs::all();
        return view('layouts.dashboard',['imzalayanShexs'=>$imzalayanShexs]);
    }

    public function createApostil()
    {
        $validator = validator(request()->all(),[
        ]);

        if (request()->get('status') == 1){
            $validator = validator(request()->all(),[
                'apostil_number' => 'required|string|unique:apostil_documents|between:3,8',
                'apostil_date' => 'required|date_format:d.m.Y',
                'apostil_signing_user_id' => 'required|integer|numeric|min:1',
                'apostil_created' => 'required|string|max:50',
                'rs_number' => 'required|string',
                'rs_date' => 'required|date_format:d.m.Y',
                'rs_signing_user' => 'required|string|max:50',
                'rs_signing_user_en' => 'required|string|max:50',
                'rs_signing_position' => 'required|string|max:200',
                'rs_signing_position_en' => 'required|string|max:200',
                'rs_service' => 'required|string|max:200',
                'rs_service_en' => 'required|string|max:200',
                'rs_document_name' => 'required|string|max:50',
                'rs_document_name_en' => 'required|string|max:50',
                'rs_short_note' => 'nullable|string|max:500',
                'apostil_user_id' => 'required|integer|exists:apostil_users,id'
            ]);
        }else{
            $validator = validator(request()->all(),[
                'apostil_number' => 'required|string|unique:apostil_documents|between:3,8',
                'apostil_date' => 'nullable|date_format:d.m.Y',
                'apostil_signing_user_id' => 'nullable|integer',
                'apostil_created' => 'required|string|max:50',
                'rs_number' => 'nullable|string',
                'rs_date' => 'nullable|date_format:d.m.Y',
                'rs_signing_user' => 'nullable|string|max:50',
                'rs_signing_user_en' => 'nullable|string|max:50',
                'rs_signing_position' => 'nullable|string|max:200',
                'rs_signing_position_en' => 'nullable|string|max:200',
                'rs_service' => 'nullable|string|max:200',
                'rs_service_en' => 'nullable|string|max:200',
                'rs_document_name' => 'nullable|string|max:50',
                'rs_document_name_en' => 'nullable|string|max:50',
                'rs_short_note' => 'nullable|string|max:500',

                'apostil_user_id' => 'nullable|integer|exists:apostil_users,id'
            ]);
        }

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $apostilDocument = new ApostilDocument();

            $apostilDocument->apostil_number=request()->get('apostil_number');
            $apostilDocument->apostil_date=date('Y-m-d',strtotime(request()->get('apostil_date')));
            $apostilDocument->apostil_signing_user_id=request()->get('apostil_signing_user_id');
            $apostilDocument->apostil_created=request()->get('apostil_created');

            $apostilDocument->mail_status=request()->boolean('mail_status');
            $apostilDocument->rs_number=request()->input('rs_number');
            $apostilDocument->rs_date= date('Y-m-d',strtotime(request()->get('rs_date')));
            $apostilDocument->rs_signing_user=request()->get('rs_signing_user');
            $apostilDocument->rs_signing_user_en=request()->get('rs_signing_user_en');
            $apostilDocument->rs_signing_position=request()->get('rs_signing_position');
            $apostilDocument->rs_signing_position_en=request()->get('rs_signing_position_en');
            $apostilDocument->rs_service=request()->get('rs_service');
            $apostilDocument->rs_service_en=request()->get('rs_service_en');
            $apostilDocument->rs_document_name=request()->get('rs_document_name');
            $apostilDocument->rs_document_name_en=request()->get('rs_document_name_en');
            $apostilDocument->rs_short_note=request()->get('rs_short_note');
            $apostilDocument->status=request()->get('status');

            $apostilDocument->apostil_user_id=request()->get('apostil_user_id');

            $apostilDocument->save();

            return $this->dashboard();
        }

    }
    public function addSigningUser()
    {
        $validator = validator(request()->all(),[
            'name' => 'required|string'
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $signingUser = new ImzalayanShexs();
            $signingUser->name=request()->get('name');
            $signingUser->save();

            return $this->dashboard();
        }

    }

    public function removeSigningUser($id)
    {
        $id = json_decode($id, true);
        $signingUserDelete = ImzalayanShexs::where('id','=', $id)->update(['is_deleted' => 1]);

        return response()->json(['data'=>$signingUserDelete]);
    }

    public function editApostil($id)
    {
        if (request()->get('status') == 1){
            $validator = validator(request()->all(),[
                'apostil_number' => 'required|string|between:3,8',
                'apostil_date' => 'required|date_format:d.m.Y',
                'apostil_signing_user_id' => 'required|integer|numeric|min:1',
                'apostil_created' => 'required|string|max:50',
                'rs_number' => 'required|string',
                'rs_date' => 'required|date_format:d.m.Y',
                'rs_signing_user' => 'required|string|max:50',
                'rs_signing_user_en' => 'required|string|max:50',
                'rs_signing_position' => 'required|string|max:200',
                'rs_signing_position_en' => 'required|string|max:200',
                'rs_service' => 'required|string|max:200',
                'rs_service_en' => 'required|string|max:200',
                'rs_document_name' => 'required|string|max:50',
                'rs_document_name_en' => 'required|string|max:50',
                'rs_short_note' => 'nullable|string|max:500',
                'apostil_user_id' => 'required|integer|exists:apostil_users,id'
            ]);
        }else{
            $validator = validator(request()->all(),[
                'apostil_number' => 'required|string|between:3,8',
                'apostil_date' => 'nullable|date_format:d.m.Y',
                'apostil_signing_user_id' => 'nullable|integer',
                'apostil_created' => 'required|string|max:50',
                'rs_number' => 'nullable|string',
                'rs_date' => 'nullable|date_format:d.m.Y',
                'rs_signing_user' => 'nullable|string|max:50',
                'rs_signing_user_en' => 'nullable|string|max:50',
                'rs_signing_position' => 'nullable|string|max:200',
                'rs_signing_position_en' => 'nullable|string|max:200',
                'rs_service' => 'nullable|string|max:200',
                'rs_service_en' => 'nullable|string|max:200',
                'rs_document_name' => 'nullable|string|max:50',
                'rs_document_name_en' => 'nullable|string|max:50',
                'rs_short_note' => 'nullable|string|max:500',

                'apostil_user_id' => 'nullable|integer|exists:apostil_users,id'
            ]);
        }

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $apostilDocument = ApostilDocument::where('id',$id);
            if (request()->get('status') == 2){
                $apostilDocument->update([
                    'status' => request()->get('status'),
                ]);
            }else{
                $apostilDocument->update([
                    'apostil_number' => request()->get('apostil_number'),
                    'apostil_date' => date('Y-m-d',strtotime(request()->get('apostil_date'))),
                    'apostil_signing_user_id' => request()->get('apostil_signing_user_id'),
                    'apostil_created' => request()->get('apostil_created'),
                    'mail_status' => request()->boolean('mail_status'),
                    'rs_number' => request()->input('rs_number'),
                    'rs_date' => date('Y-m-d',strtotime(request()->get('rs_date'))),
                    'rs_signing_user' => request()->get('rs_signing_user'),
                    'rs_signing_user_en' => request()->get('rs_signing_user_en'),
                    'rs_signing_position' => request()->get('rs_signing_position'),
                    'rs_signing_position_en' => request()->get('rs_signing_position_en'),
                    'rs_service' => request()->get('rs_service'),
                    'rs_service_en' => request()->get('rs_service_en'),
                    'rs_document_name' => request()->get('rs_document_name'),
                    'rs_document_name_en' => request()->get('rs_document_name_en'),
                    'rs_short_note' => request()->get('rs_short_note'),
                    'status' => request()->get('status'),

                ]);
            }


            if(request()->get('status') != 2){
                $apostilDocument->update([
                    'apostil_user_id' => request()->get('apostil_user_id'),
                ]);
            }

            return $this->dashboard();
        }

    }

    public function searchApostil($data = null)
    {
        $data = json_decode($data, true);

        $apostil = ApostilDocument::where('apostil_number',$data['apostilNumber'])->where('apostil_date',date('Y-m-d',strtotime($data['apostilDate'])))->where('status',1)->first();

        $imzalayanShexs = '';

        if ($apostil != null){
            $imzalayanShexs = ImzalayanShexs::where('id',$apostil->apostil_signing_user_id)->first();
            $apostil['imzalayan_shexs'] = $imzalayanShexs['name'];
        }

        return response()->json(['apostil'=>$apostil]);
    }
}
