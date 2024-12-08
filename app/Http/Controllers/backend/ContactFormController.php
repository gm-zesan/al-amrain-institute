<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Requests\ContactFormRequest;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use DataTables;


class ContactFormController extends Controller implements HasMiddleware
{
    function __construct()
    {
        $this->middleware('permission:contact-list|contact-delete', ['only' => ['index']]);
        $this->middleware('permission:contact-form-delete', ['only' => ['delete']]);
    }

    public static function middleware(): array
    {
        return [
            new Middleware('permission:contact-list|contact-delete', only: ['index']),
            new Middleware('permission:contact-form-delete', only: ['delete']),
        ];
    }


    public function index(Request $request)
    {
        if($request->ajax()){
            $contactForms = ContactForm::get()->all();
            return DataTables::of($contactForms)
                ->addIndexColumn()
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.contact-messages.index');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactFormRequest $request)
    {
        $validated = $request->validated();
        try {
            // $mailData = [
            //     'name' => $request->name,
            //     'email' => $request->email,
            //     'content' => $request->message,
            // ];
            // $replymailData = [
            //     'name' => $request->name,
            //     'content' => 'Thank you for contacting us. We will get back to you soon.'
            // ];
            ContactForm::create($validated);
            // Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($mailData));
            // Mail::to($request->email)->send(new ReplyContactMail($replymailData));
            return response()->json([
                'status' => 201,
                'data' => $validated,
                'success' => true,
                'message' => 'Message sent successfully'
            ]);
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->toArray();
            return response()->json([
                'success' => false,
                'errors' => $errors
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $contactForm = ContactForm::find($id);
        $contactForm->delete();
        return redirect()->back()->with('success','Message deleted successfully');
    }
}
