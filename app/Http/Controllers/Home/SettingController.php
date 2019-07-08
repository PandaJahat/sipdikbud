<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

# Models
use App\Models\Setting\Slider;

class SettingController extends Controller
{
    public function about()
    {
        return view('contents.home.setting.about');
    }

    public function saveAbout(Request $request)
    {
        option(['about' => $request->about]);

        return redirect()->route('home.setting.about')->with('success', 'Konten halaman tentang berhasil disimpan!');
    }

    public function slider()
    {
        return view('contents.home.setting.slider');
    }

    public function dataSlider(Request $request)
    {
        $images = Slider::select(DB::raw('sliders.*'))->with([
            'user'
        ]);

        return DataTables::of($images)
        ->addIndexColumn()
        ->editColumn('thumbnail_file', function($image) {
            return '<img src="'.asset('img/slider_thumbnail/'.$image->thumbnail_file).'" alt="thumbnail">';
        })
        ->addColumn('action', function($image) {
            return '<a href="javascript:;" class="uk-badge uk-badge-danger" onclick="deleteSlider('.$image->id.')">Hapus</a>';
        })
        ->rawColumns([
            'action', 'thumbnail_file'
        ])
        ->make(true);
    }

    public function createSlider(Request $request)
    {
        if ($request->hasFile('image')) {
            $image_file = $request->file('image');
    
            $extension = $image_file->getClientOriginalExtension();
            $image_filename = strtotime('now').'_slider.'.$extension;
            
            $image_file->move(public_path('img/slider'), $image_filename);
        
            $image_path = public_path('img/slider/'.$image_filename);  
            $thumbnail_path = public_path('img/slider_thumbnail/'.$image_filename);  

            File::copy($image_path, $thumbnail_path);

            $image_resize = Image::make($thumbnail_path)->resize(150, 150, function($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save($thumbnail_path);
            
            $slider = new Slider([
                "thumbnail_file" => $image_filename,
                "image_file" => $image_filename,
                "user_id" => Auth::user()->id
            ]);

            $slider->save();
        }

        return redirect()->route('home.setting.slider')->with('success', 'Berhasil mengupload gambar slider!');
    }

    public function deleteSlider(Request $request)
    {
        $slider = Slider::find($request->id);

        if (empty($slider)) return 'Terjadi kesalahan saat menghapus kategori publikasi!';

        $slider->delete();
        return 'Berhasil menghapus kategori publikasi!';
    }
}
