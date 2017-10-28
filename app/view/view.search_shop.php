<div id="ajax-add">
    <div class="container">

            <?php
            $products;
            $cnt = 0;
            $first = 0;
            if($this->searched != null)
            {
                $products = $this->products;
            }
            else
            {
                $products = Products::getProducts();
            }
            for ($i = 0; $i < count($products); $i++) {
                $product = $products[$i];
                if($cnt == 3 || $first == 0)
                {
                    $cnt = 0;
                    $first = 1;
                    echo "<div class=\"row\">";
                }
                ?>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img style="height: 260px;" src="<?php Util::link('uploads/' . $product['product_image']); ?>" alt=""
                             class="img-responsive">
                        <div class="caption">
                            <h4 class="pull-right">TK.<?php echo ' ' . $product['price']; ?></h4>
                            <h4><a href="#"><?php echo $product['product_name']; ?></a></h4>
                            <p><?php echo $product['description'] ?></p>
                        </div>
                        <div class="space-ten"></div>
                        <div class="btn-ground text-center">
                            <a href="<?php Util::link('cart/add/' . $product['product_id']); ?>">
                                <button type="button" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add To
                                    Cart
                                </button>
                            </a>
                            <a href="<?php Util::link('product/view/' . $product['product_id']); ?>">
                                <button type="button" class="btn btn-primary"><i class="fa fa-search"></i>View Details
                                </button>
                            </a>
                        </div>
                        <div class="space-ten"></div>
                    </div>
                </div>
                <?php

                if($cnt==2)
                {
                    echo "</div>";
                }
                $cnt++;
            }

            ?>
        </div>
    </div>
</div>