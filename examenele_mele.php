<?php include 'elements/header.php'; ?>

    <div class="container">
        <div class="row">
            <div class="well">
                <?php
                $sql = 'SELECT
    grupe_curs.id_curs,
    cursuri.id,
    cursuri.name,
    examene.data,
    examene.ora,
    examene.id as eid,
    users.id,
    users.grupa,
    grupe_curs.grupa,
    examene.id_curs
FROM
    cursuri
        LEFT JOIN
    grupe_curs ON grupe_curs.id_curs = cursuri.id
        LEFT JOIN
    examene ON examene.id_curs = cursuri.id
        LEFT JOIN
    users ON grupe_curs.grupa = users.grupa
WHERE
    users.id = "'.$_SESSION['user']['user_id'].'"
GROUP BY cursuri.name';

                $result = $link->query($sql);

                while ($curs = $result->fetch_object()) {
                    echo '<pre>';
                    var_dump($curs);
                    echo '</pre>';
                    echo '<div class="well"><div class="col-md-4">';
                    echo $curs->name;
                    echo '</div>';
                    echo '<div class="col-md-4">';
                    echo $curs->data . ' ' . $curs->ora;
                    echo '</div><div class="col-md-4">'; ?>
                    <a href="preferinte_student.php?examen_id=<?php echo $curs->eid; ?>" class="btn btn-default">Observatii</a>
                    <?php echo '</div></div>';
                }
                ?>
            </div>
        </div>
    </div>

<?php include 'elements/footer.php'; ?>