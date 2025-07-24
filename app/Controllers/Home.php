<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // $this->sendTestEmail();

        if (session("magicLogin")) {
            return redirect()
                ->to("set-password")
                ->with("message", "Please update your password");
        }
        return view("Home/index.php");
    }

    private function sendTestEmail()
    {
        $email = \Config\Services::email();

        $email->setTo("recipient@example.com");
        $email->setSubject("Test Email");
        $email->setMessage("Hello from <i>Codeigniter</i>");

        $email->send();
    }
}
