<?php 
    include_once("./includes/header.php");

    if( !isset($_SESSION['loggedInUser']) ){
        echo "<script>
            alert('Please Login');
            window.location = './';
        </script>";
    }
?>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>	
    <!-- <script src="http://code.jquery.com/jquery-1.9.0.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script> -->
    <link type="text/css" rel="stylesheet" href="./designer/css/jquery.miniColors.css" />
	<script type="text/javascript" src="./designer/js/fabric.js"></script>
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

        .main-row{
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(-0.5 * var(--bs-gutter-y));
            margin-right: calc(-0.5 * var(--bs-gutter-x));
            margin-left: calc(-0.5 * var(--bs-gutter-x));
            display: flex !important; 
            justify-content: center !important; 
        }
        

	 </style>

        <section class="">
            <div class="main-row mt-2 " style="" >
                <div class="col-4 col-lg-4 col-sm-12 mx-1" style="max-width: 400px;">
                    <div class="card">
                        <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Shirt Options</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Avatar  </button>
                                </div>
                            </nav>
                            <div class="tab-content my-3" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                    <div class="card" >
                                        <div class="card-body">
                                            <h6 class="card-subtitle mb-2 text-muted">Shirt Styles</h6>
                                            <select id="tshirttype" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                                <option value="./designer/img/crew_front.png" selected="selected">Short Sleeve Shirts</option>
                                                <option value="./designer/img/polo2_front.png">Polo Shirts</option>                                        
                                                <option value="./designer/img/mens_longsleeve_front.png">Long Sleeve Shirts</option>                                        
                                                <option value="./designer/img/mens_hoodie_front.png">Hoodies</option>                    
                                                <option value="./designer/img/mens_tank_front.png">Tank tops</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-subtitle mb-2 text-muted">Shirt Color</h6>
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
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                                    <div align="center" class="card" style="min-height: 32px;">
                                        <div class="card-body">
                                            <h6 class="card-subtitle mb-2 text-muted"> Font Options </h6>

                                            <div class="btn-group inline pull-left mb-2 " id="texteditor" style="display:none">	
                                                <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> Font Style </button>
                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="font-family-X">
                                                            <li style="cursor:pointer" tabindex="-1" href="#" onclick="setFont('Arial');" class="Arial">Arial</li>
                                                            <li style="cursor:pointer" tabindex="-1" href="#" onclick="setFont('Helvetica');" class="Helvetica">Helvetica</li>
                                                            <li style="cursor:pointer" tabindex="-1" href="#" onclick="setFont('Myriad Pro');" class="MyriadPro">Myriad Pro</li>
                                                            <li style="cursor:pointer" tabindex="-1" href="#" onclick="setFont('Delicious');" class="Delicious">Delicious</li>
                                                            <li style="cursor:pointer" tabindex="-1" href="#" onclick="setFont('Verdana');" class="Verdana">Verdana</li>
                                                            <li style="cursor:pointer" tabindex="-1" href="#" onclick="setFont('Georgia');" class="Georgia">Georgia</li>
                                                            <li style="cursor:pointer" tabindex="-1" href="#" onclick="setFont('Courier');" class="Courier">Courier</li>
                                                            <li style="cursor:pointer" tabindex="-1" href="#" onclick="setFont('Comic Sans MS');" class="ComicSansMS">Comic Sans MS</li>
                                                            <li style="cursor:pointer" tabindex="-1" href="#" onclick="setFont('Impact');" class="Impact">Impact</li>
                                                            <li style="cursor:pointer" tabindex="-1" href="#" onclick="setFont('Monaco');" class="Monaco">Monaco</li>
                                                            <li style="cursor:pointer" tabindex="-1" href="#" onclick="setFont('Optima');" class="Optima">Optima</li>
                                                            <li style="cursor:pointer" tabindex="-1" href="#" onclick="setFont('Hoefler Text');" class="Hoefler Text">Hoefler Text</li>
                                                            <li style="cursor:pointer" tabindex="-1" href="#" onclick="setFont('Plaster');" class="Plaster">Plaster</li>
                                                            <li style="cursor:pointer" tabindex="-1" href="#" onclick="setFont('Engagement');" class="Engagement">Engagement</li>
                                                        </ul>
                                                    </div>
                                                    <button id="text-bold" type="button" class="btn btn-outline-dark">
                                                        <img src="./designer/img/font_bold.png" height="" width="">
                                                    </button>
                                                    <button id="text-italic" type="button" class="btn btn-outline-dark">
                                                        <img src="./designer/img/font_italic.png" height="" width="">
                                                    </button>
                                                    <button id="text-underline" type="button" class="btn btn-outline-dark">
                                                        <img src="./designer/img/font_underline.png">
                                                    </button>
                                                    <button id="text-strike" type="button" class="btn btn-outline-dark">
                                                        <img src="./designer/img/font_strikethrough.png" height="" width="">
                                                    </button>
                                                    
                                                    
                                                </div>		
                                                
                                                <h6 class="card-subtitle mb-2  text-muted"> Font Color Options </h6>
                                                <div class="btn-group mb-2">
                                                    <a class="btn btn-outline-dark" href="#" rel="tooltip" data-placement="top" data-original-title="Font Color">
                                                        <input type="hidden" id="text-fontcolor" class="color-picker" size="7" value="#000000">
                                                    </a>
                                                    <a class="btn btn-outline-dark" href="#" rel="tooltip" data-placement="top" data-original-title="Font Border Color">
                                                        <input type="hidden" id="text-strokecolor" class="color-picker" size="7" value="#000000">
                                                    </a>									      
                                                </div>


                                            </div>		

                                            <div class="pull-right my-2" align="" id="imageeditor" style="display:none">
                                            
                                                <div class="my-2">
                                                    <h6 class="card-subtitle mb-2 text-muted"> Object Options </h6>
                                                    <div class="btn-group">
                                                        <button class="btn btn-outline-dark" id="bring-to-front" title="Bring to Front"> <i class="bi bi-arrow-up-short"></i> </button>
                                                        <button class="btn btn-outline-dark" id="send-to-back" title="Send to Back"> <i class="bi bi-arrow-down-short"></i> </button>
                                                        <!-- <button id="flip" type="button" class="btn btn-outline-dark" title="Show Back View"> <i class="bi bi-arrow-left-right"></i> </button> -->
                                                        <button id="remove-selected" class="btn btn-outline-dark" title="Delete selected item"> <i class="bi bi-trash"></i> </button>
                                                    </div>
                                                </div>
                                            </div>		
                                            
                                            <div class="input-group mb-3">
                                                <input id="text-string" type="text" class="form-control" placeholder="Add text here..." aria-label="Add text here..." aria-describedby="button-addon2">
                                                <button id="add-text" class="btn btn-outline-secondary" title="Add text"><i class="bi bi-send"></i></button>	  
                                            </div>

                                            <div>
                                                <?php require_once("./designer/fileupload.php") ?>
                                                <input type="file" id="imageInput" accept="image/*" multiple>
                                            </div>
                                            <hr>
                                            
                                            <div class="card" style=" height: 500px;  overflow: auto;  width: 100%;  box-sizing: border-box; overflow-x: hidden;">
                                                <div class="card-body">
                                                    
                                                    <div id="avatarlist" >
                                                        <?php include_once("./designer/stock-avatar-list.php") ?>
                                                    </div>	
                                                    
                                                </div>
                                            </div>

                                            <!-- <input class="span2 form-control" id="text-string" type="text" placeholder="Add text here...">
                                            <button id="add-text" class="btn" title="Add text"><i class="bi bi-send"></i></i></button>	   -->
                                        </div>												
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4 col-lg-4 col-sm-12  mx-1" style="min-width: 550px; max-width: 600px; height: 700px; background-color: rgb(255, 255, 255);">
                    <div class="card" style="width: 550px" >
                        <div class="card-body">
                            <button id="flipback" type="button" class="btn btn-primary" title="Rotate View">
                                <i class="bi bi-arrow-left-right"></i>
                            </button>

                            <div id="shirtDiv" class="page" style="width: 525px; position: relative; background-color: rgb(255, 255, 255);">
                                <img name="tshirtview" id="tshirtFacing" src="./designer/img/crew_front.png" style="width: 525px; ">
                                <!-- <div id="drawingArea" style="position: absolute;top: 100px;left: 160px;z-index: 10;width: 300px;height: 400px;">					 -->
                                <div id="drawingArea" style="position: absolute;top: 100px;left: 160px;z-index: 10;width: 200px;height: 400px;">					
                                    <canvas id="tcanvas" width=200 height="400" class="hover" style="-webkit-user-select: none;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-4 col-lg-4 col-sm-12  mx-1" style="max-width: 300px;">
                    <div class="card">
                        <div class="card-body">
                        <h3> Custom Order Form </h3>
                        <p>
                            <form action="" id="customize_form">
                                <div class="form-action mb-1">
                                    <label for="customize_by">Customize By:</label>
                                    <select class="form-select" name="customize_by" id="customize_by">
                                        <option value="embroidery">Embroidery</option>
                                        <option value="print">Print</option>
                                    </select>
                                </div>
                                <div class="form-action mb-1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="prices_by_sizes">Prices By Sizes:</label>
                                            <select class="form-select" name="sizing" id="prices_by_sizes">
                                                <?php
                                                $sizesAndPrices = array(
                                                    "1x1" => 265.00,
                                                    "1x2" => 265.00,
                                                    "1x3" => 265.00,
                                                    "1x4" => 265.00,
                                                    "2x1" => 285.00,
                                                    "2x2" => 285.00,
                                                    "2x3" => 285.00,
                                                    "2x4" => 285.00,
                                                    "3x1" => 300.00,
                                                    "3x2" => 300.00,
                                                    "3x3" => 300.00,
                                                    "3x4" => 300.00,
                                                    "4x1" => 350.00,
                                                    "4x2" => 350.00,
                                                    "4x3" => 350.00,
                                                    "4x4" => 350.00
                                                );

                                                foreach ($sizesAndPrices as $size => $price) {
                                                    echo '<option value="' . $size . '">' . $size . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="selected_price"></label>
                                            <input style="background-color: lightgrey;"  type="text" class="form-control" id="selected_price" name="price" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-action mb-1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="shirt_selected">Selected Shirt:</label>
                                            <input style="background-color: lightgrey;" type="text" class="form-control" id="shirt_selected" name="shirt_selected" readonly value="Short Sleeve Shirts">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="shirt_price">Shirt Price:</label>
                                            <input style="background-color: lightgrey;"  type="text" class="form-control" id="shirt_price" name="shirt_price" readonly value="200">
                                        </div>
                                    </div>
                                </div>
                                <table class="table">
                                    <tr>
                                        <td><input type="checkbox" name="s-checked">&emsp;S</td>
                                        <td align="right">
                                            <button class="btn btn-sm btn-outline-dark" onclick="decrement('s')">-</button>
                                            <input id="s" name="s" min="0" style="width: 40px;" value="0" type="number" readonly>
                                            <button type="button" class="btn btn-sm btn-outline-dark" onclick="increment('s')">+</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="m-checked">&emsp;M</td>
                                        <td align="right">
                                            <button class="btn btn-sm btn-outline-dark" onclick="decrement('m')">-</button>
                                            <input id="m" name="m" min="0" style="width: 40px;" value="0" type="number" readonly>
                                            <button type="button" class="btn btn-sm btn-outline-dark" onclick="increment('m')">+</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="l-checked">&emsp;L</td>
                                        <td align="right">
                                            <button class="btn btn-sm btn-outline-dark" onclick="decrement('l')">-</button>
                                            <input id="l" name="l" min="0" style="width: 40px;" value="0" type="number" readonly>
                                            <button type="button" class="btn btn-sm btn-outline-dark" onclick="increment('l')">+</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="xl-checked">&emsp;XL</td>
                                        <td align="right">
                                            <button class="btn btn-sm btn-outline-dark" onclick="decrement('xl')">-</button>
                                            <input id="xl" name="xl" min="0" style="width: 40px;" value="0" type="number" readonly>
                                            <button type="button" class="btn btn-sm btn-outline-dark" onclick="increment('xl')">+</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="xxl-checked">&emsp;XXL</td>
                                        <td align="right">
                                            <button class="btn btn-sm btn-outline-dark" onclick="decrement('xxl')">-</button>
                                            <input id="xxl" name="xxl" min="0" style="width: 40px;" value="0" type="number" readonly>
                                            <button type="button" class="btn btn-sm btn-outline-dark" onclick="increment('xxl')">+</button>
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
            </div>
        </section>


        <?php include_once("./includes/scripts.php"); ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.3/html2canvas.min.js"></script>

        <script type="text/javascript" src="./designer/js/tshirtEditor.js"></script>
	    <script type="text/javascript" src="./designer/js/jquery.miniColors.min.js"></script>
        <script type="text/javascript">
            jQuery.browser = {};
            (function () {
                jQuery.browser.msie = false;
                jQuery.browser.version = 0;
                if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
                    jQuery.browser.msie = true;
                    jQuery.browser.version = RegExp.$1;
                }
            })();
        </script>
        <?php include_once("./includes/footer.php"); ?>
        <div id="myOverlay" class="overlay" style="display: block;">

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

                        const shirtList =  {
                            "./designer/img/crew_front.png" : {"shirt_selected" : "Short Sleeve Shirts", "shirt_price" : "200"},
                            "./designer/img/polo2_front.png" : {"shirt_selected" : "Polo Shirts", "shirt_price" : "250"},
                            "./designer/img/mens_longsleeve_front.png" : {"shirt_selected" : "Long Sleeve Shirts", "shirt_price" : "250"},
                            "./designer/img/mens_hoodie_front.png" : {"shirt_selected" : "Hoodies", "shirt_price" : "200"},
                            "./designer/img/mens_tank_front.png" : {"shirt_selected" : "Tank tops", "shirt_price" : "150"},
                        }

                        let shirt = shirtList[$(this).val()]

                        $("#shirt_selected").val(shirt.shirt_selected);
                        $("#shirt_price").val(shirt.shirt_price);

                    });


                setTimeout(() => {
                    $('#flipback').click()
                    toggleOverlay(false, overlay)
                }, 1000);

            });
        </script>

        <script>
            var valueSelect = $("#tshirttype").val();
            $("#tshirttype").change(function(){
                valueSelect = $(this).val();
            });

            $('#flipback').click(() => {	
                console.log('clicked')
                if (valueSelect === "./designer/img/crew_front.png") {
                    if ($(this).attr("data-original-title") == "Show Back View") {
                            $(this).attr('data-original-title', 'Show Front View');			        		       
                            $("#tshirtFacing").attr("src","./designer/img/crew_back.png");			        
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
                            $("#tshirtFacing").attr("src","./designer/img/crew_front.png");			    	
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
                else if (valueSelect === "./designer/img/polo2_front.png") {
                    if ($(this).attr("data-original-title") == "Show Back View") {
                            $(this).attr('data-original-title', 'Show Front View');			        		       
                            $("#tshirtFacing").attr("src","./designer/img/polo2_back.png");			        
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
                            $("#tshirtFacing").attr("src","./designer/img/polo2_front.png");			    	
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
                
                else if (valueSelect === "./designer/img/mens_longsleeve_front.png") {
                    if ($(this).attr("data-original-title") == "Show Back View") {
                            $(this).attr('data-original-title', 'Show Front View');			        		       
                            $("#tshirtFacing").attr("src","./designer/img/mens_longsleeve_back.png");			        
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
                            $("#tshirtFacing").attr("src","./designer/img/mens_longsleeve_front.png");			    	
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
                else if (valueSelect === "./designer/img/mens_tank_front.png") {
                    if ($(this).attr("data-original-title") == "Show Back View") {
                        $(this).attr('data-original-title', 'Show Front View');			        		       
                        $("#tshirtFacing").attr("src","./designer/img/mens_tank_back.png");			        
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
                        $("#tshirtFacing").attr("src","./designer/img/mens_tank_front.png");			    	
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
                else if (valueSelect === "./designer/img/mens_hoodie_front.png") {
                    if ($(this).attr("data-original-title") == "Show Back View") {
                        $(this).attr('data-original-title', 'Show Front View');			        		       
                        $("#tshirtFacing").attr("src","./designer/img/mens_hoodie_back.png");			        
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
                        $("#tshirtFacing").attr("src","./designer/img/mens_hoodie_front.png");			    	
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
                        $("#tshirtFacing").attr("src","./designer/img/crew_back.png");			        
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
                        $("#tshirtFacing").attr("src","./designer/img/crew_front.png");			    	
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

                fetch('./designer/submit-customize.php', { // Replace '/submit' with your actual submission URL
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if(data == 'DONE!'){
                        alert("Customization Required sucess, we have sent you an email regarding with your request.");
                        window.location = "designer.php";
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

        <script>
            function increment(id) {
                var input = document.getElementById(id);
                input.value = parseInt(input.value, 10) + 1;
            }

            function decrement(id) {
                var input = document.getElementById(id);
                if (input.value > 0) {
                    input.value = parseInt(input.value, 10) - 1;
                }
            }
        </script>

    <script>
        document.getElementById('imageInput').addEventListener('change', function(e) {
        let files = e.target.files;
        let div = document.getElementById('avatarlist');
        let child = div.getElementsByClassName('column')

        for (let i = 0; i < files.length; i++) {

            let img = document.createElement('img');
            img.className = 'img-fluid img-polariod img-thumbnail';
            img.src = URL.createObjectURL(files[i]);
            img.alt = '';

            img.addEventListener("click", function(e){
                let el = e.target;
                console.log('tshirtEditor - el', el)
                /*temp code*/
                let offset = 50;
                let left = fabric.util.getRandomInt(0 + offset, 200 - offset);
                let top = fabric.util.getRandomInt(0 + offset, 400 - offset);
                let angle = fabric.util.getRandomInt(-20, 40);
                let width = fabric.util.getRandomInt(30, 50);
                let opacity = (function(min, max){ return Math.random() * (max - min) + min; })(0.5, 1);
                fabric.Image.fromURL(el.src, function(image) {
		          image.set({
		            left: left,
		            top: top,
		            angle: 0,
		            padding: 10,
		            cornersize: 10,
	      	  		hasRotatingPoint:true
		          });
		          image.scale(getRandomNum(0.1, 0.25)).setCoords();
		          canvas.add(image);
		        });
                
                // fabric.Image.fromURL(el.src, function(image) {
                //     image.set({
                //         left: left,
                //         top: top,
                //         // angle: 0,
                //         // padding: 10,
                //         // cornersize: 10,
                //         hasRotatingPoint: true
                //     });

                //     // Set custom scale
                //     // var minScale = 0.1; // Minimum scale value
                //     // image.scaleX = minScale;
                //     // image.scaleY = minScale;
                //     canvas.add(image);
                //     // canvas.renderAll();
                // });

            })

            let a = document.createElement('a');
            a.href = '#';
            a.className = 'd-block mb-2 h-100';
            a.appendChild(img);

            let div = document.createElement('div');
            div.className = 'col-lg-6 col-md-4 col-6';
            div.appendChild(a);


            // child[0].appendChild(div);

            child[0].insertBefore(div, child[0].firstChild);


        }

        });
        </script>

        <script>
            function updateSelectedPrice() {
                var selectElement = document.getElementById('prices_by_sizes');
                var selectedSize = selectElement.options[selectElement.selectedIndex].value;
                var pricesAndSizes = <?php echo json_encode($sizesAndPrices); ?>;
                document.getElementById('selected_price').value = pricesAndSizes[selectedSize];
            }
            document.getElementById('prices_by_sizes').addEventListener('change', updateSelectedPrice);

            updateSelectedPrice();
        </script>