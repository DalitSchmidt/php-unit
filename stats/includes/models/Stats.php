<?php

class Stats {
    public $id;
    public $YR;
    public $Fullname;
    public $GP;
    public $AB;
    public $R;
    public $H;
    public $HR;
    public $RBI;
    public $Salary;
    public $Bio;

    public static function getBySql($sql) {
        try {
            $database = new Database();

            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$statement = $database->query($sql);

            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $result = $statement->fetchAll();

            $database = null;

            return $result;
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    public static function getAll() {
        $sql = 'select * from stats';
		
        return self::getBySql($sql);
    }

    public static function getById($id) {
        try {
            $database = new Database();

            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "select * from stats where id = :id limit 1";
            $statement = $database->prepare($sql);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);

            $statement->execute();

            $statement->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $result = $statement->fetch();

            $database = null;

            return $result;
        } catch (PDOException $exception){
            die($exception->getMessage());
        }
    }
    
	public function insert() {
        try {
            $database = new Database();

            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "insert into stats (YR,Fullname,GP,AB,R,H,HR,RBI,Salary,Bio) values";
            $statement = $database->prepare($sql);
            $statement->bindParam(':YR', $this->YR, PDO::PARAM_INT);
            $statement->bindParam(':Fullname', $this->Fullname, PDO::PARAM_STR);
            $statement->bindParam(':GP', $this->GP, PDO::PARAM_INT);
            $statement->bindParam(':AB', $this->AB, PDO::PARAM_INT);
            $statement->bindParam(':R', $this->R, PDO::PARAM_INT);
            $statement->bindParam(':H', $this->H, PDO::PARAM_INT);
            $statement->bindParam(':HR', $this->HR, PDO::PARAM_INT);
            $statement->bindParam(':RBI', $this->RBI, PDO::PARAM_INT);
            $statement->bindParam(':Salary', $this->Salary, PDO::PARAM_STR);
            $statement->bindParam(':Bio', $this->Bio, PDO::PARAM_STR);
            //$statement->bindParam(':id', $this->id, PDO::PARAM_INT);

            $statement->execute();

            $count = $statement->rowCount();

            $database = null;

            return $count;
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }
    
	public function update() {
        try {
            $database = new Database();

            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "update stats set (YR=:YR,Fullname = :Fullname,GP=:GP,AB=:AB,R=:R,H=:H,HR=:HR,RBI=:RBI,Salary=:Salary,Bio=:Bio)";

            $statement = $database->prepare($sql);
            $statement->bindParam(':YR', $this->YR, PDO::PARAM_INT);
            $statement->bindParam(':Fullname', $this->Fullname, PDO::PARAM_STR);
            $statement->bindParam(':GP', $this->GP, PDO::PARAM_INT);
            $statement->bindParam(':AB', $this->AB, PDO::PARAM_INT);
            $statement->bindParam(':R', $this->R, PDO::PARAM_INT);
            $statement->bindParam(':H', $this->H, PDO::PARAM_INT);
            $statement->bindParam(':HR', $this->HR, PDO::PARAM_INT);
            $statement->bindParam(':RBI', $this->RBI, PDO::PARAM_INT);
            $statement->bindParam(':Salary', $this->Salary, PDO::PARAM_STR);
            $statement->bindParam(':Bio', $this->Bio, PDO::PARAM_STR);
            $statement->bindParam(':id', $this->id, PDO::PARAM_INT);

            $statement->execute();

            $count = $statement->rowCount();

            $database = null;

            return $count;
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    public function delete() {
        try {
            database = new Database();

            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "delete from stats where id = :id limit 1";
            $statement = $database->prepare($sql);
            $statement->bindParam(':id', $this->id, PDP::PARAM_INT);

            $statement->execute();

            $count = $statement->rowCount();

            $database = null;

            return $count;
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    public function save() {
        if (isset($this->id)) {
			return $this->update();
		} else {
			return $this->insert();
        }
    }
}