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


    public function addStudentToMailerLiteGroup($student, $groupId)
    {
        $subscriberId = $this->addStudentAsSubscriber($student);
        $this->mailerlite->groups->assignSubscriber($groupId, $subscriberId);
        $subscribers = $this->mailerlite->groups->getSubscribers($groupId);
        return $subscribers['body']['data'];
    }


    public function sendMailViaMailerLite($student, $course, $groupId)
    {
        $emailContent = view('emails.course-enrolled', compact('student', 'course'))->render();
        $campaignData = [
            'name' => 'Course Enrollment',
            'type' => 'regular',
            'emails' => [
                [
                    'subject' => 'Course Enrollment Notification', 
                    'from_name' => 'Al-Amrain Institute',
                    'from' => 'gmzesan7767@gmail.com',
                    'reply_to' => 'gmzesan7767@gmail.com',
                    'content' => $emailContent,
                ],
            ],
            'groups' => [$groupId],
        ];
        try {
            $campaign = $this->mailerlite->campaigns->create($campaignData);
            $campaignId = $campaign['body']['data']['id'];
            $scheduleResponse = $this->mailerlite->campaigns->schedule($campaignId, ['delivery' => 'instant']);
            return $scheduleResponse;
            if ($scheduleResponse['status_code'] == 200) {
                return "Campaign scheduled successfully!";
            } else {
                return "Failed to schedule the campaign.";
            }
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    
    protected function addStudentAsSubscriber($student)
    {
        try {
            $subscriber = $this->mailerlite->subscribers->create([
                'email' => $student->email,
                'fields' => [
                    'name' => $student->name,
                ],
            ]);

            if ($subscriber['status_code'] == 201) {
                return $subscriber['body']['data']['id'];
            } else {
                $subscriberId = $this->mailerlite->subscribers->find($student->email)['body']['data']['id'];
                return $subscriberId;
            }
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

}
