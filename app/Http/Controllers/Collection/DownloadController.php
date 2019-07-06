<?php

namespace App\Http\Controllers\Collection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

# Models
use App\Models\Collection\Collection;
use App\Models\Download\Reason;
use App\Models\Download\Collection as Download_collection;
use App\Models\Collection\Download_log;
class DownloadController extends Controller
{
    public function download(Request $request)
    {
        try {
            $collection = Collection::find(Crypt::decrypt($request->id));

            if (empty($collection)) return redirect()->route('collection.list')->with('error', 'Publikasi tidak ditemukan!');
            
            return response()->file(storage_path('files/collections/'.$collection->document_file), [
                'filename' => 'penelitian.pdf'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', 'Terjadi kesalahan saat mengunduh penelitian!');
        }
    }

    public function reason(Request $request)
    {
        try {
            $download = new Download_collection($request->all());

            if ($request->reason_id == 'other') {
                $download->reason_id = null;
            }

            $download->user_id = Auth::user()->id;
            $download->save();

            Download_log::create([
                'collection_id' =>  $download->collection_id,
                'category' => 'document'
            ]);
            return redirect()->route('collection.download', ['id' => Crypt::encrypt($download->collection_id)]);
        } catch (\Exception $e) {
            return redirect()->to($request->previous_url)->with('error', 'Terdapat kesalahan saat mengunduh penelitian!');
        }
    }

    public function getReasons()
    {
        return array_merge(Reason::orderBy('order', 'asc')->get()->toArray(), [
            (object) [
                'id' => 'other',
                'name' => 'Lainnya'
            ]
        ]);
    }

    public function abstractLog(Request $request)
    {
        try {
            $log = new Download_log([
                'collection_id' =>  Crypt::decrypt($request->id),
                'category' => 'abstract'
            ]);
            $log->save();

            return redirect()->route('collection.download.abstract', ['id' => Crypt::encrypt($log->collection_id)]);
        } catch (\Exception $e) {
            return redirect()->route('collection.list')->with('error', 'Terjadi kesalahan saat mengunduh Abstrak!');
        }
    }

    public function abstract(Request $request)
    {
        try {
            $collection = Collection::find(Crypt::decrypt($request->id));

            if (empty($collection)) return redirect()->route('collection.list')->with('error', 'Abstrak tidak ditemukan!');
            
            return response()->file(storage_path('files/abstracts/'.$collection->abstract_file), [
                'filename' => 'abstrak.pdf'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('collection.list')->with('error', 'Terjadi kesalahan saat mengunduh Abstrak!');
        }
    }
}
