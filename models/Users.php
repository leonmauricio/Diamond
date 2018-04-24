<?php

class Users extends Model
{

	protected $table = 'users';

	protected $fields = ["id", "username", "password", "email", "name", "surname", "admin"];

}