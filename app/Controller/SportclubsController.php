<?php
class SportclubsController extends AppController {

    public $components = array('RequestHandler');

    public function index() {
        $recipes = $this->Sportclub->find('all');
        $this->set(array(
            'sportclubs' => $recipes,
            '_serialize' => array('sportclubs')
        ));
    }

    public function login(){
        $sportclub = $this->Sportclub->login($this->data['user_email'], $this->data['user_password']);
        $this->set(array(
            'respond' => $sportclub,
            '_serialize' => array('respond')
        ));
    }

    public function add() {
        $this->Sportclub->create();
        if ($this->Sportclub->save($this->request->data)) {
            $message = 'Created';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

    public function view($id) {
        $recipe = $this->Sportclub->findById($id);
        $this->set(array(
            'sportclub' => $recipe,
            '_serialize' => array('sportclub')
        ));
    }

    public function edit($id) {
        $this->Sportclub->id = $id;
        if ($this->Sportclub->save($this->request->data)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

    public function delete($id) {
        if ($this->Sportclub->delete($id)) {
            $message = 'Deleted';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
}