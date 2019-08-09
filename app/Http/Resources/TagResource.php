<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class TagResource extends Resource
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
            'job_title' => $this->job_title,
            'code' => $this->code,
            'display_name' => $this->display_name,
            'profession_id' => $this->profession_id,
            'gender' => $this->gender,
            'client' => $this->client,
            'status' => $this->status,
            'url' => $this->url, 
            'end_date' => $this->end_date,
            'experience' => $this->experience,
            'job_level' => $this->job_level,
            'job_category' => $this->job_category,
            'salary_range' => $this->salary_range,
            'industry' => $this->industry,
            'qualification' => $this->qualification, 
            'description' => $this->description,
            'package_id' => $this->package_id,
            'deadline_submission' => $this->deadline_submission,
            'country' => $this->country,
            'region' => $this->region,
            'city' => $this->city,
            'full_address' => $this->full_address,
            'email_address' => $this->email_address,
            'active' => $this->active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'draft' => $this->draft,
            'awaiting_aproval' => $this->awaiting_aproval,
            'delete' => $this->delete,
            'featured'=> $this->featured,
            'job_role' => $this->job_role,
            'job_summary' => $this->job_summary
        ];
    }

 
}
