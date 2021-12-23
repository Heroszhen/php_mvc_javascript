<?php
namespace App\Observer\Observers;

use App\Service\EmailService;

class LoginObserver implements \SplObserver{
    public function update(\SplSubject $subject){
        $user = $subject->getUser();
        $this->setSession($user);
        $this->sendEmail($user);
    }

    private function setSession(array $user){
        $_SESSION["user"] = $user;
    }

    private function sendEmail(array $user){
        $es = new EmailService();
        $es->sendMessage($user["email"],$user["firstname"],"connexion","login");
    }
}