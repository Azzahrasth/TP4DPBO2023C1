<?php

class MembersView
{
    public function render($data)
    {
        $dataMember = null;
        
        $no = 0; 
        $header = "<tr>
        <th> No </th>
                <th> Nama </th>
                <th> Email </th>
                <th> Phone </th>
                <th> Join Date </th>
                <th> Fandom </th>
                <th> Action </th>
                </tr>";

        foreach ($data as $val) {
            $dataMember .=
                '<tr>
                <th scope="row">' . ++$no . '</th>
                <td>' . $val['name'] . '</td>
                <td>' . $val['email'] . '</td>
                <td>' . $val['phone'] . '</td>
                <td>' . $val['join_date'] . '</td>
                <td>' . $val['nama_fandom'] . '</td>
                <td style="font-size: 22px;">
                <a href="formMembers.php?id=' . $val['id'] . '"><button type="button" class="btn btn-warning text-white">Edit</button></a>
                <a href="index.php?hapus=' . $val['id'] . '"><button type="button" class="btn btn-danger">Delete</button></a>
                </td>
                </tr>';
        }


        $view = new Template("templates/index.html");

        $view->replace("DATA_HEADER", $header);
        $view->replace("DATA_LINK", "formMembers.php");
        $view->replace("TITLE_TABLE", "Member");
        $view->replace("DATA_TABLE", $dataMember);
        $view->write();
    }
}