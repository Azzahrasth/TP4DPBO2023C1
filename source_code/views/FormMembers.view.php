<?php

class FormMembersView
{
    public function render($dataFandom) 
    {
        
        $dataOption = '<option value="">Pilih Fandom</option>';
        foreach ($dataFandom as $temp) {
            $dataOption .= '<option value="' . $temp['id_fandom'] . '">' . $temp['nama_fandom'] . '</option>';
        }
        
        $dataForm = null;
        $dataForm = '<label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>
            
            <label for="join_date">Join Date:</label>
            <input type="date" id="join_date" name="join_date" required>
            
            <label for="id_fandom">Fandom:</label>
            <select id="id_fandom" name="id_fandom" >' . $dataOption .
            '</select>
            <button type="submit" class="btn btn-info text-white" name="btn-submit" id="btn-submit">Submit</button>';


        $view = new Template("templates/form.html");
        $view->replace("DATA_LINK", "formMembers.php");
        $view->replace("TITLE_TABLE", "Member");
        $view->replace("ACTION", "Add");
        $view->replace("DATA_FORM", $dataForm);
        $view->write();
    }

    public function render1($dataMember, $dataFandom)
    {
        // buat option untuk select
        $dataOption = null;
        foreach ($dataFandom as $temp) {
            if ($temp['id_fandom'] == $dataMember[0]['id_fandom']) {
                $dataOption .= '<option value="' . $temp['id_fandom'] . '" selected>' . $temp['nama_fandom'] . '</option>';
            } else {
                $dataOption .= '<option value="' . $temp['id_fandom'] . '">' . $temp['nama_fandom'] . '</option>';
            }
        }

        
        $dataForm = null;
        $dataForm = '<label for="name">Nama:</label>
            <input type="hidden" name="id" value="' . $dataMember[0]['id'] . '" >
            <input type="text" id="name" name="name" value="' . $dataMember[0]['name'] . '" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="' . $dataMember[0]['email'] . '" required>
            
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone"  value="' . $dataMember[0]['phone'] . '" required>
            
            <label for="join_date">Join Date:</label>
            <input type="date" id="join_date" name="join_date"  value="' . $dataMember[0]['join_date'] . '" required>

            <label for="id_fandom">Fandom:</label>
            <select id="id_fandom" name="id_fandom" required>' . $dataOption .
            '</select>
            
            <button type="submit" class="btn btn-info text-white" name="btn-edit" id="btn-submit">Edit</button>';

        $view = new Template("templates/form.html");
        $view->replace("DATA_LINK", "formMembers.php");
        $view->replace("TITLE_TABLE", "Member");
        $view->replace("ACTION", "Edit");
        $view->replace("DATA_FORM", $dataForm);
        $view->write();
    }
}