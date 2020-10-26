<?php 
try{
    include_once "../conf/Conexao.php";
    require "main.php";
    } catch(Exception $e){
         echo "Erro: ". $e->getMessage();
        }

     $do = isset($_POST['doit']) ? $_POST['doit'] : 0;
        
     $obj = new User(Conexao::getInstance());

        $link = "location:../index.php";

    switch($do){

        

        case 0; //login
        
        //inicializa sessão
        if(!isset($_SESSION))
        session_start();
        
         
         $_SESSION['login'] = $obj->login($_POST['email'],$_POST['senha']); 

         
         
        break;

        case 1; //cadastro

         if(!isset($_SESSION))
        session_start();

         $cad = $obj->cadastro( $_POST['nome'],$_POST['sobrenome'],$_POST['email'],$_POST['senha'],$_POST['dataNasc'],$_POST['genero'],
                                $_POST['CPF'],$_POST['telefone'], $_FILES['imagem']['name']);
                            
         if($cad != "OK!"){
            // descomente isso para achar erros ->
         //   var_dump($cad); 
            $link = $link."?erro=".$cad;
            
         
         }else        
         $_SESSION['login'] = $obj->login($_POST['email'],$_POST['senha']); 
            
         break;


    }
    //comente isso para procurar erros:
      header($link);


   // quando for procurar busgs, lembre-se de olhar o banco de dados no MySql, tem algumas coisas como limite de caracteres que pode 
   // ajudar na busca
?>