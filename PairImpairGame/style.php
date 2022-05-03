<?php
header ('content-type: text/css; charset:UTF-8')
?>

*{
    font-family: cursive;
}
html{
    scroll-behavior:smooth;  
    
}
body{
    background-color: #dde7f3;
    /*margin: 0%;*/  
}
.body{
    /*margin-top: 3%;
    margin-bottom: 3%;
    margin-left: 10%;
    margin-right: 10%;*/
    height:900px;
}
    
.main{
    background-color: white ; /* #DEB6AB */  
    margin-top: 2%;
    margin-bottom 5%;
    height : 2% ;
    width: 140% ; 
    border-radius: 35px;  
    
}
.main2{
    background-color: #ddf2f3;
    height:900px;
}
.premierePartie{
    background: #ddf2f3 ;  #f3e9dd #f2f3dd
    /*height : 85% ;
    width: 100% ;*/
    padding 5%;
    border-radius: 35px 35px 0px 0px; 
    border: 4px solid #1A1A40;
}
.tableau{
    border-radius: 20px;
}
.deuxiemePartie{
    background-image: url(img/background5.jpg);
    background-size: cover;
    height : 700px;
    width: 1125px ;
    border-radius: 0px 0px 20px 20px;
    padding-top: 5px;
    margin-right:5%;
    
}
.LeJeu{
    margin-top:9%;
    margin-left: 17%;
    margin-right: 17%;
    background-color: rgba(249, 228, 212, 0.85);
    border-radius: 35px;
    padding : 5%;
    border: 4px solid #1A1A40;
    height : 400px;
}
.titre{
    margin-bottom : 5%;
    font-size: 32px;
    font-family: fantasy;
    font-weight: bold;
     
}
.mot1{
    background-color: rgba(34,12,31, 0.5);
    border-radius: 35px;
    padding : 2%;
    margin-bottom : 3%;
}
.mot1 img{
    width: 38px; 
    height: 38px;
}

.LeJeu > img{
    width: 50px; 
    height: 50px;
}
.LeJeu button{
    background-color:#d4f9e4;
    border-radius: 20px;
    width: 74px; 
    height: 42px;
    padding: 1%;
    font-size: 19px;
}

.LeJeu button:hover{
    background-color:#e4d4f9;
    border-radius: 10px;
    opacity: 0.8;
    transition: 0.25s;
    width: 70px; 
    height: 39px;
    padding: 1%;
    font-size: 19px;

}
.bouttonPlay {
    position: sticky;
    top: 45%;
    left:75%;
    background-color:#d4f9e4;
    border-radius: 20px;
    width: 120px; 
    height: 60px;
    font-size: 17px;
    color:black;
}
.bouttonPlay:hover{
    background-color:#e4d4f9;
    border-radius: 10px;
    opacity: 0.8;
    transition: 0.25s;
    width: 90px; 
    height: 60px
    padding: 1%;
    font-size: 18px;
    
}
.bouttonPlay a{
    color:black;
}
..bouttonPlay a:hover{
    color: white;
    text-decoration: none;
}