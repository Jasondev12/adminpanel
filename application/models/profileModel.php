<?php

class ProfileModel extends Database
{

    public function updateProfilePicture($pictureName)
    {

        $id = $this->get_session('userId');
        if ($this->Update("users", ['image' => $pictureName], ['id' => $id])) {
            return true;
        } else {
            return false;
        }
    }

    public function updatepassword($currentPassword, $newPassword)
    {

        $id = $this->get_session('userId');

        if ($this->Select_Where("users", ['id' => $id])) {
            if ($this->Count() > 0) {
                $row = $this->Row();
                $dbPassword = $row->password;
                if (password_verify($currentPassword, $dbPassword)) {
                    if ($this->update("users", ['password' => $newPassword], ['id' => $id])) {
                        return "success";
                    }
                } else {
                    return "currentPasswordWrong";
                }
            }
        }
    }

    public function changeName($fullName)
    {
        $id = $this->get_session('userId');
        if ($this->Update("users", ['fullName' => $fullName], ['id' => $id])) {
            return true;
        } else {
            return false;
        }

    }
}
