<?php

class Orders extends Model
{

	protected $table = 'orders';

	protected $fields = ["id", "user_id", "products"];
}