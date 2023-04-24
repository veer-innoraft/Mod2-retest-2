<?php
namespace App\Classes;
use \PDO;

/**
 * Provide more functionality for database interactions.
 * 
 */
class DbHelper extends DbConnect
{
  /**
   * Checks if user's user_id exists. 
   * 
   *  @param string $userId
   *    Stores the user Id string.
   *  
   *  @return bool
   *    Returns TRUE if user exist.
   */
  public function existsUserId(string $userId):bool
  {
    $queryStirng = "select user_id from `csb_users` where `user_id`='{$userId}'";
    $sql = $this->conn->prepare($queryStirng);
    $sql->execute();
    if($sql->fetchColumn()) {
      return TRUE;
    }
    return FALSE;
  }

  /**
   * Returns the password of userId. 
   * 
   *  @param string $userId
   *    Stores the user Id string.
   *  
   *  @return string
   *    Returns TRUE if user exists ,else FALSE.
   */
  public function getPass(string $userId):string
  {
    $queryStirng = "select pass from `csb_users` where `user_id`='{$userId}'";
    $sql = $this->conn->prepare($queryStirng);
    $sql->execute();
    return $sql->fetch(PDO::FETCH_ASSOC)['pass'];
  }

  /**
   * Returns array of scores userId. 
   * 
   *  
   *  @return array
   *    Returns array of scores.
   */
  public function getScores():array
  {
    $queryStirng = "select * from `scores`";
    $sql = $this->conn->prepare($queryStirng);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * Add Scores to the database. 
   * 
   *  @var string $userId
   *    Stores the user id of user.
   * 
   *  @var string $name
   *    Stores the name of player.
   * 
   *  @var int $runs
   *    Stores the runs of player.
   * 
   *  @var int $balls 
   *    Stores the no of balls played by player.
   * 
   *  @var int $strikeRate 
   *    Stores strikerate of player.
   */
  public function addScore(string $userId, string $name, int $runs, int $balls, string $strikeRate )
  {
    $queryStirng = "INSERT INTO `scores` (`user_id`,`name`,`runs`,`balls`,`strike_rate`)
    VALUES ('{$userId}','{$name}',{$runs},{$balls},{$strikeRate})";
    $sql = $this->conn->prepare($queryStirng);
    $sql->execute();
  }

  /**
   * Delete score of provided userId. 
   * 
   *  @param int $scoreId
   *    Stores the user Id string.
   */
  public function deleteScore(int $scoreId):array
  {
    $queryStirng = "DELETE from `scores` WHERE id={$scoreId}";
    $sql = $this->conn->prepare($queryStirng);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
  }

}
?>
