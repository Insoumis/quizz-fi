<?php

namespace Melenquizz;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public static function add($categoryId, $proposition, $description = null, $page_no = null)
    {
        $question = new self;

        $question->category_id = $categoryId;
        $question->proposition = $proposition;
        $question->description = $description;
        $question->page_no = $page_no;

        return $question;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
