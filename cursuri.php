<?php
include 'elements/header.php';
ini_set('display_errors', '1');
error_reporting(E_ALL);
include 'includes/simple_html_dom.php';
if(!isset($_SESSION['user']) && $_SESSION['user']['role_id'] !== '0'):
    header('Location: /');
endif;
set_time_limit(0);
ignore_user_abort();

/**
 * Aici inseamna ca are profesori, mai trebuie o functie care sa specifice daca n-are cursuri. V. jos
 * 
 * @author Matasaru Laurentiu
 */ 
function parse_and_insert($html, $domeniu, $semestru, $an, $link)
{
    $title = $html->find('h3[class=coursename]', 0)->first_child()->innertext;
    $link->query('INSERT INTO `cursuri` (name, domeniu, an, semestru) VALUES ("' . $link->escape_string($title) . '", "' . $domeniu . '", "' . $an . '", "'. $semestru .'");') or die(mysqli_error($link));
    flush();
    echo '<br /> >>>Adaug ' . $title . ' in baza de date';
    $curs_id = $link->insert_id;
    $teachers = $html->find('ul.teachers', 0)->find('li');
    foreach($teachers as $k=>$v)
    {
        // luam profii
        $nume = $v->find('a', 0)->innertext;
        // vezi daca gasesti prof cu numele $v->find('a', 0)->innertext;
        $prof_sql = 'SELECT * FROM users WHERE full_name="' . $link->escape_string($nume) . '";';
        $result = $link->query($prof_sql);
        $prof = $result->fetch_object();
        if($result->num_rows < 1)
        {
            $sql = 'INSERT INTO users SET username="' . strtolower(str_replace(' ', '_', $link->escape_string($nume))) . '", created=NOW(), updated=NOW(), role_id=1, password="' . md5(strtolower(str_replace(' ', '_', $nume)) . '_123456') . '", full_name="' . $link->escape_string($nume) . '"';
            $link->query($sql) or die($link->error);
            $result = $link->query($prof_sql);
            $prof = $result->fetch_object();
            $sql = 'INSERT INTO profii_curs set id_prof="' . $prof->id . '",' .
                ' id_curs="' . $curs_id . '",' .
                ' created=NOW(), updated=NOW()';
            $link->query($sql) or die($link->error);
        }
        else
        {
            // daca avem useri cu numele ala de mai sus.
            $sql = 'INSERT INTO profii_curs set id_prof="' . $prof->id . '",' .
                ' id_curs="' . $curs_id . '",' .
                ' created=NOW(), updated=NOW()';
            $link->query($sql) or die($link->error);
        }
    }
}

function parse_and_insert_two($html, $link, $domeniu, $an, $semestru)
{
    foreach($html->find('div[class=coursename]') as $element)
    {
        // nume curs
        $title = $element->find('a', 0)->innertext;
        $sql = 'SELECT * FROM cursuri WHERE name="' . $link->escape_string($title) . '";';
        $result = $link->query($sql);
        if($result->num_rows < 1)
        {
            $sql = 'INSERT INTO `cursuri` (name, domeniu, an, semestru) VALUES ("' . $link->escape_string($title) . '", "' . $domeniu . '", "'.$an.'", "'.$semestru.'");';
            $link->query($sql) or die($link->error);
            flush();
            echo '<br /> >>>Adaug ' . $title . ' in baza de date';
        }
    }
}

// take the links from a textbox

$htmlArray = array(
    'http://cs.curs.pub.ro/2014/course/index.php'
);

$html = null;

$licenta = array();
$master = array();

$insert = '';

$link->query('TRUNCATE TABLE cursuri');
$link->query('TRUNCATE TABLE profii_curs');

try {

foreach($htmlArray as $htm)
{
    $html = file_get_html($htm);
    foreach($html->find('div[class=info]') as $element)
    {
        // master sau licenta
        foreach($element->find('a') as $elem)
        {
            if($elem->innertext === 'Licenţă')
            {
                // adauga cursuri in domeniul licenta
                $html = file_get_html($elem->href);
                // ani
                foreach($html->find('div[class=info]') as $element)
                {
                    foreach($element->find('a') as $elem)
                    {
                        if($elem->innertext === 'Anul 1')
                        {
                            // array_push($licenta['domeniu']['an'], 1);
                            $html = file_get_html($elem->href);
                            // semestre
                            foreach($html->find('div[class=info]') as $element)
                            {
                                foreach($element->find('a') as $elem)
                                {
                                    if($elem->innertext === 'Semestrul 1')
                                    {
                                        $html1 = file_get_html($elem->href . '&perpage=100');
                                        // daca are pagini maresti limita cursurilor pe pagina
                                        foreach($html1->find('div[class=moreinfo]') as $element)
                                        {
                                            if($element->first_child() != NULL)
                                            {
                                                $html = file_get_html($element->first_child()->href);
                                                // luam titlul cursului
                                                parse_and_insert($html, 'licenta', '1', '1', $link);
                                            }
                                            else
                                            {
                                                parse_and_insert_two($html1, $link, 'licenta', '1', '1');
                                            }
                                        }
                                    }
                                    if($elem->innertext === 'Semestrul 2')
                                    {
                                        // daca are pagini?
                                        $html = file_get_html($elem->href);
                                        foreach($html->find('div[class=moreinfo]') as $element)
                                        {
                                            if($element->first_child() != NULL)
                                            {
                                                $html = file_get_html($element->first_child()->href);
                                                // luam titlul cursului
                                                parse_and_insert($html, 'licenta', '2', '1', $link);
                                            }
                                            else
                                            {
                                                parse_and_insert_two($html, $link, 'licenta', '1', '2');
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        if($elem->innertext === 'Anul 2')
                        {
                            $html = file_get_html($elem->href);
                            // semestre
                            foreach($html->find('div[class=info]') as $element)
                            {
                                foreach($element->find('a') as $elem)
                                {
                                    // echo $elem->innertext . '<br />';
                                    if($elem->innertext === 'Semestrul 1')
                                    {
                                        // daca are pagini?
                                        $html = file_get_html($elem->href . '&perpage=100');
                                        // daca are pagini maresti limita cursurilor pe pagina
                                        foreach($html->find('div[class=moreinfo]') as $element)
                                        {
                                            if($element->first_child() != NULL)
                                            {
                                                $html = file_get_html($element->first_child()->href);
                                                // luam titlul cursului
                                                parse_and_insert($html, 'licenta', '1', '2', $link);
                                            }
                                            else
                                            {
                                                parse_and_insert_two($html, $link, 'licenta', '2', '1');
                                            }
                                        }
                                    }
                                    if($elem->innertext === 'Semestrul 2')
                                    {
                                        // daca are pagini?
                                        $html = file_get_html($elem->href);
                                        foreach($html->find('div[class=moreinfo]') as $element)
                                        {
                                            if($element->first_child() != NULL)
                                            {
                                                $html = file_get_html($element->first_child()->href);
                                                // luam titlul cursului
                                                parse_and_insert($html, 'licenta', '2', '2', $link);
                                            }
                                            else
                                            {
                                                parse_and_insert_two($html, $link, 'licenta', '2', '2');
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        if($elem->innertext === 'Anul 3')
                        {
                            $html = file_get_html($elem->href);
                            // semestre
                            foreach($html->find('div[class=info]') as $element)
                            {
                                foreach($element->find('a') as $elem)
                                {
                                    // echo $elem->innertext . '<br />';
                                    if($elem->innertext === 'Semestrul 1')
                                    {
                                        // daca are pagini?
                                        $html = file_get_html($elem->href . '&perpage=100');
                                        // daca are pagini maresti limita cursurilor pe pagina
                                        foreach($html->find('div[class=moreinfo]') as $element)
                                        {
                                            if($element->first_child() != NULL)
                                            {
                                                $html = file_get_html($element->first_child()->href);
                                                // luam titlul cursului
                                                parse_and_insert($html, 'licenta', '1', '3', $link);
                                            }
                                            else
                                            {
                                                parse_and_insert_two($html, $link, 'licenta', '3', '1');
                                            }
                                        }
                                    }
                                    if($elem->innertext === 'Semestrul 2')
                                    {
                                        // daca are pagini?
                                        $html = file_get_html($elem->href);
                                        foreach($html->find('div[class=moreinfo]') as $element)
                                        {
                                            if($element->first_child() != NULL)
                                            {
                                                $html = file_get_html($element->first_child()->href);
                                                // luam titlul cursului
                                                parse_and_insert($html, 'licenta', '2', '3', $link);
                                            }
                                            else
                                            {
                                                parse_and_insert_two($html, $link, 'licenta', '3', '2');
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        if($elem->innertext === 'Anul 4')
                        {
                            $html = file_get_html($elem->href);
                            // semestre
                            foreach($html->find('div[class=info]') as $element)
                            {
                                foreach($element->find('a') as $elem)
                                {
                                    if($elem->innertext === 'Semestrul 1')
                                    {
                                        // daca are pagini?
                                        $html = file_get_html($elem->href . '&perpage=100');
                                        // daca are pagini maresti limita cursurilor pe pagina
                                        foreach($html->find('div[class=moreinfo]') as $element)
                                        {
                                            if($element->first_child() != NULL)
                                            {
                                                $html = file_get_html($element->first_child()->href);
                                                // luam titlul cursului
                                                parse_and_insert($html, 'licenta', '1', '4', $link);
                                            }
                                            else
                                            {
                                                parse_and_insert_two($html, $link, 'licenta', '4', '1');
                                            }
                                        }
                                    }
                                    if($elem->innertext === 'Semestrul 2')
                                    {
                                        // daca are pagini?
                                        $html = file_get_html($elem->href . '&perpage=100');
                                        foreach($html->find('div[class=moreinfo]') as $element)
                                        {
                                            if($element->first_child() != NULL)
                                            {
                                                $html = file_get_html($element->first_child()->href);
                                                // luam titlul cursului
                                                parse_and_insert($html, 'licenta', '2', '4', $link);
                                            }
                                            else
                                            {
                                                parse_and_insert_two($html, $link, 'licenta', '4', '2');
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            else
            {
                // adauga cursuri in domeniul master.
                $html = file_get_html($elem->href);
                // ani
                foreach($html->find('div[class=info]') as $element)
                {
                    foreach($element->find('a') as $elem)
                    {
                        if($elem->innertext === 'Anul 1')
                        {
                            $html = file_get_html($elem->href);
                            // semestre
                            foreach($html->find('div[class=info]') as $element)
                            {
                                foreach($element->find('a') as $elem)
                                {
                                    if($elem->innertext === 'Semestrul 1')
                                    {
                                        // daca are pagini?
                                        $html = file_get_html($elem->href . '&perpage=100');
                                        foreach($html->find('div[class=moreinfo]') as $element)
                                        {
                                            if($element->first_child() != NULL)
                                            {
                                                $html = file_get_html($element->first_child()->href);
                                                // luam titlul cursului
                                                parse_and_insert($html, 'master', '1', '1', $link);
                                            }
                                            else
                                            {
                                                parse_and_insert_two($html, $link, 'master', '1', '1');
                                            }
                                        }
                                    }
                                    if($elem->innertext === 'Semestrul 2')
                                    {
                                        // daca are pagini?
                                        $html = file_get_html($elem->href . '&perpage=100');
                                        foreach($html->find('div[class=moreinfo]') as $element)
                                        {
                                            if($element->first_child() != NULL)
                                            {
                                                $html = file_get_html($element->first_child()->href);
                                                // luam titlul cursului
                                                parse_and_insert($html, 'master', '2', '1', $link);
                                            }
                                            else
                                            {
                                                parse_and_insert_two($html, $link, 'master', '1', '2');
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        if($elem->innertext === 'Anul 2')
                        {
                            $html = file_get_html($elem->href);
                            // semestre
                            foreach($html->find('div[class=info]') as $element)
                            {
                                foreach($element->find('a') as $elem)
                                {
                                    if($elem->innertext === 'Semestrul 1')
                                    {
                                        // daca are pagini?
                                        $html = file_get_html($elem->href . '&perpage=100');
                                        foreach($html->find('div[class=moreinfo]') as $element)
                                        {
                                            if($element->first_child() != NULL)
                                            {
                                                $html = file_get_html($element->first_child()->href);
                                                // luam titlul cursului
                                                parse_and_insert($html, 'master', '1', '2', $link);
                                            }
                                            else
                                            {
                                                parse_and_insert_two($html, $link, 'master', '2', '1');
                                            }
                                        }
                                    }
                                    if($elem->innertext === 'Semestrul 2')
                                    {
                                        // daca are pagini?
                                        $html = file_get_html($elem->href . '&perpage=100');
                                        foreach($html->find('div[class=moreinfo]') as $element)
                                        {
                                            if($element->first_child() != NULL)
                                            {
                                                $html = file_get_html($element->first_child()->href);
                                                // luam titlul cursului
                                                parse_and_insert($html, 'master', '2', '2', $link);
                                            }
                                            else
                                            {
                                                parse_and_insert_two($html, $link, 'master', '2', '2');
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
}
catch(Exception $ex)
{
    var_dump($ex->getMessage());
}

include 'elements/footer.php';