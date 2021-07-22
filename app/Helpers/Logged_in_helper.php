<?php
function isLoggedIn($page){
    $info = $this->session->get($user);
    if($page == 'login'){ //if the page it login
        if($info != null){ //if youre already logged in redirect to home
            return redirect()->route('home');
        }
    }else{ // if page is not login
        if($info == null){ // if you're not logged in redirect to login
            return redirect()->route('Login');
        }

    }
}