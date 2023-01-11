<?php include '../Include/head.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ABOUT US</title>
  <style>:root {
    --surface-color: #fff;
    --curve: 40;
  }
  
  * {
    box-sizing: border-box;
  }
  
  body {
    font-family: 'Times New Roman', serif;
    background-color: #f0f1f2  ;
  }
  
  .cards {
    width: 70%;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin: 9rem 15vw;
    padding: 0;
    list-style-type: none;
    margin-top: 0px;
  }
  
  .card {
    position: relative;
    display: block;
    height: 100%;  
    border-radius: calc(var(--curve) * 1px);
    overflow: hidden;
    text-decoration: none;
  }
  
  .card__image {      
    width: 100%;
    height: auto;
  }
  
  .card__overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1;      
    border-radius: calc(var(--curve) * 1px);    
    background-color: var(--surface-color);      
    transform: translateY(100%);
    transition: .2s ease-in-out;
  }
  
  .card:hover .card__overlay {
    transform: translateY(0);
  }
  
  .card__header {
    position: relative;
    display: flex;
    align-items: center;
    gap: 2em;
    padding: 2em;
    border-radius: calc(var(--curve) * 1px) 0 0 0;    
    background-color: var(--surface-color);
    transform: translateY(-100%);
    transition: .2s ease-in-out;
  }
  
  .card__arc {
    width: 80px;
    height: 80px;
    position: absolute;
    bottom: 100%;
    right: 0;      
    z-index: 1;
  }
  
  .card__arc path {
    fill: var(--surface-color);
    d: path("M 40 80 c 22 0 40 -22 40 -40 v 40 Z");
  }       
  
  .card:hover .card__header {
    transform: translateY(0);
  }
  
  .card__thumb {
    flex-shrink: 0;
    width: 50px;
    height: 50px;      
    border-radius: 50%;      
  }
  
  .card__title {
    font-size: 1em;
    margin: 0 0 .3em;
    color: #6A515E;
  }
  
  .card__tagline {
    display: block;
    margin: 1em 0;
    font-family: "MockFlowFont";  
    font-size: .8em; 
    color: #D7BDCA;  
  }
  
  .card__status {
    font-size: .8em;
    color: #D7BDCA;
  }
  
  .card__description {
    padding: 0 2em 2em;
    margin: 0;
    color: #000000;
    font-family: "MockFlowFont";   
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
    overflow: hidden;
  }    
  p{
    text-align: center;
    margin:50px
    padding: 10px;
    width:100%;
    font-size:20px;
    margin-bottom:50px;
  }
  h2{
    margin: 50px;
    text-align: center;
    text-decoration : underline;
  }
</style>
</head>
<?php 	include ("../Include/nav.php");?>    
<body>
  <h2><strong>ABOUT US</strong></h2>
  <p>Nous avons conçu un projet d'application Web pour la gestion des devis qui comprend des fonctionnalités de facturation faciles à utiliser avec un interface d'administration. Pour le développement de la partie frontend, nous avons choisi HTML, CSS, JavaScript et Bootstrap. Le backend a été conçu en PHP et un service basé sur le Web fournit gratuitement la base de données SQL <span style="color:blue; cursor:pointer"><u>(https://www.freesqldatabase.com/).</u></span> Nous avons opté pour un design épuré et une gamme réduite de couleurs pour une interface facile à utiliser par les utilisateurs et un logo approprié. Dans la plupart des styles, nous avons utilisé Bootstrap comme base principale.</p>
  <ul class="cards">
    <li>
      <a href="" class="card">
        <img src="index2.jpg" class="card__image" alt="" />
        <div class="card__overlay">
          <div class="card__header">
            <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
            <img class="card__thumb" src="index2.jpg" alt="" />
            <div class="card__header-text">
              <h3 class="card__title">TAHALLA MOHAMMED</h3>            
              <span class="card__status">Etudiant ESTSB </span>
            </div>
          </div>
          <p class="card__description">Hello I'm <strong><U>TAHALLA MOHAMMED<U></strong> &#128075;
          </p>
        </div>
      </a>      
    </li>
    <li>
      <a href="" class="card">
        <img src="index.jpg" class="card__image" alt="" />
        <div class="card__overlay">        
          <div class="card__header">
            <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                 
            <img class="card__thumb" src="index.jpg" alt="" />
            <div class="card__header-text">
              <h3 class="card__title">ABDERHMMAN AIT ELMOUDDEN</h3>
              <span class="card__status">Etudiant ESTSB</span>
            </div>
          </div>
          <p class="card__description">Hello I'm <strong><U>ABDERHMMAN AIT ELMOUDDEN<U></strong> &#128075;</p>
        </div>
      </a>
    </li>
  </ul>
</body>
</html>
<?php include '../Include/foot.php'; ?>
