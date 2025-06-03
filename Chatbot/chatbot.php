<?php
header('Content-Type: application/json');
include('config.php');
if(isset($_GET['message']))
{
    $message = $_GET['message'];
    $stmt = $conn->prepare("SELECT response FROM chatbot WHERE text = ? LIMIT 1");
    $stmt->bind_param('s',$message);
    if($stmt->execute())
    {
        $stmt->bind_result($response_message);
        $stmt->store_result();
        if($stmt->num_rows()==1)
        {
            $stmt->fetch();
            $result = ['response_message'=>$response_message];
            echo json_encode($result);
            
        }
        else{
            echo json_encode(['response_message'=> 'Please contact our hotline for details.']);
        }

    }
    else
    {
        echo json_encode(['response_message'=> 'Please contact our hotline for details.']);

        
    }
    $stmt->close();
    $conn->close();
}

?>