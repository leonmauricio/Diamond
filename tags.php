<?php

class Tags
{

	public $tagList = [];
	
	public function add($tag)
	{
		$this->tagList[] = $tag;
	}

	public function remove($tag)
	{
		array_splice($this->tagList, array_search($tag, $this->tagList), 1);
	}

	public function all()
	{
		return $this->tagList;
	}
}