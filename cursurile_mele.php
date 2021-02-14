<?php
require_once 'elements/header.php';
if($_SESSION['user']['role_id'] !== '1')
{
    header('Location: /');
}
$sql = 'SELECT
	cursuri.id as curs_id,
    cursuri.name as c_name,
    examene.id AS examen_id,
    cursuri.semestru,
    cursuri.an,
    cursuri.domeniu,
    grupe_curs.id_curs
FROM c9.profii_curs
	LEFT JOIN cursuri ON cursuri.id=profii_curs.id_curs
    LEFT JOIN examene ON examene.id_curs=cursuri.id
    LEFT JOIN preferinte_student ON preferinte_student.examen_id=examene.id
    LEFT JOIN grupe_curs ON grupe_curs.id_curs=cursuri.id
WHERE profii_curs.id_prof="' . $_SESSION['user']['user_id'] . '"';

if( $cursuri = $link->query($sql) )
{?>
    <table class="table table-responsive table-sthiped">
        <thead>
            <tr>
                <th>ID Curs</th>
                <th>Domeniu</th>
                <th>Denumire</th>
                <th>An</th>
                <th>Semestru</th>
                <th>Actiuni</th>
            </tr>
        </thead>
    <?php while($obj = $cursuri->fetch_object())
    {
        echo '<tr><td>';
        echo $obj->curs_id;
        echo '</td><td>';
        echo $obj->domeniu;
        echo '</td><td>';
        echo $obj->c_name;
        echo '</td><td>';
        echo $obj->an;
        echo '</td><td>';
        echo $obj->semestru;
        echo '</td><td>'; 
        // daca sunt setate preferintele, atunci putem genera un examen.
        $sql1 = 'SELECT * FROM grupe_curs WHERE id_curs="' . $obj->curs_id . '";';
        $result = $link->query($sql1);
        $grupe = array();
        while($grupa = $result->fetch_object())
        {
            array_push($grupe, $grupa->grupa);
        }
        if(count($grupe) > 0): ?>
            <?php $grupeStr = implode(',', $grupe); ?>
            <a href="setare_examen.php?curs_id=<?php echo $obj->curs_id ?>&grupe=<?php echo $grupeStr; ?>" class="btn btn-success">Setare examen</a>
            <?php endif;
        if($obj->data != NULL && $obj->ora != NULL)
        { ?>
            <a href="preferinte_studenti.php?examen_id=<?php echo $obj->examen_id; ?>">Preferinte studenti</a>
        <?php }
        ?>
        <a href="delete.php?curs_id=<?php echo $obj->curs_id ?>" class="btn btn-danger">Stergere</a>
        <a href="preferinte.php?curs_id=<?php echo $obj->curs_id ?>" class="btn btn-warning">Preferinte</a>
        
        <?php echo'</td></tr>';
    } ?>
    </table>
<?php }
else
{
    echo '<div class="alert alert-warning">Nu aveti nici un curs</div>';
}
?>

<?php require_once 'elements/footer.php'; ?>
