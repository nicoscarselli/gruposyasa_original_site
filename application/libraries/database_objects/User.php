<?php

class User {

    const USER_TYPE_SUPERADMIN = 1;
    const USER_TYPE_ADMIN = 2;

    public $id, $user_type, $email, $password, $is_deleted;

}