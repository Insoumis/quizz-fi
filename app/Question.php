<?php

namespace Melenquizz;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public static function add($categoryId, $name, $pageNo)
    {
        $question = new self;

        $question->category_id = $categoryId;
        $question->name = $name;
        $question->page_no = $pageNo;

        return $question;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
