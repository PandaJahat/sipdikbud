<?php

namespace App\Jobs\Integration\Rekapin;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

# Models
use App\Models\Collection\Source;
use App\Models\Integration\Rekapin\Collection as RekapinCollection;
use App\Models\Collection\Collection;
use App\Models\Collection\Author;
use App\Models\Collection\Category;

class SyncCollection implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        ini_set("pcre.backtrack_limit", "1000000000"); 
        ini_set('memory_limit', '-1'); 
        setlocale(LC_ALL, 'id_ID.utf8');

        $source = Source::where('code', 'rekapin')->first();
        
        foreach (RekapinCollection::all() as $value) {
            $collection = Collection::where('code', 'rekapin'.$value->id)->first();

            $thumbnail = null;
            if (!empty($value->thumb_pt_id)) {
                $thumbnail = $source->url.'/'.$value->thumb_pt_id;
            } else {
                if (!empty($value->thumb_pt_en)) {
                    $thumbnail = $source->url.'/'.$value->thumb_pt_en;
                }
            }

            $data = [
                "title" => empty($value->title_id) ? $value->title_en : $value->title_id,
                "published_year" => Carbon::parse($value->published_date)->format('Y'),
                "description" => empty($value->fulltext_id) ? $value->fulltext_en : $value->fulltext_id,
                "cover_file" => $thumbnail,
                "document_file" => $value->id.'-'.str_replace(' ', '-', $value->title_en),
                "user_id" => $this->user_id,
                "is_active" => true,
                "source_id" => $source->id,
                "code" => 'rekapin'.$value->id
            ];
            
            if (empty($collection)) {
                $collection = new Collection($data);
            } else {
                $collection->fill($data);
                $collection->categories()->detach();
            }

            $author = Author::where('name', $value->author)->first();
            if (empty($author)) {
                $author = new Author([
                    'name' => $value->author
                ]);
                $author->save();
            } 

            $collection->author_id = $author->id;

            $collection->save();

            if ($value->category()->exists()) {
                $category = Category::where('name', $value->category->title_id)->first();
                if (empty($category)) {
                    $category = new Category([
                        'name' => $value->category->title_id
                    ]);

                    $category->save();
                }

                $collection->categories()->attach([$value->cat_id]);
            }

        }
    }
}
