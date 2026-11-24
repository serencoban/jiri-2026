<?php

namespace App\Http\Controllers;

use App\Mail\Invitation;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    public function send()
    {
        $invitationToSend = \App\Models\Invitation::latest()->first();

        Mail::to('s@c.com')->queue(new Invitation($invitationToSend));

        return 'L’invitation a été mise dans la file d’attente';
    }
}
