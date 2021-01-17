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
        if (empty($user['name']) or empty($user['email']) or empty($user['password'])) {
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

    public function getLoggedUser()
    {
        return $_SESSION['name'];
    }

    public function changePassword($user, $db1)
    {
        //zisti či všetky data sú vyplnene
        //zistiť či staré heslo je platné
        //či nové hesla sú zhodné
        if (empty($user['password']) or empty($user['cpassword']) or empty($user['npassword'])) {
            return 'missing_fields';
        } elseif ($user['cpassword'] !== $user['npassword']) {
            return 'mismatch_password';
        } elseif (!$this->checkOldPassword($user['password'], $db1)) {
            return 'incorrect_old';
        }
        $sql = "UPDATE `users` SET `password`=? WHERE `users_ID`=?";
        $statement = $db1->prepare($sql);

        if (is_object($statement)) {
            $hash = password_hash($user['npassword'], PASSWORD_DEFAULT);
            $statement->bindParam(1, $hash, PDO::PARAM_STR);
            $statement->bindParam(2, $_SESSION['logged_in']['id'], PDO::PARAM_STR);
            $statement->execute();

            if ($statement->rowCount() == 1) {
                return 'success';
            }
            return 'error';
        }
    }

    public function checkOldPassword($password, $db1)
    {
        $sql = "SELECT * FROM `users` WHERE `users_ID`=?";
        $statement = $db1->prepare($sql);

        if (is_object($statement)) {

            $statement->bindParam(1, $_SESSION['logged_in']['id'], PDO::PARAM_INT);
            $statement->execute();

            if ($row = $statement->fetch(PDO::FETCH_OBJ)) {
                if (password_verify($password, $row->password)) {
                    return true;
                }
            }
        }
        return false;
    }
}


$user = new User;

