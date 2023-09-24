<?php

    namespace App\Controllers;

    class Posts extends BaseController
    {
        public function index(): string
        {
            $posts_model= new \App\Models\PostsModel();
            $data['posts']= $posts_model->findAll();
            return view('sharawt/index', $data);
        }

        public function test()
        {
            try {
                echo $x;
            } catch(\Exception $e) {
                echo 'error';
            }

            $db = \Config\Database::connect();
            $builder = $db->table('tbl_posts');
            $query = $builder->get();
            $result = $query->getResult();
        }

        public function view($id)
        {
        $posts_model= new \App\Models\PostsModel();
        $data['posts']= $posts_model->find($id);
        return view('sharawt/view', $data);

        }

        public function myform(){
            helper(['form']);
            return view('sharawt/myform');
        }


/*         public function add()
        {
            $data= array();
            helper(['form']);

            if($this->request->getMethod()=='post'){
                $post= $this->request->getPost(['name', 'price', 'description']);
                $post['name'] = strip_tags($_POST['name']);
                $post['description'] = strip_tags($_POST['description']);
                $rules= [
                    'name' => ['label' => 'Item name', 'rules' => 'required'],
                    'price' => ['label' => 'Price', 'rules' => 'required|numeric'],
                    'description' => ['label' => 'Description', 'rules' => 'required'],
                ];
                if (! $this->validate($rules))
                {
                    $data['validation']= $this->validator;
                    // dd($data['validation']);
                }
                else {
                $posts_model= new \App\Models\PostsModel();
                $posts_model->save($post);
                return redirect()->to('sharawt/index');
                }
            }

            return view('sharawt/add', $data);

        }

        public function edit($id)
        {
            $data = array();
            helper(['form']);

            $item_model = new \App\Models\ItemModel();
            $item = $item_model->find($id);

            if ($this->request->getMethod() == 'post') {
                $post = $this->request->getPost(['name', 'price', 'description']);
                $post['name'] = strip_tags($_POST['name']);
                $post['desciption'] = strip_tags($_POST['desciption']);

                $rules = [
                    'name' => ['label' => 'Item name', 'rules' => 'required'],
                    'price' => ['label' => 'Price', 'rules' => 'required|numeric'],
                    'description' => ['label' => 'Description', 'rules' => 'required'],
                ];

                if (!$this->validate($rules)) {
                    $data['validation'] = $this->validator;
                } else {
                    $item_model->save($post);
                    return redirect()->to('item/index');
                }
            }
            $data['item'] = $item;
            return view('item/edit', $data);
        }

        public function delete($id)
        {
        $item_model = new \App\Models\ItemModel();
        $data['item']= $item_model->find($id);
        return view('item/delete', $data);
        }

        public function destroy($id){
            $item_model = new \App\Models\ItemModel();
            $item_model->delete($id);
            return redirect()->to('item/index');
        } */

    }