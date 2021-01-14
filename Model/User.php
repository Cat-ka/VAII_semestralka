<?php

class User
{
    public function login($user, $db1)
    {
        if (empty($user['email']) or empty($user['password'])) {
            return 'missing_fields';
        }
        $sql = "SELECT * FROM `users` WHERE `email`=?";
        $statement = $db1->prepare($sql);

        if (is_object($statement)) {
            $statement->bindParam(1, $user['email'], PDO::PARAM_STR);
            $statement->execute();

            if ($row = $statement->fetch(PDO::FETCH_OBJ)) {
                if (password_verify($user['password'], $row->password)) {
                    $_SESSION['logged_in'] = [
                        'id' => $row->users_ID,
                        'name' => $row->name,
                    ];
                    return 'success';
                }
            }
        }
        return 'error';
    }

    public function signup($user, $db1)
    {
        //či je email zadaný
        //zhoda hesiel
        //všetky polia vyplnené
        if (empty($user['name']) OR empty($user['email']) OR empty($user['password'])) {
            return 'missing_fields';

        } elseif ($user['password'] !== $user['cpassword']) {
            return 'mismatch_password';
        } elseif ($this->emailExists($user['email'], $db1)) {
            return 'email_exists';
        } else {
            $sql = "INSERT INTO `users`(`name`, `email`, `password`, `verification_code`) VALUES(?,?,?,?)";
            $statement = $db1->prepare($sql);

            if (is_object($statement)) {
                $hash = password_hash($user['password'], PASSWORD_DEFAULT);
                $code = generateCode();

                $statement->bindParam(1, $user['name'], PDO::PARAM_STR);
                $statement->bindParam(2, $user['email'], PDO::PARAM_STR);
                $statement->bindParam(3, $hash, PDO::PARAM_STR);
                $statement->bindParam(4, $code, PDO::PARAM_STR);
                $statement->execute();

                if ($statement->rowCount()) {
                    return 'success';
                }
            }

        }
        return 'error';
    }

    private function emailExists($email, $db1)
    {
        $sql = "SELECT * FROM `users` WHERE email=?";
        $statement = $db1->prepare($sql);

        if (is_object($statement)) {
            $statement->bindParam(1, $email, PDO::PARAM_STR);
            $statement->execute();

            if ($row = $statement->fetch(PDO::FETCH_OBJ)) {
                return true;
            }
        }
        return false;
    }
}

$user = new User;

