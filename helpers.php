<?php

function fullname($book) {
	return $book['name'] . " ". $book['surname'];
}

function shortname($name, $surname) {
	$surname = isset($surname)? $surname . ", " : "";
	return $surname . substr($name, 0, 1) . '.';
}

function discount($price, $discount) {
	return $price - ($price * $discount / 100);
}