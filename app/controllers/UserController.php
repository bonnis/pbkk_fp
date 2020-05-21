<?php
declare(strict_types=1);

// namespace App\Controllers;

use App\Models\Users;

class UserController extends ControllerBase
{

    public function indexAction()
    {
        if($this->request->isPost()){
            $pass = $this->request->getPost("password");
            $repass = $this->request->getPost("re_password");

            if($repass!=$pass){
                $this->flash->error("Password yang anda masukan berbeda");
                return;
            }

            $user = new Users();
            $user->password = sha1($pass);
            $user->name = $this->request->getPost('name');
            $user->email = $this->request->getPost('email', 'email');
            if(!$user->save()){
                    foreach ($user->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
                return;   
            } else {
                $this->tag->setDefault('email', '');
                $this->tag->setDefault('password', '');

                $this->flash->success('Terima kasih telah mendaftar!, Silahkan login');

                $this->dispatcher->forward([
                    'controller' => 'session',
                    'action'     => 'index',
                ]);

            }

        }
    }

}

