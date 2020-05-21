<?php
declare(strict_types=1);

use App\Models\Bantuan;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Models\Users;

class TransaksiController extends ControllerBase
{

    public function initialize(){
        parent::initialize();

        if(!$this->session->has('auth')){
            $this->response->redirect('/index');
        }
    }

    public function indexAction()
    {
        $data = Bantuan::find();
        $this->view->transaksis = $data;
    }

    public function viewAction($id){
        
    }

    public function addAction(){
        if($this->request->isPost()){
            $q = $this->request->getPost("quantity");
            $cats = Kategori::find();
            $this->view->q = $q;
            $this->view->cats = $cats;
        }
    }   

    public function submitAction(){
        if($this->request->isPost()){
            $names = $this->request->getPost("nama");
            $cats = $this->request->getPost("categ");
            if(count($names)!=count($cats)){
                $this->view->disable();
                $this->flashSession->error("Error, data tidak valid");
                $this->response->redirect('/transaksi/add');
                return;
            }
            $trks = new Transaksi();
            $trks->user_id = $this->session->get('auth')['id'];
            if(!$trks->save()){
                $this->view->disable();
                $this->flashSession->error("Error, data tidak valid");
                $this->response->redirect('/transaksi/add');
                return;
            }
            $trid = $trks->id;
            for($i=count($names);$i>0;$i--){
                $bantu = new Bantuan();
                $bantu->name = $names[$i-1];
                $bantu->kategori_id = $cats[$i-1];
                $bantu->transaksi_id = $trid;
                $bantu->save();
            }
            $this->view->disable();
            $this->flashSession->success("Bantuan berhasil di input!");
            $this->response->redirect('/transaksi/add');
            
        }
    }

}

