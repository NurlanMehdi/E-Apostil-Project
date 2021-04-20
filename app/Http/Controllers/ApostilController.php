<?php

namespace App\Http\Controllers;

use App\Models\AllSelectBox;
use App\Models\ApostilDocument;
use App\Models\ImzalayanShexs;
use Illuminate\Http\Request;

class ApostilController extends Controller
{
    public function addApostil($id)
    {
        $imzalayanShexs = ImzalayanShexs::all();
        $senedinTipi = AllSelectBox::where('key','senedin_tipi')->get();
        $qohumluqDerecesi = AllSelectBox::where('key','qohumluq_derecesi')->get();
        $apostilDocument = [];
        if ($id > 0){
            $apostilDocument = ApostilDocument::where('id',$id)->first();
            $apostilDocument['apostil_signing_user_name'] = ImzalayanShexs::select('name')->where('id',$apostilDocument->apostil_signing_user_id)->first();
        }

        return view('layouts.addApostil',['imzalayanShexs'=>$imzalayanShexs,'senedinTipi'=>$senedinTipi,'qohumluqDerecesi'=>$qohumluqDerecesi,'documentId'=>$id,'apostilDocumentInfo'=>$apostilDocument]);
    }

    public function getParticipantUserTypes($id)
    {
        $userTypes = AllSelectBox::where(['key'=>'ishtirakchinin_novu','novu'=>$id])->get();

        return response()->json(['data'=>$userTypes]);
    }

    public function getApostilDocuments($data = null)
    {

        $data = json_decode($data, true);
       // var_dump($data);
        $apostilDocuments = [];
        if (isset($data['search']) && $data['search'] == true){

            if ($data['imzalayanShexs'] > 0 && is_numeric($data['imzalayanShexs'])){
                $imzalayanShexs = $data['imzalayanShexs'];
            }else{
                $imzalayanShexs = '';
            }

            $apostilDocuments = ApostilDocument::where('is_deleted',0)
                ->where('apostil_number', 'LIKE', '%'.$data['apostilNumber'].'%')
                ->where('status', 'LIKE', '%'.$data['status'].'%')
                ->where('apostil_date', 'LIKE', '%'.$data['apostilDate'].'%')
                ->where('rs_short_note', 'LIKE', '%'.$data['shortNote'].'%')
                ->where('apostil_signing_user_id', 'LIKE', '%'.$imzalayanShexs.'%')
                ->where('apostil_signing_user_id', 'LIKE', '%'.$imzalayanShexs.'%')
                ->orderBy('id', 'DESC')
                ->get();
        }elseif (isset($data)) {
            $apostilDocuments = ApostilDocument::whereIn('id', $data)
                ->orderBy('id', 'DESC')
                ->get();
        }else{
            $apostilDocuments = ApostilDocument::where('is_deleted',0)
                ->orderBy('id', 'DESC')
                ->get();
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
            'apostil_number' => 'required|string|unique:apostil_documents|between:3,8',
            'apostil_date' => 'required|date_format:Y-m-d',
            'apostil_signing_user_id' => 'required|integer',
            'apo_note' => 'required|string|max:500',
            'rs_number' => 'required|integer',
            'rs_date' => 'required|date_format:Y-m-d',
            'rs_signing_user' => 'required|string|max:50',
            'rs_signing_user_en' => 'required|string|max:50',
            'rs_signing_position' => 'required|string|max:200',
            'rs_signing_position_en' => 'required|string|max:200',
            'rs_service' => 'required|string|max:200',
            'rs_service_en' => 'required|string|max:200',
            'rs_document_name' => 'required|string|max:50',
            'rs_document_name_en' => 'required|string|max:50',
            'rs_short_note' => 'required|string|max:500',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            $apostilDocument = new ApostilDocument();

            $apostilDocument->apostil_number=request()->get('apostil_number');
            $apostilDocument->apostil_date=request()->get('apostil_date');
            $apostilDocument->apostil_signing_user_id=request()->get('apostil_signing_user_id');
            $apostilDocument->mail_status=request()->boolean('mail_status');
            $apostilDocument->apo_note=request()->input('apo_note');
            $apostilDocument->rs_number=request()->input('rs_number');
            $apostilDocument->rs_date=request()->get('rs_date');
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
            $apostilDocument->save();

            return $this->dashboard();
        }

    }

    public function editApostil($id)
    {
        $validator = validator(request()->all(),[
            'apostil_number' => 'required|string|between:3,8',
            'apostil_date' => 'required|date_format:Y-m-d',
            'apostil_signing_user_id' => 'required|integer',
            'apo_note' => 'required|string|max:500',
            'rs_number' => 'required|integer',
            'rs_date' => 'required|date_format:Y-m-d',
            'rs_signing_user' => 'required|string|max:50',
            'rs_signing_user_en' => 'required|string|max:50',
            'rs_signing_position' => 'required|string|max:200',
            'rs_signing_position_en' => 'required|string|max:200',
            'rs_service' => 'required|string|max:200',
            'rs_service_en' => 'required|string|max:200',
            'rs_document_name' => 'required|string|max:50',
            'rs_document_name_en' => 'required|string|max:50',
            'rs_short_note' => 'required|string|max:500',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            $apostilDocument = ApostilDocument::where('id',$id);
            $apostilDocument->update([
                'apostil_number' => request()->get('apostil_number'),
                'apostil_date' => request()->get('apostil_date'),
                'apostil_signing_user_id' => request()->get('apostil_signing_user_id'),
                'mail_status' => request()->boolean('mail_status'),
                'apo_note' => request()->input('apo_note'),
                'rs_number' => request()->input('rs_number'),
                'rs_date' => request()->get('rs_date'),
                'rs_signing_user' => request()->get('rs_signing_user'),
                'rs_signing_user_en' => request()->get('rs_signing_user_en'),
                'rs_signing_position' => request()->get('rs_signing_position'),
                'rs_signing_position_en' => request()->get('rs_signing_position_en'),
                'rs_service' => request()->get('rs_service'),
                'rs_service_en' => request()->get('rs_service_en'),
                'rs_document_name' => request()->get('rs_document_name'),
                'rs_document_name_en' => request()->get('rs_document_name_en'),
                'rs_short_note' => request()->get('rs_short_note'),
                'status' => request()->get('status')
            ]);

            return $this->dashboard();
        }

    }
}
