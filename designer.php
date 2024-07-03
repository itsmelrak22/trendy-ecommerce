<?php 
    include_once("./includes/header.php");

    $product = new Product;
    $product_color = new ProductColor;
    if( isset($_SESSION['viewed-design-product-id']) || isset($_GET['id'])){
        
        if(isset($_GET['id'])){
            $_SESSION['viewed-design-product-id'] = $_GET['id'];
            $_SESSION['viewed-design-color-id'] = $_GET['color_id'];
        }

        $temp_prod_id = $_SESSION['viewed-design-product-id'];
        $temp_color_id = $_SESSION['viewed-design-color-id'];
        $products = $product->findProduct( $temp_prod_id, $temp_color_id );
        // echo "<pre>";
        // print_r($products);
        // echo "</pre>";

        $_SESSION['viewed-design'] = $products->color_name;
        // echo $_SESSION['viewed-design'];
        $product_colors = $product_color->getProductColors( $_SESSION['viewed-design-product-id'] );

        unset($_SESSION['viewed-design-product-id']);
    }

    $AllTemplateproducts = $product->findProductByCategory("CUSTOMIZED POLO SHIRT/UNIFORM");
    // echo "<pre>";
    //     print_r($AllTemplateproducts);
    // echo "</pre>";
    function getProductName($item){
        return $item['name'];
    }

    $templateNames = [];

    foreach ($AllTemplateproducts as $item) {
        $name = $item['name'];
        if (!isset($templateNames[$name])) {
            $templateNames[$name] = [];
        }

        $templateNames[$name][] = [
            'color_name' => $item['color_name'],
            'code' => $item['code'],
            'id' => $item['id'],
            'color_id' => $item['color_id'],
        ];
    }
    // echo "<pre>";
    //     print_r($templateNames);
    // echo "</pre>";


    if (isset($_SESSION['viewed-design'])) {
    $viewedDesign = toUpperCaseString($_SESSION['viewed-design']);
    foreach ($templateNames as $value) {
        foreach ($value as $template) {
            if (toUpperCaseString($template['color_name']) == $viewedDesign) {
                $viewedDesign = toUpperCaseString($template['color_name']);
                unset($_SESSION['viewed-design']);
                break;
            }
        }
    }
}

    function toUpperCaseString($string) {
        return strtoupper($string);
    }


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
    <!-- <script src="https://unpkg.com/fabric@5.3.0/dist/fabric.min.js"></script> -->
	 <style type="text/css">
            .active-color-selected{
                border: 3px solid red !important;
            }
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
        <!-- Modal structure -->
            <div class="modal fade" id="avatalLogoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Logo Selection</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p style="color: red;"><strong>Disclaimer:</strong> <em>We are not affiliated with any of the brands featured in our logos.</em></p>

                            <div align="center" class="card" style="min-height: 32px;">
                                <div class="card-body">
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
                                </div>												
                            </div>	
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="textModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Text Options</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
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
                                        
                                        <h6 class="card-subtitle my-3  text-muted"> Font Color Options </h6>
                                        <div class="btn-group mb-2">
                                            <a class="btn btn-outline-dark" href="#" rel="tooltip" data-placement="top" data-original-title="Font Color">
                                                <input type="hidden" id="text-fontcolor" class="color-picker" size="7" value="#000000">
                                            </a>
                                            <a class="btn btn-outline-dark" href="#" rel="tooltip" data-placement="top" data-original-title="Font Border Color">
                                                <input type="hidden" id="text-strokecolor" class="color-picker" size="7" value="#000000">
                                            </a>									      
                                        </div>
                                    </div>		
                                    
                                    <div class="input-group mb-3">
                                        <input id="text-string" type="text" class="form-control" placeholder="Add text here..." aria-label="Add text here..." aria-describedby="button-addon2">
                                        <button id="add-text" class="btn btn-outline-secondary" title="Add text"><i class="bi bi-send"></i></button>	  
                                    </div>

                                    <script>
                                        document.getElementById('text-string').addEventListener('input', function() {
                                            const textInput = document.getElementById('text-string');
                                            if (textInput.value.length > 50) {
                                                textInput.value = '';
                                                alert('Input exceeds 50 characters!');
                                            } 
                                        });
                                    </script>


                                    <!-- <input class="span2 form-control" id="text-string" type="text" placeholder="Add text here...">
                                    <button id="add-text" class="btn" title="Add text"><i class="bi bi-send"></i></i></button>	   -->
                                </div>												
                            </div>	
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>

        <section class="">
 


            <div class="main-row mt-2 " style="" >
                <div class="col-6 col-lg-6 col-sm-12  mx-1" style="max-width: 700px;">
                    <div class="card">
                        <div class="card-body">
                        <h3> Custom Order Form </h3>
                        <p>
                            <form action="" id="customize_form">
                                <div class="form-action mb-1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="selected_gender">Sex:</label>
                                            <input type="text" class="form-control" name="selected_gender" id="selected_gender" value="UNISEX " readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="customize_by">Customization Method:</label>
                                            <select class="form-select" name="customize_by" id="customize_by">
                                                <option value="embroidered">Embroidered</option>
                                                <option value="printed">Printed</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-action mb-1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input style="background-color: lightgrey;" type="hidden" class="form-control" id="shirt_selected" name="shirt_selected" readonly value="Short Sleeve Shirts">
                                            <label for="tshirttype">Shirt Styles:</label>
                                            <select id="tshirttype" class="form-select form-select" aria-label=".form-select example">
                                                <option value="./designer/img/crew_front.png" >Short Sleeve Shirts</option>
                                                <option value="./designer/img/polo2_front.png">Polo Shirts</option>                                        
                                                <option value="./designer/img/mens_longsleeve_front.png">Long Sleeve Shirts</option>                                        
                                                <option value="./designer/img/mens_hoodie_front.png">Hoodies</option>                    
                                                <option value="./designer/img/mens_tank_front.png">Tank tops</option>
                                                <hr>
                                                <hr>
                                                <?php foreach ($templateNames as $key => $item): 
                                                ?>
                                                    <?php foreach ($item as $value): 
                                                        if(!$value['color_name']) continue;
                                                    ?>
                                                    <option value="./designer/img/templated_polo_shirts/<?=toUpperCaseString($value['color_name'])?>_FRONT.png"><?= toUpperCaseString($value['color_name']) ?> (<?=toUpperCaseString($key)?>) </option>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">SIZE GUIDE</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center card-body">
                                                            <img id="sizeChartImage" src="./assets/sizechart.jpg" class="img-fluid" alt="sizechart">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <!-- Additional buttons can be added here if needed -->
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <label for="size_guide" class="mr-2">Size Guide:</label>
                                            <div class="d-flex align-items-center">
                                                <button type="button" id="showSizeGuideButton" class="form-btn btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="bi bi-patch-question"> View size guide</i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row" id="designColors" style="display: none;">
                                                <!-- Dynamic content will be injected here -->
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="selected_size">Size:</label>
                                            <select class="form-select" name="selected_size" id="selected_size">
                                                <option value="xs">Extra Small</option>
                                                <option value="s">Small</option>
                                                <option value="m">Medium</option>
                                                <option value="l">Large</option>
                                                <option value="xl">Extra Large</option>
                                                <option value="xxl">2 Extra Large</option>
                                            </select>
                                            <!-- <input style="background-color: lightgrey;"  type="hidden" class="form-control" id="selected_price" name="price" readonly required> -->
                                        </div>

                                        <p class="mt-2" style="color: red; display: none;" id="noteForNotColorPallete"><strong>NOTE:</strong> <em>Customize your design here if you would like a different color or if the specified color is not available.</em></p>

                                        <div class="col-md-12">
                                            <div class="my-2"  id="colorPallete">
                                                <label for="">Shirt Color:</label>
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
                                </div>
                               
                                <div class="form-action mb-1">
                                    <div class="container">

                                        <div class="accordion" id="accordionExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    Personalize Your Shirt
                                                </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <table class="table table-bordered" >
                                                        <thead>
                                                                <tr>
                                                                    <th colspan="4"> Personalize Your Shirt </th>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="col">Option</th>
                                                                    <th scope="col">Checkbox</th>
                                                                    <th scope="col">Color</th>
                                                                    <th scope="col">Price</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="table-body-personalize">
                                                                <tr>
                                                                    <td>Collar:</td>
                                                                    <td>
                                                                        <input class="form-check-input" onchange="estimatePrice()" type="checkbox" id="p_collar_checkbox" name="p_collar_checkbox">
                                                                    </td>
                                                                    <td >
                                                                        <div id="pCollarDiv" >
                                                                            <input type="color" class="form-select" name="p_collar_value" id="p_collar_value"> </input>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div id="pCollarPrice">50</div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Sleeve (Right):</td>
                                                                    <td>
                                                                        <input class="form-check-input" onchange="estimatePrice()" type="checkbox" id="p_sleeve_right_checkbox" name="p_sleeve_right_checkbox">
                                                                    </td>
                                                                    <td >
                                                                        <div id="pSleeveRightDiv" >
                                                                            <input type="color" class="form-select" name="p_sleeve_right_value" id="p_sleeve_right_value"> </input>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div id="pSleeveRightPrice">50</div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Sleeve (Left):</td>
                                                                    <td>
                                                                        <input class="form-check-input" onchange="estimatePrice()" type="checkbox" id="p_sleeve_left_checkbox" name="p_sleeve_left_checkbox">
                                                                    </td>
                                                                    <td >
                                                                        <div id="pSleeveLeftDiv" >
                                                                            <input type="color" class="form-select" name="p_sleeve_left_value" id="p_sleeve_left_value"> </input>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div id="pSleeveLeftPrice">50</div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Sleeve (Hem):</td>
                                                                    <td>
                                                                        <input class="form-check-input" onchange="estimatePrice()" type="checkbox" id="p_sleeve_hem_checkbox" name="p_sleeve_hem_checkbox">
                                                                    </td>
                                                                    <td >
                                                                        <div id="pSleeveHemDiv" >
                                                                            <input type="color" class="form-select" name="p_sleeve_hem_value" id="p_sleeve_hem_value"> </input>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div id="pSleeveHemPrice">50</div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Plaket:</td>
                                                                    <td>
                                                                        <input class="form-check-input" onchange="estimatePrice()" type="checkbox" id="p_plaket_checkbox" name="p_plaket_checkbox">
                                                                    </td>
                                                                    <td >
                                                                        <div id="pPlaketDiv" >
                                                                            <input type="color" class="form-select" name="p_plaket_value" id="p_plaket_value"> </input>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div id="pPlaketPrice">50</div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Button:</td>
                                                                    <td>
                                                                        <input class="form-check-input" onchange="estimatePrice()" type="checkbox" id="p_button_checkbox" name="p_button_checkbox">
                                                                    </td>
                                                                    <td >
                                                                        <div id="pButtonDiv" >
                                                                            <input type="color" class="form-select" name="p_button_value" id="p_button_value"> </input>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div id="pButtonPrice">50</div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Body Color (Whole):</td>
                                                                    <td>
                                                                        <input class="form-check-input" onchange="estimatePrice()" type="checkbox" id="p_body_color_whole_checkbox" name="p_body_color_whole_checkbox">
                                                                    </td>
                                                                    <td >
                                                                        <div id="pBodyColorWholeDiv" >
                                                                            <input type="color" class="form-select" name="p_body_color_whole_value" id="p_body_color_whole_value"> </input>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div id="pBodyColorWholePrice">50</div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Body Color (UpperPart):</td>
                                                                    <td>
                                                                        <input class="form-check-input" onchange="estimatePrice()" type="checkbox" id="p_body_color_upper_part_checkbox" name="p_body_color_upper_part_checkbox">
                                                                    </td>
                                                                    <td >
                                                                        <div id="pBodyColorUpperPartDiv" >
                                                                            <input type="color" class="form-select" name="p_body_color_upper_part_value" id="p_body_color_upper_part_value"> </input>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div id="pBodyColorUpperPartPrice">50</div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Body Color (LowerPart):</td>
                                                                    <td>
                                                                        <input class="form-check-input" onchange="estimatePrice()" type="checkbox" id="p_body_color_lower_part_checkbox" name="p_body_color_lower_part_checkbox">
                                                                    </td>
                                                                    <td >
                                                                        <div id="pBodyColorLowerPartDiv" >
                                                                            <input type="color" class="form-select" name="p_body_color_lower_part_value" id="p_body_color_lower_part_value"> </input>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div id="pBodyColorLowerPartPrice">50</div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Body Color (RightPart):</td>
                                                                    <td>
                                                                        <input class="form-check-input" onchange="estimatePrice()" type="checkbox" id="p_body_color_right_part_checkbox" name="p_body_color_right_part_checkbox">
                                                                    </td>
                                                                    <td >
                                                                        <div id="pBodyColorRightPartDiv" >
                                                                            <input type="color" class="form-select" name="p_body_color_right_part_value" id="p_body_color_right_part_value"> </input>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div id="pBodyColorRightPartPrice">50</div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Body Color (LeftPart):</td>
                                                                    <td>
                                                                        <input class="form-check-input" onchange="estimatePrice()" type="checkbox" id="p_body_color_left_part_checkbox" name="p_body_color_left_part_checkbox">
                                                                    </td>
                                                                    <td >
                                                                        <div id="pBodyColorLeftPartDiv" >
                                                                            <input type="color" class="form-select" name="p_body_color_left_part_value" id="p_body_color_left_part_value"> </input>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div id="pBodyColorLeftPartPrice">50</div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                    </table>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Logo/Text Options
                                                </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Option</th>
                                                                <th scope="col">Checkbox</th>
                                                                <th scope="col">Options</th>
                                                                <th scope="col">Dimension (Inches)</th>
                                                                <th scope="col">Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Logo:</td>
                                                                <td>
                                                                    <input class="form-check-input" type="checkbox" id="avatar_logo_checkbox" name="avatar_logo_checkbox">
                                                                </td>
                                                                <td >
                                                                    <button type="button" class="btn btn-outline-dark" id="avatarLogoButton" data-bs-toggle="modal" data-bs-target="#avatalLogoModal" style="display: none;">
                                                                        <i class="bi bi-person-circle"></i>
                                                                    </button>
                                                                </td>
                                                                <td >
                                                                    <div id="avatarSizeTD" style="display: none;">
                                                                        <select class="form-select" name="avatar_sizing" id="prices_by_sizes_avatar_logo" disabled>
                                                                            <option value="3x3">3x3</option>
                                                                            <option value="4x4">4x4</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    +<span id="avatarLogoPrice">0</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Text:</td>
                                                                <td>
                                                                    <input class="form-check-input" type="checkbox" id="text_checkbox" name="text_checkbox">
                                                                </td>
                                                                <td >
                                                                    <button type="button" class="btn btn-outline-dark" id="textButton" data-bs-toggle="modal" data-bs-target="#textModal" style="display: none;">
                                                                        <i class="bi bi-fonts"></i>
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <div id="textSizeTD" style="display: none;">
                                                                        <select class="form-select" name="text_sizing" id="prices_by_sizes_text" disabled>
                                                                            <option value="1">1 in</option>
                                                                            <option value="2">2 in</option>
                                                                            <option value="3">3 in</option>
                                                                            <option value="4">4 in</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    +<span id="textPrice">0</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        
                                                    </table>
                                                </div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        
                                    </div>

                                </div>
                                
                                <div class="form-action mb-1">
                                    <div class="row">
                                        
                                      

                                        <div class="col-md-6">
                                            <label for="pricePerPiece">Price per piece</label>
                                            <input style="background-color: lightgrey;"  type="number" class="form-control" id="pricePerPiece" name="pricePerPiece"  readonly required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="estimatedPrice">Min. Estimated Price</label>
                                            <input style="background-color: lightgrey;"  type="number" class="form-control" id="estimatedPrice" name="estimatedPrice"  readonly required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="count" class="mr-2">Status:</label>
                                            <input style="background-color: lightgrey;" type="text"  class="form-control" value="Pending" disabled>
                                                    
                                        </div>

                                        <div class="col-md-6">
                                            <label for="count" class="mr-2">Count:</label>
                                            <div class="d-flex align-items-center">
                                                <button type="button" class="btn btn-sm btn-outline-dark" onclick="decrement()">-</button>
                                                <input class="form-control text-center mx-3" id="count" name="count" min="1" style="width: 60px; max-width: 5rem" value="1" type="text" readonly>
                                                <button type="button" class="btn btn-sm btn-outline-dark" onclick="increment()">+</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <table class="table">
                                    <tr>

                                    </tr>
                                   
                                </table>	
                                <input type="hidden" name="customize-page-submit" value="true">
                                <input type="hidden" name="customer_id" value="<?=$_SESSION['loggedInUser']['id']?>">
                            </form>
                        </p>

                        <div class="row">
                            <div class="col-12">
                                 <p style="color: red;"><strong>NOTE:</strong> <em>After submitting your order, please wait for admin approval.</em></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-large btn-block btn-success" name="addToTheBag" id="addToTheBag">Add to Cart</button>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <button type="button" class="btn btn-large btn-block btn-danger" name="discard" id="discard">Discard</button>
                            </div>
                        </div>


                        
                        </div>
                    </div>	
                </div>

                <div class="col-6 col-lg-6 col-sm-12  mx-1" style="min-width: 550px; max-width: 600px; height: 700px; background-color: rgb(255, 255, 255);">
                    <div class="card" style="width: 550px" >
                        <div class="card-body">
                            
                            <div class="text-center centered my-2" align=""  >
                                <div class="my-2">
                                    <div class="btn-group">
                                        <div>
                                            <button id="flipback" type="button" class="btn btn-outline-dark me-1" title="Rotate View">
                                                <i class="bi bi-arrow-left-right"></i>
                                            </button>
                                        </div>
                                        <div id="imageeditor" style="display: none;">
                                            <button class="btn btn-outline-dark" id="bring-to-front" title="Bring to Front"> <i class="bi bi-arrow-up-short"></i> </button>
                                            <button class="btn btn-outline-dark" id="send-to-back" title="Send to Back"> <i class="bi bi-arrow-down-short"></i> </button>
                                            <!-- <button id="flip" type="button" class="btn btn-outline-dark" title="Show Back View"> <i class="bi bi-arrow-left-right"></i> </button> -->
                                            <button id="remove-selected" class="btn btn-outline-dark" title="Delete selected item"> <i class="bi bi-trash"></i> </button>
                                        </div>

                                    </div>
                                </div>
                            </div>	
                            <!-- <button id="removeAllObjectsButton">Remove All Objects</button>
                            <button id="removeAllImagesButton">Remove All Images</button>
                            <button id="removeAllTextButton">Remove All Text</button> -->

                            <div id="shirtDiv" class="page" style="width: 510px; position: relative; background-color: rgb(255, 255, 255);">
                                <img name="tshirtview" id="tshirtFacing" src="./designer/img/crew_front.png" style="width: 510px; ">
                                <!-- <div id="drawingArea" style="position: absolute;top: 100px;left: 160px;z-index: 10;width: 300px;height: 400px;">					 -->
                                <div id="drawingArea" style="position: absolute;top: 100px;left: 160px;z-index: 10;width: 200px;height: 400px;">					
                                    <canvas id="tcanvas" width=200 height="400" class="hover" style="-webkit-user-select: none;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="container mt-2">
                <div class="alert alert-info text-center" role="alert">
                    You want your own multi-color design or you have your own design? Contact us and get a quotation thru our email <strong>A&Japparel25@gmail.com</strong>
                </div>
            </div>
        </section>


        <?php include_once("./includes/scripts.php"); ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.3/html2canvas.min.js"></script>

        <script type="text/javascript" src="./designer/js/tshirtEditor.js"></script>
	    <script type="text/javascript" src="./designer/js/jquery.miniColors.min.js"></script>
        <!-- <script src="./js/shirtOptions.js"></script> -->
        <!-- <script src="./js/newShirtOptions.js"></script> -->
        <script src="./js/shirtOptions3.js"></script>
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

            function updateDesignColors(selectedDesign) {
                var designColorsDiv = $('#designColors');
                designColorsDiv.empty(); // Clear previous content
                let availableDesigns = <?php echo json_encode($templateNames); ?>;

                if (availableDesigns[selectedDesign] && availableDesigns[selectedDesign].length > 0) {
                    availableDesigns[selectedDesign].forEach(function(color) {
                        var colorDiv = `
                            <div class="col-3 my-1">
                                <a href="designer.php?id=${color.id}&color_id=${color.color_id}" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="${color.color_name}" data-bs-original-title="${color.color_name}">
                                    <div style="height: 30px; background-color: ${color.code}; border: 2px solid black; cursor: pointer;">
                                    </div>
                                </a>
                            </div>`;
                        designColorsDiv.append(colorDiv);
                    });
                    designColorsDiv.show();
                } else {
                    designColorsDiv.hide();
                }
            }

            function updateTshirtSelection() {
                let availableDesigns = <?php echo json_encode($templateNames); ?>;

                var selectedOptionText = $("#tshirttype").find('option:selected').text();
                // Extract the design name in parenthesis
                var designMatch = selectedOptionText.match(/\((.*?)\)/);
                if (designMatch && designMatch[1]) {
                    var selectedDesign = designMatch[1];
                    updateDesignColors(selectedDesign);
                } else {
                    $('#designColors').hide();
                }

		            document.getElementById("shirtDiv").style.backgroundColor = "#ffffff";		   

                    // let input = document.getElementById('selected_price');
                    // input.value = null;

                    const selectedText = $("#tshirttype").find('option:selected').text();
                    const colorPallete = $('#colorPallete');
                    const noteForNotColorPallete = $('#noteForNotColorPallete');
                    
                    if (selectedText.includes('DESIGN')) {
                        colorPallete.hide();
                        noteForNotColorPallete.show();
                    } else {
                        noteForNotColorPallete.hide();
                        colorPallete.show();
                    }

                    $("img[name=tshirtview]").attr("src", $("#tshirttype").val());

                    const shirtList = {
                        "./designer/img/crew_front.png" : {"shirt_selected" : "Short Sleeve Shirts", "shirt_price" : "200"},
                        "./designer/img/polo2_front.png" : {"shirt_selected" : "Polo Shirts", "shirt_price" : "250"},
                        "./designer/img/mens_longsleeve_front.png" : {"shirt_selected" : "Long Sleeve Shirts", "shirt_price" : "250"},
                        "./designer/img/mens_hoodie_front.png" : {"shirt_selected" : "Hoodies", "shirt_price" : "200"},
                        "./designer/img/mens_tank_front.png" : {"shirt_selected" : "Tank tops", "shirt_price" : "150"},
                        <?php foreach ($templateNames as $key => $item){ 
                            foreach ($item as $value): 
                                if(!$value['color_name']) continue;
                                echo '"./designer/img/templated_polo_shirts/' . toUpperCaseString($value['color_name']) . '_FRONT.png": {"shirt_selected": "' . toUpperCaseString($value['color_name']) . ' (' . toUpperCaseString($key) . ')", "shirt_price": "250"},';
                            endforeach;
                        }
                        ?>

                    };

                    // Assuming PHP part is handled elsewhere and objects are added to shirtList

                    let shirt = shirtList[$("#tshirttype").val()];

                    $("#shirt_selected").val(shirt.shirt_selected);
                    $("#shirt_price").val(shirt.shirt_price);

                    let avatarLogoPrice = document.getElementById('avatarLogoPrice');
                    if(parseInt(avatarLogoPrice.textContent)) {
                        getPricesByLogo()
                    };
                    let textPrice = document.getElementById('textPrice');
                    if(parseInt(textPrice.textContent)){
                        getPricesByText()
                    };

                    estimatePrice()

                }

                function getPricesByLogo(){
                    let selectedValue = document.getElementById('prices_by_sizes_avatar_logo').value;

                    let shirt_selected = document.getElementById('shirt_selected').value;
                    let selected_size = document.getElementById('selected_size').value;
                    let customize_by = document.getElementById('customize_by').value;

                    let avatarLogoPrice = document.getElementById('avatarLogoPrice');

                    console.log("selected_size", selected_size)
                    console.log("shirt_selected", shirt_selected)
                    console.log("customize_by", customize_by)

                    let data  = shirtOptions3['logoType'][customize_by][selected_size][selectedValue];
                    avatarLogoPrice.textContent = data
                }

                function getPricesByText(){
                    let selectedValue = document.getElementById('prices_by_sizes_text').value;

                    let shirt_selected = document.getElementById('shirt_selected').value;
                    let selected_size = document.getElementById('selected_size').value;
                    let customize_by = document.getElementById('customize_by').value;
                    let textPrice = document.getElementById('textPrice');
                    let textString = document.getElementById('text-string').value;

                    console.log("selected_size", selected_size)
                    console.log("shirt_selected", shirt_selected)
                    console.log("customize_by", customize_by)

                    let data  = shirtOptions3['textType'][customize_by][selected_size][selectedValue];
                    console.log("data", data)
                    console.log("textString", textString)

                    
                    textPrice.textContent = parseInt(data) * parseInt(textString.length)
                }

                function estimatePrice(){   

                    let personalizedCount = countCheckedCheckboxes();
                    let personalizedCountPrice = personalizedCount * 50
                    let finalPrice = 0;

                    let avatarLogoPrice = document.getElementById('avatarLogoPrice').textContent;
                    let textPrice = document.getElementById('textPrice').textContent;
                    let shirt_selected = document.getElementById('shirt_selected').value;
                    let selected_size = document.getElementById('selected_size').value;
                   
                    const shirtPrice = shirtOptions3.apparel[shirt_selected];
                    console.log(`shirtPrice: ${shirtPrice}`)
                    console.log(`shirtPrice: ${shirtPrice}`)
                    console.log(`shirtPrice: ${shirtPrice}`)
                    const count = $("#count").val();
                    let netPrice = 0;

                    finalPrice += shirtPrice;


                    if(avatarLogoPrice){
                        finalPrice += parseInt(avatarLogoPrice);
                    }
                    if(textPrice){
                        finalPrice += parseInt(textPrice);
                    }
                    if(parseInt(personalizedCountPrice) > 0){
                        finalPrice += parseInt(personalizedCountPrice);
                    }

                    $("#pricePerPiece").val(finalPrice);
                    $("#estimatedPrice").val(finalPrice);


                }


            document.getElementById('count').addEventListener('change', function() {
                estimatePrice()
            });

            $(document).ready(function(){

                $("#tshirttype").change(updateTshirtSelection);

                setTimeout(() => {
                    $('#flipback').click()
                    toggleOverlay(false, overlay)

                    <?php if(isset($viewedDesign)){ ?>
                        console.log("<?=$viewedDesign?>")
                        $("#tshirttype").val("./designer/img/templated_polo_shirts/<?=$viewedDesign?>_FRONT.png");
                        updateTshirtSelection()
                    <?php } ?>

                }, 1000);


                // var myModal = new bootstrap.Modal(document.getElementById('imageModal'));
                // myModal.show();

                $('#showSizeGuideButton').click(function() {
                    let newSrc = './assets/' + $('#tshirttype').find('option:selected').text();
                    if (newSrc.includes('DESIGN')) {
                        newSrc = "./assets/Polo Shirts"
                    }
                    $('#sizeChartImage').attr('src', `${newSrc}.png`);
                });
                });

                document.querySelectorAll('.image-option').forEach(image => {
                image.addEventListener('click', function() {
                    console.log(this.alt + ' was clicked');
                    var myModal = bootstrap.Modal.getInstance(document.getElementById('imageModal'));
                    myModal.hide();

                    // Set the value of the gender input based on the image clicked
                    var genderInput = document.getElementById('selected_gender');
                    if (this.alt === 'Option 1') {
                    genderInput.value = 'Male';
                    } else if (this.alt === 'Option 2') {
                    genderInput.value = 'Female';
                    }
                });

            estimatePrice()

            });
        </script>

        <script>
            <?php if(isset($viewedDesign)){ ?>
                var valueSelect = "./designer/img/templated_polo_shirts/<?=$viewedDesign?>_FRONT.png";
            <?php }else{ ?>
                var valueSelect = $("#tshirttype").val();
            <?php }?>
            $("#tshirttype").change(function(){
                valueSelect = $(this).val();
            });

            $('#flipback').click(() => {	
                
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
                <?php foreach ($templateNames as $key => $item):  ?>
                    <?php foreach ($item as $value):  
                    $colorName = toUpperCaseString($value['color_name']) ;   
                    ?>
                
                    
                    else if (valueSelect === "./designer/img/templated_polo_shirts/<?=$colorName?>_FRONT.png") {
                        if ($(this).attr("data-original-title") == "Show Back View") {
                            $(this).attr('data-original-title', 'Show Front View');			        		       
                            $("#tshirtFacing").attr("src","./designer/img/templated_polo_shirts/<?=$colorName?>_BACK.png");			        
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
                            $("#tshirtFacing").attr("src","./designer/img/templated_polo_shirts/<?=$colorName?>_FRONT.png");			    	
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
                    <?php endforeach; ?>
                <?php endforeach; ?>
   
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

                let checkPersonalizedItemsData =  getCheckedItems();
                let checkPersonalizedItems =  checkPersonalizedItemsData.result;
                let checkPersonalizedItemsTotal =  checkPersonalizedItemsData.totalValue;
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
                formData.append('checkPersonalizedItems', JSON.stringify(checkPersonalizedItems)); // Append the object
                formData.append('checkPersonalizedItemsTotal', checkPersonalizedItemsTotal); // Append the object

                if(objects.frontImage instanceof Blob){
                    formData.append('frontImage_', objects.frontImage, frontImage_);
                }
                if(objects.backImage instanceof Blob){
                    formData.append('backImage_', objects.backImage, backImage_);
                }

                fetch('./designer/submit-customize.php', { 
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if(data == 'DONE!'){
                        alert("Your customization request was successful; please wait for admin approval before receiving an email with further details.");
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


            function getCheckedItems() {
                const options = [
                    'collar', 'sleeve_right', 'sleeve_left', 'sleeve_hem', 'plaket',
                    'button', 'body_color_whole', 'body_color_upper_part', 
                    'body_color_lower_part', 'body_color_right_part', 'body_color_left_part'
                ];
                
                const result = {};
                let totalValue = 0;
                options.forEach(option => {
                    // console.log(`p_${option}_checkbox`)
                    // console.log(`p_${option}_value`)
                    // console.log(`p${capitalizeFirstLetter(option)}Price`)
                    const checkbox = document.getElementById(`p_${option}_checkbox`);
                    if (checkbox.checked) {
                        
                        const colorValue = document.getElementById(`p_${option}_value`).value;
                        const price = document.getElementById(`p${capitalizeFirstLetter(option)}Price`).innerText;

                        totalValue += parseInt(price, 10);

                        result[`p_${option}_value`] = {
                            color: colorValue,
                            price: parseInt(price, 10)
                        };
                    }
                });

                console.log({
                    "result": result,
                    "totalValue" : totalValue
                });
                return {
                    "result": result,
                    "totalValue" : totalValue
                };
            }

            function capitalizeFirstLetter(string) {
                // Convert snake_case to Upper Pascal Case
                const words = string.split('_');
                const capitalizedWords = words.map(word => word.charAt(0).toUpperCase() + word.slice(1));
                return capitalizedWords.join('');
            }



            $('#addToTheBag').click( async () => {

                // let selected_price = document.getElementById('selected_price');
                let count = document.getElementById('count');

                if(count.value < 1){
                    // If form validation fails, display an error message or handle it as needed
                    alert("Please fill out all required fields correctly.");
                    return;
                }


                let testOverlay = document.getElementById('myOverlay');
                console.log('testOverlay', testOverlay)

                objects.front.length = 0
                objects.back.length = 0

                toggleOverlay(true, testOverlay);

                console.log($("#tshirtFacing").attr("src"));
                let bgImage = $("#tshirtFacing").attr("src");
                let position = null;
                if(bgImage.includes("front") || bgImage.includes("FRONT") ){
                    position = 'front';
                }else if(bgImage.includes("back") || bgImage.includes("BACK")){
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
                    if(bgImage.includes("front")  || bgImage.includes("FRONT") ){
                        position = 'front';
                    }else if(bgImage.includes("back")  || bgImage.includes("BACK")){
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


        </script>

        <script>
            function increment(id = false) {
                if(id){
                    var input = document.getElementById(id);
                    input.value = parseInt(input.value, 10) + 1;
                }else{
                    var input = document.getElementById("count");
                    input.value = parseInt(input.value, 10) + 1;
                }

                estimatePrice()

            }

            function decrement(id = false) {
                if(id){
                    var input = document.getElementById(id);
                    if (input.value > 0) {
                        input.value = parseInt(input.value, 10) - 1;
                    }
                }else{
                    var input = document.getElementById("count");
                    if (input.value > 0) {
                        input.value = parseInt(input.value, 10) - 1;
                    }
                }
                estimatePrice()
            }
        </script>

    <script>
        document.getElementById('imageInput').addEventListener('change', function(e) {
        let files = e.target.files;
        let div = document.getElementById('avatarlist');
        let child = div.getElementsByClassName('column')

        // removeAllImages()

        function inchesToPixels(inches) {
            const dpi = 20; // Change this based on your canvas DPI\
            console.log( inches * dpi );
            return inches * dpi;
        }


        let fixedWidth = inchesToPixels(2);
        let fixedHeight = inchesToPixels(2); 

        for (let i = 0; i < files.length; i++) {

            let img = document.createElement('img');
            img.className = 'img-fluid img-polaroid img-thumbnail';
            img.src = URL.createObjectURL(files[i]);
            img.alt = '';

            img.addEventListener("click", function(e){
                // checkCanvasImages()

                removeAllImages(canvas) 

                function removeAllImages(canvas){
                    canvas.getObjects().forEach(function(o) {
                        if (o.type === 'image') {
                            canvas.remove(o);
                        }
                    });
                }
                function checkCanvasImages(canvas){
                    let positionObject = [...canvas.getObjects()];
                    const avatarSizeTD = document.querySelector("#avatarSizeTD");
                    const prices_by_sizes_avatar_logo = document.querySelector("#prices_by_sizes_avatar_logo");
                    const avatarLogoPrice = document.querySelector("#avatarLogoPrice");
                    positionObject.forEach(function(object) {
                        if (object.type === 'image') {
                            avatarSizeTD.style.display = 'inline-block';
                            prices_by_sizes_avatar_logo.value = null;
                            avatarLogoPrice.textContent = 0;
                            prices_by_sizes_avatar_logo.disabled = false
                            return;
                        }

                    });

                }

                function inchesToPixels(inches) {
                    const dpi = 20; // Change this based on your canvas DPI\
                    return inches * dpi;
                }

                let fixedWidth = inchesToPixels(3);
                let fixedHeight = inchesToPixels(3); 
                
                let el = e.target;
                console.log('tshirtEditor - el', el)
                /*temp code*/
                let offset = 50;
                let left = fabric.util.getRandomInt(0 + offset, 200 - offset);
                let top = fabric.util.getRandomInt(0 + offset, 400 - offset);
                let angle = fabric.util.getRandomInt(-20, 40);
                let width = fabric.util.getRandomInt(30, 50);
                let opacity = (function(min, max){ return Math.random() * (max - min) + min; })(0.5, 1);
                const imgProperties = {
                    left: left,
                    top: top,
                    angle: 0,
                        // hasRotatingPoint:true,
                    selectable: true, // make sure it's selectable
                    lockScalingX: true,
                    lockScalingY: true,
                }
                fabric.Image.fromURL(el.src, function(image) {
		          image.set({
		            left: left,
		            top: top,
		            angle: 0,
		            padding: 10,
		            cornersize: 10,
	      	  		hasRotatingPoint:true,
					selectable: true, // make sure it's selectable
					resizable: false,   // disable resizing
		          });
                  image.scaleToWidth(fixedWidth);
                  image.set(imgProperties);
                    image.scaleToWidth(fixedWidth);
                    image.scaleToHeight(fixedHeight);
					// image.scale(getRandomNum(0.1, 0.25)).setCoords();
					canvas.add(image);

                    checkCanvasImages(canvas)
		        });

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


        document.getElementById('customize_by').addEventListener('change', function() {
            var selectedValue = this.value;
            console.log('Selected customization:', selectedValue);

            // Perform actions based on the selected value
            if (selectedValue === 'embroidered') {
                // Code for embroidered option
                console.log('Embroidery option selected.');
            } else if (selectedValue === 'printed') {
                // Code for printed option
                console.log('Print option selected.');
            }
        });

        document.getElementById('prices_by_sizes_avatar_logo').addEventListener('change', function() {
            getPricesByLogo()
            estimatePrice()
        });
        document.getElementById('customize_by').addEventListener('change', function() {
            let avatarLogoPrice = document.getElementById('avatarLogoPrice');
            if(parseInt(avatarLogoPrice.textContent)){
                getPricesByLogo()
            };

            let textPrice = document.getElementById('textPrice');
            if(parseInt(textPrice.textContent)){
                getPricesByText()
            };

            estimatePrice()
        });

        document.getElementById('prices_by_sizes_text').addEventListener('change', function() {
            getPricesByText()
            estimatePrice()
        });

        function updateDimensions(size) {
            let shirt_selected = document.getElementById('shirt_selected').value;
            var shirtDimensionsSelectText = document.getElementById('prices_by_sizes_text');

            // Fetch the dimensions data for the selected size
            if(shirt_selected.includes("DESIGN")){
                // var sizeData = shirtOptions["Polo Shirts"][size];
            }else{
                // var sizeData = shirtOptions[shirt_selected][size];
            }

            // Populate the dimensions select with new options
            // if (sizeData) {

            //     sizeData.forEach(item => {
            //         var option = document.createElement('option');
            //         option.value = item.dimension;
            //         option.text = item.dimension;
            //         shirtDimensionsSelectText.appendChild(option);
            //     });

        
            // }
            shirtDimensionsSelectText.value = null
            document.getElementById('textPrice').innerText = 0
            document.getElementById('avatarLogoPrice').innerText = 0
            
            estimatePrice()

        }

        document.getElementById('selected_size').addEventListener('change', function() {
            let avatarLogoPrice = document.getElementById('avatarLogoPrice');
            if(parseInt(avatarLogoPrice.textContent)){
                getPricesByLogo()
            };
            let textPrice = document.getElementById('textPrice');
            if(parseInt(textPrice.textContent)){
                getPricesByText()
            };

            estimatePrice()
        });

        // Set default selected value to "xs" and initialize dimensions
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('selected_size').value = 'xs';
            updateDimensions('xs');
        });

        
    </script>

<script>
  $(document).ready(function() {
    $("#draggableModal").on('shown.bs.modal', function() {
      $(".modal-dialog").draggable({
        handle: ".modal-header",
        // containment: "window"
      });
    });

    $("#textModal").on('shown.bs.modal', function() {
      $(".modal-dialog").draggable({
        handle: ".modal-header",
        // containment: "window"
      });
    });
  });

</script>

<script>
    document.getElementById('avatar_logo_checkbox').addEventListener('change', function() {
        var avatarLogoButton = document.getElementById('avatarLogoButton');
        var avatarSizeTD = document.getElementById('avatarSizeTD');
        let avatarLogoPrice = document.getElementById('avatarLogoPrice');
        if (this.checked) {
            avatarLogoButton.style.display = 'inline-block';
            // avatarSizeTD.style.display = 'inline-block';

        } else {
            avatarLogoPrice.textContent = 0;
            avatarLogoButton.style.display = 'none';
            avatarSizeTD.style.display = 'none';
            estimatePrice()
        }
    });

    document.getElementById('text_checkbox').addEventListener('change', function() {
        var textButton = document.getElementById('textButton');
        var textSizeTD = document.getElementById('textSizeTD');
        if (this.checked) {
            textButton.style.display = 'inline-block';
            textSizeTD.style.display = 'inline-block';
        } else {
            textButton.style.display = 'none';
            textSizeTD.style.display = 'none';
        }
    });
    document.getElementById('discard').addEventListener('click', function() {
        alert("Order form will reset.")
        location.reload();
    });

    function checkCheckbox(event) {
        var checkbox = event.target;
        var checkboxId = checkbox.id;
        if (checkbox.checked) {
            console.log('Checkbox with ID ' + checkboxId + ' is checked');
        } else {
            console.log('Checkbox with ID ' + checkboxId + ' is not checked');
        }
    }

    function countCheckedCheckboxes() {
        let tbody = document.querySelector('#table-body-personalize');
        let checkboxes = tbody.querySelectorAll('.form-check-input');
        let count = 0;
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                count++;
            }
        });
        
        console.log('count', count)
        return count;
    }


</script>