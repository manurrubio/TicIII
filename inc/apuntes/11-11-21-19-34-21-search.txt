<?php include("inc/db.php")?>
<?php include("mod/header.php")?>

<br><br><br><br><br><br><br><br>

<div class="card mb-mb content">
        <h1 class="m-3" style="text-align:center;">Todos los apuntes</h1>

        <form style="text-align:center;" method="get" action="search.php">
            <label>
                Search
                <input type="text"name="keywords" autocomplete="off">
            </label>
            <select name="field">
                <option value="nombre">nombre</option>
                <option value="materia">materia</option>
                <option value="ci_estudiante">ci_estudiante</option>
                <option value="descripcion">descripcion</option>
            </select>

            <input type="submit" value="Search"><br>
        </form>

        <div class ="card-body" style="align-self: center;">
                <div class="card-body" style="align-items:center"> 
        <?php     
                if(isset($_GET['keywords']) && isset($_GET['field'])) {
                    $keywords = $_GET['keywords'];
                    $query="SELECT * from apuntes WHERE ". $_GET['field'] ." like '%{$keywords}%'" ;
                    $result = mysqli_query($conn, $query);
                  }
           
             while($row = mysqli_fetch_array($result)){
                                    
                                
                                    ?>
                                    <?php
                                    echo "<br>";
                                    ?> 
                                    <div class="column">
                                    <div class="col-md-3">
                                        <h4><?php echo $row['nombre']?></h4>
                                        <h5><?php echo $row['materia']?></h5>
                                    </div>
                                    <?php
                                        $ci_estudiante= $row['ci_estudiante'];
                                        $query2 = "SELECT * from usuarios where ci = $ci_estudiante";
                                        $resultUser = mysqli_query($conn, $query2);
                                        $rowUser = mysqli_fetch_array($resultUser);
                                    ?>
                                    <div class="image-logo">
                                    <h6>
                                    <img src="<?php echo "inc/logos/arrow.jpg"?>" >
                                    <?php echo $rowUser['nombre']?></h6>
                                    </div>
                                    <div class="other">
                                    <?php echo $row['descripcion']?>
                                    </div>
                                    <div class="other">
                                    <?php 
                                        $archivo= $row['archivo'];
                                        
                                        $ruta = "inc/". $archivo ;
                                    ?>
                            
                                    
                                    
                                    <a href="<?php echo $ruta ?>">Abrir apunte</a>
                                    <div>
                                    <?php

                                    $name = $ruta;
                                    $parts = explode('.', $name);
                                    $extension = array_pop($parts);
                                    if( $extension == 'pdf'){
                                        $logo= "inc/logos/pdfLogo.jpg";
                                    }
                                    else if( $extension == 'docx'){
                                        $logo= "inc/logos/wordLogo.jpg";
                                    }
                                    else{
                                        $logo= "inc/logos/fileLogo.jpg";
                                    }
                                    
                                    ?>
                                    
                                    </div>
                                    <div class="image-logo"style="align-self: right;" >
                                    <img src="<?php echo $logo?>" >
                                    </div>
                                    </div> 
                                      
                                    <?php
                                    echo "<br>";
                                    ?>                      
                                    <?php
                                    
                                }
                            
                            
                            ?>

</div>
</div>
</div>
<script type="text/javascript">
    window.addEventListener("scroll",function(){
        var header=document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY >0);
    })</script>