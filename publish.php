<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/publish.css" rel="stylesheet">
        <style>
            ul{
                background-color: #eee;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div class="row publish-header">
            <h6 class=" ">Publishing</h6> <br>
            <button onclick="publish()" class="btn btn-primary btn-sm ">Publish</button>
            
        </div>
         <hr class="my-1" />
         <p id="success-alert" class="text-center grey-ic font-weight-bold ">
             300 Characters Remaining   
        </p>
         <div id="bg-dev-color" contenteditable="true" class="text-content-fied white-text text-center">
             
                     
         </div>
            
            <div class="row hashtag mt-4">
                <h6>HashTag</h6>
                
                <input type="text"  id="hashtag" class="" placeholder="#tag here" />
                <div id="hashtagLish"></div>
            </div>
         
         <div class='row publish-content-body mb-4'>
             <h6 class="grey-ic font-weight-bold font-weight-bold">Select Background</h6>
             <hr class="my-1"/>
              
                <div class="box1">
                    
                    <div   id="blue" class="p-card1"  onclick="changecolor('blue')">#ff5858</div>
                    <div   id="red" onclick="changecolor('red')" class="p-card2">#727a17</div>
                    <div   id="yellow" class="p-card3"  onclick="changecolor('yellow')">#FFE47A</div>
                    <div   id="dblue" class="p-card4"  onclick="changecolor('dblue')">#2074ad</div>
                    <div   id="orange" class="p-card5"  onclick="changecolor('orange')">#10a7a3</div>
                    <div   id="r" class="p-card6"  onclick="changecolor('r')">#4b5d5d</div>
                    <div   id="a" class="p-card7"  onclick="changecolor('a')"> #9e07bd</div>
                    <div   id="b" class="p-card8"  onclick="changecolor('b')">  #f83600</div>
                    <div   id="c" class="p-card9"  onclick="changecolor('c')">  #ee609c</div>
                     
                    
                    
                </div>
             
             
        </div>
            
          
         
         
         
         
         
         
         
         
         
         
         
        <script>
            function changecolor(id){
              document.getElementById("bg-dev-color").style.background = document.getElementById(id).innerHTML;
            }
            
            var editedContent = document.getElementById("bg-dev-color");
            editedContent.innerHTML = localStorage.getItem('editedContent');
            
            editedContent.addEventListener('blur', function(){
                localStorage.setItem('editedContent', this.innerHTML);
            });
            
          
        
        </script>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="js/publish.js"></script>
    </body>
</html>
