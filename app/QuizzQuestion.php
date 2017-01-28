<?php
namespace Melenquizz;


use Illuminate\Database\Eloquent\Model;

class QuizzQuestion extends Model
{
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
