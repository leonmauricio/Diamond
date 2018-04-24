<?php

class Authors extends Model
{

	protected $table = 'authors';

	protected $fields = ["id", "name", "surname", "image", "bio"];

}