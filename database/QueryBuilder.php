<?php
class QueryBuilder
{

    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Register User
    public function registerUser($userData)
    {
        $sql = "INSERT INTO users(username,email,password) VALUES (:username,:email,:password)";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':username', $userData['username'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $userData['email'], PDO::PARAM_STR);
        $stmt->bindValue(':password', $userData['password'], PDO::PARAM_STR);

        $stmt->execute();
    }

    // Register User
    public function logInUser($email)
    {
        $sql = "SELECT id,username,password FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':email', $email, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Select All method
    public function select($table, $id)
    {

        $stmt = $this->pdo->prepare("SELECT * from {$table} WHERE id= :id");


        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    // Select All method
    public function selectAll($table)
    {

        $stmt = $this->pdo->prepare("SELECT * from {$table}");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Select all feedbacks with their creators
    public function selectAllWithCreators()
    {
        $sql = "SELECT feedbacks.id,feedbacks.userId,users.username,feedbacks.body,feedbacks.createdAt
                FROM feedbacks JOIN users ON feedbacks.userId =users.id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // fetch user who created feedback
    // public function getFeedbackCreator($userId)
    // {
    //     $stmt = $this->pdo->prepare("SELECT username from users WHERE id={$userId}");
    //     $stmt->execute();

    //     return $stmt->fetch(PDO::FETCH_OBJ);
    // }

    // Insert one method
    public function insertOne($table, $data)
    {
        /*---------- RUNNING PREPARED STATEMENTS @METHOD 1---------- */

        // $sql = "INSERT INTO {$table}(name,email,body) VALUES (?,?,?)";

        // $stmt = $this->pdo->prepare($sql);
        // $stmt->execute([$data['name'], $data['email'], $data['body']]);


        /*---------- RUNNING PREPARED STATEMENTS @METHOD 2---------- */
        // $sql = "INSERT INTO {$table}(name,email,body) VALUES (:name,:email,:body)";
        // $stmt = $this->pdo->prepare($sql);

        // $stmt->execute(
        //     [
        //         ':name' => $data['name'],
        //         ':email' => $data['email'],
        //         ':body' => $data['body']
        //     ]
        // );

        /*---------- RUNNING PREPARED STATEMENTS @METHOD 3---------- */
        $sql = "INSERT INTO {$table}(userId,body) VALUES (:userId,:body)";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':userId', $data['userId'], PDO::PARAM_STR);
        $stmt->bindValue(':body', $data['body'], PDO::PARAM_STR);

        $stmt->execute();
    }

    // Delete one method
    public function deleteOne($table, $id)
    {
        // $sql = "DELETE FROM {$table} WHERE id = {$id}";

        // $stmt = $this->pdo->prepare($sql);
        // $stmt->execute();

        $sql = "DELETE FROM {$table} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
    }

    public function updateOne($id, $newFeedback)
    {
        $sql = "UPDATE feedbacks SET body= :body WHERE id= :id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':body', $newFeedback, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
    }
}
