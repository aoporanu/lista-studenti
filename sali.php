<?php
require_once 'elements/header.php';
require_once 'includes/paginate.class.php';

$sql = 'SELECT * FROM sali';
$paginate = new Paginate($link, $sql);
$r = $paginate->get_results();
?>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Nume</th>
        <th>Capacitate</th>
    </tr>
<?php while($message = $r->fetch_object())
{ ?>
    <tr>
        <td><?php echo $message->id ?></td>
        <td><?php echo $message->nume ?></td>
        <td><?php echo $message->capacitate ?></td>
    </tr>
<?php } ?>
</table>
<div class="clearfix"></div>
<?php echo $paginate->show_pages();  

require_once 'elements/footer.php';