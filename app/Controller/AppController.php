<?php
App::uses('Controller', 'Controller');
App::uses('Security', 'Utility');
class AppController extends Controller
{
   // public $uses = array('UserAccessToken');
    public function beforeFilter ()
    {

        if ($this->params->url=='errors.json')
        {
            return;
        }
        $request = getallheaders();

        if ($request['secret_key'] == null)
        {
            $this->redirect(array('controller' => 'errors.json'));
        }
        if ($request['secret_key'] != Configure::read('SECRET_KEY'))
        {
            $this->redirect(array('controller' => 'errors.json'));
        }
        // if the request is get method and correct secret key, let continue to process for client
        if ($this->request->is('get'))
        {
            return;
        }
        // for add new customer, customer login, check customer social id, check email exist and account forgotpassword do not required access token
        if ($this->request->is('post') &&
            (
                $this->params->url=='sportclubs/login.json'
               // || $this->params->url=='stores/login.json'
                //|| $this->params->url=='store_companies/login.json'
                //|| $this->params->url=='customers.json'
                //|| $this->params->url=='customers/login.json'
                //|| $this->params->url=='customers/checkAccountBySocialId.json'
                //|| $this->params->url=='customers/forgotPassword.json'
                //|| $this->params->url=='customers/isEmailExist.json'
            )
        )
        {
            return;
        }
//        if ($this->request->is('post') && $this->UserAccessToken->isValidAccessToken($request['access_token'], $request['user_id']))
//        {
//            return;
//        }
//        if ($this->request->is('put') && $this->UserAccessToken->isValidAccessToken($request['access_token'], $request['user_id']))
//        {
//            return;
//        }
        $this->redirect(array('controller' => 'errors.json'));
    }
}