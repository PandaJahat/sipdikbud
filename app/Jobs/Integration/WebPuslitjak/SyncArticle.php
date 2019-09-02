<?php

namespace App\Jobs\Integration\WebPuslitjak;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

# Models
use App\Models\Integration\WebPuslitjak\News;
use App\Models\Article\Article;

class SyncArticle implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $news = News::where('is_active', 1)->get();
        foreach ($news as $item) {
            $article = Article::where('code', 'WP'.$item->id)->first();
            
            if (empty($article)) {
                $article = new Article([
                    "title" => $item->judul,
                    "category_id" => 1,
                    "content" => $item->isi,
                    "thumbnail_file",
                    "user_id",
                    "author",
                    "archived_at",
                    "code"
                ]);
            } else {
                # code...
            }
            
        }
    }
}
