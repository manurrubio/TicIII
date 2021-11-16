
<?php include("inc/db.php")?>
<?php include("mod/header.php")?>

<br><br><br><br><br><br><br><br>
   
    <body>
        <div class="card mb-mb content">
            <h1 class="m-3" style="text-align:center;">Muro</h1>
            <br><br><br><br>
            <h2 style="margin: auto; color: coral;">¡Coméntale a un amigo <a href="createComentario.php" style="text-decoration: none; color: blanchedalmond;"> aquí!</a></li></h2> 

        
            <div class ="card-body" style="align-self: center;">
                <div class="card-body" style="align-items:center"> 
                <?php 
                    $user= $_SESSION['user']; 
                    $query1 = "SELECT * from usuarios where ci = $user limit 1";
                    $result1 = mysqli_query($conn, $query1);
                    $row1 = mysqli_fetch_array($result1);
                    $carrera= $row1['carrera']; 
                    $query="SELECT * from muro WHERE ci_muro= '$user'" ;
                    $result = mysqli_query($conn, $query);
                            if($result){
                                while($row = mysqli_fetch_array($result)){
                                
                                    ?>
                                    <?php
                                    echo "<br>";
                                    ?> 
                                    <div class="container">
                                    <div class="col">
                                        <?php 
                                        $ci_amigo= $row['ci_comentario'];
                                        $query2="SELECT * from usuarios WHERE ci= $ci_amigo limit 1" ;
                                        $result2 = mysqli_query($conn, $query2);
                                        $row2 = mysqli_fetch_array($result2);
                                        ?>
                                        <h4><?php echo $row2['nombre']?> <?php echo $row2['apellido']?></h4>

                                    </div>
                                    
                                    <div class="image-logo">
                                    <h6>
                                    <img src="<?php echo "inc/logos/arrow.jpg"?>"} >
                                    <?php echo $row['comentario']?></h6>
                                    <h8 style="align-items: center;"><?php echo "ci: ". $row['ci_comentario']?></h8>
                                    </div>
                                    <div class="other">
                                    <?php
                                    echo "<br>";
                                    ?><?php
                                    echo "<br>";
                                    ?><?php
                                    echo "<br>";
                                    ?>
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
