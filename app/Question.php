<?php

namespace Melenquizz;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public static function add($categoryId, $proposition, $description = null, $page_no = null, $laecUrl = null)
    {
        $question = new self;
        $question->edit($categoryId, $proposition, $description, $page_no, $laecUrl);
        return $question;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @param $categoryId
     * @param $proposition
     * @param null $description
     * @param null $page_no
     * @return Question
     */
    public function edit($categoryId, $proposition, $description = null, $page_no = null, $laecUrl = nul)
    {
        $this->category_id = $categoryId;
        $this->proposition = $proposition;
        $this->description = $description;
        $this->page_no = $page_no;
        $this->laec_url = $laecUrl;

        return $this;
    }

    public function quizzed()
    {
        return $this->hasMany(QuizzQuestion::class);
    }
}
