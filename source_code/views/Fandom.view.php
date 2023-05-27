<?php

class FandomView
{
    public function render($data)
    {
        $dataFandom = null;

        $no = 0; 
        
        $header = "<tr>
            <th> No </th>
            <th> Nama Fandom </th>
            <th> Tahun Bendiri </th>
            <th> Grup Idola </th>
            <th> Action </th>
            </tr>";

        foreach ($data as $val) {
            $dataFandom .=
                '<tr>
            <th scope="row">' . ++$no . '</th>
            <td>' . $val['nama_fandom'] . '</td>
            <td>' . $val['tahun_dibentuk'] . '</td>
            <td>' . $val['grup_idola'] . '</td>
            <td style="font-size: 22px;">
            <a href="formFandom.php?id=' . $val['id_fandom'] . '"><button type="button" class="btn btn-warning text-white">Edit</button></a>
            <a href="fandom.php?hapus=' . $val['id_fandom'] . '"><button type="button" class="btn btn-danger">Delete</button></a>
            </td>
            </tr>';
        }

        $view = new Template("templates/index.html");

        $view->replace("DATA_HEADER", $header);
        $view->replace("DATA_LINK", "formFandom.php");
        $view->replace("TITLE_TABLE", "Fandom");
        $view->replace("DATA_TABLE", $dataFandom);
        $view->write();
    }
}