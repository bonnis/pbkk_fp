<?php
declare(strict_types=1);

use App\Models\Users;

class SessionController extends ControllerBase
{

    public function indexAction()
    {
        // $this->flash->success("Hello!");
        $this->tag->setTitle("Login");
        if($this->session->has('auth')){
            $this->response->response('/index');
            return;
        }
    }

    public function loginAction(){

        if($this->session->has('auth')){
            $this->dispatcher->forward([
                'controller'=>'index',
                'action'=>'index'
            ]);
            return;
        }

        if($this->request->isPost()){
            $email = $this->request->getPost("email");
            $password = $this->request->getPost("password");

            $user = Users::findFirst(
                [
                    "email = :email: AND password = :password:",
                    'bind'=>[
                        'email'=>$email,
                        'password'=>sha1($password)
                    ]
                ]);
                    
            if($user){
                $this->setSession($user);
                $this->flash->success("Halo, ".$user->name."!");

                $this->dispatcher->forward([
                    'controller'=>'index',
                    'action'=>'index'
                ]);

                return;
            }

            $this->flash->error('Wrong email/password');

        }

        $this->dispatcher->forward([
            'controller'=>'session',
            'action'=>'index'
        ]);
    }

    public function logoutAction(){
        if(!$this->session->has('auth')){
            $this->response->response('/index');
        }
        $this->session->remove('auth');
        $this->flash->success('Berhasil logout.');
        $this->dispatcher->forward([
            'controller'=>'session',
            'action'=>'index'
        ]);
    }

    public function setSession($user){
        $this->session->set('auth',[
            'id'=>$user->id,
            'name'=>$user->name,
        ]);
    }

    

}

