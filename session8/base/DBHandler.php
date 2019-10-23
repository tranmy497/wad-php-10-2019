<?php

class DBHandler
{
    private const SERVER = 'localhost';
    private const USERNAME = 'root';
    private const PASSWORD = '123123';
    private const DATABASE = 'wad_php_1019';

    protected static $handler;

    protected $connection;

    public function __construct()
    {
        $this->connect();
    }

    public static function initialize()
    {
        if (!self::$handler) {
            self::$handler = new DBHandler();
        }
        return self::$handler;
    }

    public function connect()
    {
        $this->connection = mysqli_connect(self::SERVER, self::USERNAME, self::PASSWORD, self::DATABASE);
        mysqli_set_charset($this->connection, 'utf8');

        if (mysqli_connect_errno()) {
            die('Failed to connect to MySQL: ' . mysqli_connect_error());
        }
    }

    public function list(string $table)
    {
        $result = [];
        $sql = "SELECT * FROM $table";
        $data = mysqli_query($this->connection, $sql);

        if ($data->num_rows == 0) {
            $result = [];
        } else {
            while ($row = $data->fetch_assoc()) {
                $result[] = (object)$row;
            }
        }

        return $result;
    }

    public function create(string $table, array $data): bool
    {
        $data['created'] = date('Y-m-d H:i:s');
        $data['updated'] = date('Y-m-d H:i:s');

        $keys = array_keys($data);
        $values = array_values($data);
        $sql = "INSERT INTO $table(".implode(',', $keys).") VALUES('".implode('\',\'', $values)."')";

        return mysqli_query($this->connection, $sql);
    }

    public function show(string $table, int $id): ?stdClass
    {
        $sql = "SELECT * FROM $table WHERE id = $id";
        $data = mysqli_query($this->connection, $sql);

        return $data->num_rows == 0 ? null : (object)$data->fetch_assoc();
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM products WHERE id = $id";

        return mysqli_query($this->connection, $sql);
    }
}
