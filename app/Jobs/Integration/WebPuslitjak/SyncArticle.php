<?php

namespace App\Jobs\Integration\WebPuslitjak;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

# Models
use App\Models\Integration\WebPuslitjak\News;
use App\Models\Article\Article;

class SyncArticle implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->$id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        ini_set('memory_limit', '-1'); 

        $news = News::where('is_active', 1)->get();
        foreach ($news as $item) {
            $article = Article::where('code', 'WP'.$item->id)->first();

            $thumbnail_name = null;

            if (!empty($item->gambar)) {
                $thumbnail_url = "http://puslitjakdikbud.kemdikbud.go.id/".$item->gambar;
                $thumbnail_name = basename($thumbnail_url);
                Image::make($thumbnail_url)->save(public_path('thumbnails/original/' . $thumbnail_name));

                Image::make(public_path('thumbnails/original/').$thumbnail_name)->resize(1280, 853)->save(public_path('thumbnails/').$thumbnail_name);
            }
            
            if (empty($article)) {
                $article = new Article([
                    "title" => $item->judul,
                    "category_id" => 1,
                    "content" => $item->isi,
                    "thumbnail_file" => $thumbnail_name,
                    "user_id" => $this->id,
                    "author" => 'PUSLITJAKDIKBUD',
                    "code" => 'WP'.$item->id,
                    "created_at" => $item->created
                ]);
            } else {
                $article->fill([
                    "title" => $item->judul,
                    "category_id" => 1,
                    "content" => $item->isi,
                    "thumbnail_file" => $thumbnail_name,
                    "user_id" => $this->id,
                    "author" => 'PUSLITJAKDIKBUD',
                    "code" => 'WP'.$item->id,
                    "created_at" => $item->created
                ]);
            }

            $article->timestamps = false;

            $article->save();
        }
    }
}
