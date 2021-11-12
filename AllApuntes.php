
<?php include("inc/db.php")?>
<?php include("mod/header.php")?>

<br><br><br><br><br><br><br><br>
   
    <body>
        <div class="card mb-mb content">
            <h1 class="m-3" style="text-align:center;">Todos los apuntes</h1>

            <form style="text-align:center;" method="get" action="AllApuntes.php">
                <label>
                    Buscar
                    <input type="text"name="keywords" autocomplete="off">
                </label>
                <select name="field">
                    <option value="nombre">nombre</option>
                    <option value="materia">materia</option>
                    <option value="ci_estudiante">ci_estudiante</option>
                    <option value="descripcion">descripcion</option>
                </select>

                <input type="submit" value="Buscar"><br>
            </form>
            
            


            <div class ="card-body" style="align-self: center;">
                <div class="card-body" style="align-items:center"> 
                <?php 
                            
                            if(isset($_GET['keywords']) && isset($_GET['field'])) {
                                $keywords = $_GET['keywords'];
                                $query="SELECT * from apuntes WHERE ". $_GET['field'] ." like '%{$keywords}%'" ;
                                $result = mysqli_query($conn, $query);
                            }else{
                                $query = "SELECT * from apuntes ";
                                       
                                $result = mysqli_query($conn, $query);
                            }
                            
                            
                            if($result){
                                while($row = mysqli_fetch_array($result)){
                                    
                                
                                    ?>
                                    <?php
                                    echo "<br>";
                                    ?> 
                                    <div class="container">
                                    <div class="col">
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
                                    <img src="<?php echo "inc/logos/arrow.jpg"?>"} >
                                    <?php echo $rowUser['nombre']?></h6>
                                    <h8 style="align-items: center;"><?php echo "ci: ". $rowUser['ci']?></h8>
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
                                    <img src="<?php echo $logo?>"} >
                                    </div>
                                    </div> 
                                      
                                    <?php
                                    echo "<br>";
                                    ?>
                                    </div>                      
                                    <?php
                                    
                                }
                            }
                            $result=null;
                            ?>
                    
                </div>
            
        </div>      

        </body>
<style type="text/css">
    div.card-body{
        background-image: none;
        background-color: transparent;
        border-color: transparent;
    }
    div.card{
        background-color: transparent;
        
    }
    body{
    background-image: url(./img/apunteback.jpg)  ;
    background-size: cover;
    background-attachment: fixed;
    border-color: transparent;
    
    }

    .other a{
        text-decoration: none;
        color: #b12a5b;
    }
    .container {
    border-top-left-radius: 37px 140px;
    border-top-right-radius: 23px 130px;
    border-bottom-left-radius: 110px 19px;
    border-bottom-right-radius: 120px 24px;

    display: block;
    position: relative;
    border: solid 3px #6e7491;
    padding: 40px 60px;
    max-width: 800px;
    width: 100%;
    margin: 100px auto 0;
    font-size: 17px;
    line-height: 28px;
    transform: rotate(-1deg);
    box-shadow: 3px 15px 8px -10px rgba(0, 0, 0, 0.3);
    transition: all 0.13s ease-in;

    background-color: white;
    }

    .container:hover {
    transform: translateY(-10px) rotate(1deg);
    box-shadow: 3px 15px 8px -10px rgba(0, 0, 0, 0.3);
    }

    .container:hover .border {
    transform: translateY(4px) rotate(-5deg);
    }

    .border {
    position: absolute;
    transition: all 0.13s ease-in;
    }

    .border:before,
    .border:after {
    color: #515d9c;
    font-size: 15px;
    position: absolute;
    }

    .tl {
    position: absolute;
    left: -50px;
    top: -63px;
    font-weight: 600;
    }

    .tl:before {
    content: "37px";
    left: 120px;
    top: 30px;
    }

    .tl:after {
    content: "140px";
    left: 0px;
    top: 80px;
    }

    .tr {
    right: -50px;
    top: -63px;
    font-weight: 600;
    }

    .tr:before {
    content: "23px";
    left: 0;
    top: 30px;
    }

    .tr:after {
    content: "130px";
    left: 130px;
    top: 80px;
    }

    .bl {
    left: -50px;
    bottom: -71px;
    font-weight: 600;
    }

    .bl:before {
    content: "110px";
    left: 120px;
    top: -30px;
    }

    .bl:after {
    content: "19px";
    left: 0px;
    top: -90px;
    }

    .br {
    right: -50px;
    bottom: -63px;
    font-weight: 600;
    }

    .br:before {
    content: "120px";
    left: 0;
    top: -30px;
    }

    .br:after {
    content: "24px";
    right: -10px;
    top: -80px;
    }

    pre {
    background: #edeff5;
    padding: 20px;
    }


</style>
<script type="text/javascript">
    window.addEventListener("scroll",function(){
        var header=document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY >0);
    })
</script>
