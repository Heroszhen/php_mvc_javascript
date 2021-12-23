<?php
namespace App\Observer\Observers;

class LoginObserver implements \SplObserver{
    public function update(\SplSubject $subject){
        $user = $subject->getUser();
        $_SESSION["user"] = $user;
    }
}