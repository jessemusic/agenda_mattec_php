<?php
    session_start();

    include_once(__DIR__ . "/connection.php");
    include_once(__DIR__ . "/url.php");

    $data =$_POST;
    //modificação de dados
    if(!empty($data)){
        // print_r($data); 
        
        if($data['type'] === 'create'){
            $name = $data['name'];
            $phone = $data['phone'];
            $subject = $data['subject'];
            $observations = $data['observations'];

            $query = "INSERT INTO $table (name, phone, subject, observations) VALUES (:name, :phone, :subject, :observations)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':subject', $subject);
            $stmt->bindParam(':observations', $observations);

                            // Create connection
                try{
                    $stmt->execute();
                    $_SESSION["msg"] = "Contato criado com sucesso!";
                }catch (PDOException $e){
                $error = $e->getMessage();
                echo "Connection failed: ". $error;
                }

           
        } else if ($data['type'] === 'edit'){
            $id = $data['id'];
            $name = $data['name'];
            $phone = $data['phone'];
            $subject = $data['subject'];
            $observations = $data['observations'];

            $query = "UPDATE $table SET name = :name, phone = :phone, subject = :subject, observations=:observations WHERE id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':subject', $subject);
            $stmt->bindParam(':observations', $observations);
            $stmt->bindParam(':id', $id);

                         // Create connection
                         try{
                            $stmt->execute();
                            $_SESSION["msg"] = "Contato atualizado com sucesso!";
                        }catch (PDOException $e){
                        $error = $e->getMessage();
                        echo "Update failed: ". $error;
                        }

        }
        header("Location:" . $BASE_URL . "../index.php");

    }else{

        //return one contact from database
        $id;
    
        if(!empty($_GET)){
            $id = $_GET['id'];
            $query = "SELECT * FROM $table WHERE id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $contact = $stmt->fetch();
        }else {
            
        //return all contacts from database
        $contacts = [];

        $query = "SELECT * FROM $table";

        $stmt = $conn->prepare($query);

        $stmt->execute();

        $contacts = $stmt->fetchAll();

        }
    }

$conn =null;
    



    
