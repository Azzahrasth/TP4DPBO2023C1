<?php

class FormFandomView
{
    public function render() 
    {
       
        $dataForm = null;
        $dataForm = 
            '<label for="nama_fandom">Nama Fandom:</label>
            <input type="text" id="nama_fandom" name="nama_fandom" required>

            <label for="tahun_dibentuk">Tahun Berdiri:</label>
            <input type="text" id="tahun_dibentuk" name="tahun_dibentuk" required>
            
            <label for="grup_idola">Grup Idola:</label>
            <input type="text" id="grup_idola" name="grup_idola" required>
            
            <button type="submit" class="btn btn-info text-white" name="btn-submit" id="btn-submit">Submit</button>';



        $view = new Template("templates/form.html");
        $view->replace("DATA_LINK", "formFandom.php");
        $view->replace("TITLE_TABLE", "Fandom");
        $view->replace("ACTION", "Add");
        $view->replace("DATA_FORM", $dataForm);
        $view->write();
    }

    public function render1($dataFandom)
    {
       
        $dataForm = null;
        $dataForm = 
            '<input type="hidden" name="id_fandom" value="' . $dataFandom[0]['id_fandom'] . '" >
            <label for="nama_fandom">Nama Fandom:</label>
            <input type="text" id="nama_fandom" name="nama_fandom" value="' . $dataFandom[0]['nama_fandom'] . '" required>
            
            <label for="tahun_dibentuk">Tahun Berdiri:</label>
            <input type="text" id="tahun_dibentuk" name="tahun_dibentuk" value="' . $dataFandom[0]['tahun_dibentuk'] . '" required>
            
            <label for="grup_idola">Grup Idola:</label>
            <input type="text" id="grup_idola" name="grup_idola" value="' . $dataFandom[0]['grup_idola'] . '" required>
            
            <button type="submit" class="btn btn-info text-white" name="btn-edit" id="btn-submit">Edit</button>';

        $view = new Template("templates/form.html");
        $view->replace("DATA_LINK", "formFandom.php");
        $view->replace("TITLE_TABLE", "Fandom");
        $view->replace("ACTION", "Edit");
        $view->replace("DATA_FORM", $dataForm);
        $view->write();
    }
}