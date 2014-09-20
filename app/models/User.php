<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;
use Zizaco\Entrust\HasRole;

class User extends Eloquent implements ConfideUserInterface
{
    use ConfideUser;

// This is trait for using entrust
    use HasRole;

     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
}
