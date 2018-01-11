<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
       $filepath = 'public/excel/test.xls';
        \Excel::load('article.csv', function($reader){
            $dic = [24 => 6, 23 => 2, 35 => 16, 21 => 1, 31 => 3, 25 => 7, 37 => 18, 36 => 17, 34 => 15, 32 => 14, 30 => 13, 29 => 12, 28=> 10, 27=>9, 26=>8, 22=>4 ];
            $data = $reader->all();
            foreach ($data as $item) {
                if(!Post::where('title', '=', $item->newstitle)->first())
                    {
                         DB::table('posts')->insert([
                        'author_id' => 1,
                        'category_id' => $dic[$item->ntypeid],
                        'title' => $item->newstitle,
                        'body'       => $item->newscount,
                        'clicks' => $item->chicks,
                        'slug' => $item->id,
                        'created_at' => $item->datatime,
                        'updated_at' => $item->datatime,
                        ]);
                    }
               
            }
        });
    }

    /**
     * [post description].
     *
     * @param [type] $slug [description]
     *
     * @return [type] [description]
     */
    protected function findPost($slug)
    {
        return Post::firstOrNew(['slug' => $slug]);
    }
}
