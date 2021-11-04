
<?php include("inc/db.php")?>
<?php include("mod/header.php")?>

<br><br><br><br><br><br><br><br>
   
   
        <div class="card mb-mb content">
            <h1 class="m-3">Todos los apuntes</h1>
            <div class ="card-body">
                <div class="column">
                <?php 
                            
                            $query = "SELECT * from apuntes ";
                            $result = mysqli_query($conn, $query);
                            if($result){
                                while($row = mysqli_fetch_array($result)){
                                
                                    ?>
                                    <p>
                                    <div class="row">
                                    <div class="col-md-3">
                                        <h5><?php echo $row['nombre']?></h5>
                                    </div>
                                    <?php
                                        $ci_estudiante= $row['ci_estudiante'];
                                        $query2 = "SELECT * from usuarios where ci = $ci_estudiante";
                                        $resultUser = mysqli_query($conn, $query2);
                                        $rowUser = mysqli_fetch_array($resultUser);
                                    ?>
                                    <div>
                                    <h6><?php echo $rowUser['nombre']?></h6>
                                    </div>
                                    <div class="col-md text-secondary">
                                    <?php echo $row['descripcion']?>
                                    </div>
                                    <div class="col-md text-secondary">
                                    <?php 
                                        $archivo= $row['archivo'];
                                        echo $archivo;
                                        $ruta = "/inc". $archivo ;
                                    ?>
                            
                                    
                                    
                                    <a href="<?php echo $ruta ?>">Abrir apunte</a>
                                    <div>
                                    <?php
                                    $file_parts = pathinfo($ruta);

                                    switch($file_parts['extension'])
                                    {
                                        case "pdf":
                                        $logo= "inc\logos\pdfLogo.png";

                                        case "docx":
                                        $logo= "inc\logos\wordLogo.png";

                                        default:
                                        $logo= "inc\logos\fileLogo.png";
                                    }
                                    ?>
                                    <img src="$logo" >

                                    </div>
                                    
                                    </div> 
                                    </p>                           
                                    <?php
                                    
                                }
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
