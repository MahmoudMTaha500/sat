<?php

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 300; $x++) {
            $element_type = '';
            $element_id = '';
            if(rand(1,2) == 1){
                $element_type = 'blog';
                $element_id = rand(1,120);
            }else{
                $element_type = 'institute';
                $element_id = rand(1,30);
            }
            City::create([
                "comment" => 'this is comment'.$x,
                "commenter_id" => 1,
                "element_type" => $element_type,
                "element_id" => $element_id,
                "approvement" => 1,
            ]);
        }
    }
}
