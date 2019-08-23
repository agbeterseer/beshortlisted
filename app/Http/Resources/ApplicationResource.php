<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ApplicationResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
      return [
      'id' => $this->id,
      'document_id' => $this->document_id,
      'user_id' => $this->user_id,
       'resume_id' => $this->resume_id,
       'tag_id' => $this->tag_id,
       'status' => $this->status,
       'sorted' => $this->sorted,
       'sort_by_category' => $this->sort_by_category,
       'in_review' => $this->in_review,
       'shortlisted' => $this->shortlisted,
       'rejected' => $this->rejected,
       'offered' => $this->offered,
       'hired' => $this->hired,
       'years_of_experience' => $this->years_of_experience,
       'city_id' => $this->city_id,
       'region_id' => $this->region_id,
       'gender' => $this->gender,
       'age' => $this->age,
       'nationality' => $this->nationality,
       'd_employment_term' => $this->d_employment_term,
       'educational_level' => $this->educational_level,
       'qualification' => $this->qualification,
       'career_level' => $this->career_level,
       'relocate_nationaly' => $this->relocate_nationaly,
       'availability' => $this->availability,
       'minimum_salary' => $this->minimum_salary,
       'yoe_range' => $this->yoe_range,
       'candidates_name' => $this->candidates_name,
       'email' => $this->email,
       'clientfk' => $this->clientfk,
       'avatar' => $this->avatar
        ];
    }

 
}
