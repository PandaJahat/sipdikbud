<?php

namespace App\Jobs\Integration\WebPuslitjak;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

# Models
use App\Models\Collection\Source;
use App\Models\Integration\WebPuslitjak\Book;
use App\Models\Collection\Author;
use App\Models\Collection\Collection;

class SyncBook implements ShouldQueue
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

        $source = Source::where('code', 'web-puslitjak')->first();
        $books = Book::all();

        $author = Author::where('name', 'BALITBANG KEMENDIKBUD')->first();

        if (empty($author)) {
            $author = new Author([
                'name' => 'BALITBANG KEMENDIKBUD'
            ]);

            $author->save();
        }

        foreach ($books as $book) {
            $cover_url = "http://puslitjakdikbud.kemdikbud.go.id/".$book->cover;
            $cover_name = basename($cover_url);
            Image::make($cover_url)->save(public_path('img/web-puslitjak/' . $cover_name));

            $document_url = "http://puslitjakdikbud.kemdikbud.go.id/".$book->berkas;
            $document_name =  substr($document_url, strrpos($document_url, '/') + 1);;
            $document_file = file_get_contents($document_url);      
            File::put(storage_path('files/collections/'.$document_name), $document_file);

            $data = [
                "title" => $book->judul,
                "published_year" => $book->tahun_terbit,
                "description" => $book->deskripsi,
                "cover_file" => $cover_name,
                "document_file" => $document_name,
                "user_id" => $this->user_id,
                "is_active" => true,
                "author_id" => $author->id,
                "source_id" => $source->id,
                "code" => 'webpuslitjak'.$book->id,
            ];

            $collection = Collection::where('code', 'webpuslitjak'.$book->id)->first();
            
            if (empty($collection)) {
                $collection = new Collection($data);
            } else {
                $collection->fill($data);
                $collection->categories()->detach();
            }
            
            $collection->save();
            $collection->categories()->attach([6]);
        }
    }
}
