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
        'what_will_learn',
        'prerequisites',
        'time_schedule',
        'total_seats',
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
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
