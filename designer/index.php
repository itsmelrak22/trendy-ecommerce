<?php session_start(); 

if( !isset($_SESSION['loggedInUser']) ){
	echo "<script>
		alert('Please Login');
		window.location = '../';
	</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>TRENDY THREADS APPAREL BY LOVE J'S STORE -  CUSTOMIZE PAGE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if IE]><script type="text/javascript" src="js/excanvas.js"></script><![endif]-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>	
	<script type="text/javascript" src="js/fabric.js"></script>
	
	
    <!-- Le styles -->
    <link type="text/css" rel="stylesheet" href="css/jquery.miniColors.css" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	 <script type="text/javascript">
	 </script>
	 <style type="text/css">
		 .footer {
			padding: 70px 0;
			margin-top: 70px;
			border-top: 1px solid #E5E5E5;
			background-color: whiteSmoke;
			}			
	      .color-preview {
	      	border: 1px solid #CCC;
	      	margin: 2px;
	      	zoom: 1;
	      	vertical-align: top;
	      	display: inline-block;
	      	cursor: pointer;
	      	overflow: hidden;
	      	width: 20px;
	      	height: 20px;
	      }
	      .rotate {  
		    -webkit-transform:rotate(90deg);
		    -moz-transform:rotate(90deg);
		    -o-transform:rotate(90deg);
		    /* filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=1.5); */
		    -ms-transform:rotate(90deg);		   
		}		
		.Arial{font-family:"Arial";}
		.Helvetica{font-family:"Helvetica";}
		.MyriadPro{font-family:"Myriad Pro";}
		.Delicious{font-family:"Delicious";}
		.Verdana{font-family:"Verdana";}
		.Georgia{font-family:"Georgia";}
		.Courier{font-family:"Courier";}
		.ComicSansMS{font-family:"Comic Sans MS";}
		.Impact{font-family:"Impact";}
		.Monaco{font-family:"Monaco";}
		.Optima{font-family:"Optima";}
		.HoeflerText{font-family:"Hoefler Text";}
		.Plaster{font-family:"Plaster";}
		.Engagement{font-family:"Engagement";}

	 </style>
  </head>

  <body data-spy="scroll" data-target=".subnav" data-offset="80">

  <!-- Navbar
    ================================================== -->

		<!-- Navigation-->


    <div class="container">
		<section id="typography">
		  <div class="page-header">
		    <h1>Trendy Dress Shop Customize Page</h1>

			<a href="../index.php?#product_list" class="btn">Back to main website</a>

		  </div>
		
		  <!-- Headings & Paragraph Copy -->
		  <div class="row">			
		    <div class="span3">
		    	
		    	<div class="tabbable"> <!-- Only required for left/right tabs -->
				  <ul class="nav nav-tabs">
				  	<li class="active"><a href="#tab1" data-toggle="tab">T-Shirt Options</a></li>				    
				    <li><a href="#tab2" data-toggle="tab">Avatars</a></li>
				  </ul>
				  <div class="tab-content" style="overflow: hidden !important;">
				     <div class="tab-pane active" id="tab1">
				     	<div class="well">
					      	<h3>Shirt Styles</h3>
								<p>
						      	<select id="tshirttype">                        
				                    <option value="img/crew_front.png" selected="selected">Short Sleeve Shirts</option>
				                    <option value="img/mens_longsleeve_front.png">Long Sleeve Shirts</option>                                        
				                    <option value="img/mens_hoodie_front.png">Hoodies</option>                    
				                    <option value="img/mens_tank_front.png">Tank tops</option>
								</select>	
						      </p>								
					      </div>
					      <div class="well">
							<ul class="nav">
								<li class="color-preview" title="White" style="background-color:#ffffff;"></li>
								<li class="color-preview" title="Dark Heather" style="background-color:#616161;"></li>
								<li class="color-preview" title="Gray" style="background-color:#f0f0f0;"></li>
								<li class="color-preview" title="Charcoal" style="background-color:#5b5b5b;"></li>
								<li class="color-preview" title="Black" style="background-color:#222222;"></li>
								<li class="color-preview" title="Heather Orange" style="background-color:#fc8d74;"></li>
								<li class="color-preview" title="Heather Dark Chocolate" style="background-color:#432d26;"></li>
								<li class="color-preview" title="Salmon" style="background-color:#eead91;"></li>
								<li class="color-preview" title="Chesnut" style="background-color:#806355;"></li>
								<li class="color-preview" title="Dark Chocolate" style="background-color:#382d21;"></li>
								<li class="color-preview" title="Citrus Yellow" style="background-color:#faef93;"></li>
								<li class="color-preview" title="Avocado" style="background-color:#aeba5e;"></li>
								<li class="color-preview" title="Kiwi" style="background-color:#8aa140;"></li>
								<li class="color-preview" title="Irish Green" style="background-color:#1f6522;"></li>
								<li class="color-preview" title="Scrub Green" style="background-color:#13afa2;"></li>
								<li class="color-preview" title="Teal Ice" style="background-color:#b8d5d7;"></li>
								<li class="color-preview" title="Heather Sapphire" style="background-color:#15aeda;"></li>
								<li class="color-preview" title="Sky" style="background-color:#a5def8;"></li>
								<li class="color-preview" title="Antique Sapphire" style="background-color:#0f77c0;"></li>
								<li class="color-preview" title="Heather Navy" style="background-color:#3469b7;"></li>							
								<li class="color-preview" title="Cherry Red" style="background-color:#c50404;"></li>
							</ul>
						</div>			      
				     </div>				   
				    <div class="tab-pane" id="tab2">
				    	<div class="well">
				    		<div class="input-append">
							  <input class="span2" id="text-string" type="text" placeholder="add text here...">
							  <button id="add-text" class="btn" title="Add text"><i class="icon-share-alt"></i></button>
							  <hr>
							</div>
							<style>
								#avatarlist img {
									width: 100px;
									height: 100px;
									margin: 10px;
								}

								#avatarlist .row {
									display: flex;
									flex-wrap: wrap;
									padding: 0 4px;
								}

									/* Create four equal columns that sits next to each other */
								#avatarlist .column {
									flex: 25%;
									max-width: 25%;
									padding: 0 4px;
									margin-left: 3px;
									margin-right: 3px;
								}

								#avatarlist .column img {
									margin-top: 8px;
									vertical-align: middle;
									width: 100%;
								}

								/* Responsive layout - makes a two column-layout instead of four columns */
								#avatarlist @media screen and (max-width: 800px) {
									.column {
										flex: 50%;
										max-width: 50%;
									}
								}

								/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
								#avatarlist @media screen and (max-width: 600px) {
									.column {
										flex: 100%;
										max-width: 100%;
									}
								}

							</style>
							<div id="avatarlist" >
								<?php include_once("stock-avatar-list.php") ?>
							</div>	

								<?php require_once("fileupload.php") ?>
						

                            <div>
                                <hr>
								<input type="file" id="imageInput" accept="image/*" multiple>

								<script>
									document.getElementById('imageInput').addEventListener('change', function(e) {
										var files = e.target.files;
										var div = document.getElementById('avatarlist');

										for (var i = 0; i < files.length; i++) {
											var img = document.createElement('img');
											img.src = URL.createObjectURL(files[i]);
											img.className = 'img-polaroid';
											img.style = 'cursor:pointer';

											img.addEventListener("click", function(e){
												var el = e.target;
												console.log('tshirtEditor - el', el)
												/*temp code*/
												var offset = 50;
												var left = fabric.util.getRandomInt(0 + offset, 200 - offset);
												var top = fabric.util.getRandomInt(0 + offset, 400 - offset);
												var angle = fabric.util.getRandomInt(-20, 40);
												var width = fabric.util.getRandomInt(30, 50);
												var opacity = (function(min, max){ return Math.random() * (max - min) + min; })(0.5, 1);
												
												fabric.Image.fromURL(el.src, function(image) {
													image.set({
														left: left,
														top: top,
														// angle: 0,
														// padding: 10,
														// cornersize: 10,
														hasRotatingPoint: true
													});

													// Set custom scale
													// var minScale = 0.1; // Minimum scale value
													// image.scaleX = minScale;
													// image.scaleY = minScale;
													canvas.add(image);
													// canvas.renderAll();
												});

											})

											div.appendChild(img);

										
										}
									 
									});
								</script>
							</div>
				    	</div>				      
				    </div>
                      
				  </div>
				</div>				
		    </div>		
		    <div class="span6">		    
		    		<div align="center" style="min-height: 32px;">
		    			<div class="clearfix">
							<div class="btn-group inline pull-left" id="texteditor" style="display:none">						  
								<button id="font-family" class="btn dropdown-toggle" data-toggle="dropdown" title="Font Style"><i class="icon-font" style="width:19px;height:19px;"></i></button>		                      
							    <ul class="dropdown-menu" role="menu" aria-labelledby="font-family-X">
								    <li><a tabindex="-1" href="#" onclick="setFont('Arial');" class="Arial">Arial</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Helvetica');" class="Helvetica">Helvetica</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Myriad Pro');" class="MyriadPro">Myriad Pro</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Delicious');" class="Delicious">Delicious</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Verdana');" class="Verdana">Verdana</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Georgia');" class="Georgia">Georgia</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Courier');" class="Courier">Courier</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Comic Sans MS');" class="ComicSansMS">Comic Sans MS</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Impact');" class="Impact">Impact</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Monaco');" class="Monaco">Monaco</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Optima');" class="Optima">Optima</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Hoefler Text');" class="Hoefler Text">Hoefler Text</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Plaster');" class="Plaster">Plaster</a></li>
								    <li><a tabindex="-1" href="#" onclick="setFont('Engagement');" class="Engagement">Engagement</a></li>
				                </ul>
							    <button id="text-bold" class="btn" data-original-title="Bold"><img src="img/font_bold.png" height="" width=""></button>
							    <button id="text-italic" class="btn" data-original-title="Italic"><img src="img/font_italic.png" height="" width=""></button>
							    <button id="text-strike" class="btn" title="Strike" style=""><img src="img/font_strikethrough.png" height="" width=""></button>
							 	<button id="text-underline" class="btn" title="Underline" style=""><img src="img/font_underline.png"></button>
							 	<a class="btn" href="#" rel="tooltip" data-placement="top" data-original-title="Font Color"><input type="hidden" id="text-fontcolor" class="color-picker" size="7" value="#000000"></a>
						 		<a class="btn" href="#" rel="tooltip" data-placement="top" data-original-title="Font Border Color"><input type="hidden" id="text-strokecolor" class="color-picker" size="7" value="#000000"></a>
								  <!--- Background <input type="hidden" id="text-bgcolor" class="color-picker" size="7" value="#ffffff"> --->
							</div>							  
							<div class="pull-right" align="" id="imageeditor" style="display:none">
							  <div class="btn-group">										      
							      <button class="btn" id="bring-to-front" title="Bring to Front"><i class="icon-fast-backward rotate" style="height:19px;"></i></button>
							      <button class="btn" id="send-to-back" title="Send to Back"><i class="icon-fast-forward rotate" style="height:19px;"></i></button>
							      <button id="flip" type="button" class="btn" title="Show Back View"><i class="icon-retweet" style="height:19px;"></i></button>
							      <button id="remove-selected" class="btn" title="Delete selected item"><i class="icon-trash" style="height:19px;"></i></button>
							  </div>
							</div>			  
						</div>												
					</div>					  		
				<!--	EDITOR      -->	
                <button id="flipback" type="button" class="btn" title="Rotate View"><i class="icon-retweet" style="height:19px;"></i></button>
					<div id="shirtDiv" class="page" style="width: 530px; height: 630px; position: relative; background-color: rgb(255, 255, 255);">
						<img name="tshirtview" id="tshirtFacing" src="img/crew_front.png">
						<div id="drawingArea" style="position: absolute;top: 100px;left: 160px;z-index: 10;width: 200px;height: 400px;">					
							<canvas id="tcanvas" width=200 height="400" class="hover" style="-webkit-user-select: none;"></canvas>
						</div>
					</div>
<!--					<div id="shirtBack" class="page" style="width: 530px; height: 630px; position: relative; background-color: rgb(255, 255, 255); display:none;">-->
<!--						<img src="img/crew_back.png"></img>-->
<!--						<div id="drawingArea" style="position: absolute;top: 100px;left: 160px;z-index: 10;width: 200px;height: 400px;">					-->
<!--							<canvas id="backCanvas" width=200 height="400" class="hover" style="-webkit-user-select: none;"></canvas>-->
<!--						</div>-->
<!--					</div>						-->
								
				<!--	/EDITOR		-->
		    </div>
		
		    <div class="span3">
		      <div class="well">
		      	<h3>Select Sizes</h3>
			      <p>
					<form action="" id="customize_form">
						<div class="form-action">
							<select name="customize_by" id="customize_by">
								<option value="embroidery">Embroide</option>
								<option value="print">Print</option>
							</select>
						</div>
						<table class="table">
							<tr>
								<td><input type="checkbox" name="s-checked">&emsp;S</td>
								<td align="right">
									<input name="s" min="0" style="width: 40px;" value="0" type="number">
								</td>
							</tr>
							<tr>
								<td><input type="checkbox" name="m-checked">&emsp;M</td>
								<td align="right">
								<input name="m" min="0" style="width: 40px;" value="0" type="number">
								<td>
							</tr>
							<tr>
								<td><input type="checkbox" name="l-checked">&emsp;L</td>
								<td align="right">
									<input name="l"  min="0" style="width: 40px;" value="0" type="number">
								</td>
							</tr>
							<tr>
								<td><input type="checkbox" name="xl-checked">&emsp;XL</td>
								<td align="right">
									<input name="xl"  min="0" style="width: 40px;" value="0" type="number">
								</td>
							</tr>
							<tr>
								<td><input type="checkbox" name="xxl-checked">&emsp;XXL</td>
								<td align="right">
									<input name="xxl" min="0" style="width: 40px;" value="0" type="number">
								</td>
							</tr>
						</table>	
						<input type="hidden" name="customize-page-submit" value="true">
						<input type="hidden" name="customer_id" value="<?=$_SESSION['loggedInUser']['id']?>">
					</form>
			      </p>
					<button type="button" class="btn btn-large btn-block btn-success" name="addToTheBag"  id="addToTheBag">Add to Cart <i class="icon-briefcase icon-white"></i></button>
		      </div>		      		       		   
		    </div>
		
		  </div>
		
		</section>
    </div><!-- /container -->

	<style>
        /* The overlay */
        .overlay {
            height: 100%;
            width: 100%;
            display: none;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: rgba(0,0,0, 0.5);
        }

    </style>

	<div id="myOverlay" class="overlay" style="display: block;">
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.3/html2canvas.min.js"></script>


<!-- Footer ================================================== -->
    <script>
    	let overlay = document.getElementById('myOverlay');

		function toggleOverlay(value, overlay){
			if(value){
				overlay.style.display = "block";
			}else{
				overlay.style.display = "none";
			}
		}

        $(document).ready(function(){
				$("#tshirttype").change(function(){
					$("img[name=tshirtview]").attr("src",$(this).val());
				});


			setTimeout(() => {
				$('#flipback').click()
				toggleOverlay(false, overlay)
			}, 1000);

		});
    </script>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster --> 
    <script>
	

        var valueSelect = $("#tshirttype").val();
        $("#tshirttype").change(function(){
            valueSelect = $(this).val();
        });

        $('#flipback').click(() => {	
			console.log('clicked')
               if (valueSelect === "img/crew_front.png") {
                   if ($(this).attr("data-original-title") == "Show Back View") {
			   		$(this).attr('data-original-title', 'Show Front View');			        		       
			        $("#tshirtFacing").attr("src","img/crew_back.png");			        
			        a = JSON.stringify(canvas);
			        canvas.clear();
			        try
			        {
			           var json = JSON.parse(b);
			           canvas.loadFromJSON(b);


			        }
			        catch(e)
			        {}
			        
			    } else {
			    	$(this).attr('data-original-title', 'Show Back View');			    				    	
			    	$("#tshirtFacing").attr("src","img/crew_front.png");			    	
			    	b = JSON.stringify(canvas);
			    	canvas.clear();
			    	try
			        {
			           var json = JSON.parse(a);
			           canvas.loadFromJSON(a);			           
			        }
			        catch(e)
			        {}
			    }		
               }
               
               else if (valueSelect === "img/mens_longsleeve_front.png") {
                  if ($(this).attr("data-original-title") == "Show Back View") {
			   		$(this).attr('data-original-title', 'Show Front View');			        		       
			        $("#tshirtFacing").attr("src","img/mens_longsleeve_back.png");			        
			        a = JSON.stringify(canvas);
			        canvas.clear();
			        try
			        {
			           var json = JSON.parse(b);
			           canvas.loadFromJSON(b);
			        }
			        catch(e)
			        {}
			        
			    } else {
			    	$(this).attr('data-original-title', 'Show Back View');			    				    	
			    	$("#tshirtFacing").attr("src","img/mens_longsleeve_front.png");			    	
			    	b = JSON.stringify(canvas);
			    	canvas.clear();
			    	try
			        {
			           var json = JSON.parse(a);
			           canvas.loadFromJSON(a);			           
			        }
			        catch(e)
			        {}
			    }	
               }
               else if (valueSelect === "img/mens_tank_front.png") {
                  if ($(this).attr("data-original-title") == "Show Back View") {
			   		$(this).attr('data-original-title', 'Show Front View');			        		       
			        $("#tshirtFacing").attr("src","img/mens_tank_back.png");			        
			        a = JSON.stringify(canvas);
			        canvas.clear();
			        try
			        {
			           var json = JSON.parse(b);
			           canvas.loadFromJSON(b);
			        }
			        catch(e)
			        {}
			        
			    } else {
			    	$(this).attr('data-original-title', 'Show Back View');			    				    	
			    	$("#tshirtFacing").attr("src","img/mens_tank_front.png");			    	
			    	b = JSON.stringify(canvas);
			    	canvas.clear();
			    	try
			        {
			           var json = JSON.parse(a);
			           canvas.loadFromJSON(a);			           
			        }
			        catch(e)
			        {}
			    }	
               }
               else if (valueSelect === "img/mens_hoodie_front.png") {
                  if ($(this).attr("data-original-title") == "Show Back View") {
			   		$(this).attr('data-original-title', 'Show Front View');			        		       
			        $("#tshirtFacing").attr("src","img/mens_hoodie_back.png");			        
			        a = JSON.stringify(canvas);
			        canvas.clear();
			        try
			        {
			           var json = JSON.parse(b);
			           canvas.loadFromJSON(b);
			        }
			        catch(e)
			        {}
			        
			    } else {
			    	$(this).attr('data-original-title', 'Show Back View');			    				    	
			    	$("#tshirtFacing").attr("src","img/mens_hoodie_front.png");			    	
			    	b = JSON.stringify(canvas);
			    	canvas.clear();
			    	try
			        {
			           var json = JSON.parse(a);
			           canvas.loadFromJSON(a);			           
			        }
			        catch(e)
			        {}
			    }	
               }
			   /*	if ($(this).attr("data-original-title") == "Show Back View") {
			   		$(this).attr('data-original-title', 'Show Front View');			        		       
			        $("#tshirtFacing").attr("src","img/crew_back.png");			        
			        a = JSON.stringify(canvas);
			        canvas.clear();
			        try
			        {
			           var json = JSON.parse(b);
			           canvas.loadFromJSON(b);
			        }
			        catch(e)
			        {}
			        
			    } else {
			    	$(this).attr('data-original-title', 'Show Back View');			    				    	
			    	$("#tshirtFacing").attr("src","img/crew_front.png");			    	
			    	b = JSON.stringify(canvas);
			    	canvas.clear();
			    	try
			        {
			           var json = JSON.parse(a);
			           canvas.loadFromJSON(a);			           
			        }
			        catch(e)
			        {}
			    }		*/
			   	canvas.renderAll();
			   	setTimeout(function() {
			   		canvas.calcOffset();
			    },200);	   	
        });	
    </script>
    <script src="js/bootstrap.min.js"></script>  
	<script type="text/javascript" src="js/tshirtEditor.js"></script>
	<script type="text/javascript" src="js/jquery.miniColors.min.js"></script>
    <script>


		document.getElementById('customize_form').addEventListener('submit', function(event) {
			event.preventDefault(); // Prevent default form submission
			let objectDatas = {
				front : objects.front,
				back : objects.back,
			}

			// Get the current timestamp
			let timestamp = Date.now();

			// Create the filename with the timestamp
			let frontImage_ = 'frontImage_' + timestamp + '.png';
			let backImage_ = 'backImage_' + timestamp + '.png';


			let formData = new FormData(this); // Create FormData from the form
			formData.append('objectDatas', JSON.stringify(objectDatas)); // Append the object
			formData.append('frontImage_', objects.frontImage, frontImage_);
			formData.append('backImage_', objects.backImage, backImage_);

			fetch('submit-customize.php', { // Replace '/submit' with your actual submission URL
				method: 'POST',
				body: formData
			})
			.then(response => response.json())
			.then(data => {
				if(data == 'DONE!'){
					alert("Customization Required sucess, we have sent you an email regarding with your request");
					window.location = "../";
				}
				toggleOverlay(false, overlay);

			})
			.catch((error) => {
				toggleOverlay(false, overlay);
				console.error('Error:', error);
			});

		});

		const objects = {
			frontImage: null,
			front: [],
			backImage: null,
			back: [],
		}

		function getCanvasObjects(){
			let positionObject = [...canvas.getObjects()];
			let internalObject = [];

			positionObject.forEach(function(object) {
				if (object.type === 'text') {
					internalObject.push( { 
						type: object.type, 
						value : object.text, 
						fill: object.fill, 
						fontFamily: object.fontFamily, 
						fontSize: object.fontSize,
						fontWeight: object.fontWeight,
						strokeStyle: object.strokeStyle
						// add other style properties as needed
					})
				} else if (object.type === 'image') {
					internalObject.push( { type: object.type, value : object._element.currentSrc } )
				}
				// Add more conditions here for other object types as needed
			});

			return internalObject;
		}



		$('#addToTheBag').click( async () => {

			// testConvert()
			// return;
			let testOverlay = document.getElementById('myOverlay');
			console.log('testOverlay', testOverlay)

			objects.front.length = 0
			objects.back.length = 0

			toggleOverlay(true, testOverlay);

			console.log($("#tshirtFacing").attr("src"));
			let bgImage = $("#tshirtFacing").attr("src");
			let position = null;
			if(bgImage.includes("front")){
				position = 'front';
			}else if(bgImage.includes("back")){
				position = 'back';
			}
		
			console.log('position', position)
			objects[position].push(await getCanvasObjects())
			objects[`${position}Image`] = await convertCanvasToBlob()
			console.log(objects[position]);
			$('#flipback').click()
			
			await setTimeout(async  () => {

				 console.log($("#tshirtFacing").attr("src"));
				bgImage = $("#tshirtFacing").attr("src");
				position = null;
				if(bgImage.includes("front")){
					position = 'front';
				}else if(bgImage.includes("back")){
					position = 'back';
				}
			
				console.log('position', position)
				objects[position].push(await getCanvasObjects())
				objects[`${position}Image`] = await convertCanvasToBlob()
				console.log(objects[position]);

			}, 500);



			await setTimeout(async () => {
				 $('#flipback').click()

			}, 1000);




			setTimeout(() => {
				let form =  document.querySelector('#customize_form');
				let event = new Event('submit');
				form.dispatchEvent(event);
			}, 1000);

		} )

		function convertCanvasToBlob(){
			return html2canvas(document.getElementById('shirtDiv')).then(function(canvas) {
				return new Promise(function(resolve, reject) {
					canvas.toBlob(function(blob) {
						resolve(blob);
					}, 'image/png');
				});
			});
		}

		// function dataURLToBlob(dataURL) {
		// 	var parts = dataURL.split(';base64,');
		// 	var contentType = parts[0].split(":")[1];
		// 	var raw = window.atob(parts[1]);
		// 	var rawLength = raw.length;
		// 	var uInt8Array = new Uint8Array(rawLength);

		// 	for (var i = 0; i < rawLength; ++i) {
		// 		uInt8Array[i] = raw.charCodeAt(i);
		// 	}

		// 	return new Blob([uInt8Array], {type: contentType});
		// }


		// function testConvert(){
		// 				// Then in your JavaScript code
		// 	html2canvas(document.getElementById('shirtDiv')).then(function(canvas) {
		// 		// canvas is the resulting HTML canvas element
		// 		// you can insert it into the DOM or save it as an image
		// 		var img = canvas.toDataURL("image/png");
		// 		// Now you can download the image
		// 		var link = document.createElement('a');
		// 		link.href = img;
		// 		link.download = 'image.png';
		// 		link.click();
		// 	});
		// }

		// function testConvert() {
		// 	return html2canvas(document.getElementById('shirtDiv')).then(function(canvas) {
		// 		return new Promise(function(resolve, reject) {
		// 			canvas.toBlob(function(blob) {
		// 				resolve(blob);
		// 			}, 'image/png');
		// 		});
		// 	});
		// }




</script>
  </body>
</html>
