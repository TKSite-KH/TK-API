<?php

class Sportclub extends AppModel{


    private $__sportclubFields = array(
        'Sportclub.id',
        'Sportclub.name',
        'Sportclub.email',
        'Sportclub.phone',
        'Sportclub.description',
        'Sportclub.min_price',
        'Sportclub.pitch_qty',
        'Sportclub.address'
    );

    public function login ($userEmail, $userPassword)
    {
        $respond = array();

        // check empty data
        if (empty($userEmail) || empty($userPassword)) // both required fields are empty
        {
            $respond['statusName'] = 'loginFail';
            $respond['description'] = __('User Email and password are required. Please enter user id and password and try again.');
            return $respond;
        }

        // email is exist, compare login password
        $params = array(
            'conditions' => array(
                'Sportclub.email' => $userEmail,
                'Sportclub.password' => $userPassword
               // 'Sportclub.status' => 0
            ),
            'fields' => array(
                'Sportclub.id'
            )
        );
        $sportclub = $this->find('first', $params);

        if (count($sportclub) > 0)
        {
            // prepare data for add new access token
            //$accessTokenData['user_id'] = $store['Store']['id'];
            //$accessTokenData['ip'] = String::getClientIpAddress();
            //$accessTokenData['access_token'] = String::getUniqSecure('sat', 32); // sat stands for "Store Access Token"

            //$objModelUserAccessToken = ClassRegistry::init('UserAccessToken');

            // save access token
           // if (null != $objModelUserAccessToken->add($accessTokenData))
           // {
            $sportclub = $this->view($sportclub['Sportclub']['id']);
            //    $store['AccessToken']['access_token'] = $accessTokenData['access_token'];

                $respond = $sportclub;
                $respond['statusName'] = 'loginSuccess';

                return $respond;
            //}

            // login correct, but add new access token fail
           // $respond['statusName'] = 'loginFail';
           // $respond['description'] = __('Something went wrong, please try again.');
           // return $respond;
        }

        // no store match with this login information => login fail
        $respond['statusName'] = 'loginFail';
        $respond['description'] = __('Incorrect store user name or password, please try again with the correct email and password.');
        return $respond;
    }

    public function view ($id)
    {
        $this->recursive = 1;
//        $respond = $this->findById($id, $this->$__sportclubFields);
        $respond = $this->findById($id);
        return $respond;
    }
}