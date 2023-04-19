<?php

namespace UserRepository;

class UserRepositoryImpl
{
    private \PDO $connection;
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function verify($user, $password): bool
    {
        $sql = "SELECT user, password FROM users WHERE user = ? AND password = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$user, $password]);

        foreach ($statement as $key => $value) {
            // echo "User: " . $value['user'] . " Password: " . $value['password']; // User: doni Password: doni
            if ($user == $value['user'] && $password == $value['password']) {
                return true;
            }
        }
        return false;
    }
}
