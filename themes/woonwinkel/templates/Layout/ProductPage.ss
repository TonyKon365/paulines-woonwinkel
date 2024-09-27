<% include Navbar %>
<div class="contentHolder">
        <div class="row breadcrumbsHolder">
            <div class="container">
                <% include ProductBreadCrumbs %>
            </div>
        </div>
    <% loop $Product %>
        <div class="container" style="background:#fff">
            <div class="row" id="productPage" itemtype="http://schema.org/Product" itemscope>

                <%-- Itentifiers for google --%>
                <meta itemprop="sku" content="$ID">

                <div class="productImage col-lg-5" >

                    <div class="productImageSlider" style="background:#fff">
                        <div class="swiper-wrapper mainslider">

                        <% loop $Images.Sort(SortID) %>
                            <div class="swiper-slide">
                                <% with $Image %>
                                    <img class="my-custom-class" src="$URL" alt="" width="$Width" height="$Height" />
                                <% end_with %>
                                <a href="$Image.url" ><img src="$Image.url" itemprop="image"></a>
                            </div>
                        <% end_loop %>
                        </div>
                        <div class="swiper-button-prev-main"><i class="fas fa-arrow-left"></i></div>
                        <div class="swiper-button-next-main"><i class="fas fa-arrow-right"></i></div>
                    </div>
                    <div class="productThumbs" >
                        <div class="swiper-wrapper">
                            <% loop $Images.Sort(SortID) %>
                                <div class="swiper-slide">
                                    <img src="$Image.url">
                                </div>
                            <% end_loop %>
                        </div>
                        <div class="swiper-button-prev-nav"><i class="fas fa-arrow-left"></i></div>
                        <div class="swiper-button-next-nav"><i class="fas fa-arrow-right"></i></div>
                    </div>
                </div>

                <div class="productInfo col-lg-7">
                    <h2 itemprop="name">$Title</h2>
                    <% if $Top.LoggedIn %><span class="memberEdit"><a href="{$BaseHref}admin/products/Product/EditForm/field/Product/item/{$ID}"><i class="fas fa-pencil-alt"></i> Bewerk</a></span><% end_if %>

                    <% if $OnSale %>
                        <div class="priceHolder salePriceHolder">
                            <span class="salePrice">&euro; $SalePrice</span>
                            <span class="normalPrice">&euro; $Price</span>
                        </div>
                    <% else %>
                        <div class="priceHolder">
                            <span class="normalPrice">&euro; $Price</span>
                        </div>
                    <% end_if %>

                    <div class="productTabs">
                        <div class="productTabNames">
                            <% if $Attributes || $AttributesDescription %>
                                <button class="productTabName active" data-targetID="description">Omschrijving</button>
                                <button class="productTabName" data-targetID="attributes">Kenmerken</button>
                            <% end_if %>
                        </div>
                        <div class="productTabContentTabs">
                            <div class="productTabContent active" id="description" itemprop="description">$Description</div>
                            <% if $Attributes || 	$AttributesDescription %>
                                <div class="productTabContent" id="attributes">
								$AttributesDescription
                                    <table>
                                        <% loop $Attributes %>
                                            <tr>
                                                <td><% if $DefaultAttribute %>{$DefaultAttribute.Name}<% else %>{$Name}<% end_if %></td>
                                                <td>$Content</td>
                                            </tr>
                                        <% end_loop %>
                                    </table>
                                </div>
                            <% end_if %>
                        </div>
                    </div>

                    <a class="button btn-dark" href="$SiteConfig.MoreInfoLink.LinkURL?id={$ID}" <% if $SiteConfig.MoreInfoLink.Target %>target="$SiteConfig.MoreInfoLink.Target"<% end_if %>>$SiteConfig.MoreInfoLink.Title</a>

                    <% if $OrderButton == 0 %>
                        <a class="button btn-filled-dark" href="$SiteConfig.OrderLink.LinkURL?id={$ID}" <% if $SiteConfig.OrderLink.Target %>target="$SiteConfig.OrderLink.Target"<% end_if %>>$SiteConfig.OrderLink.Title</a>
                    <% end_if %>
                </div>

            </div>

        </div>
    <% end_loop %>

    <div class="divider"></div>

    <% include Highlighted %>
</div>

<% include Footer %>
