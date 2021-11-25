<?php

require_once '../models/main-model.php';

class ResidentTchat 
{
    use MainModel;
    private $residentId;
    private $message;
    private $expeditorId;

    public function __construct($expeditorId, $destinationId, $message, $pdo)
    {
        $this->expeditorId = $expeditorId;
        $this->destinationId = $destinationId;
        $this->message = $message;
        $this->pdo = $pdo;
    }

    public function getReceiver()
    {
        $exist = FALSE;
        $datas = ['id' => $this->destinationId];

        $stmt = $this->pdo->prepare("SELECT * FROM residents WHERE id = :id");
        $stmt->execute($datas);
        
        if ($stmt->rowCount() > 0) {

            $exist = TRUE;
        }

        return $exist;
    }

    public function addMessage($exist)
    {
        if ($exist == TRUE) {

            $datas = [
                'exp_id'     => $this->expeditorId,
                'dest_id'   =>  $this->destinationId,
                'message'   =>  $this->message
            ];
            
            $req = "INSERT INTO messages (exp_id, dest_id, message) VALUE (:exp_id, :dest_id, :message)";
    
            $stmt = $this->pdo->prepare($req);
            $stmt->execute($datas);
        }
    }

    public function sendMessage()
    {
        $datas = ['exp_id'    => $this->expeditorId,
                'dest_id'   =>  $this->destinationId];
            
        $req = "SELECT * FROM messages WHERE (exp_id = :exp_id AND dest_id = :dest_id) OR (dest_id = :exp_id AND exp_id = :dest_id) ORDER BY date_message DESC LIMIT 20";
        $stmt = $this->pdo->prepare($req);
        $stmt->execute($datas);

        $messages = [];

        while ($message = $stmt->fetchObject()) {
            
            $messages[] = $message; 
        }

        return $messages;
    }
}