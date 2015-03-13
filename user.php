<?php

include_once('./task.php');


class User{
	private $userName;
	private $taskArray;
	
	static public function CreateUser($newName){
		if(is_string($newName) && $newName !=="") {
			return new User($newName);
		}
		return null;
	}
	
	private function __construct($newName){
		$this->taskArray= array();
		if(is_string($newName)) {
			$this->userName=$newName;
		}
			
	}
	
	public function getUserName(){
		return $this->userName;
	}
	
	public function addTask($newTask){
		array_push($this->taskArray, $newTask);
	}
	
	public function tasksIntoHTML(){
		$ret="";
		foreach($this->taskArray as $task) {
			$ret.="<br>";
			$ret.=$task->intoHTML();
		}
		return $ret;
	}
	
}


$task1=new Task("Zadanie 1", "Tresc zadania 1");
$user=User::CreateUser("Januż");
$user->addTask($task1);
echo $user->getUserName();
echo "<br>";
echo $user->tasksIntoHTML();


























