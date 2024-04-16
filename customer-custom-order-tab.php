
<div class="row container"  >
    
    <?php  //displayDataTest($customizeItems); ?>
    <div class="card-text" style="height: 74vh ; overflow-y:auto !important; overflow:auto;">
        <?php foreach ($customizeItems as $key => $item) { 
            $json_data = json_decode($item['json_data']);
            // displayDataTest($json_data);
        ?>
                <div class="card mb-3">
                    <div class=" container card-text row">
                      
                        <div class="my-2 col-md-3">
                            <h5 class="card-title">FRONT</h5>

                            <?php $img_link = getCustomOrderImageLink($json_data->front_canvas_image);  ?>
                            <img src="<?= $img_link?>" class=" card-img-top" alt="front_canvas_image">
                        </div>
                        <div class="my-2 col-md-3">
                            <h5 class="card-title">BACK</h5>
                            <?php $img_link = getCustomOrderImageLink($json_data->back_canvas_image);  ?>
                            <img src="<?= $img_link?>" class=" card-img-top" alt="back_canvas_image">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title">Custom Order #: <?=$item['id'] ?></h5>
                                <p class="card-text">Customize By: <?= $json_data->customize_by ?></p>
                                <p class="card-text">Sizes Ordered: 
                                    <?php foreach($json_data->sizes_ordered as $size => $quantity): ?>
                                        <?= $size ?> : <?= $quantity ?>,
                                    <?php endforeach; ?>
                                </p>
                                <p class="card-text"><small class="text-muted">Date Created: <?= $item['created_at'] ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>

        <?php } ?>
    </div>
</div>