<% if $OnSale%>

    <div class="col-6 col-md-4 col-lg-4">
        <div class="product productSale" title="{$Name}">
            <a href="{$BaseHref}{$Link}">
                <div class="productSaleLabel">
                    <span>Sale</span>
                </div>
                <div class="productImage">
                <% loop Images.sort(SORTID) %>
                <% if First %>
                         <img src="$Image.Pad(300,300).url " alt="Product foto">
                <% end_if %>
                <% end_loop %>
                </div>
                <div class="productText">
                    <p>$Name.LimitCharacters(20)</p>
                    <div class="productPriceHolder">
                        <span class="productSalePrice">&euro; $SalePrice</span>
                        <span class="productPrice">&euro; $Price</span>
                    </div>
                    <button href="$Link" class="button btn-filled-dark">Lees meer <i class="fas fa-chevron-right"></i></button>
                </div>
            </a>
        </div>
    </div>

<% else %>

    <div class="col-6 col-md-4 col-lg-4">
        <div class="product" title="{$Name}">
            <a href="{$BaseHref}{$Link}">
                <div class="productImage">
				<% loop Images.sort(SORTID) %>
                <% if First %>
                         <img src="$Image.Pad(300,300).url " alt="Product foto">
                <% end_if %>
                <% end_loop %>
                </div>
                <div class="productText">
                    <p>$Name.LimitCharacters(20)</p>
                    <div class="productPriceHolder">
                        <span class="productCurrentPrice">&euro; $Price</span>
                    </div>
                    <button class="button btn-filled-dark">Lees meer <i class="fas fa-chevron-right"></i></button>
                </div>
            </a>
        </div>
    </div>

<% end_if %>
