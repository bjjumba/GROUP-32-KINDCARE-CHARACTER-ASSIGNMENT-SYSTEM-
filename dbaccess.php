<?php

class DbAccess
{
    public $conn;
    private $mysqlKeyWords;
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';


    private $database = 'kindercare_sys';




    public function __construct()
    {
    
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

       

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        //mysqli_select_db($this->conn, $this->db_name);

        $this->mysqlKeyWords = ['CURRENT_TIMESTAMP'];
    }


    public function getConnection()
    {
        return $this->conn;
    }

    /**
     * @param string $table name of the table
     *@param Array $set array(key=value,key=>vale)
     */
    
    public function insert($table, $data = array())
    {
        $q = "insert into $table ";
        $values = "(";
        $cols = "(";
        foreach ($data as $key => $value) {
            $cols .= "$key,";
            // $values.="'" . mysqli_real_escape_string($this->conn, $value) . "',";
            if (in_array($value, $this->mysqlKeyWords)) {
                $values .= $value;
            } else {
                $values .= "'" . mysqli_real_escape_string($this->conn, $value) . "',";
            }
            // $values.="'" . $value . "',";
        }

        $cols = substr($cols, 0, -1) . ")";
        $values = substr($values, 0, -1) . ")";
        $q .= $cols . " values $values";
        // echo $q."////</br>";
        $query = mysqli_query($this->conn, $q);
        if ($query) {
            return mysqli_insert_id($this->conn);
        }
        //return $q;
        return mysqli_error($this->conn);
    }

    public function sql($q)
    {
        $query = mysqli_query($this->conn, $q);
        if ($query) {
            return mysqli_insert_id($this->conn);
        }
        //return $q;
        return mysqli_error($this->conn);
    }
    public function select($table, $cols = array(), $where = [])
    {
        $q = "select ";
        if (empty($cols)) {
            $q = "select *";
        } else {
            $strCols = "";
            foreach ($cols as $col) {
                $strCols .= $col . ",";
            }

            $strColsfinal = substr($strCols, 0, -1);
            $q = "select " . $strColsfinal;
        }
        $q .= " from $table";

        if ($where) {
            // $keys=  array_keys($where);
            $wherestr = "";
            $orderbyValue = "";
            $orderby = FALSE;
            foreach ($where as $key => $value) {
                if ($key == "order by") {
                    //echo "True key=$key and ".($key=="order by");
                    $orderbyValue = $value;
                    $orderby = TRUE;
                } elseif ($key == "between") {
                    $wherestr .= " $value and";
                } else {
                    //$checkEmail = $this->isValidEmail($value);
                    if ($checkEmail) {
                        $wherestr .= " $key ='$value' and";
                    } else {
                        $explodable = explode('.', $value);

                        //print_r($explodable);
                        if (count($explodable) > 1) { //if column in for l.id=m.id
                            $wherestr .= " $key =$value and";
                        } else {
                            if ($value[0] == "!") { //not equal to expression
                                $wherestr .= " $key !='$value' and";
                            } else {
                                $wherestr .= " $key ='" . mysqli_real_escape_string($this->conn, $value) . "' and";
                            }
                        }
                    }
                }
            }

            $wherestr = substr($wherestr, 0, -3);
            if ($wherestr && strlen($wherestr) > 3) {
                $q .= " where " . $wherestr;
            }

            if ($orderby) {

                $q .= " order by $orderbyValue";
            }
        }


        $query = mysqli_query($this->conn, $q);
        // echo $q.'</br>';
        $result = array();
        if ($query) {
            while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                $result[] = $row;
            }
            /* if (count($result) == 1) {
              return $result[0];
              } else {
              return $result;
              } */
            return $result;
        } else {
            echo 'Erorr ' . mysqli_error($this->conn);
        }

        return FALSE;
    }

    
        //delete
}
