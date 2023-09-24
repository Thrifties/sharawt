<?php

    namespace App\Controllers;

    class User extends BaseController{
        public function login(){
            if($this->request->getMethod()=='post'){
                $post= $this->request->getPost(['email', 'password']);

                $user_model = new \App\Models\UsersModel();
                $admin = $user_model->where('email', $post['email'])->where('pass', sha1($post['pass']))->first();
                $session = session();
                if(!$admin){
                    //dd('invalid');
                    $session->setFlashdata('invalid', 'Invalid email or password');
                } else {
                    $this->setAdminSession($admin);
                    return redirect()->to('sharawt/index');
                }
            }
            return view('user/login');
        }

        public function setAdminSession($user){
            $data = [
                'id' => $user->id,
                'nickname' => $user->nickname,
                'email' => $user->email,
                'isAdminLoggedIn' => true
            ];
            session()->set($data);
        }

        public function logout(){
            session()->destroy();
            return redirect()->to('user/login');
        }
    }