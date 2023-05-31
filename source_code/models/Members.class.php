<?php

class Members extends DB
{
    function getMembers()
    {
        $query = "SELECT * FROM members JOIN fandom on members.id_fandom=fandom.id_fandom order by members.id";
        return $this->execute($query);
    }

     function getMembersById($id)
    {
        $query = "SELECT * FROM members JOIN fandom on members.id_fandom=fandom.id_fandom WHERE id=$id";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $id_fandom = $data['id_fandom'];
        $join_date = $data['join_date'];

        $query = " INSERT INTO members VALUES ('', '$name', '$email', '$phone', '$join_date', '$id_fandom')";

        // Mengeksekusi query
        return $this->execute($query);
    }

     function delete($id)
    {

        $query = "delete FROM members WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function edit($id, $data)
    {
      
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $id_fandom = $data['id_fandom'];
        $join_date = $data['join_date'];
        
        $query = "update members set name='$name', email='$email', phone='$phone',join_date='$join_date', id_fandom='$id_fandom' where id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}

?>