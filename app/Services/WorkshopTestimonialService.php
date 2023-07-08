<?php

namespace App\Services;

use App\Models\WorkshopTestimonial;

class WorkshopTestimonialService
{
    public function store($request)
    {
        WorkshopTestimonial::create($request->only(['name', 'profession', 'designation', 'institution', 'comment', 'workshop_id']));
    }

    public function find($workshop_testimonial_id)
    {
        return WorkshopTestimonial::findOrFail($workshop_testimonial_id);
    }

    public function update($request, $workshop_testimonial_id)
    {
        $workshop_testimonial = WorkshopTestimonial::findOrFail($workshop_testimonial_id);

        $workshop_testimonial->update($request->only(['name', 'profession', 'designation', 'institution', 'comment']));

        return $workshop_testimonial;
    }


}