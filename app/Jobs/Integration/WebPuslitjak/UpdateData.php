<?php

namespace App\Jobs\Integration\WebPuslitjak;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use GuzzleHttp\Client;

# Models
use App\Models\Integration\WebPuslitjak\Book;

class UpdateData implements ShouldQueue
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
        ini_set("pcre.backtrack_limit", "1000000000"); 
        ini_set('memory_limit', '-1'); 
        setlocale(LC_ALL, 'id_ID.utf8');

        $client = new Client;

        $books = collect(json_decode($client->request('GET', "http://puslitjakdikbud.kemdikbud.go.id/get_db/index/buku")->getBody()));
        foreach ($books as $item) {
            $book = Book::find($item->id);

            if (empty($book)) {
                $book = new Book((array) $item);
            } else {
                $book->fill((array) $item);
            }
            $book->save();
        }
    }
}
