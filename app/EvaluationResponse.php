<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluationResponse extends Model
{
    //
    public function questions()
    {
        return $this->belongsToMany('App\EvaluationQuestion', 'evaluation_question_response', 'evaluation_response_id', 'evaluation_question_id')->withTimestamps();
    }
} // end class
