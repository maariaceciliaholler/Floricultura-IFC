<?php 
try{
    include_once "../conf/Conexao.php";
    require "main.php";
    } catch(Exeption $e){
         echo "Erro: ". $e->getMessage();
        }

     $do = isset($_POST['doit']) ? $_POST['doit'] : 0;
        
     $obj = new User(Conexao::getInstance());
    switch($do){

        case 0; //login
        if(!isset($_SESSION))
        session_start();
        

         $_SESSION['login'] = $obj->login($_POST['email'],$_POST['senha']); 
         
        break;

         case 1; //cadastro

         $echonumero = "Você inseriu um número no nome!";
         $telefone = $_POST['telefone'];
        if($telefone=="")
            $telefone = "undefined";

         $cad = $obj->cadastro( $_POST['nome'],$_POST['email'],$_POST['senha'],$_POST['dataNasc'],$_POST['genero'],$_POST['CPF'],$telefone);

        if($cad != "OK!"){
<<<<<<< HEAD
         echo $cad;
         echo $echonumero;
         echo "<br>";
         echo "<a href='cadastro.html'></a>";
        }
=======
         echo $cad; 
        }
        
        
>>>>>>> fd1ecbcd4a5ce9e84ff4eb1d124f0a5889def53a
         break;



    }
    header('location:../index.php');
?>