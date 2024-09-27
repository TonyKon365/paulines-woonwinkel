<% include Navbar %>

    <div class="row breadcrumbsHolder">
        <div class="container">
            $Breadcrumbs
        </div>
    </div>
    <%--<div class="sub_category_center">--%>
    <%--<div class="container">--%>
        <%--<div class="content row" id="about">--%>
            <%--<div class="contentText col-12 col-lg-7">--%>
                <%--$Content--%>
                <%--<% if $ContentButton %><a href="$ContentButton.LinkURL" target="$ContentButton.Target" title="Ga naar $ContentButton.Title" class="button btn-dark">$ContentButton.Title</a><% end_if %>--%>
            <%--</div>--%>

            <%--<div class="contentimage col-12 col-lg-5">--%>
              <%--<% if ContentImage %>  <img src="$ContentImage.ScaleWidth(900).URL" alt="$ContentImage.Title"> <% end_if %>--%>
            <%--</div>--%>
        <%--</div>--%>
    <%--</div>--%>


    <%-- <div class="container"> --%>
    <div class="container" id="categories">

          <% if $Children %>
            <% loop $Children %>
                <a href="$URLSegment">
                    <div class="categoryPage $Size <% if $Odd %>odd<% end_if %>">
                      <div class="subcategoryText">
                        <div class="subsection">
                          <span class="subcategoryTitle">$Title <br /></span>
                          <div id="box_info" class="subcategoryButton"><h1 id="start-meerinfo" href="$SiteConfig.MoreInfoLink.LinkURL?id={$ID}" <% if $SiteConfig.MoreInfoLink.Target %>target="$SiteConfig.MoreInfoLink.Target"<% end_if %>>Bekijk de collectie</h1></div>
                        </div>
                      </div>
                        <div class="subcategoryOverlay"></div>
                        <div class="subcategoryOverlayImage">
                            <img class="sub_image" src="$ContentImage.scalewidth(900).URL">
                        </div>
                    </div>
              </a>
              <% end_loop %>
            <% end_if %>
    <%--</div>--%>
<br />

            <% if $AbsoluteLink = "https://paulineswoonwinkel.nl/ambachtelijk-en-uniek/" %>
                <div class="container">
                    <div class="row" id="paginatedItemCount">
                        <div class="col-12 col-lg-6">
                            <% if $PaginatedPages.TotalItems > 1 %>
                                Er zijn {$PaginatedPages.TotalItems} resultaten
                            <% else %>
                                Er is {$PaginatedPages.TotalItems} resultaat
                            <% end_if %>
                        </div>
                        <div class="col-12 col-lg-6 text-right">
                            <label for="pagination">Aantal producten:</label>
                            <select id="pagination">
                                <option value="" selected data-default>Aantal producten</option>
                                <option value="paginated-12">12 producten</option>
                                <option value="paginated-24">24 producten</option>
                                <option value="paginated-36">36 producten</option>
                                <option value="all-products">Alle producten</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <% loop $PaginatedPages %>
                            <%-- $Title --%>
                            <% include Product %>
                        <% end_loop %>
                    </div>
                    <div class="row" id="paginatedInfo">
                        <div class="paginatedIndex float-left">
                            Pagina {$PaginatedPages.CurrentPage} van {$PaginatedPages.TotalPages}
                        </div>

                        <% if $PaginatedPages.MoreThanOnePage %>
                            <div class="paginatedNumbers">
                                <% if $PaginatedPages.Pages %>

                                    <div class="numbers">

                                    <% if $PaginatedPages.PrevLink %>
                                        <a href="$PaginatedPages.PrevLink" class="prev pageButton">
                                            <i class="fas fa-chevron-left"></i>
                                        </a>


                                        <% loop $PaginatedPages.Pages.First %>
                                                <a href="$Link">
                                                    <span class="number pageButton">
                                                        $PageNum
                                                    </span>
                                                </a>
                                                    <span class="number pageButton">
                                                        ...
                                                    </span>
                                        <% end_loop %>

                                               <% end_if %>


                                        <% loop $PaginatedPages.Pages %>

                                            <% if $CurrentBool %>
                                                <span class="number pageButton current" style="text-decoration:underline">
                                                    $PageNum
                                                </span>
                                             <% end_if %>

                                        <% end_loop %>


                                         <% loop $PaginatedPages.Pages.limit(1, $PaginatedPages.CurrentPage ) %>
                                                <a href="$Link">
                                                    <span class="number pageButton">
                                                        $PageNum
                                                    </span>
                                                </a>

                                        <% end_loop %>





                                        <% loop $PaginatedPages.Pages.Last %>
                                             <span class="number pageButton">
                                                        ...
                                                    </span>
                                                <a href="$Link">
                                                    <span class="number pageButton">
                                                        $PageNum
                                                    </span>
                                                </a>

                                        <% end_loop %>


                                    <% if $PaginatedPages.NextLink %>
                                        <a href="$PaginatedPages.NextLink" class="next pageButton">
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    <% end_if %>
                                    </div>
                                <% end_if %>
                            </div>
                        <% end_if %>
                    </div>
                </div>
            <% end_if %>
                        <% if $AbsoluteLink = "https://www.paulineswoonwinkel.nl/ambachtelijk-en-uniek/" %>
                <div class="container">
                    <div class="row" id="paginatedItemCount">
                        <div class="col-12 col-lg-6">
                            <% if $PaginatedPages.TotalItems > 1 %>
                                Er zijn {$PaginatedPages.TotalItems} resultaten
                            <% else %>
                                Er is {$PaginatedPages.TotalItems} resultaat
                            <% end_if %>
                        </div>
                        <div class="col-12 col-lg-6 text-right">
                            <label for="pagination">Aantal producten:</label>
                            <select id="pagination">
                                <option value="" selected data-default>Aantal producten</option>
                                <option value="paginated-12">12 producten</option>
                                <option value="paginated-24">24 producten</option>
                                <option value="paginated-36">36 producten</option>
                                <option value="all-products">Alle producten</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <% loop $PaginatedPages %>
                            <%-- $Title --%>
                            <% include Product %>
                        <% end_loop %>
                    </div>
                    <div class="row" id="paginatedInfo">
                        <div class="paginatedIndex float-left">
                            Pagina {$PaginatedPages.CurrentPage} van {$PaginatedPages.TotalPages}
                        </div>

                        <% if $PaginatedPages.MoreThanOnePage %>
                            <div class="paginatedNumbers">
                                <% if $PaginatedPages.Pages %>

                                    <div class="numbers">

                                    <% if $PaginatedPages.PrevLink %>
                                        <a href="$PaginatedPages.PrevLink" class="prev pageButton">
                                            <i class="fas fa-chevron-left"></i>
                                        </a>


                                        <% loop $PaginatedPages.Pages.First %>
                                                <a href="$Link">
                                                    <span class="number pageButton">
                                                        $PageNum
                                                    </span>
                                                </a>
                                                    <span class="number pageButton">
                                                        ...
                                                    </span>
                                        <% end_loop %>

                                               <% end_if %>


                                        <% loop $PaginatedPages.Pages %>

                                            <% if $CurrentBool %>
                                                <span class="number pageButton current" style="text-decoration:underline">
                                                    $PageNum
                                                </span>
                                             <% end_if %>

                                        <% end_loop %>


                                         <% loop $PaginatedPages.Pages.limit(1, $PaginatedPages.CurrentPage ) %>
                                                <a href="$Link">
                                                    <span class="number pageButton">
                                                        $PageNum
                                                    </span>
                                                </a>

                                        <% end_loop %>





                                        <% loop $PaginatedPages.Pages.Last %>
                                             <span class="number pageButton">
                                                        ...
                                                    </span>
                                                <a href="$Link">
                                                    <span class="number pageButton">
                                                        $PageNum
                                                    </span>
                                                </a>

                                        <% end_loop %>


                                    <% if $PaginatedPages.NextLink %>
                                        <a href="$PaginatedPages.NextLink" class="next pageButton">
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    <% end_if %>
                                    </div>
                                <% end_if %>
                            </div>
                        <% end_if %>
                    </div>
                </div>
            <% end_if %>
    </div>
	<div class="divider"></div>
<% include Footer %>
