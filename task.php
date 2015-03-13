<?php

class Task{
	private $title="";
	private $text="";
	
	public function __construct($newTitle,$newText) {
		$this->setText($newText);
		$this->setTitle($newTitle);
	}
	
	public function setTitle($newTitle){
		if(is_string($newTitle)) {
			$this->title=$newTitle;
		}
	}
	public function getTitle() {
		return $this->title;
	}
	
	public function setText($newText){
		if(is_string($newText)) {
			$this->text=$newText;
		}
	}
	public function getText() {
		return $this->text;
	}
	
	public function intoHTML() {
		$ret="";
		$ret .= "Tytul: ".$this->getTitle()."<br>";
		$ret .= "Tresc: ".$this->getText()."<br>";
		
		return $ret;
	}
	
	
}
$task1=new Task('Zadanie1', 'Tytul zadania 1');

































