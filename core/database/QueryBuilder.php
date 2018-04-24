<?php

class QueryBuilder
{

 	protected $pdo;

 	protected $table;

 	protected $fields = [];

 	protected $joins = [];

 	protected $where = [];

 	protected $limit = 10;
 	
 	public function __construct(PDO $pdo)
 	{
 		$this->pdo = $pdo;
 	}

 	public function table($table)
 	{
 		$this->table = $table;
 		return $this;
 	}

 	public function select($fields)
 	{
 		$this->fields = $fields;
 		return $this;
 	}

 	public function limit($limit)
 	{
 		$this->limit = $limit;
 		return $this;
 	}

 	public function join($joins)
 	{
 		$this->joins = $joins;
 		return $this;
 	}

 	public function where($condition)
 	{
 		if ($condition) {
 			$this->where[] = $condition;
 		}
 		return $this;
 	}

	public function create($parameters)
	{
		$sql = "INSERT INTO " . $this->table . " (" . implode(',', array_keys($parameters)) . ") VALUES (:" . implode(',:', array_keys($parameters)) . ")";
		$statement = $this->pdo->prepare($sql);
		return $statement->execute($parameters);
	}

	public function destroy($id)
	{
		$statement = $this->pdo->prepare("DELETE FROM " . $this->table . " WHERE id = $id limit 1");
		return $statement->execute();
	}

	public function edit($id, $parameters)
	{
		$placeholders = array_map(function ($field) {
			return $field . '=:' . $field;
		}, array_keys($parameters));

		$sql = "UPDATE " .  $this->table . " SET " . implode(',', $placeholders) . " WHERE id=" . $id . " limit 1";

		$statement= $this->pdo->prepare($sql);
		return $statement->execute($parameters);
	}

	public function fetchAll()
	{
		$statement = $this->pdo->prepare($this->getSelectString() . ' WHERE 1 = 1 ' . $this->getWhereString() . ' limit ' . $this->limit);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	public function find($id)
	{
		$statement = $this->pdo->prepare($this->getSelectString() . ' WHERE ' . $this->table . '.id =' . $id . ' limit 1');
		$statement->execute();
		return $statement->fetch(PDO::FETCH_ASSOC);
	}

	private function getSelectString()
	{
		$sql = 'select ' . $this->getFieldsString($this->table, $this->fields);

		if (count($this->joins)) {		
			foreach ($this->joins as $join) {
				$joins[] = $this->getFieldsString($join['table'], $join['fields'], true);
			}
			$sql .= ',' .  implode(',', $joins);
		}

		$sql .= ' from ' . $this->table;

		if (count($this->joins)) {		
			foreach ($this->joins as $join) {
				$sql .= ' left join ' . $join['table'] . ' on ' . $join['table'] . '.' . $join['keys'][1] . '=' . $this->table . '.' . $join['keys'][0];
			}
		}

		return $sql;
	}

	private function getFieldsString($table, $fields, $prefix = false)
	{
		$fields = array_map(function ($field) use ($table, $prefix) {
			$string = $table . '.' . $field;
			if ($prefix) {
				$string .= ' as ' . $table . '_' . $field;
			}
			return $string;
		}, $fields);
		return implode(',', $fields);
	}

	private function getWhereString()
	{
		if (empty($this->where)) {
			return '';
		}
		$where = array_map(function ($where) {
			return $where[0] . " " . $where[1] . "'" . $where[2] . "'";
		}, $this->where);
		return ' AND ' . implode(' AND ', $where);
	}
}