
<div class="row container"  >
    
    <?php  //displayDataTest($customizeItems); ?>
    <div class="card-text" style="height: 78vh; overflow-y:auto !important; overflow:auto;">
        <?php foreach ($customizeItems as $key => $item) { 
            $json_data = json_decode($item['json_data']);
            // displayDataTest($json_data);
        ?>
                <div class="card mb-3">
                    <div class=" container card-text row">
                      
                        <div class="my-2 col-md-3">
                            <div class="card border-dark mt-3" style="">
                                <div class="card-header">FRONT</div>
                                <div class="card-body text-dark">
                                    <?php $img_link = getCustomOrderImageLink($json_data->front_canvas_image);  ?>
                                    <img src="<?= $img_link?>" class=" card-img-top" alt="front_canvas_image">
                                </div>
                            </div>
                        </div>
                        <div class="my-2 col-md-3">
                            <div class="card border-dark mt-3" style="">
                                <div class="card-header">BACK</div>
                                <div class="card-body text-dark">
                                    <?php $img_link = getCustomOrderImageLink($json_data->back_canvas_image);  ?>
                                    <img src="<?= $img_link?>" class=" card-img-top" alt="back_canvas_image">
                                </div>
                            </div>
                        </div>
                        <div class="my-2 col-md-6">
                            <div class="card border-dark mt-3" style="">
                                <div class="card-header">Custom Order #: <?=$item['id'] ?></div>
                                <div class="card-body text-dark">
                                    <div class="card-text h6 lead">Status: <span class="h6"><?=$item['status'] ? item['status'] : "TO BE REVIEWED BY ADMIN" ?></span></div>
                                    <div class="card-text h6 lead">Total Price: <span class="h6"><?=$item['total_price'] ? '₱ '. $item['total_price'] : "TO BE REVIEWED BY ADMIN" ?></span></div>
                                    <p class="card-text h6 lead">Customize By: <span class="h6"><?= $json_data->customize_by ?></span></p>
                                    <p class="card-text h6 lead">Size: </p>
                                            <?php foreach($json_data->sizes_ordered as $size => $quantity): ?>
                                                <?php $sizeList = [
                                                    "xs" => "EXTRA SMALL",
                                                    "s" => "SMALL",
                                                    "m" => "MEDIUM",
                                                    "l" => "LARGE",
                                                    "xl" => "EXTRA LARGE",
                                                    "xxl" => "2 EXTRA LARGE",
                                                ] ?>
                                                <div class="mx-4 card-text">
                                                   <span> <?= $sizeList[$size] ?></span> : <span class="h6"><?= $quantity ?></span>
                                                </div>
                                            <?php endforeach; ?>


                                    <hr>
                                    <p class="card-text"><small class="text-muted">Date Created: <?= $item['created_at'] ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        <?php } ?>
    </div>
</div>