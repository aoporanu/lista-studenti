<ul class="meniu">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Licenta <span class="caret"></span></a>
        <?php
            $sql = "SELECT DISTINCT an FROM cursuri WHERE domeniu='licenta'";
            $result = $link->query($sql);
            if($result = $link->query($sql))
            {
                ?>
                <ul class="dropdown-menu" role="menu">
                    <?php while($an = $result->fetch_object())
                    { ?>
                        <li class="dropdown"><a href="index.php?domeniu=licenta&an=<?php echo $an->an; ?>"><?php echo $an->an; ?></a></li>
                    <?php } ?>
                </ul>
            <?php }
        ?>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Master <span class="caret"></span></a>
        <?php
            $sql = "SELECT DISTINCT an FROM cursuri WHERE domeniu='master'";
            $result = $link->query($sql);
            if($result = $link->query($sql))
            {
                ?>
                <ul class="dropdown-menu" role="menu">
                    <?php while($an = $result->fetch_object())
                    { ?>
                        <li><a href="index.php?domeniu=master&an=<?php echo $an->an; ?>"><?php echo $an->an; ?></a></li>
                    <?php } ?>
                </ul>
            <?php }
        ?>
    </li>
</ul>
<?php
?>