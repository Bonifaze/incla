<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluationQuestion extends Model
{
    //
    public function responses()
    {
        return $this->belongsToMany('App\EvaluationResponse', 'evaluation_question_response', 'evaluation_question_id', 'evaluation_response_id')->withTimestamps();
    }

    public function options()
    {
        $response = "";
        $options = $this->responses;
        //check if multi choice single select
        if($this->evaluation_response_type_id == 1)
        {
            foreach ($options as $key => $option)
            {

                 $response .= "<div class='form-check'>
                             <label class='form-check-label'>
                             <input type='radio' class='form-check-input' value='".$option->id."' name='parameters[$this->id]'  required = 'required'>".$option->response_option."
                             </label>
                             </div>";
            }
            return $response;
        }

        // check if question type is for multi choice multi select
        if($this->evaluation_response_type_id == 2)
        {
             foreach ($options as $key => $option)
            {

                $response .= "<div class='form-check'>
  <label class='form-check-label'>
    <input type='checkbox' class='form-check-input' name='parameters[$this->id][]' value='".$option->id."'>".$option->response_option."
  </label>
</div>";
            }
            return $response;
        }

        // check if question type is for free writing
        if($this->evaluation_response_type_id == 3)
        {
            $response.= "<div class='form-group'>
  <label for='qt-".$this->id."'>Response:</label>
  <textarea class='form-control' rows='5' name='parameters[$this->id]' id='parameters[$this->id]' required = 'required'></textarea>
</div> ";
            return $response;
        }

        return "";
    }


}// end class
