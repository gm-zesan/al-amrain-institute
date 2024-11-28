<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'description',
        'type',
        'price',
        'image',
        'starting_date',
        'end_date',
        'total_seats',
    ];

    public function enrolments()
    {
        return $this->hasMany(Enrolment::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments', 'course_id', 'student_id')->withPivot(
            'payment_method',
            'transaction_id',
            'total_amount',
            'is_certificate_enabled',
            'status'
        )->withTimestamps();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
