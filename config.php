<?php session_start();
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('project2.sqlite');
      }
   }
   
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } 
   
   ini_set("SMTP","ssl://smtp.gmail.com");
   ini_set("smtp_port","587");
   if(isset($_SESSION['id'])){
   $id = $_SESSION['id'];
   }
   
function exists($db, $table) {
   try {
         $db->query("SELECT COUNT(1) FROM $table");
         return true;
    } catch (SQLException $e) {
         return false;
    }
}

   
?>
