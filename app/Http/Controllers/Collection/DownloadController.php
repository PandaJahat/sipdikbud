<?php

namespace App\Http\Controllers\Collection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

# Models
use App\Models\Collection\Collection;

class DownloadController extends Controller
{
    public function reason(Request $request)
    {
        # code...
    }

    public function download(Request $request)
    {
        try {
            $collection = Collection::find(Crypt::decrypt($request->id));

            if (empty($collection)) return redirect()->route('collection.list')->with('error', 'Penelitian tidak ditemukan!');
            
            return response()->file(storage_path('files/collections/'.$collection->document_file), [
                'filename' => 'downloaded.pdf'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('collection.list')->with('error', 'Terjadi kesalahan saat mengunduh penelitian!');
        }
    }
}
