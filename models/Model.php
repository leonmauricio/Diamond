<?php

abstract class Model
{
	protected $db;

	protected $table = '';

	protected $fields = [];

	protected $joins = [];
	
	public function __construct(QueryBuilder $db)
	{
		$this->db = $db;
	}

	public function get($limit = 10, $where = false)
	{
		return $this->db->table($this->table)->select($this->fields)->join($this->joins)->limit($limit)->where($where)->fetchAll();
	}

	public function find($id)
	{
		return $this->db->table($this->table)->select($this->fields)->join($this->joins)->find($id);
	}

	public function create($parameters)
	{
		return $this->db->table($this->table)->create($parameters);
	}

	public function edit($id, $parameters)
	{
		return $this->db->table($this->table)->edit($id, $parameters);
	}

	public function destroy($id)
	{
		return $this->db->table($this->table)->destroy($id);
	}

}