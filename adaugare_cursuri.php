<?php require_once 'elements/header.php';
require_once 'includes/paginate.class.php';
    if($_SESSION['user']['role_id'] !== '1')
    {
        header('Location: /');
    }
    
    if(isset($_GET['curs_id']))
    {
        $sql = 'SELECT * FROM profii_curs WHERE id_curs="' . $link->escape_string($_GET['curs_id']) . '" AND id_prof="' . $link->escape_string($_SESSION['user']['user_id']) . '";';
        if($result = $link->query($sql))
        {
            if($result->num_rows > 0)
            {
                echo '<div class="alert alert-danger">Sunteti deja profesor la acest curs.</div>';
            }
            else
            {
                $sql = 'INSERT INTO profii_curs SET id_prof="' . $link->escape_string($_SESSION['user']['user_id']) . '", id_curs="' . $link->escape_string($_GET['curs_id']) . '", created=NOW(), updated=NOW();';
                if($result = $link->query($sql))
                {
                    echo '<div class="alert alert-success">Cursul a fost adaugat in arhiva de cursuri.</div>';
                }
            }
        }
    }

require_once 'elements/footer.php';