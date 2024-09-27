<div class="container1">
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    <div class="row highlightedProducts swiper-container" id="homepageSlider1">

        <h2>Sale</h2>
        <div class="swiper-wrapper">
            <% loop $HighlightedProducts %>
                <div class="swiper-slide">
                <% if $OnSale %>

                    <div class="col-12">
                        <div class="product productSale sliderproduct">
                            <a href="$Link">
                                <div class="productSaleLabel">
                                    <span>Sale</span>
                                </div>
                                <div class="productImage">
                                    <img src="<% if $MainImage == "https://dummyimage.com/170x120/f2f2f2/000000" %> $MainImage <% else %> {$MainImage.Pad(300, 300).url} <% end_if %>" alt="$MainImage.Title">
                                </div>
                                <div class="productText">
                                    <p>$Name</p>
                                    <div class="productPriceHolder">
                                        <span class="productSalePrice">&euro; $SalePrice</span>
                                        <span class="productPrice">&euro; $Price</span>
                                    </div>
                                    <button href="/$Link" class="button btn-filled-dark">Lees meer <i class="fas fa-chevron-right"></i></button>
                                </div>
                            </a>
                        </div>
                    </div>

                <% else %>

                    <div class="col-12">
                        <div class="product sliderproduct">
                            <a href="/$Link">
                                <div class="productImage">

                                    <img src="<% if $MainImage == "https://dummyimage.com/170x120/f2f2f2/000000" %> $MainImage <% else %> {$MainImage.Pad(300, 300).url} <% end_if %>" alt="P$MainImage.Title">
                                </div>
                                <div class="productText">
                                    <p>$Name</p>
                                    <div class="productPriceHolder">
                                        <span class="productCurrentPrice">&euro; $Price</span>
                                    </div>
                                    <button class="button btn-filled-dark">Lees meer <i class="fas fa-chevron-right"></i></button>
                                </div>
                            </a>
                        </div>
                    </div>
                <% end_if %>

                </div>
            <% end_loop %>
             <% loop $HighlightedProducts %>
                <div class="swiper-slide">
                <% if $OnSale %>

                    <div class="col-12">

                        <div class="product productSale sliderproduct">
                            <a href="$Link">
                                <div class="productSaleLabel">
                                    <span>Sale</span>
                                </div>
                                <div class="productImage">
                                    <img src="<% if $MainImage == "https://dummyimage.com/170x120/f2f2f2/000000" %> $MainImage <% else %> {$MainImage.Pad(300, 300).url} <% end_if %>" alt="$MainImage.Title">
                                </div>
                                <div class="productText">
                                    <p>$Name</p>
                                    <div class="productPriceHolder">
                                        <span class="productSalePrice">&euro; $SalePrice</span>
                                        <span class="productPrice">&euro; $Price</span>
                                    </div>
                                    <button href="/$Link" class="button btn-filled-dark">Lees meer <i class="fas fa-chevron-right"></i></button>
                                </div>
                            </a>
                        </div>
                    </div>

                <% else %>

                    <div class="col-12">
                        <div class="product sliderproduct">
                            <a href="/$Link">
                                <div class="productImage">

                                    <img src="<% if $MainImage == "https://dummyimage.com/170x120/f2f2f2/000000" %> $MainImage <% else %> {$MainImage.Pad(300, 300).url} <% end_if %>" alt="P$MainImage.Title">
                                </div>
                                <div class="productText">
                                    <p>$Name</p>
                                    <div class="productPriceHolder">
                                        <span class="productCurrentPrice">&euro; $Price</span>
                                    </div>
                                    <button class="button btn-filled-dark">Lees meer <i class="fas fa-chevron-right"></i></button>
                                </div>
                            </a>
                        </div>
                    </div>

                <% end_if %>
                </div>
            <% end_loop %>
             <% loop $HighlightedProducts %>
                <div class="swiper-slide">
                <% if $OnSale %>

                    <div class="col-12">

                        <div class="product productSale sliderproduct">
                            <a href="$Link">
                                <div class="productSaleLabel">
                                    <span>Sale</span>
                                </div>
                                <div class="productImage">
                                    <img src="<% if $MainImage == "https://dummyimage.com/170x120/f2f2f2/000000" %> $MainImage <% else %> {$MainImage.Pad(300, 300).url} <% end_if %>" alt="$MainImage.Title">
                                </div>
                                <div class="productText">
                                    <p>$Name</p>
                                    <div class="productPriceHolder">
                                        <span class="productSalePrice">&euro; $SalePrice</span>
                                        <span class="productPrice">&euro; $Price</span>
                                    </div>
                                    <button href="/$Link" class="button btn-filled-dark">Lees meer <i class="fas fa-chevron-right"></i></button>
                                </div>
                            </a>
                        </div>
                    </div>

                <% else %>

                    <div class="col-12">
                        <div class="product sliderproduct">
                            <a href="/$Link">
                                <div class="productImage">

                                    <img src="<% if $MainImage == "https://dummyimage.com/170x120/f2f2f2/000000" %> $MainImage <% else %> {$MainImage.Pad(300, 300).url} <% end_if %>" alt="P$MainImage.Title">
                                </div>
                                <div class="productText">
                                    <p>$Name</p>
                                    <div class="productPriceHolder">
                                        <span class="productCurrentPrice">&euro; $Price</span>
                                    </div>
                                    <button class="button btn-filled-dark">Lees meer <i class="fas fa-chevron-right"></i></button>
                                </div>
                            </a>
                        </div>
                    </div>

                <% end_if %>
                </div>
            <% end_loop %>
        </div>

    </div>
</div>
