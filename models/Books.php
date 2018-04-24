<?php

class Books extends Model
{
	protected $table = 'books';

	protected $fields = ["id", "name", "author_id", "category_id", "price", "rating", "description", "year", "featured", "discount", "image"];

	protected $joins =[
		['table' => 'authors', 'fields' => ['id', 'name', 'surname'], 'keys' => ['author_id', 'id']],
		['table' => 'categories', 'fields' => ['id', 'name', 'color'], 'keys' => ['category_id', 'id']]
	];
}