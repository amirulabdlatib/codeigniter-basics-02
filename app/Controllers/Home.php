<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $this->sendTestEmail();
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
