<?php

namespace Melenquizz;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public static function add($categoryId, $name)
    {
        $question = new self;

        $question->category_id = $categoryId;
        $question->name = $name;

        return $question;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
