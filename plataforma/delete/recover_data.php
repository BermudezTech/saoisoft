<?php 
echo "<h1>En cuanto la pagina cargue por completo, de click <a href='../'>aqui</a></h1>";
function SplitSQL($file, $delimiter = ';')
{
    $conexion=new PDO("mysql:host=localhost;dbname=saoisoft","root","");
    $conexion->exec('set names utf8');
    set_time_limit(0);

    if (is_file($file) === true)
    {
        $file = fopen($file, 'r');

        if (is_resource($file) === true)
        {
            $query = array();

            while (feof($file) === false)
            {
                $query[] = fgets($file);

                if (preg_match('~' . preg_quote($delimiter, '~') . '\s*$~iS', end($query)) === 1)
                {
                    $query = trim(implode('', $query));
                    echo $query;
                    $sq = $conexion -> prepare($query);
                    $sq -> execute();

                    while (ob_get_level() > 0)
                    {
                        ob_end_flush();
                    }

                    flush();
                }

                if (is_string($query) === true)
                {
                    $query = array();
                }
            }

            return fclose($file);
        }
    }

    return false;
}

 ?>

<?php 

SplitSQL("../saoisoft.sql");
	
?>