<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;

# Models
use App\Models\Article\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('contents.article.category.index');
    }

    public function data()
    {
        $categories = Category::select(DB::raw('article_categories.*'))->withCount([
            'articles'
        ]);

        return DataTables::of($categories)
        ->addIndexColumn()
        ->editColumn('created_at', function($category) {
            return empty($category->created_at) ? '-' : Carbon::parse($category->created_at)->formatLocalized('%d %B %Y');
        })
        ->addColumn('actions', function($category) {
            $edit = '<a href="javascript:;" class="uk-badge uk-badge-warning" onclick="showUpdateForm('.$category->id.')">Ubah</a>';
            $delete = '<a href="javascript:;" class="uk-badge uk-badge-danger" onclick="actionDelete('.$category->id.')">Hapus</a>';

            return $category->articles_count > 0 ? $edit : $edit.'&nbsp;&nbsp;'.$delete;
        })
        ->rawColumns([
            'actions'
        ])
        ->make(true);
    }

    public function create(Request $request)
    {
        try {
            Category::create($request->all());

            $message = 'Berhasil membuat kategori artikel!';
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }
        
        return redirect()->route('article.category')->with(empty($e) ? 'success' : 'error', $message);
    }

    public function update(Request $request)
    {
        try {
            $category = Category::find($request->id);
            $category->fill($request->all());
            $category->save();

            $message = 'Berhasil mengubah data kategori artikel!';
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }

        return redirect()->route('article.category')->with(empty($e) ? 'success' : 'error', $message);
    }

    public function delete(Request $request)
    {
        try {
            Category::find($request->id)->delete();

            $message = 'Berhasil menghapus kategori!';
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }

        return $message;
    }

    public function getCategory(Request $request)
    {
        return Category::find($request->id);
    }
}
