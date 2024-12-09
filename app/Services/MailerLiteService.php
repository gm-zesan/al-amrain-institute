<?php

namespace App\Services;

use MailerLite\MailerLite;

class MailerLiteService
{
    protected $mailerlite;


    public function __construct()
    {
        $this->mailerlite = new MailerLite(['api_key' => env('MAILERLITE_API_KEY')]);
    }

    /**
     * Add a subscriber to MailerLite
     */
    public function getOrCreateMailerLiteGroup($course)
    {
        $response = $this->mailerlite->groups->get();
        if (isset($response['body']['data'])) {
            $groups = $response['body']['data'];
            foreach ($groups as $group) {
                if ($group['name'] == $course->name) {
                    return $group['id'];
                }
            }
        }
        $newGroup = $this->mailerlite->groups->create([
            'name' => $course->name,
        ]);
        return $newGroup['body']['data']['id'];
    }

    public function addStudentAsSubscriber($student)
    {
        $subscriber = $this->mailerlite->subscribers->create([
            'email' => $student->email,
            'name' => $student->name,
            'fields' => [
                'course_name' => $student->course_name,
            ],
        ]);
        return $subscriber['body']['data']['id'];
    }

    public function addStudentToMailerLiteGroup($student, $groupId)
    {
        try {
            $existingSubscriber = $this->mailerlite->subscribers->find($student->email);
            if (isset($existingSubscriber['body']['data']['id'])) {
                $subscriberId = $existingSubscriber['body']['data']['id'];
            } else {
                $subscriberId = $this->addStudentAsSubscriber($student);
            }
            $this->mailerlite->groups->assignSubscriber($groupId, $subscriberId);
            return "Student added to the group successfully!";
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

}
