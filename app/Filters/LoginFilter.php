<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class LoginFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
		$session = \Config\Services::session();
        $info = $session->has('userData');
        if($arguments[0] == 'login'){ //if the page it login
            if($info){ //if youre already logged in redirect to home
                return redirect()->to(base_url().'/Home');
            }
        }else{ // if page is not login
            if(!$info){ // if you're not logged in redirect to login
                return redirect()->to(base_url().'/Login');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}