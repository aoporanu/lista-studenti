<?php
require_once 'elements/header.php';
?>

<?php

    $name_err = '';
    $nume = '';
	if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST['nume']))
        {
            $name_err = 'Trebuie sa introduci numele grupei';
        }
        else
        {
            $nume = test_input($_POST['nume'], $link);
            if($nume == 'exista')
        	{
        		$name_err = 'O sala cu numele acesta exista deja in baza de date';
        	}
        }
        
        if(empty($name_err))
        {
            $sql = 'INSERT INTO grupe SET nume="' . $link->escape_string($nume) . '"';
            if($result = $link->query($sql))
			{
				$message = '<div class="alert alert-success">Grupa ' . $nume . ' a fost adaugata.</div>';
			}
            else
            {
                $message = '<div class="alert alert-danger">Nu s-a putut salva grupa '.$nume.'.</div>';
            }
        }
    }
    
    function test_input($data, $link='') {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        if($link !== '')
        {
        	$sql = 'SELECT * FROM grupe WHERE nume="' . $data . '" LIMIT 1';
        	if($result = $link->query($sql))
        	{
        		if($result->num_rows === 1)
        		{
        			return 'exista';
        			
        		}
        		else
	        	{
	        		return $data;
	        	}
        	}
        	
        }
        else
        {
        	return $data;
        }
        
    }
?>

<?php if(!empty($message)) {
    echo $message;
}
?>
<div class="col-md-9 col-xs-12 center-block">
    <form action="" method="post" class="form form-horizontal">
    <legend>Adaugare grupa.</legend>
    <div class="form-group">
        <label class="col-md-2 control-label" for="nume">Nume grupa</label>
        <div class="col-md-8">
            <input type="text" id="nume" name="nume" class="form-control" value="<?php echo isset($_POST['nume']) ? $_POST['nume'] : ''; ?>" autocomplete="off" />
            <?php if(!empty($nume_err)): ?>
                <div class="alert alert-danger">
                    <?php echo $nume_err; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-2">
            
        </div>
        <div class="col-md-8">
            <input type="submit" value="Adauga grupa" class="btn btn-success pull-right" />
        </div>
    </div>
</form>
</div>


<?php
require_once 'elements/footer.php';