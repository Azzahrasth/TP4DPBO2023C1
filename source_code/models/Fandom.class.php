<?php

class Fandom extends DB
{
    function getFandom()
    {
        $query = "SELECT * FROM fandom";
        return $this->execute($query);
    }

    function getFandomById($id)
    {
        $query = "SELECT * FROM fandom WHERE id_fandom='$id'";
        return $this->execute($query);
    }

    function add($data)
    {
        $nama_fandom = $data['nama_fandom'];
        $tahun_dibentuk = $data['tahun_dibentuk'];
        $grup_idola = $data['grup_idola'];

        $query = "insert into fandom values ('', '$nama_fandom', '$tahun_dibentuk', '$grup_idola')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM fandom WHERE id_fandom = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function edit($id, $data)
    {
        $nama_fandom = $data['nama_fandom'];
        $tahun_dibentuk = $data['tahun_dibentuk'];
        $grup_idola = $data['grup_idola'];
      
        $query = "update fandom set nama_fandom='$nama_fandom', tahun_dibentuk='$tahun_dibentuk', grup_idola='$grup_idola' where id_fandom='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
